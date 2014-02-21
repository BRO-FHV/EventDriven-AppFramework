<?php
/*
 * This file is part of the BRO-Project.
 *
 * (c) BRO - FHV
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bro\Network;

/**
 * Class Server
 * @package Bro\Network
 */
class Server
{

    /**
     * create a new server
     * @param integer $port
     * @return Server
     */
    public static function create($port)
    {
        return new Server($port);
    }

    /**
     * @param integer $port
     */
    private function __construct($port)
    {
        $this->port = $port;
    }

    private $port;

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * start listing
     */
    public function listen()
    {
        // start http server
        start_http_server($this->port);
    }

    /**
     * register callback for all requests
     * @param callable $callback
     */
    public function onRequest(callable $callback)
    {
        // register event
        register_event_listener('network.' . $this->port . '.request', $callback);
    }

} 
