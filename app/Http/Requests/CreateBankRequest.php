<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'bank/add') {
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
              'bank_name' => 'required',
              'bank_branch' => 'required',
              'bank_type' => 'required',
              'bank_num' => 'numeric|required',
        ];
    }

    public function messages()
    {
        return [
          'bank_num.numeric' => '半角数字で入力してください'
      ];
    }
}
