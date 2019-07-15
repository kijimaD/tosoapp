<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'address/add') {
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
        return [
          'zip' => 'numeric|required',
          'prefecture_id' => 'required',
          'city' => 'required',
          'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'zip.numeric' => '半角数字で入力、ハイフンは不要です'
      ];
    }
}
