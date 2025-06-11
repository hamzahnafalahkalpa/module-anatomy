<?php

namespace Hanafalah\ModuleAnatomy\Contracts\Schemas;

use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;

interface Anatomy extends DataManagement
{
    public function viewAnatomyList(): array;
}
