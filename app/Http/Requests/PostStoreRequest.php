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


        //   $this->merge([
        //                     'category_id' => '234',
        //                 ]);
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
         
            // Останавливаем код прямо на этапе формирования правил валидации
            //    dd($this->all()); 
  
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' =>'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'Id категории должен быть числом',
            'category_id.exists' => 'Id категории должен быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',
            'tag_ids.required' => 'Выберите хотя бы один тег'

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
