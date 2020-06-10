<?php
declare(strict_types=1);

namespace App\Models\News;

/**
 * Interface PostInterface
 * @package App\Models\News
 *
 * @property-read \App\Models\News\Category $category
 * @property-read \App\Models\User\User $author
 */
interface PostInterface
{
    public const TABLE_NAME = 'news_posts';

    public const ATTR_ID = 'id';
    public const ATTR_TITLE = 'title';
    public const ATTR_SLUG = 'slug';
    public const ATTR_EXCERPT = 'excerpt';
    public const ATTR_DESCRIPTION = 'description';
    public const ATTR_CATEGORY_ID = 'category_id';
    public const ATTR_AUTHOR_ID = 'author_id';
    public const ATTR_IS_PUBLISHED = 'is_published';
    public const ATTR_PUBLISHED_AT = 'published_at';

    public const ID_GUEST = 0;
}
