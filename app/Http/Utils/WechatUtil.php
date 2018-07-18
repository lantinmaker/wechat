<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17
 * Time: 13:44
 */

namespace App\Http\Utils;

use EasyWeChat\Factory;
use Illuminate\Support\Facades\Config;

class WechatUtil
{
    private $app;

    private $config;

    public function __construct()
    {
        $this->config = Config::get('wechat.official_account.default');

        $this->app = Factory::officialAccount($this->config);
    }

    public function server()
    {
        $response = $this->app->server->serve();

        $response->send();
    }
}