<?php

namespace Hanafalah\ModuleAnatomy\Models;

use Hanafalah\ModuleAnatomy\Resources\DentalAnatomy\{
    ViewDentalAnatomy,
    ShowDentalAnatomy
};

class DentalAnatomy extends Anatomy
{
    protected $table = 'anatomies';
    
    public function viewUsingRelation(): array{
        return [];
    }

    public function showUsingRelation(): array{
        return [];
    }

    public function getViewResource(){
        return ViewDentalAnatomy::class;
    }

    public function getShowResource(){
        return ShowDentalAnatomy::class;
    }
}
