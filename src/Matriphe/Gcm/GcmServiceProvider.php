<?php 
namespace Matriphe\Gcm;

use Illuminate\Support\ServiceProvider;

class GcmServiceProvider extends ServiceProvider 
{
    protected $defer = false;
    public function boot()
	{
		$this->mergeConfigFrom( __DIR__.'/../../config/config.php', 'gcm');

        $this->publishes([
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
