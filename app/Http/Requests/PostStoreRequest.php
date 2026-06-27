<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|image',
            'main_image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    


    public function withValidator($validator)
            {
                $validator->after(function ($validator) {

                    $content = strip_tags($this->content); // delete html tags

                    if (trim($content) === '') {
                        $validator->errors()->add(
                            'content',
                            'Поле контент обязательно для заполнения!!!.'
                        );
                    }
                });
            }


}
