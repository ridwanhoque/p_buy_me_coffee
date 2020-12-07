<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\PostCardSendingService;
use App\Models\Category;
use App\Observers\CategoryObserver;
use App\Billing\PaymentGatewayContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function($app){
            
            if(request()->has('credit')){
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->app->singleton('Postcard',  function($app){
            return new PostCardSendingService('bd', 5, 8);  
        });

        Category::observe(CategoryObserver::class);
    }
}
