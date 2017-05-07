<?php

namespace Modules\Operation\Providers;

use Illuminate\Support\ServiceProvider;

class OperationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('operation.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'operation'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/operation');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/operation';
        }, \Config::get('view.paths')), [$sourcePath]), 'operation');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/operation');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'operation');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'operation');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

	public function registerVoteRepository() {
		return $this->app->bind(
			'Modules\\Operation\\Repositories\\VoteRepository',
			'Modules\\Operation\\Repositories\\VoteEloquent'

		);
	}

	public function registerThoughtRepository() {
		return $this->app->bind(
			'Modules\\Operation\\Repositories\\ThoughtRepository',
			'Modules\\Operation\\Repositories\\ThoughtEloquent'

		);
	}
}