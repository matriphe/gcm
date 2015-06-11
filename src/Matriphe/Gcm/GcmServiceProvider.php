<?php 
namespace Matriphe\Gcm;

use Illuminate\Support\ServiceProvider;

class GcmServiceProvider extends ServiceProvider 
{
    protected $defer = false;
    public function boot()
	{
		include __DIR__.'/../../routes.php';
		
		$this->loadViewsFrom(__DIR__.'/../../views', 'gcm');
		$this->mergeConfigFrom( __DIR__.'/../../config/config.php', 'gcm');

        $this->publishes([
            __DIR__.'/../../views' => base_path('resources/views/vendor/gcm'),
            __DIR__.'/../../config/config.php' => config_path('gcm.php'),
        ]);
	}

	public function register()
	{
		$this->app['gcm'] = $this->app->share(function($app)
        {
            return new Gcm();
        });
	}

	public function provides()
	{
		return [];
	}

}
