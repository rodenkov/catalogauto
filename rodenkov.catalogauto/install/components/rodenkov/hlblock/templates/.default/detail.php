<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/rodenkov.catalogauto/lib/api.php");
$api = new \Rodenkov\CatalogAuto\API();
$data = $api->getCar($arResult['VARIABLES']['BRAND']);

$APPLICATION->IncludeComponent(
    'rodenkov:hlblock.element',
    '',
    Array(
        'DATA' => $data
    ),
    $component
);