# CLAUDE.md - Module Anatomy

This file provides guidance to Claude Code when working with the `hanafalah/module-anatomy` package.

## Overview

Module Anatomy is a Laravel package that provides anatomical master data for healthcare applications. It manages human body parts organized in a hierarchical structure (head-to-toe), with specialized support for dental anatomy. This module is part of the Wellmed multi-tenant healthcare management system.

**Package:** `hanafalah/module-anatomy`
**Namespace:** `Hanafalah\ModuleAnatomy`

## CRITICAL WARNING: ServiceProvider Memory Issues

The current ServiceProvider uses `registers(['*'])` which can cause memory exhaustion:

```php
// Current implementation - POTENTIALLY DANGEROUS
public function register()
{
    $this->registerMainClass(ModuleAnatomy::class)
        ->registerCommandService(Providers\CommandServiceProvider::class)
        ->registers(['*']);  // <-- Can cause memory issues!
}
```

### Why This Is Problematic

1. **Auto-registers ALL classes** including Schema classes that extend `PackageManagement`
2. **Schema classes use `HasModelConfiguration` trait** which calls `config('database.models')` during load
3. **In Laravel Octane environments**, this can trigger memory exhaustion (536MB limit)
4. **Circular dependency chains** may form during class loading

### The Problem Chain

```
registers(['*'])
    --> registerSchema()
        --> Loads Schemas\Anatomy, Schemas\DentalAnatomy, Schemas\HeadToToe
            --> These extend PackageManagement (from laravel-support)
                --> Uses HasModelConfiguration trait
                    --> Calls config('database.models')
                        --> May trigger more class loading
                            --> MEMORY EXHAUSTED
```

### Safe Pattern (Recommended)

```php
public function register()
{
    $this->registerMainClass(ModuleAnatomy::class)
        ->registerCommandService(Providers\CommandServiceProvider::class);

    // Explicitly bind what you need with closures (deferred loading)
    $this->app->singleton(
        Contracts\Schemas\Anatomy::class,
        fn($app) => new Schemas\Anatomy()
    );
}
```

## Dependencies

| Package | Purpose |
|---------|---------|
| `hanafalah/laravel-support` | Base classes (BaseServiceProvider, PackageManagement, Unicode model) |
| `hanafalah/module-examination` | Examination integration for medical records |

## Architecture

```
src/
├── Commands/
│   ├── EnvironmentCommand.php           # Base command class
│   └── InstallMakeCommand.php           # php artisan module-anatomy:install
├── Contracts/
│   ├── ModuleAnatomy.php                # Main module contract
│   ├── Data/
│   │   ├── AnatomyData.php              # Anatomy DTO contract
│   │   ├── DentalAnatomyData.php        # Dental DTO contract
│   │   └── HeadToToeData.php            # Head-to-toe DTO contract
│   └── Schemas/
│       ├── Anatomy.php                  # Anatomy schema contract
│       ├── DentalAnatomy.php            # Dental schema contract
│       └── HeadToToe.php                # Head-to-toe schema contract
├── Data/
│   ├── AnatomyData.php                  # Anatomy DTO (flag defaults to 'Anatomy')
│   ├── DentalAnatomyData.php            # Dental DTO (flag defaults to 'DentalAnatomy')
│   └── HeadToToeData.php                # Head-to-toe DTO (flag defaults to 'HeadToToe')
├── Database/
│   └── Seeders/
│       ├── data/                        # Anatomy seed data files
│       │   ├── head-to-toe.php          # Main anatomy hierarchy
│       │   └── head-to-toe/
│       │       ├── wajah.php            # Face anatomy
│       │       └── wajah/
│       │           ├── dental-anatomy.php   # 56 teeth entries
│       │           ├── ear-anatomy.php
│       │           ├── eye-anatomy.php
│       │           └── nose-anatomy.php
│       ├── AnatomySeeder.php            # Main seeder class
│       └── DatabaseSeeder.php           # Entry point seeder
├── Models/
│   ├── Anatomy.php                      # Base model (table: unicodes)
│   ├── DentalAnatomy.php                # Dental model with element_id, position
│   └── HeadToToe.php                    # Global scope: flag='HeadToToe'
├── Providers/
│   └── CommandServiceProvider.php       # Artisan command registration
├── Resources/
│   ├── Anatomy/
│   │   ├── ShowAnatomy.php              # Detail resource
│   │   └── ViewAnatomy.php              # List resource
│   └── DentalAnatomy/
│       ├── ShowDentalAnatomy.php
│       └── ViewDentalAnatomy.php
├── Schemas/
│   ├── Anatomy.php                      # Business logic, caching, queries
│   ├── DentalAnatomy.php                # Extends Anatomy schema
│   └── HeadToToe.php                    # Extends Anatomy schema
├── ModuleAnatomy.php                    # Main class (extends PackageManagement)
└── ModuleAnatomyServiceProvider.php     # Service provider entry point
assets/
└── config/
    └── config.php                       # Package configuration
```

