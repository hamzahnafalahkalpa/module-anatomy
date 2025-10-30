<?php

namespace Hanafalah\ModuleAnatomy\Models;

class HeadToToe extends Anatomy
{
    protected $table = 'unicodes';

    protected static function booted(): void{
        parent::booted();
        static::addGlobalScope('flag',function($query){
            $query->where('flag','HeadToToe');
        });
    }
}
