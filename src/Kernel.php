<?php

namespace Api;

use Conserto\Path;
use Conserto\Controller;
use Api\Controller\Slack;
use Conserto\Utils\Config;
use Conserto\Routing\Router;


class Kernel
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();
        $this->slackRoutes();
    }

    public function start()
    {
        return $this->router->start();
    }

    public function slackRoutes()
    {
        $this->router
            ->post('/slack/bot/top/emoji', Slack::class, 'emojisSlackMessage')
            ->get('/slack/statistics/emoji', Slack::class, 'emojisHtml')
            ->post('/slack/list/emoji', Slack::class, 'emojisList')
            ->post('/slack/data/emoji', Slack::class, 'emojisData');
    }
}
