<?php



namespace App\Providers;


use App\Models\Produk;

use Carbon\Carbon;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;



class AppServiceProvider extends ServiceProvider

{

    /**

     * Register any application services.

     *

     * @return void

     */

    public function register()

    {

        //

    }



    /**

     * Bootstrap any application services.

     *

     * @return void

     */

    public function boot()

    {

        config(['app.locale' => 'id']);

        setlocale(LC_TIME, 'id_ID');

        Carbon::setLocale('id');

        date_default_timezone_set('Asia/Jakarta');



        Schema::defaultStringLength(191);



        view()->composer('*', function ($view) {

            $view->with([

                'produks' => Produk::all(),




            ]);
        });
    }
}
