<?php

namespace Hanafalah\ModuleAnatomy\Schemas;

use Hanafalah\ModuleAnatomy\Contracts\Data\DentalAnatomyData;
use Hanafalah\ModuleAnatomy\Contracts\Schemas\DentalAnatomy as ContractsDentalAnatomy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DentalAnatomy extends Anatomy implements ContractsDentalAnatomy
{
    protected string $__entity = 'DentalAnatomy';
    public $dental_anatomy_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'dental_anatomy',
            'tags'     => ['dental_anatomy', 'dental_anatomy-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareDentalAnatomy(DentalAnatomyData $dental_anatomy_dto): Model{
        $dental_anatomy = $this->prepareStoreAnatomy($dental_anatomy_dto);
        return $this->dental_anatomy_model = $dental_anatomy;
    }

    public function dentalAnatomy(mixed $conditionals = null): Builder{
        return $this->anatomy($conditionals);
    }
}