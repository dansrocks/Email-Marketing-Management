<?php

namespace app\Helpers;

/**
 * Class EnvironmentHelper
 *
 * @package app\Helpers
 *
 * Clase compendio de funcionalidades genéricos relacionadas con el sistema
 *
 */
class EnvironmentHelper
{

    /**
     * Devuelve el nombre de un fichero temporal (único).
     *
     * @param string|null $path
     *
     * @return string
     */
    public static function getTempFilename($path = null)
    {
        if (! $path) {
            $path = sys_get_temp_dir();
        }
        $filename = tempnam($path, 'emm_');

        return $filename;
    }
}