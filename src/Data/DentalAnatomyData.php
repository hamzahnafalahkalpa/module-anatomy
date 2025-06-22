<?php

namespace Hanafalah\ModuleAnatomy\Data;

use Hanafalah\ModuleAnatomy\Contracts\Data\DentalAnatomyData as DataDentalAnatomyData;

class DentalAnatomyData extends AnatomyData implements DataDentalAnatomyData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'DentalAnatomy';
        parent::before($attributes);
    }
}