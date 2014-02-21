<?php
/*
 * This file is part of the Sulu CMS.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bro\Network;


class Request
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var array
     */
    private $getParams;

    /**
     * @var array
     */
    private $postParams;

    function __construct($path, $getParams = array(), $postParams = array())
    {
        $this->path = $path;
        $this->getParams = $getParams;
        $this->postParams = $postParams;
    }

    /**
     * @return array
     */
    public function getGetParams()
    {
        return $this->getParams;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getPostParams()
    {
        return $this->postParams;
    }

} 
