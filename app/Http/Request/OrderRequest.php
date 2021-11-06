<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|string|min:4',
            'phone' => 'required|string'
        ];
    }

    public function messages(){
        return [
			'name.required' => 'Это поле обязательно для заполнения',
			'name.string' => 'Это поле обязательно должно быть строкой',
			'name.min' => 'Минимальное 4 символа',
			'phone.required' => 'Это поле обязательно для заполнения',
			'phone.string' => 'Это поле обязательно должно быть строкой',
		];
    }

}
