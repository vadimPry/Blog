<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'main_image' => 'required|file',
            'preview_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'this field must be filled',
            'title.string' => 'the data must match the string type',
            'content.required' => 'this field must be filled',
            'content.string' => 'the data must match the string type',
            'main_image.required' => 'this field must be filled',
            'main_image.file' => 'you need to select a file',
            'preview_image.required' => 'this field must be filled',
            'preview_image.file' => 'you need to select a file',
            'category_id.required' => 'this field must be filled',
            'category.integer' => 'the id of the category_id field must have a type integer',
            'category.exists' => 'the id of the category_id field must be in the database',
            'tag_ids.array' => 'you need to send an array of data',
        ];
    }
}
