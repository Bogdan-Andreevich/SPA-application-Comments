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
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    $domain = substr(strrchr($value, "@"), 1);

                    if (!checkdnsrr($domain, "MX")) {
                        $fail('Please enter a valid e-mail address');
                    }
                },
            ],
            'text' => 'required|regex:/^[a-zA-Z0-9\s]+$/|string||max:300',
            'parent_id' => 'nullable|integer|exists:comments,id',
            'file' => 'nullable|file|mimes:txt,jpg,png,gif|max:100'
        ];
    }
}