## Key Classes

### ModuleAnatomy (Main Class)

```php
class ModuleAnatomy extends PackageManagement implements Contracts\ModuleAnatomy {}
```

**WARNING:** Extends `PackageManagement` from laravel-support, which uses `HasModelConfiguration` trait. Do NOT instantiate early in the boot process.

### Models

All models use the `unicodes` table with different `flag` values for differentiation:

| Model | Table | Flag | Global Scope |
|-------|-------|------|--------------|
| `Anatomy` | `unicodes` | Various | None |
| `HeadToToe` | `unicodes` | `HeadToToe` | Filters by flag |
| `DentalAnatomy` | `unicodes` | `DentalAnatomy` | None |

**Key Model Fields:**
- `id` - Primary key
- `name` - Anatomy part name (e.g., "Kepala", "Jantung")
- `label` - Display label
- `flag` - Type identifier for polymorphism
- `element_id` - For dental: SVG element mapping (e.g., `Canine_13`)
- `position` - For dental: `'upper'` or `'lower'`
- `ordering` - Sort order

**Model Relationships:**
- `childs()` - Hierarchical children
- `reference()` - Morphable reference
- `service()` - Optional service association

### Schema Classes

Schemas extend `Hanafalah\LaravelSupport\Schemas\Unicode`:

```php
class Anatomy extends Unicode implements ContractsAnatomy
{
    protected string $__entity = 'Anatomy';

    protected array $__cache = [
        'index' => [
            'name'     => 'anatomy',
            'tags'     => ['anatomy', 'anatomy-index'],
            'duration' => 24 * 60  // 24 hours
        ]
    ];

    public function prepareStoreAnatomy(AnatomyData $dto): Model;
    public function anatomy(mixed $conditionals = null): Builder;
}
```

### Data Transfer Objects (DTOs)

DTOs extend `Hanafalah\LaravelSupport\Data\UnicodeData`:

```php
class AnatomyData extends UnicodeData
{
    public static function before(array &$attributes)
    {
        $attributes['flag'] ??= 'Anatomy';  // Default flag
        parent::before($attributes);
    }
}
```

**Default flags by DTO:**
- `AnatomyData` -> `'Anatomy'`
- `HeadToToeData` -> `'HeadToToe'`
- `DentalAnatomyData` -> `'DentalAnatomy'`

## Anatomy Data Hierarchy

The module provides hierarchical anatomy data:

```
Kepala (Head)
├── Tengkorak (Skull) [SkullAnatomy]
└── Wajah (Face)
    ├── Mata (Eyes) [EyeAnatomy]
    ├── Telinga (Ears) [EarAnatomy]
    ├── Hidung (Nose) [NoseAnatomy]
    └── Mulut (Mouth)
        ├── Gigi (Teeth) [DentalAnatomy] - 56 teeth
        ├── Lidah (Tongue)
        ├── Langit-langit (Palate)
        └── Tonsil

Leher (Neck) [HeadToToe]
├── Tenggorokan [ThroatAnatomy]
├── Laring [LarynxAnatomy]
└── Kelenjar Tiroid [ThyroidGlandAnatomy]

Dada (Chest) [HeadToToe]
├── Paru-paru [LungsAnatomy]
├── Jantung [HeartAnatomy]
└── Payudara [BreastAnatomy]

Abdomen [HeadToToe]
├── Lambung [StomachAnatomy]
├── Hati [LiverAnatomy]
├── Usus [IntestinesAnatomy]
├── Pankreas [PancreasAnatomy]
└── Limpa [SpleenAnatomy]

Panggul (Pelvis) [HeadToToe]
Ekstremitas Atas (Upper Extremities) [HeadToToe]
Ekstremitas Bawah (Lower Extremities) [HeadToToe]
Punggung (Back) [HeadToToe]
```

## Dental Anatomy Details

Uses FDI World Dental Federation notation:

| Quadrant | Adult Teeth | Deciduous Teeth | Position |
|----------|-------------|-----------------|----------|
| Upper Right | 11-18 | 51-55 | `upper` |
| Upper Left | 21-28 | 61-65 | `upper` |
| Lower Left | 31-38 | 71-75 | `lower` |
| Lower Right | 41-48 | 81-85 | `lower` |

**Tooth Types:**
- Incisors (Central, Lateral)
- Canines
- Bicuspids/Premolars (1st, 2nd)
- Molars (1st, 2nd)
- Wisdom Teeth (3rd Molar)

