<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemakeProjectFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_files', function (Blueprint $table) {

            $table->dropColumn('name');
            $table->dropColumn('extension');

            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_files', function (Blueprint $table) {
            $table->string('name');
            $table->string('extension', 20);

            $table->dropColumn('filename');
            $table->dropColumn('mime');
            $table->dropColumn('original_filename');
        });
    }
}
