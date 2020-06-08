<?php

namespace App\Http\Requests\News;

use App\Models\News\CategoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'slug' => ['max:100'],
            'parent_id' => [
                'required',
                'integer',
                'exists:'.CategoryInterface::TABLE_NAME.','.CategoryInterface::ATTR_ID
            ],
        ];
    }
}
