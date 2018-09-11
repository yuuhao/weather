<?php

namespace Yuuhao\Weather;

use GuzzleHttp\Client;
use function GuzzleHttp\Psr7\str;
use Yuuhao\Weather\Exception\Exception;
use Yuuhao\Weather\Exception\HttpException;
use Yuuhao\Weather\Exception\InvalidArgumentException;

class Weather
{
    protected $key;
    protected $guzzleOptions = [];

    /**
     * Weather constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
            $this->key = $key;
    }

    /**
     * @return Client
     */
    public function getHttpClient(){
        return new Client($this->guzzleOptions);
    }

    /**
     * @param array $options
     */
    public function setGuzzleOptions(array $options){
        $this->guzzleOptions = $options;
    }

    /**
     * @param $city
     * @param string $format
     * @param string $type
     */
    public function getWeather($city, $type= 'base', string $format='json' ){
        if(!in_array(strtolower($format),['xml','json'])){
            throw new InvalidArgumentException('Invalid response format: '.$format);
        }
        if(!in_array(strtolower($type),['base','all'])){
            throw new InvalidArgumentException('Invalid type value(base/all): '.$type);
        }

        $url = 'https://restapi.amap.com/v3/weather/weatherInfo';
        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'output' => $format,
            'extensions' => $type
        ]);
        try{
            $response = $this->getHttpClient()->get($url,[
                'query' => $query,
            ])->getBody()->getContents();
        }catch (\Exception $e){
            throw new HttpException($e->getMessage(),$e->getCode(),$e);
        }

        return 'json' === $format ? json_decode($response) : $response;
    }

}
