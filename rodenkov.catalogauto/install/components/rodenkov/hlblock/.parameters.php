<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
    'PARAMETERS' => array(
        'SEF_MODE' => array(
            'brands' => array(
                'NAME' => 'Список брэндов',
                'DEFAULT' => '#SEF_FOLDER#',
            ),
            'models' => array(
                'NAME' => 'Список моделей брэнда',
                'DEFAULT' => '#SEF_FOLDER#/#BRAND#',
            ),
            'cars' => array(
                'NAME' => 'Список автомобилей модели',
                'DEFAULT' => '#SEF_FOLDER#/#BRAND#/#MODEL#',
            ),
            'comps' => array(
                'NAME' => 'Список комплектаций модели',
                'DEFAULT' => '#SEF_FOLDER#/#BRAND#/#MODEL#/#COMP#',
            ),
            'detail' => array(
                'NAME' => 'Детальная страница автомобиля',
                'DEFAULT' => '#SEF_FOLDER#/detail/#CAR#',
            ),
            'element' => array(
                'NAME' => 'Страница элемента',
                'DEFAULT' => 'item/id/#ELEMENT_ID#/',
            ),
        ),
    ),
);