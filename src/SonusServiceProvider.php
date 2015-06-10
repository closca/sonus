<?php namespace Closca\Sonus;

use Illuminate\Support\ServiceProvider;

class SonusServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		/* Config */
		$this->mergeConfigFrom(__DIR__.'/../config/sonus.php', 'sonus'); 
		$this->publishes([
		    __DIR__.'/../config/sonus.php' => config_path('sonus.php'),'config'
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['sonus'] = $this->app->share(function($app)
        {
            return new Sonus;
        });
	}

}
