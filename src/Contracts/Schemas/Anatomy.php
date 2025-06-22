<?php

namespace Hanafalah\ModuleAnatomy\Contracts\Schemas;

use Hanafalah\LaravelSupport\Contracts\Schemas\Unicode;
use Hanafalah\ModuleAnatomy\Contracts\Data\AnatomyData;
//use Hanafalah\ModuleAnatomy\Contracts\Data\AnatomyUpdateData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleAnatomy\Schemas\Anatomy
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateAnatomy(?AnatomyData $anatomy_dto = null)
 * @method Model prepareUpdateAnatomy(AnatomyData $anatomy_dto)
 * @method bool deleteAnatomy()
 * @method bool prepareDeleteAnatomy(? array $attributes = null)
 * @method mixed getAnatomy()
 * @method ?Model prepareShowAnatomy(?Model $model = null, ?array $attributes = null)
 * @method array showAnatomy(?Model $model = null)
 * @method Collection prepareViewAnatomyList()
 * @method array viewAnatomyList()
 * @method LengthAwarePaginator prepareViewAnatomyPaginate(PaginateData $paginate_dto)
 * @method array viewAnatomyPaginate(?PaginateData $paginate_dto = null)
 * @method array storeAnatomy(?AnatomyData $anatomy_dto = null)
 * @method Collection prepareStoreMultipleAnatomy(array $datas)
 * @method array storeMultipleAnatomy(array $datas)
 */

interface Anatomy extends Unicode
{
    public function prepareStoreAnatomy(AnatomyData $anatomy_dto): Model;
    public function anatomy(mixed $conditionals = null): Builder;
}