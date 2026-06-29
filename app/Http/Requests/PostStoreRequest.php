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


    protected function prepareForValidation()
    {

    // dd($this->input('content'));
        // Вытаскиваем контент (безопасный аналог $this->input())
        $content = $this->request->get('content');

        if ($content) {
            // Очищаем теги и невидимые пробелы для проверки
            $cleanContent = strip_tags($content);
            $cleanContent = html_entity_decode($cleanContent);
            $cleanContent = preg_replace('/[\p{Z}\s]+/u', '', $cleanContent);

            // Если остался только пустой HTML-мусор — затираем в null
            if ($cleanContent === '') {
                $this->merge(['content' => null]);
            }
        }
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
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'array|nullable',
            'tag_ids.*' =>'nullable|integer|exists:tags,id'
        ];
    }

    


    // public function withValidator($validator)
    //         {
    //                  dd($this->input('content'));
    //                 // dd($this->all());
          
    //             $validator->after(function ($validator) {

    //                $content =  $this->input('content');
    //             //    dd($content);
    //                $content = strip_tags($content);// delete html tags
    //                   if (trim($content) === '') {
    //                     $validator->errors()->add(
    //                         'content',
    //                         'Поле контент обязательно для заполнения!!!.'
    //                     );
    //                 }
    //             });
    //         }


 }
