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


}
