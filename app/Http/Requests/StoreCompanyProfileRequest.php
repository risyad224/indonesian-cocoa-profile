<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyProfileRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:company_profiles,slug',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'description' => 'required|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ];
    }
}
