<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('biodatas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('alamat');
        $table->string('no_hp');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};