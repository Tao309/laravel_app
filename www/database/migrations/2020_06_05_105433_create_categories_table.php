<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\News\CategoryInterface;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->id();

            $table->bigInteger(CategoryInterface::ATTR_PARENT_ID)->unsigned()->default(0);
            $table->string(CategoryInterface::ATTR_TITLE, 80);
            $table->string(CategoryInterface::ATTR_SLUG, 100)->unique();

            $table->timestamps();

            $table->foreign(CategoryInterface::ATTR_PARENT_ID)
                ->references(CategoryInterface::ATTR_ID)->on(CategoryInterface::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_categories');
    }
}
