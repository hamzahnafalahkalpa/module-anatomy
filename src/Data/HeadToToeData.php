<?php

namespace Hanafalah\ModuleAnatomy\Data;

use Hanafalah\ModuleAnatomy\Contracts\Data\HeadToToeData as DataHeadToToeData;

class HeadToToeData extends AnatomyData implements DataHeadToToeData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'HeadToToe';
        parent::before($attributes);
    }
}