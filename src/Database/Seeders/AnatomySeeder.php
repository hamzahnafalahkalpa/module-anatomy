<?php

namespace Hanafalah\ModuleAnatomy\Database\Seeders;

use Hanafalah\LaravelSupport\Concerns\Support\HasRequestData;
use Hanafalah\ModuleAnatomy\Schemas\Anatomy;
use Illuminate\Database\Seeder;

class AnatomySeeder extends Seeder{
    use HasRequestData;

    protected $__anatomy_model;

    public function run(){
        $this->__anatomy_model = app(config('database.models.Anatomy'));

        $anatomies = include __DIR__.'/data/head-to-toe.php';
        foreach ($anatomies as $anatomy) {
            $contract = config('app.contracts.'.$anatomy['flag']);
            $flag = $anatomy['flag'];
            if (!app($contract) instanceof Anatomy) {
                $contract = config('app.contracts.Anatomy');
                $flag = 'Anatomy';
            }
            app($contract)->{'prepareStore'.$flag}($this->requestDTO(config('app.contracts.'.$flag.'Data'), $anatomy));
        }
    }
}