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


class Response
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var integer
     */
    private $statusCode;

    function __construct($content, $statusCode = 200)
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

} 
