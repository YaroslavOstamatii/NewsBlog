<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|file',
            'category_id'=>'required|exists:categories,id',
            'tags.*' => 'required|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [

            'title.required' => 'Это поле необходимо для заполнения',

            'title.string' => 'Данные должны соответствовать строчному типу',

            'content.required' => 'Это поле необходимо для заполнения',

            'content.string' => 'Данные должны соответствовать строчному типу',

            'image.required' => 'Это поле необходимо для заполнения',

            'image.file' => 'Необходимо выбрать файл',

            'category_id.required' => 'Это поле необходимо для заполнения',

            'category_id.integer' => 'Id категории должен быть числом',

            'category_id.exists' => 'Id категории должен быть в базе данных',

            'tag_id.array' => 'Необходимо отправить массив данных',

        ];
    }
}
