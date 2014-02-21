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


interface FileInterface {

    /**
     * @return string
     */
    public function getPath();

    /**
     * @return string
     */
    public function getContent();
}
