<?php

namespace Hanafalah\ModuleAnatomy\Schemas;

use Hanafalah\ModuleAnatomy\Contracts\Schemas\DentalAnatomy as ContractsDentalAnatomy;

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
}