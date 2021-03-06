<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Note;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned()->index()->nullable()->comment("The ID of the Topic's Location");
            $table->foreign('team_id')->references('id')->on('teams')->comment("The Topic ID references the ID column in the Topics table");
            $table->string('name', 100)->comment("The name of the Note");
            $table->text('text')->comment("Text of note")->nullable();
            $table->timestamp('created_at')->comment("The time the Note was created")->nullable();
            $table->timestamp('updated_at')->comment("The time the Note was last updated")->nullable();
            $table->timestamp('deleted_at')->comment("The time the Note was deleted")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
