<?php

use App\Models\Currency;
use App\Models\User;
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
        Schema::create('exchanges', static function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('bought_currency_id');

            $table->foreign('bought_currency_id')
                ->references('id')
                ->on((new Currency)->getTable())
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('with_currency_id');

            $table->foreign('with_currency_id')
                ->references('id')
                ->on((new Currency)->getTable())
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedFloat('price');

            $table->unsignedFloat('amount');
            
            $table->dateTime('bought_at');

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
        Schema::dropIfExists('exchanges');
    }
};
