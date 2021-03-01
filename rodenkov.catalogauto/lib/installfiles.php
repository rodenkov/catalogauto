<?php

namespace Rodenkov\CatalogAuto;

class InstallFiles
{
    function __construct($dir)
    {
        // API
        if ($dir) {
            CopyDirFiles($dir."/api", $_SERVER['DOCUMENT_ROOT'] . '/api', $ReWrite = True, $Recursive = True);
        }

        // Компоненты
        if (is_dir($p = $dir. '/components')) {
            if ($dir = opendir($p)) {
                while (false !== $item = readdir($dir)) {
                    if ($item == '..' || $item == '.')
                        continue;
                    CopyDirFiles($p . '/' . $item, $_SERVER['DOCUMENT_ROOT'] . '/local/components/' . $item, $ReWrite = True, $Recursive = True);
                }
                closedir($dir);
            }
        }
    }
}