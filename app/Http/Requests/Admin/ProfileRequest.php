<?php

namespace App\Http\Requests\Admin;


use App\Models\Admin;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', Rule::unique(Admin::class, 'email')->ignore($this->user()->id)],
            'password' => ['present', 'nullable', 'string', 'min:3', 'confirmed'],
        ];
    }
}
