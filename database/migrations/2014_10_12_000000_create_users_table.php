<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UserEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(UserEnum::DB_TABLE, function (Blueprint $table) {
            $table->unsignedBigInteger(UserEnum::ID)->autoIncrement();
            $table->string(UserEnum::USERNAME)->nullable();
            $table->string(UserEnum::NAME);
            $table->string(UserEnum::EMAIL)->unique();
            $table->string(UserEnum::PHONE)->nullable();
            $table->string(UserEnum::PASSWORD);
            $table->string(UserEnum::ROLE)->nullable()->default(UserEnum::ROLE_USER);
            $table->string(UserEnum::ROLE_ID)->nullable();
            $table->tinyInteger(UserEnum::STATUS)->nullable()->default(UserEnum::STATUS_ACTIVE);
            $table->text(UserEnum::ADDRESS)->nullable();
            $table->text(UserEnum::IMAGE)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(UserEnum::DB_TABLE);
    }
};
