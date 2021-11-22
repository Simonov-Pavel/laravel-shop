<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:4|max:30',
            'code' => 'required|unique:products,code',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|min:10',
            'image' => 'file',
            'price' => 'required|numeric|min:1',
            'count' => 'required|numeric|min:1',
        ];

        if($this->route()->named('products.update')){
            $rules['name'] .= ',' . $this->route()->parameter('product')->id;
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
        }

        return $rules;
    }

    public function messages(){
        return [
            'required' => 'Это поле обязательно для запонения',
            'unique' => 'Такое значение уже есть',
            'name.min' => 'Поле имя должно содержать минимум 4 символов',
        ];
    }
}
