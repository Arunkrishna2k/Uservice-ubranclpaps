<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCustomerRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'register_number' => ['required'],
            'customer_name' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required'],
            'register_type' => [],
            'mci_number' => [],
            'remarks' => [],
            'created_by' => ['required', 'integer'],
            'updated_by' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ];
    }
}
