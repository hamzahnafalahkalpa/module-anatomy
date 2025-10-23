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
    
    public function viewUsingRelation():array {
        if (isset(request()->is_flatten) && request()->is_flatten){
            $relation = ['reference'];
        }else{
            $relation = ['childs','reference'];
            if ($this->isUsingService()){
                $relation[] = 'service';
            }
        }
        return $relation;
    }

    public function showUsingRelation():array {
        if (isset(request()->is_flatten) && request()->is_flatten){
            $relation = ['reference'];
        }else{
            $relation = ['childs','reference'];
            if ($this->isUsingService()){
                $relation[] = 'service.servicePrices.tariffComponent';
            }
        }
        return $relation;
    }

    public function getViewResource(){
        return ViewAnatomy::class;
    }

    public function getShowResource(){
        return ShowAnatomy::class;
    }
    
}
