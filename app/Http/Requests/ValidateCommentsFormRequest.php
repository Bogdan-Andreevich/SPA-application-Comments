<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCommentsFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|integer|exists:comments,id',
//            'file' => 'nullable|file|mimes:txt,jpg,png,gif|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "имя" является обязательным',
            'email.required' => 'Поле "электронная почта" является обязательным',
            'email.email' => 'Поле "электронная почта" должно быть действительным адресом электронной почты',
        ];
    }

}
