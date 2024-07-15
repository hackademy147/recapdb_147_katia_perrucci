<?php

use App\Models\Editor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('editors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $editors = ['Mondadori', 'Fazi', 'Adelphi', 'Rizzoli', 'Einaudi'];

        foreach($editors as $editor){
            Editor::create([
                'name' => $editor
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editors');
    }
};
