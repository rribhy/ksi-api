<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blueprint::macro('created_by', function () {
            /** @var \Illuminate\Database\Schema\Blueprint $this */ // bantu IDE
            $this->foreignId('created_by')
                 ->nullable()
                 ->constrained('users')   // references('id')->on('users')
                 ->nullOnDelete();        // onDelete('set null')
        });

        Blueprint::macro('update_by', function () {
            /** @var \Illuminate\Database\Schema\Blueprint $this */ // bantu IDE
            $this->foreignId('created_by')
                 ->nullable()
                 ->constrained('users')   // references('id')->on('users')
                 ->nullOnDelete();        // onDelete('set null')
        });
    }
}
