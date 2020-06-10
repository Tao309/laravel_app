<?php
declare(strict_types=1);

namespace App\Models\News;

/**
 * Interface CategoryInterface
 * @package App\Models\News
 *
 * @property-read string $parentCategoryTitle
 * @property-read \App\Models\News\Category $parentCategory
 */
interface CategoryInterface
{
    public const TABLE_NAME = 'news_categories';

    public const ATTR_ID = 'id';
    public const ATTR_PARENT_ID = 'parent_id';
    public const ATTR_TITLE = 'title';
    public const ATTR_SLUG = 'slug';

    public const ID_MAIN_CATEGORY = 0;
    public const NAME_MAIN_CATEGORY = 'Main Category';
}
