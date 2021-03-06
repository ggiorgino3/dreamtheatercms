<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//phpcs:ignore 
class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'songs',
            function (Blueprint $table) {
                $table->id();
                $table->string('name', 50);
                $table->text('description');
                $table->text('uri');
                $table->enum(
                    'genre',
                    array(
                        'Progressive Metal',
                        'Hard Rock',
                        'Fusion'
                    )
                );                
                $table->string('type', 50)->default('local');
                $table->string('tags', 100)->nullable();
                $table->string('duration', 5)->nullable();
                $table->foreignId('album_id')->nullable()->constrained();

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
