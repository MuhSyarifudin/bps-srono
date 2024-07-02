<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('cleanString', function ($expression) {
            return "<?php echo str_replace(\"'\", \"\", $expression); ?>";
            // return "<?php echo preg_replace('/[^\w\s]/', '', $expression);
        });
    }
}
