<?php

namespace App\Core\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class APIValidationRequest extends FormRequest
{

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public function makeError($message, array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }

    /**
     * Format the errors from the given Validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return array
     */
    protected function formatErrors(Validator $validator)
    {
        return $validator->failed();
    }

    /**
     * Get the proper failed validation response for the request.
     *
     * @param array $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        return Response::json($this->makeError($errors), 400);
    }

    /**
     * Change required rule for filled
     *
     * @param array $rules
     *
     * @return array
     */
    protected function formatPatchRules($rules)
    {
        foreach ($rules as $column => $rule) {
            $key = array_search('required', $rule);
            if ($key !== false) {
                $rules[$column][] = 'filled';
                unset($rules[$column][$key]);
            }
        }

        return $rules;
    }
}
