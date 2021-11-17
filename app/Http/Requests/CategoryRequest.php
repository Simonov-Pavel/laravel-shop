<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:5|max:255|unique:categories,name',
            'code' => 'required|unique:categories,code',
            'description' => 'required|min:10|max:255',
            'image' => 'required|file',
        ];

        if($this->route()->named('categories.update')){
            $rules['name'] .= ',' . $this->route()->parameter('category')->id;
            $rules['code'] .= ',' . $this->route()->parameter('category')->id;
        }

        return $rules;
    }

    public function messages(){
        return [
            'required' => 'Это поле обязательно для запонения',
            'unique' => 'Такое значение уже есть',
            'name.min' => 'Поле имя должно содержать минимум 5 символов',
        ];
    }
}
