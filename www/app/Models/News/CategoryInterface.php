<?php
declare(strict_types=1);

namespace App\Models\News;

interface CategoryInterface
{
    public const TABLE_NAME = 'news_categories';

    public const ATTR_ID = 'id';
    public const ATTR_PARENT_ID = 'parent_id';
    public const ATTR_TITLE = 'title';
    public const ATTR_SLUG = 'slug';
}
