<?php

namespace Hanafalah\ModuleAnatomy\Schemas;

use Hanafalah\LaravelSupport\Schemas\Unicode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleAnatomy\Contracts\Schemas\Anatomy as ContractsAnatomy;
use Hanafalah\ModuleAnatomy\Contracts\Data\AnatomyData;

class Anatomy extends Unicode implements ContractsAnatomy
{
    protected string $__entity = 'Anatomy';
    public $anatomy_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'anatomy',
            'tags'     => ['anatomy', 'anatomy-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreAnatomy(AnatomyData $anatomy_dto): Model{
        $anatomy = $this->prepareStoreUnicode($anatomy_dto);
        return $this->anatomy_model = $anatomy;
    }

    public function anatomy(mixed $conditionals = null): Builder{
        return $this->unicode($conditionals);
    }

    //OVERIDING DATA MANAGEMENT
    public function generalPrepareStore(mixed $dto = null): Model{
        if (is_array($dto)) $dto = $this->requestDTO(config("app.contracts.{$this->__entity}Data",null));
        $model = $this->prepareStoreAnatomy($dto);
        return $this->staticEntity($model);
    }

    public function generalSchemaModel(mixed $conditionals = null): Builder{
        return $this->anatomy($conditionals);
    }
}