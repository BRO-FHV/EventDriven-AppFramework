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


use Bro\EventArgs;

class RequestEventArgs extends EventArgs
{
    /**
     * @var Request
     */
    private $request;

    function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return \Bro\Network\Request
     */
    public function getRequest()
    {
        return $this->request;
    }
} 
