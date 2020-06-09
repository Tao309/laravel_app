<?php

namespace App\Observers\News;

use App\Models\News\Post;
use App\Models\News\PostInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostObserver
{
    private function setPublishedAt(Post $post)
    {
        if($post->is_published && empty($post->published_at)) {
            $post->published_at = Carbon::now();
        }
    }

    private function setSlug(Post $post)
    {
        if(empty($post->slug)) {
            $slug = $post->title;
        } else {
            $slug = $post->slug;
        }

        $post->slug = Str::slug($slug);
    }

    private function setAuthor(Post $post)
    {
        $post->author_id = auth()->id ?? PostInterface::ID_GUEST;
    }

    public function creating(Post $post)
    {
        $this->setPublishedAt($post);
        $this->setSlug($post);
        $this->setAuthor($post);
    }

    public function updating(Post $post)
    {
        $this->setPublishedAt($post);
        $this->setSlug($post);
        $this->setAuthor($post);
    }
}
