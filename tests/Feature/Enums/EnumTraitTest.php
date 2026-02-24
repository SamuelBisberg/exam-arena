<?php

use App\Enums\VisibilityStatusEnum;

it('includes hero icon metadata in enum collection output', function (): void {
    $collection = VisibilityStatusEnum::toCollection();

    $draft = $collection->firstWhere('value', VisibilityStatusEnum::DRAFT->value);

    expect($draft)
        ->toBeArray()
        ->and($draft)->toHaveKeys(['value', 'label', 'description', 'color', 'heroIcon'])
        ->and($draft['value'])->toBe(VisibilityStatusEnum::DRAFT->value)
        ->and($draft['heroIcon'])->toBeNull();
});

it('plucks labels by enum case value', function (): void {
    expect(VisibilityStatusEnum::pluck('label')->all())->toBe([
        VisibilityStatusEnum::DRAFT->value => VisibilityStatusEnum::DRAFT->label(),
        VisibilityStatusEnum::PUBLISHED->value => VisibilityStatusEnum::PUBLISHED->label(),
        VisibilityStatusEnum::ARCHIVED->value => VisibilityStatusEnum::ARCHIVED->label(),
        VisibilityStatusEnum::UNAVAILABLE->value => VisibilityStatusEnum::UNAVAILABLE->label(),
    ]);
});
