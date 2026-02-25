<?php

namespace Hanafalah\ModuleAnatomy\Models;

use Hanafalah\ModuleAnatomy\Resources\DentalAnatomy\{
    ViewDentalAnatomy,
    ShowDentalAnatomy
};

class DentalAnatomy extends Anatomy
{
    protected $table = 'unicodes';
    
    protected static function booted(): void{
        parent::booted();
        static::addGlobalScope('flag',function($query){
            $query->where('flag','DentalAnatomy');
        });
    }

    public function getViewResource(){
        return ViewDentalAnatomy::class;
    }

    public function getShowResource(){
        return ShowDentalAnatomy::class;
    }
}
