<?php

namespace App\Http\Requests\News;

use App\Models\News\CategoryInterface;
use App\Models\News\PostInterface;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //@todo add checking
//        return auth()->check();
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
            'title' => ['required', 'min:5', 'max:100'],
            'slug' => ['max:100', 'unique:'.PostInterface::TABLE_NAME],
            'excerpt' => ['min:5', 'max:100'],
            'description' => ['required', 'min:5', 'max:10000'],
            'category_id' => [
                'required',
                'integer',
                'exists:'.CategoryInterface::TABLE_NAME.','.CategoryInterface::ATTR_ID
            ],
        ];
    }
}
