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

use Bro\FileSystem\File;
use Bro\FileSystem\FileInterface;
use Bro\Network\HttpServerInterface;
use Bro\Network\Response;
use Bro\Network\RequestEventArgs;
use Bro\Network\HttpServer;

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

    public static function main($argc, $argv)
    {
        if ($argc < 2) {
            throw new \InvalidArgumentException('Too few arguments');
        }
        $server = HttpServer::create($argv[0]);
        $file = File::create($argv[1]);
        self::$app = new App($server, $file);
    }

    /**
     * @var HttpServerInterface
     */
    private $server;

    /**
     * @var FileInterface
     */
    private $indexFile;

    function __construct(HttpServerInterface $server, FileInterface $file)
    {
        $this->server = $server;
        $this->indexFile = $file;

        // init server
        $this->server->setRequestCallback(array($this, 'request'));
        $this->server->listen();
    }

    /**
     * @param RequestEventArgs $args
     * @return \Bro\Network\Response
     */
    public function request(RequestEventArgs $args)
    {
        // index page
        if ($args->getRequest()->getPath() === '/') {
            return new Response($this->indexFile->getContent());
        } else {
            $content = '';
            return new Response($content, 404);
        }
    }
} 
