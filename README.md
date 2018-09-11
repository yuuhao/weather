<h1 align="center"> yuuhao/weather </h1>

<p align="center"> 基于高德的天气SDK.</p>


## 安装

```shell
$ composer require yuuhao/weather -vvv
```

## 配置

去高德地图开发平台注册并获取key

##使用

```code
use Yuuhao\Weather\Weather;

app('weather')->getWeather($city);

or

new Weather($city)
```

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT