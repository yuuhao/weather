<?php

namespace Yuuhao\Weather\Test;
use PHPUnit\Framework\TestCase;
use Yuuhao\Weather\Exception\InvalidArgumentException;
use Yuuhao\Weather\Exception\HttpException;
use Yuuhao\Weather\Weather;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Mockery\Matcher\AnyArgs;
class WeatherTest extends TestCase
{
    public function testGetWeather(){

    }

    public function testGetHttpClient(){

    }
    public function testSetGuzzleOptions(){

    }

    public function testGetWeatherWithInvaildType(){
        $w = new Weather('mock-key');
        //断言会抛出异常类
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invaild type value be');

        $w->getWeather('深圳','foo','json');
        $this->fail('faild to assert getWeather');
    }

    public function testGetWeatherWithInvaildFormat(){
        $w = new Weather('mock-key');
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invaild type');
        $w->getWeather('深圳','base','array');
        $this->fail('Faild to assert getWeather');
    }
}