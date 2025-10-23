<?php

namespace Hanafalah\ModuleAnatomy\Contracts\Schemas;

use Hanafalah\ModuleAnatomy\Contracts\Data\HeadToToeData;
//use Hanafalah\ModuleAnatomy\Contracts\Data\HeadToToeUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleAnatomy\Schemas\HeadToToe
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateHeadToToe(?HeadToToeData $head_to_toe_dto = null)
 * @method Model prepareUpdateHeadToToe(HeadToToeData $head_to_toe_dto)
 * @method bool deleteHeadToToe()
 * @method bool prepareDeleteHeadToToe(? array $attributes = null)
 * @method mixed getHeadToToe()
 * @method ?Model prepareShowHeadToToe(?Model $model = null, ?array $attributes = null)
 * @method array showHeadToToe(?Model $model = null)
 * @method Collection prepareViewHeadToToeList()
 * @method array viewHeadToToeList()
 * @method LengthAwarePaginator prepareViewHeadToToePaginate(PaginateData $paginate_dto)
 * @method array viewHeadToToePaginate(?PaginateData $paginate_dto = null)
 * @method array storeHeadToToe(?HeadToToeData $head_to_toe_dto = null)
 * @method Collection prepareStoreMultipleHeadToToe(array $datas)
 * @method array storeMultipleHeadToToe(array $datas)
 */

interface HeadToToe extends Anatomy{
    public function prepareStoreHeadToToe(HeadToToeData $head_to_toe_dto): Model;
    public function headToToe(mixed $conditionals = null): Builder;
}