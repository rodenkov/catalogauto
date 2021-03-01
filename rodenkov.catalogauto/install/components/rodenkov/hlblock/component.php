<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */

if ($arParams['SEF_MODE'] == 'Y') {

    $arVariables = array();

    $componentPage = CComponentEngine::ParseComponentPath(
        $arParams['SEF_FOLDER'],
        $arParams['SEF_URL_TEMPLATES'],
        $arVariables
    );
    if($arVariables['SEF_FOLDER'] == 'detail') {
        $componentPage = $arVariables['SEF_FOLDER'];
    }

    $arResult['VARIABLES'] = $arVariables;
    $arResult['DATA_TYPE'] = $componentPage;
}

$this->IncludeComponentTemplate($componentPage);