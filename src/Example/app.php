<?php
/*
 * This file is part of the BRO-Project.
 *
 * (c) BRO - FHV
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Example;

use Bro\Network\Response;
use Bro\Network\RequestEventArgs;
use Bro\Network\Server;

/**
 * Main access point of application
 * @package Example
 */
class App
{
    /**
     * @var App
     */
    public static $app;

    public static function main($args)
    {
        $server = Server::create(8080);

        self::$app = new App($server);
    }

    /**
     * @var Server
     */
    private $server;

    function __construct($server)
    {
        $this->server = $server;
        $this->server->onRequest(array($this, 'request'));
        $this->server->listen();
    }

    /**
     * @param RequestEventArgs $args
     * @return \Bro\Network\Response
     */
    public function request(RequestEventArgs $args)
    {
        // index page
        if ($args->getPath() === '/') {
            $content = file_get_contents('/test/folder/file.html');
            return new Response($content);
        } else {
            $content = '';
            return new Response($content, 404);
        }
    }
} 
