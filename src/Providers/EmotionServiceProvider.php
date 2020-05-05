<?php

namespace LaraAreaEmotion\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class EmotionServiceProvider
 * @package LaraAreaEmotion\Providers
 */
class EmotionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services
     *
     * @return void
     */
    public function boot()
    {
        if (! class_exists('CreateEmotionsTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes(
                [
                __DIR__ . '/../../database/migrations/create_emotions_table.php.stub' => database_path("/migrations/{$timestamp}_create_emotions_table.php"),
                __DIR__ . '/../../database/migrations/create_emotionable_table.php.stub' => database_path("/migrations/{$timestamp}create_emotionable_table.php"),
                ], 'migrations'
            );
        }
    }
}