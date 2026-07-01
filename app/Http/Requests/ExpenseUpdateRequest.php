<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ExpenseUpdateRequest extends FormRequest
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
            'category_id' => ['nullable'],
            'expense_name' => ['nullable', 'string', 'max:255'],
            'amount' => ['nullable', 'numeric', 'min:0.01'],
            'expense_date' => ['nullable', 'date'],
            'description' => ['nullable', 'max:1000']
        ];
    }
}
