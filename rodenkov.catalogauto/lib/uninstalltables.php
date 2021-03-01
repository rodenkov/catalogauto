<?php

namespace Rodenkov\CatalogAuto;

use Bitrix\Highloadblock\HighloadBlockTable as HLBlock;
use \CModule;

class UnInstallTables
{
    function __construct()
    {
        if (!CModule::IncludeModule('highloadblock'))
            return false;

        $tables = [
            'catalog_auto_option',
            'catalog_auto_brand',
            'catalog_auto_model',
            'catalog_auto_complect',
            'catalog_auto_car',
        ];
        foreach($tables as $tableName) {
            $hlblock = HLBlock::getList(array(
                    'filter' => array(
                        'TABLE_NAME' => $tableName,
                    ))
            )->fetch();
            if ($hlblock) {
                HLBlock::delete($hlblock['ID']);
            }
        }
    }
}