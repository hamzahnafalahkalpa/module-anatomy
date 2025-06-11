<?php

namespace Hanafalah\ModuleAnatomy\Schemas;

use Hanafalah\ModuleExamination\Resources\Anatomy\ViewAnatomy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Hanafalah\ModuleAnatomy\Contracts;

use Hanafalah\LaravelSupport\Supports\PackageManagement;

class Anatomy extends PackageManagement implements Contracts\Schemas\Anatomy
{
    protected string $__entity = 'Anatomy';
    public static $anatomy_model;

    protected array $__resources = [
        'view' => ViewAnatomy::class
    ];

    public function prepareViewAnatomyList(?array $attributes = null): Collection
    {
        $attributes ??= request()->all();

        $anatomies = $this->anatomy()
            ->when(isset($attributes['morph']), function ($query) use ($attributes) {
                $query->where('morph', $attributes['morph']);
            })
            ->when(isset($attributes['form_morph']), function ($query) use ($attributes) {
                $query->whereHas('form', function ($query) use ($attributes) {
                    $query->where('morph', $attributes['form_morph']);
                })->orderBy(DB::raw('CAST(JSON_EXTRACT(props, "$.ordering") AS SIGNED)'), 'asc');
            })->get();
        return static::$anatomy_model = $anatomies;
    }

    public function viewAnatomyList(): array
    {
        return $this->transforming($this->__resources['view'], function () {
            return $this->prepareViewAnatomyList();
        });
    }

    public function anatomy(): Builder
    {
        $this->booting();
        return $this->AnatomyModel()->withParameters();
    }
}
