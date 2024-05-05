<?php

namespace App\Http\Requests;

use App\Http\Responses\ResponseApiHelper;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StoreProductRequest extends FormRequest
{
    protected const FIELD_ERROR_MESSAGE = 'Verifique os campos e tente novamente';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ResponseApiHelper::errorField(self::FIELD_ERROR_MESSAGE, $validator->errors())
        );
    }
}
