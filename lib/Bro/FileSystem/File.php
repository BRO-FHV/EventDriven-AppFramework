<?php
/*
 * This file is part of the BRO-Project.
 *
 * (c) BRO - FHV
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bro\FileSystem;


class File implements FileInterface
{
    public static function create($path)
    {
        return new File($path);
    }

    /**
     * @var string
     */
    private $path;

    private function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return file_get_contents($this->path);
    }
} 
