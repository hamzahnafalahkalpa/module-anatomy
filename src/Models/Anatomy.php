<?php

namespace Hanafalah\ModuleAnatomy\Models;

use Hanafalah\LaravelSupport\Models\Unicode\Unicode;
use Hanafalah\ModuleAnatomy\Resources\Anatomy\{
    ViewAnatomy,
    ShowAnatomy
};

class Anatomy extends Unicode
{
    protected $table = 'unicodes';
    
    public function getViewResource(){
        return ViewAnatomy::class;
    }

    public function getShowResource(){
        return ShowAnatomy::class;
    }
    
}
