<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/rodenkov.catalogauto/lib/api.php");
$api = new \Rodenkov\CatalogAuto\API();
$api->printJson();