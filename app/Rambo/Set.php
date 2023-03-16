<?php

namespace App\Rambo;

use AngryMoustache\Rambo\Fields\SelectField;
use AngryMoustache\Rambo\Fields\TextField;
use AngryMoustache\Rambo\Resource;
use App\Http\Clients\ArkhamDB;

class Set extends Resource
{
    public $model = \App\Models\Set::class;

    public $displayName = 'name';

    public function fields()
    {
        return [
            TextField::make('name')
                ->hideFrom('create')
                ->sortable(),

            SelectField::make('code')
                ->options(ArkhamDB::packs()->pluck('name', 'code')->sort())
                ->nullable()
                ->rules('required')
                ->sortable(),
        ];
    }
}
