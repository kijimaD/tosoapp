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
    }

    public function messages()
    {
        return [
        'paymentway_id.required' => '選択してください',
        'shippingway_id.required' => '選択してください',
        'paymentbank_id.required' => '口座を選択してください',
        'addressBook_id.required' => '住所を選択してください',
        'collection_day.required' => '選択してください',
        'collection_time.required' => '選択してください',
        'box_num.required' => '入力してください',
        'box_num.numeric' => '半角数字で入力してください',
      ];
    }
}
