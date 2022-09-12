<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = [];
        foreach ($validator->errors()->toArray() as $key => $error) {
            $errors['code'] = $key;
            $errors['message'] = $error[0];
            break;
        }
        throw new HttpResponseException(response()->json([
            'status' => 1,
            // 'authtoken' => request()->header('authtoken'),
            'error' => $errors,
        ]));
    }
}