**element_id Format:** `{ToothType}_{Number}` (e.g., `Canine_13`, `Molar_1st_Molar_16`)

## Usage Examples

### Querying Anatomy

```php
use Hanafalah\ModuleAnatomy\Contracts\Schemas\Anatomy;

$schema = app(Anatomy::class);

// Get all anatomy with children
$anatomies = $schema->anatomy()->with('childs')->get();

// Filter by flag
$headToToe = $schema->anatomy()
    ->where('flag', 'HeadToToe')
    ->get();
```

### Creating Anatomy Records

```php
use Hanafalah\ModuleAnatomy\Contracts\Schemas\Anatomy;
use Hanafalah\ModuleAnatomy\Data\AnatomyData;

$schema = app(Anatomy::class);

$anatomy = $schema->prepareStoreAnatomy(
    AnatomyData::from([
        'name' => 'Custom Body Part',
        'label' => 'Custom Part',
        'flag' => 'Anatomy',
        'childs' => [
            ['name' => 'Sub Part 1', 'label' => 'Sub 1'],
            ['name' => 'Sub Part 2', 'label' => 'Sub 2'],
        ]
    ])
);
```

### Working with Dental Anatomy

```php
use Hanafalah\ModuleAnatomy\Models\DentalAnatomy;

// Get upper teeth
$upperTeeth = DentalAnatomy::query()
    ->where('flag', 'DentalAnatomy')
    ->where('position', 'upper')
    ->orderBy('ordering')
    ->get();

// Find by element_id
$tooth = DentalAnatomy::query()
    ->where('element_id', 'Canine_13')
    ->first();
```

### Using HeadToToe Model (Global Scope Applied)

```php
use Hanafalah\ModuleAnatomy\Models\HeadToToe;

// Automatically filtered to flag='HeadToToe'
$regions = HeadToToe::with('childs')->get();
```

## API Resources

Resources support `request()->is_flatten` parameter:

| Flattened | Relations Loaded |
|-----------|------------------|
| `true` | `reference` only |
| `false` | `childs`, `reference`, optionally `service` |

## Installation & Commands

```bash
# Publish migrations
docker exec -it wellmed-backbone php artisan module-anatomy:install

# Run migrations
docker exec -it wellmed-backbone php artisan migrate

# Seed anatomy data
docker exec -it wellmed-backbone php artisan db:seed \
    --class="Hanafalah\ModuleAnatomy\Database\Seeders\DatabaseSeeder"
```

## Configuration

`assets/config/config.php`:

```php
return [
    'namespace' => 'Hanafalah\\ModuleAnatomy',
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts',
        'schema' => 'Schemas',
        'database' => 'Database',
        'data' => 'Data',
        'resource' => 'Resources',
        'migration' => '../assets/database/migrations'
    ],
    'commands' => [
        Commands\InstallMakeCommand::class
    ]
];
```

## Multi-Tenant Considerations

In Wellmed's multi-tenant environment:
- Anatomy data is **master data** stored in the central `wellmed` database
- Data is shared across all tenants (not tenant-specific)
- **NEVER store tenant-specific data in static properties** (Octane persists state)
- Clear caches when updating master anatomy data

## Common Pitfalls

| Issue | Cause | Solution |
|-------|-------|----------|
| Memory exhaustion on boot | `registers(['*'])` loading Schema classes | Use explicit registration |
| Missing flag on insert | DTO not called with flag | Let DTO defaults handle it |
| Hierarchical data missing children | Not eager loading | Use `->with('childs')` |
| Dental element_id not found | Wrong format | Use format `{Type}_{Number}` |
| Position filter not working | Wrong case | Use lowercase `'upper'` or `'lower'` |
| HeadToToe returning all anatomy | Global scope issue | Check model scope definition |

## Testing & Debugging

```bash
# Run tests
docker exec -it wellmed-backbone php artisan test --filter=Anatomy

# Clear caches
docker exec -it wellmed-backbone php artisan cache:clear
docker exec -it wellmed-backbone php artisan config:clear

# Reload Octane (required after code changes)
docker exec -it wellmed-backbone php artisan octane:reload

# Check for memory issues
docker logs wellmed-backbone 2>&1 | grep -i "memory\|fatal"
```

## Modification Checklist

Before modifying this module:

- [ ] Understand that ModuleAnatomy extends PackageManagement (memory-sensitive)
- [ ] Avoid adding code that calls `config()` during class loading
- [ ] Test with `php artisan config:clear` after changes
- [ ] Verify Octane reload works without memory errors
- [ ] Clear anatomy caches if changing seed data
- [ ] Ensure no circular dependencies introduced
