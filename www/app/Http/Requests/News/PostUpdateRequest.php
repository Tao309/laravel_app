<?php

namespace App\Http\Requests\News;

use App\Models\News\CategoryInterface;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostUpdateRequest extends FormRequest
{
    public function input($key = null, $default = null)
    {
        $data = parent::input($key, $default);

        if(empty($key)) {
            if(empty($data['slug'])) {
                $data['slug'] = Str::slug($data['title']);
            } else {
                $data['slug'] = Str::slug($data['slug']);
            }
        }

        if($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = Carbon::now();
        }

        $data['slug'] = Str::slug($data['slug']);
        $data['author_id'] = 1;//@todo change for user

        return $data;
    }

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
