<?php

namespace Modules\Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
        $this->registerTagRepository();
        $this->registerCategoryRepository();
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
            __DIR__.'/../Config/config.php' => config_path('category.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'category'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/category');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/category';
        }, \Config::get('view.paths')), [$sourcePath]), 'category');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/category');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'category');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'category');
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

	public function registerCategoryRepository() {
		return $this->app->bind(
			'Modules\\Category\\Repositories\\CategoryRepository',
			'Modules\\Category\\Repositories\\CategoryEloquent'

		);
	}

	public function registerTagRepository() {
		return $this->app->bind(
			'Modules\\Category\\Repositories\\TagRepository',
			'Modules\\Category\\Repositories\\TagEloquent'

		);
	}
}