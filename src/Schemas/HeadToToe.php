<?php

namespace Hanafalah\ModuleAnatomy\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleAnatomy\Contracts\Schemas\HeadToToe as ContractsHeadToToe;
use Hanafalah\ModuleAnatomy\Contracts\Data\HeadToToeData;

class HeadToToe extends Anatomy implements ContractsHeadToToe
{
    protected string $__entity = 'HeadToToe';
    public $head_to_toe_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'head_to_toe',
            'tags'     => ['head_to_toe', 'head_to_toe-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreHeadToToe(HeadToToeData $head_to_toe_dto): Model{
        $head_to_toe = $this->prepareStoreAnatomy($head_to_toe_dto);
        return $this->head_to_toe_model = $head_to_toe;
    }

    public function headToToe(mixed $conditionals = null): Builder{
        return $this->anatomy($conditionals);
    }
}