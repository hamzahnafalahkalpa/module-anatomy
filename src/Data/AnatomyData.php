<?php

namespace Hanafalah\ModuleAnatomy\Data;

use Hanafalah\LaravelSupport\Data\UnicodeData;
use Hanafalah\ModuleAnatomy\Contracts\Data\AnatomyData as DataAnatomyData;

class AnatomyData extends UnicodeData implements DataAnatomyData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'Anatomy';
        parent::before($attributes);
    }
}