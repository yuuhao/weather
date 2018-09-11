<?php
/**
 * Created by PhpStorm.
 * User: hzwyh
 * Date: 2018/9/11
 * Time: 11:14
 */

namespace Yuuhao\Weather;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true; // 延迟，，laravel的延迟加载，不会再应用启动时加载，调用时才会加载
    public function register(){
        $this->app->singleton(Weather::class,function(){
            return new Weather(config('services.weather.key'));
        });
        $this->app->alias(Weather::class,'weather');
    }

    public function provides(){
        return[Weather::class,'weather'];
    }

}