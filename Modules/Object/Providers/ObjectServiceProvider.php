<?php

namespace Modules\Object\Providers;

use Illuminate\Support\ServiceProvider;

class ObjectServiceProvider extends ServiceProvider
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
        $this->registerObjectAtrributeRepository();
        $this->registerObjectRepository();
        $this->registerUserObjectRepository();
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
            __DIR__.'/../Config/config.php' => config_path('object.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'object'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/object');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/object';
        }, \Config::get('view.paths')), [$sourcePath]), 'object');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/object');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'object');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'object');
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

	public function registerObjectAtrributeRepository() {
		return $this->app->bind(
			'Modules\\Object\\Repositories\\ObjectAtrributeRepository',
			'Modules\\Object\\Repositories\\ObjectAtrributeEloquent'

		);
	}

	public function registerObjectRepository() {
		return $this->app->bind(
			'Modules\\Object\\Repositories\\ObjectRepository',
			'Modules\\Object\\Repositories\\ObjectEloquent'

		);
	}

	public function registerUserObjectRepository() {
		return $this->app->bind(
			'Modules\\Object\\Repositories\\UserObjectRepository',
			'Modules\\Object\\Repositories\\UserObjectEloquent'

		);
	}
}