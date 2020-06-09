<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class Post extends Model implements \App\Models\News\PostInterface
{
    protected $primaryKey = self::ATTR_ID;
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::ATTR_TITLE,
        self::ATTR_SLUG,
        self::ATTR_EXCERPT,
        self::ATTR_DESCRIPTION,
        self::ATTR_CATEGORY_ID,
        self::ATTR_AUTHOR_ID,
        self::ATTR_IS_PUBLISHED,
        self::ATTR_PUBLISHED_AT,
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\News\Category::class);
    }

    public function author()
    {
        return $this->belongsTo(\App\Models\User\User::class);
    }

}
