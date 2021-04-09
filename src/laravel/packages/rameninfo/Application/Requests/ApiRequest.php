<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * [override] バリデーション失敗時ハンドリング
     *
     * @param Validator $validator
     *
     * @throw HttpResponseException
     * @see   FormRequest::failedValidation()
     */
    protected function failedValidation(Validator $validator)
    {
        $response['data'] = [];
        $response['status'] = 'NG';
        $response['summary'] = 'Failed validation.';
        $response['errors'] = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json($response, 422)
        );
    }
}
