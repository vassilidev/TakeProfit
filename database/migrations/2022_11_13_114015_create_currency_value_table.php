<?php

use App\Models\Currency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('currency_value', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Currency::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedFloat('value');
            $table->dateTime('date');
            $table->unique(['currency_id', 'date']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_value');
    }
};
