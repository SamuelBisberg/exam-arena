<?php

use App\Enums\SemesterEnum;
use App\Enums\SessionEnum;
use App\Enums\VisibilityStatusEnum;
use App\Models\Exam;

it('casts exam enum attributes and round-trips year and semester', function (): void {
    $exam = new Exam([
        'questionnaire_identifier' => 'AB-1234',
        'session' => SessionEnum::B->value,
        'semester' => SemesterEnum::FALL->value,
        'year' => 2026,
        'exam_date' => '2026-02-25',
        'visibility_status' => VisibilityStatusEnum::PUBLISHED->value,
        'total_pages' => 10,
        'total_questions' => 40,
    ]);

    expect($exam->session)->toBe(SessionEnum::B)
        ->and($exam->semester)->toBe(SemesterEnum::FALL)
        ->and($exam->visibility_status)->toBe(VisibilityStatusEnum::PUBLISHED)
        ->and($exam->yearAndSemester)->toBe('2026'.SemesterEnum::FALL->label());

    $exam->yearAndSemester = '2027'.SemesterEnum::SPRING->value;

    expect($exam->year)->toBe('2027')
        ->and($exam->semester)->toBe(SemesterEnum::SPRING);
});
