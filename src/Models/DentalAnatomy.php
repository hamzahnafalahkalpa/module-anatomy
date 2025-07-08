<?php

namespace Hanafalah\ModuleAnatomy\Models;

use Hanafalah\ModuleAnatomy\Resources\DentalAnatomy\{
    ViewDentalAnatomy,
    ShowDentalAnatomy
};

class DentalAnatomy extends Anatomy
{
    protected $table = 'unicodes';
    
    public function getViewResource(){
        return ViewDentalAnatomy::class;
    }

    public function getShowResource(){
        return ShowDentalAnatomy::class;
    }
}
