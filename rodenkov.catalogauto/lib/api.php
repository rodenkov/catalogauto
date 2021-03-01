<?php

namespace Rodenkov\CatalogAuto;

use Bitrix\Highloadblock\HighloadBlockTable as HLBlock;
use \Exception;

class API
{
    function __construct()
    {
        \Bitrix\Main\Loader::includeModule('highloadblock');
    }

    function printJson() {
        // Выдаем ошибку если не по GET
        header('Content-type: application/json');
        if($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            exit();
        }
        try {
            $data = $this->process();
        }
        catch(Exception $ex) {
            http_response_code(500);
            $data = ["error"=>$ex->getMessage()];
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    function process() {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'],$get);
        switch ($url['path']) {
            case "/api/brands/":
                return $this->getBrands([]);
            case "/api/models/":
                return $this->getModels($get);
            case "/api/comps/":
                return $this->getComps($get);
            case "/api/cars/":
                return $this->getCars($get);
            default:
                if(preg_match("`/api/cars/(\d+)$`",$url['path'],$matches)) {
                    return $this->getCar($matches[1]);
                }
                else {
                    http_response_code(404);
                    exit();
                }
        }
    }
    function getHLBlockByName($name) {
        $hlblock = HLBlock::getList([
            'filter' => ['=NAME' => $name]
        ])->fetch();
        if(!$hlblock) {
            throw new Exception("Не найден HLB для ".$name);
        }
        return $hlblock;
    }
    function getBrands($get) {
        $hlblock = $this->getHLBlockByName('CatalogAutoBrand');
        $filter = [];
        if(!empty($get['id']))
            $filter[] = ['ID' => $get['id']];
        $entity   = HLBlock::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();
        $rsData = $entityClass::getList([
            'select' => ['*'],
            'filter' => $filter
        ]);
        $elements['list'] = [];
        while ($arItem = $rsData->Fetch()) {
            $elements['list'][] = [
                'id' => $arItem['ID'],
                'name' => $arItem['UF_NAME']
            ];
        }
        return $elements;
    }
    function getModels($get) {
        $hlblock = $this->getHLBlockByName('CatalogAutoModel');
        $filter = [];
        if(!empty($get['brand']))
            $filter[]= ['UF_BRAND' => $get['brand']];
        if(!empty($get['id']))
            $filter[] = ['ID' => $get['id']];
        $entity   = HLBlock::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();
        $rsData = $entityClass::getList([
            'select' => ['*'],
            'filter' => $filter
        ]);
        $elements['list'] = [];
        while ($arItem = $rsData->Fetch()) {
            $elements['list'][] = [
                'id' => $arItem['ID'],
                'name' => $arItem['UF_NAME'],
                'brand' => $arItem['UF_BRAND']
            ];
        }
        return $elements;
    }
    function getComps($get) {
        $hlblock = $this->getHLBlockByName('CatalogAutoComplect');
        $filter = [];
        if(!empty($get['model']))
            $filter[] = ['UF_MODEL' => $get['model']];
        if(!empty($get['id']))
            $filter[] = ['ID' => $get['id']];
        $entity   = HLBlock::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();
        $rsData = $entityClass::getList([
            'select' => ['*'],
            'filter' => $filter
        ]);
        $elements['list'] = [];
        while ($arItem = $rsData->Fetch()) {
            $elements['list'][] = [
                'id' => $arItem['ID'],
                'name' => $arItem['UF_NAME'],
                'model' => $arItem['UF_MODEL'],
                'option' => $arItem['UF_OPTION'],
            ];
        }
        return $elements;
    }
    function getCars($get) {
        // Если задан фильтр brand
        $models = [];
        if(!empty($get['brand'])) {
            foreach($this->getModels($get)['list'] as $model)
                $models[] = $model['id'];
            if(empty($models))
                return ['list' => []];
        }
        // Нахождение пересечения с model
        if(empty($get['model']))
            $get['model'] = [];
        if(!empty($get['model']) && !empty($models))
            $get['model'] = array_intersect($models, $get['model']);
        else
            $get['model'] = array_merge($models, $get['model']);
        if(empty($get['model']) && !empty($get['brand']))
            return ['list' => []];

        // Если задан фильтр model
        $comps = [];
        if(!empty($get['model'])) {
            foreach($this->getComps($get)['list'] as $comp)
                $comps[] = $comp['id'];
            if(empty($comps))
                return ['list' => []];
        }
        // Нахождение пересечения с complect
        if(empty($get['complect']))
            $get['complect'] = [];
        if(!empty($get['complect']) && !empty($comps))
            $get['complect'] = array_intersect($comps, $get['complect']);
        else
            $get['complect'] = array_merge($comps, $get['complect']);
        if(empty($get['complect']) && !empty($get['model']))
            return ['list' => []];

        $filter = [];
        if(!empty($get['complect']) || !empty($get['brand']) || !empty($get['model']))
            $filter[] = ['UF_COMPLECT' => $get['complect']];
        if(!empty($get['year']))
            $filter[] = ['UF_YEAR' => $get['year']];
        $hlblock = $this->getHLBlockByName('CatalogAutoCar');
        $entity   = HLBlock::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();
        $rsData = $entityClass::getList([
            'select' => ['*'],
            'filter' => $filter
        ]);
        $elements['list'] = [];
        while ($arItem = $rsData->Fetch()) {
            $elements['list'][] = [
                'id' => $arItem['ID'],
                'name' => $arItem['UF_NAME'],
                'price' => $arItem['UF_PRICE'],
                'year' => $arItem['UF_YEAR'],
                'complect' => $arItem['UF_COMPLECT'],
                'option' => $arItem['UF_OPTION']
            ];
        }
        return $elements;
    }
    function getCar($id) {
        $hlblock = $this->getHLBlockByName('CatalogAutoCar');
        $entity   = HLBlock::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();
        $rsData = $entityClass::getList([
            'select' => ['*'],
            'filter' => ['ID' => $id]
        ]);
        if(!$arItem = $rsData->Fetch())
            return [];

        $complect = $this->getComps(['id'=>$arItem['UF_COMPLECT']])['list'][0];
        $model = $this->getModels(['id'=>$complect['model']])['list'][0];
        $brand = $this->getBrands(['id'=>$model['brand']])['list'][0];
        $options = array_values(array_unique(array_merge($arItem['UF_OPTION'],$complect['option'])));
        $car = [
            'id' => $arItem['ID'],
            'name' => $arItem['UF_NAME'],
            'year' => $arItem['UF_YEAR'],
            'price' => $arItem['UF_PRICE'],
            'complect' => ['id' => $complect['id'], 'name' => $complect['name']],
            'model' => ['id' => $model['id'], 'name' => $model['name']],
            'brand' => ['id' => $brand['id'], 'name' => $brand['name']],
            'options' => $this->getOptions($options),
        ];
        return $car;
    }
    function getOptions($get) {

        $hlblock = $this->getHLBlockByName('CatalogAutoOption');
        $entity   = HLBlock::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();
        $rsData = $entityClass::getList([
            'select' => ['*'],
            'filter' => ['ID' => $get]
        ]);
        $arItems = [];
        while($arItem = $rsData->Fetch())
            $arItems[] = $arItem;
        if(empty($arItems))
            return [];
        foreach ($arItems as $option) {
            $options[$option['ID']] = $option['UF_NAME'];
        }
        return $options;
    }
}