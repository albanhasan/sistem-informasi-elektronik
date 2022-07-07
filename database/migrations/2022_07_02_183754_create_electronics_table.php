<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Models\Category;

class CreateElectronicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronics', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('name');
            $table->string('slug');
            $table->foreignIdFor(Category::class);
            $table->longtext('description');
            $table->integer('price');
            $table->integer('stock');
            $table->string('image_name');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electronics');
    }
}
