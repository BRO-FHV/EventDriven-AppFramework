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
class HttpServer implements HttpServerInterface
{

    /**
     * create a new server
     * @param integer $port
     * @return HttpServerInterface
     */
    public static function create($port)
    {
        return new HttpServer($port);
    }

    /**
     * @param integer $port
     */
    private function __construct($port)
    {
        $this->port = $port;

        // register event
        // TODO event names
        register_event_listener('network.' . $this->port . '.request', array($this, 'onRequest'));
    }

    /**
     * @var int
     */
    private $port;
    /**
     * @var callable[]
     */
    private $requestCallbacks = array();

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
    public function addRequestCallback(callable $callback)
    {
        $this->requestCallbacks[] = $callback;
    }

    /**
     * called by system when a request come in
     * @param $args
     */
    public function onRequest($args)
    {
        // TODO args definition
        $request = new Request($args['path']);
        $args = new RequestEventArgs($request);
        foreach ($this->requestCallbacks as $callback) {
            $callback($args);
        }
    }

} 
