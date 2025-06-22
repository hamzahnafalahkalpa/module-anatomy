<?php

namespace Hanafalah\ModuleAnatomy\Contracts\Schemas;

use Hanafalah\ModuleAnatomy\Contracts\Data\DentalAnatomyData;
//use Hanafalah\ModuleAnatomy\Contracts\Data\DentalAnatomyUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleAnatomy\Schemas\DentalAnatomy
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateDentalAnatomy(?DentalAnatomyData $dental_anatomy_dto = null)
 * @method Model prepareUpdateDentalAnatomy(DentalAnatomyData $dental_anatomy_dto)
 * @method bool deleteDentalAnatomy()
 * @method bool prepareDeleteDentalAnatomy(? array $attributes = null)
 * @method mixed getDentalAnatomy()
 * @method ?Model prepareShowDentalAnatomy(?Model $model = null, ?array $attributes = null)
 * @method array showDentalAnatomy(?Model $model = null)
 * @method Collection prepareViewDentalAnatomyList()
 * @method array viewDentalAnatomyList()
 * @method LengthAwarePaginator prepareViewDentalAnatomyPaginate(PaginateData $paginate_dto)
 * @method array viewDentalAnatomyPaginate(?PaginateData $paginate_dto = null)
 * @method Model prepareStoreDentalAnatomy(DentalAnatomyData $dental_anatomy_dto);
 * @method array storeDentalAnatomy(?DentalAnatomyData $dental_anatomy_dto = null)
 * @method Collection prepareStoreMultipleDentalAnatomy(array $datas)
 * @method array storeMultipleDentalAnatomy(array $datas)
 */

interface DentalAnatomy extends Anatomy{}