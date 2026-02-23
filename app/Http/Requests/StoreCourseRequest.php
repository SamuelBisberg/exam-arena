<?php

namespace App\Http\Requests;

use App\Enums\CourseActivityStatusEnum;
use App\Enums\CourseLevelEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'course_code' => ['required', 'string', 'max:255', 'unique:courses,course_code'],
            'level' => ['required', Rule::enum(CourseLevelEnum::class)],
            'activity_status' => ['sometimes', Rule::enum(CourseActivityStatusEnum::class), 'default:'.CourseActivityStatusEnum::ACTIVE->value],
        ];
    }
}
