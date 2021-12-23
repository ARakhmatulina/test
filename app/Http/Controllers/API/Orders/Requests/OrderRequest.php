<?php

namespace App\Http\Controllers\API\Orders\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'client_phone' => 'string|required|min:10',
            'client_name' => 'string|required|min:3',
            'company_id' => 'int|exists:companies,id',
            'dishes' => 'array'
        ];
    }
}
