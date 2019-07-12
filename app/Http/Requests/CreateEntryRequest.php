<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'entry/add') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
          'paymentway_id' => 'numeric|required',
          'shippingway_id' => 'numeric|required',
        ];

        if ($this->paymentway_id === '1') {
            $rule += [
              'paymentbank_id' => 'required',
          ];
        };

        if ($this->shippingway_id === '1') {
            $rule += [
              'addressBook_id' => 'required',
              'collection_day' => 'date|required',
              'collection_time' => 'required',
              'box_num' => 'numeric|required',
           ];
        };

        return $rule;

        //
        // if ($data['shippingway_id'] === 1) {
        //     $rules['addressBook_id'] = 'numeric|required';
        //     $rules['collection_day'] = 'date|required';
        //     $rules['collection_time'] = 'required';
        //     $rules['box_num'] = 'numeric|required';
        // }
    }
}
