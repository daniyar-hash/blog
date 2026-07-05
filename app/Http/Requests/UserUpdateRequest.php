<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }




    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         
            // Останавливаем код прямо на этапе формирования правил валидации
            //  dd($this->all()); 
  
        return [
            'name' => 'required|string',
            'user_id' =>'required|integer|exists:users,id',
            // 'email' => 'required|email|unique:users,email,' . $this->user_id,
            'email' => [
                'required', 
                'email', 
                Rule::unique('users')->ignore($this->user_id)
            ],
            
            'role' => 'required|integer'
                    
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.unique' => 'Почта с таким именем уже существует',


        ];

    
    }



 }
