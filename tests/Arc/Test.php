<?php

describe('Application Architecture', function (): void {
    arch()->preset()->php();
    arch()->preset()->security();
    arch()->preset()->laravel()->ignoring('App\Providers\Filament');
});

describe('Enums', function (): void {
    arch()
        ->expect('App\Enums')
        ->toBeStringBackedEnums()
        ->ignoring(App\Enums\NavigationGroupEnum::class);

    arch()
        ->expect('App\Enums')
        ->toUseTrait(App\Traits\EnumTrait::class)
        ->ignoring(App\Enums\NavigationGroupEnum::class);

    arch()
        ->expect('App\Enums')
        ->toHaveMethods(['label', 'description'])
        ->ignoring(App\Enums\NavigationGroupEnum::class);
});
