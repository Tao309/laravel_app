<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class Category extends Model implements \App\Models\News\CategoryInterface
{
    protected $primaryKey = self::ATTR_ID;

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::ATTR_TITLE,
        self::ATTR_SLUG,
        self::ATTR_PARENT_ID,
    ];

    public function parentCategory()
    {
        return $this->belongsTo(\App\Models\News\Category::class, self::ATTR_PARENT_ID, self::ATTR_ID);
    }

    /**
     * Accessor for get property parentCategoryTitle or parent_category_title
     *
     * @return string
     */
    public function getParentCategoryTitleAttribute()
    {
        $title = $this->parentCategory->title ?? self::NAME_MAIN_CATEGORY;

        return  $title;
    }
}
