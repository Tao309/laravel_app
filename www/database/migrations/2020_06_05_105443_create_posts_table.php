<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\News\PostInterface;
use App\Models\News\CategoryInterface;
use App\Models\User\UserInterface;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger(PostInterface::ATTR_CATEGORY_ID)->unsigned();
            $table->bigInteger(PostInterface::ATTR_AUTHOR_ID)->unsigned();
            $table->string(PostInterface::ATTR_TITLE, 80);
            $table->string(PostInterface::ATTR_SLUG, 100)->unique();
            $table->text(PostInterface::ATTR_EXCERPT)->nullable();
            $table->text(PostInterface::ATTR_DESCRIPTION);
            $table->boolean(PostInterface::ATTR_IS_PUBLISHED)->default(0);
            $table->timestamp(PostInterface::ATTR_PUBLISHED_AT)->nullable();

            $table->timestamps();

            $table->foreign(PostInterface::ATTR_CATEGORY_ID)
                ->references(CategoryInterface::ATTR_ID)->on(CategoryInterface::TABLE_NAME);
            $table->foreign(PostInterface::ATTR_AUTHOR_ID)
                ->references(UserInterface::ATTR_ID)->on(UserInterface::TABLE_NAME);

            $table->index(PostInterface::ATTR_CATEGORY_ID);
            $table->index(PostInterface::ATTR_IS_PUBLISHED);
            $table->index(PostInterface::ATTR_AUTHOR_ID);
        });

        //@todo add ->onUpdate('cascade')->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_posts');
    }
}
