<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class Post extends Model implements \App\Models\News\PostInterface
{
    protected $primaryKey = self::ATTR_ID;
    protected $table = self::TABLE_NAME;


}
