<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateStoreRequest extends FormRequest
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
              // 'username' => ['required', 'string', 'unique:users,username,'.$this->user->id],
              'country_id' => ['required'],
              'name' => ['required', 'string', 'unique:states'],
        ];
    }
}
