<?php namespace App\Providers;

use App\Menu;
use App\Settings;
use Illuminate\Support\ServiceProvider;
use DB;
use App\Category;
class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->menus();
        $this->head();
        $this->header();
        $this->scripts();
        $this->footer();
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

	public function menus(){

        view()->composer('front-end.layouts._header', function($view) {
            $menuArr = Menu::where('status_id', 1)->select('id', 'name', 'menu_position', 'url','order_id')->orderBy(DB::raw('-`order_id`'), 'desc')->get();

            $globalparameterArr = array('menuArr' => $menuArr);
            //$settings=Settings::find(1);
            $view->with('globalparameterArr', $globalparameterArr);
            //$view->with('settings', $settings);
        });
    }

    public function head(){

        view()->composer('front-end.layouts._head', function($view) {
            //$settings=Settings::find(1);
            $siteInfo = \App\Settings::all();
            $view->with('siteInfo', $siteInfo);
        });
    }

    public function header(){

        view()->composer('front-end.layouts._header', function($view) {
            //$settings=Settings::find(1);
            $siteInfo = \App\Settings::all();
            $view->with('siteInfo', $siteInfo);
        });
    }

    public function footer(){

        view()->composer('frontEnd.layouts._footer', function($view) {
            $settings=Settings::find(1);
            $mostRecent = Category::where('parent_id', '!=', '0')->whereNotNull('order_no_rec')->inRandomOrder()->take(2)->get();

            $mostPopuler = Category::where('parent_id', '!=', '0')->whereNotNull('order_no_part')->inRandomOrder()->take(2)->get();
            $view->with('settings', $settings);
            $view->with('mostPopuler', $mostPopuler);
            $view->with('mostRecent', $mostRecent);
        });
    }

    public function scripts(){

        view()->composer('front-end.layouts._scripts', function($view) {
            $eventCountdown = \App\EventManagement::where('status','=',1)->value('start_date');
            //$eventCountdown = '2018/02/30';
            $view->with('eventCountdown', $eventCountdown);
        });
    }


}
