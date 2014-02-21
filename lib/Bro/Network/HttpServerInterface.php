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


interface HttpServerInterface
{

    /**
     * @return int
     */
    public function getPort();

    /**
     * start listing
     */
    public function listen();

    /**
     * register callback for all requests
     * @param callable $callback
     */
    public function setRequestCallback(callable $callback);
}
