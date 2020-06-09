<?php

namespace App\Observers\News;

use App\Models\News\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    private function setSlug(Category $category)
    {
        if(empty($category->slug)) {
            $slug = $category->title;
        } else {
            $slug = $category->slug;
        }

        $category->slug = Str::slug($slug);
    }

    public function creating(Category $category)
    {
        $this->setSlug($category);
    }

    public function updating(Category $category)
    {
        $this->setSlug($category);
    }
}
