<?php

namespace elementary\config\Phpconfig;

use elementary\config\Fileabstract\FileabstractConfig;
use Exception;
use UnexpectedValueException;
use elementary\config\Phpconfig\Exceptions\LoadException;

class Phpconfig extends FileabstractConfig
{
    /**
     * @param string $filePath
     *
     * @return array
     * @throws LoadException|UnexpectedValueException
     */
    public function loadFile($filePath)
    {
        try {
            $returnValue = require($filePath);
        } catch (Exception $e) {
            throw new LoadException('PHP file threw an exception', 0, $e);
        }

        if (!is_array($returnValue)) {
            throw new UnexpectedValueException('PHP file does not return an array');
        }

        return $returnValue;
    }
}