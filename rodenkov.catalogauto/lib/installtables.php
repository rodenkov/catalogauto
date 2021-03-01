<?php

namespace Rodenkov\CatalogAuto;

use Bitrix\Highloadblock\HighloadBlockTable as HLBlock;
use \CUserTypeEntity;

class InstallTables
{
    function __construct()
    {
        $highBlockTypeProduct = [
            'CatalogAutoOption' => [
                'catalog_auto_option',
                [
                    'FIELDS' => [
                        'UF_NAME' => [
                            'USER_TYPE_ID' => 'string',
                            'SORT' => 100,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                            ],
                            'SETTINGS' => [
                                'SIZE' => 20,
                                'ROWS' => 1,
                                'MIN_LENGTH' => 1,
                                'MAX_LENGTH' => 0
                            ]
                        ]
                    ],
                    'ITEMS' => [
                        ['UF_NAME' => 'Коврики'],
                        ['UF_NAME' => 'Шипованные колёса'],
                        ['UF_NAME' => 'Подогрев руля'],
                        ['UF_NAME' => 'Кондиционер'],
                        ['UF_NAME' => 'Люк'],
                        ['UF_NAME' => 'Автоматический стеклоподъемник'],
                        ['UF_NAME' => 'Магнитола'],
                        ['UF_NAME' => 'Сигнализация'],
                        ['UF_NAME' => 'Камера заднего вида'],
                        ['UF_NAME' => 'Неоновые фары']
                    ],
                    'DEPENENCE' => [
                        'UF_NAME' => [
                            [
                                [
                                    'CatalogAutoComplect',
                                    1,
                                    'FIELDS',
                                    'UF_OPTION',
                                    'SETTINGS',
                                    'HLBLOCK_ID'
                                ],
                                [
                                    'CatalogAutoComplect',
                                    1,
                                    'FIELDS',
                                    'UF_OPTION',
                                    'SETTINGS',
                                    'HLFIELD_ID'
                                ]
                            ],
                            [
                                [
                                    'CatalogAutoCar',
                                    1,
                                    'FIELDS',
                                    'UF_OPTION',
                                    'SETTINGS',
                                    'HLBLOCK_ID'
                                ],
                                [
                                    'CatalogAutoCar',
                                    1,
                                    'FIELDS',
                                    'UF_OPTION',
                                    'SETTINGS',
                                    'HLFIELD_ID'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'CatalogAutoBrand' => [
                'catalog_auto_brand',
                [
                    'FIELDS' => [
                        'UF_NAME' => [
                            'USER_TYPE_ID' => 'string',
                            'SORT' => 100,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                            ],
                            'SETTINGS' => [
                                'SIZE' => 20,
                                'ROWS' => 1,
                                'MIN_LENGTH' => 1,
                                'MAX_LENGTH' => 0
                            ]
                        ]
                    ],
                    'ITEMS' => [
                        ['UF_NAME' => 'Toyota'],
                        ['UF_NAME' => 'Лада'],
                        ['UF_NAME' => 'Nissan'],
                        ['UF_NAME' => 'Honda']
                    ],
                    'DEPENENCE' => [
                        'UF_NAME' => [
                            [
                                [
                                    'CatalogAutoModel',
                                    1,
                                    'FIELDS',
                                    'UF_BRAND',
                                    'SETTINGS',
                                    'HLBLOCK_ID'
                                ],
                                [
                                    'CatalogAutoModel',
                                    1,
                                    'FIELDS',
                                    'UF_BRAND',
                                    'SETTINGS',
                                    'HLFIELD_ID'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'CatalogAutoModel' => [
                'catalog_auto_model',
                [
                    'FIELDS' => [
                        'UF_NAME' => [
                            'USER_TYPE_ID' => 'string',
                            'SORT' => 100,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                            ],
                            'SETTINGS' => [
                                'SIZE' => 20,
                                'ROWS' => 1,
                                'MIN_LENGTH' => 1,
                                'MAX_LENGTH' => 0
                            ]
                        ],
                        'UF_BRAND' => [
                            'USER_TYPE_ID' => 'hlblock',
                            'SORT' => 200,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'brand',
                                    'en' => 'brand',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'brand',
                                    'en' => 'brand',
                                ],
                            ],
                            'SETTINGS' => [
                                'DISPLAY' => 'LIST',
                                'HLBLOCK_ID' => 0,
                                'HLFIELD_ID' => 0,
                                'LIST_HEIGHT' => 5,
                                'DEFAULT_VALUE' => 0
                            ]
                        ],
                    ],
                    'ITEMS' => [
                        ['UF_NAME' => 'Camry', 'UF_BRAND' => 1],
                        ['UF_NAME' => 'Corolla', 'UF_BRAND' => 1],
                        ['UF_NAME' => 'Rav4', 'UF_BRAND' => 1],
                        ['UF_NAME' => 'Гранта', 'UF_BRAND' => 2],
                        ['UF_NAME' => 'Приора', 'UF_BRAND' => 2],
                        ['UF_NAME' => 'Веста', 'UF_BRAND' => 2],
                        ['UF_NAME' => 'X-Trail', 'UF_BRAND' => 3],
                        ['UF_NAME' => 'Note', 'UF_BRAND' => 3],
                        ['UF_NAME' => 'Teana', 'UF_BRAND' => 3],
                        ['UF_NAME' => 'Fit', 'UF_BRAND' => 4],
                        ['UF_NAME' => 'Civic', 'UF_BRAND' => 4]
                    ],
                    'DEPENENCE' => [
                        'UF_NAME' => [
                            [
                                [
                                    'CatalogAutoComplect',
                                    1,
                                    'FIELDS',
                                    'UF_MODEL',
                                    'SETTINGS',
                                    'HLBLOCK_ID'
                                ],
                                [
                                    'CatalogAutoComplect',
                                    1,
                                    'FIELDS',
                                    'UF_MODEL',
                                    'SETTINGS',
                                    'HLFIELD_ID'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'CatalogAutoComplect' => [
                'catalog_auto_complect',
                [
                    'FIELDS' => [
                        'UF_NAME' => [
                            'USER_TYPE_ID' => 'string',
                            'SORT' => 100,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                            ],
                            'SETTINGS' => [
                                'SIZE' => 20,
                                'ROWS' => 1,
                                'MIN_LENGTH' => 1,
                                'MAX_LENGTH' => 0
                            ]
                        ],
                        'UF_MODEL' => [
                            'USER_TYPE_ID' => 'hlblock',
                            'SORT' => 200,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'model',
                                    'en' => 'model',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'model',
                                    'en' => 'model',
                                ],
                            ],
                            'SETTINGS' => [
                                'DISPLAY' => 'LIST',
                                'HLBLOCK_ID' => 0,
                                'HLFIELD_ID' => 0,
                                'LIST_HEIGHT' => 5,
                                'DEFAULT_VALUE' => 0
                            ]
                        ],
                        'UF_OPTION' => [
                            'USER_TYPE_ID' => 'hlblock',
                            'SORT' => 300,
                            'MULTIPLE' => 'Y',
                            'MANDATORY' => 'N',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'option',
                                    'en' => 'option',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'option',
                                    'en' => 'option',
                                ],
                            ],
                            'SETTINGS' => [
                                'DISPLAY' => 'LIST',
                                'HLBLOCK_ID' => 0,
                                'HLFIELD_ID' => 0,
                                'LIST_HEIGHT' => 5,
                                'DEFAULT_VALUE' => 0
                            ]
                        ],
                    ],
                    'ITEMS' => [
                        ['UF_NAME' => 'XV70', 'UF_MODEL' => 1, 'UF_OPTION' => [1,7]],
                        ['UF_NAME' => 'XV50', 'UF_MODEL' => 1, 'UF_OPTION' => [1]],
                        ['UF_NAME' => 'E180', 'UF_MODEL' => 2, 'UF_OPTION' => [2]],
                        ['UF_NAME' => 'E140', 'UF_MODEL' => 2, 'UF_OPTION' => [4]],
                        ['UF_NAME' => 'XA50', 'UF_MODEL' => 3, 'UF_OPTION' => [8,9]],
                        ['UF_NAME' => 'XA30', 'UF_MODEL' => 3, 'UF_OPTION' => [8]],
                        ['UF_NAME' => '1 поколение', 'UF_MODEL' => 4, 'UF_OPTION' => [1]],
                        ['UF_NAME' => 'Рестайлинг', 'UF_MODEL' => 4, 'UF_OPTION' => [1,6]],
                        ['UF_NAME' => '1 поколение', 'UF_MODEL' => 5, 'UF_OPTION' => [1,4]],
                        ['UF_NAME' => 'Рестайлинг', 'UF_MODEL' => 5, 'UF_OPTION' => [1,4]],
                        ['UF_NAME' => '1 поколение', 'UF_MODEL' => 6, 'UF_OPTION' => [4,6]],
                        ['UF_NAME' => 'T30', 'UF_MODEL' => 7, 'UF_OPTION' => [1,2,6]],
                        ['UF_NAME' => 'T31', 'UF_MODEL' => 7, 'UF_OPTION' => [1,2,6]],
                        ['UF_NAME' => 'T32', 'UF_MODEL' => 7, 'UF_OPTION' => [1,2,6]],
                        ['UF_NAME' => 'E11', 'UF_MODEL' => 8, 'UF_OPTION' => [1,4]],
                        ['UF_NAME' => 'J31', 'UF_MODEL' => 9, 'UF_OPTION' => [1,6,9]],
                        ['UF_NAME' => 'J32', 'UF_MODEL' => 9, 'UF_OPTION' => [1,4,6,9]],
                        ['UF_NAME' => 'GD', 'UF_MODEL' => 10, 'UF_OPTION' => [1,6]],
                        ['UF_NAME' => 'GE', 'UF_MODEL' => 10, 'UF_OPTION' => [1,6]],
                        ['UF_NAME' => 'EF', 'UF_MODEL' => 11, 'UF_OPTION' => [4]]
                    ],
                    'DEPENENCE' => [
                        'UF_NAME' => [
                            [
                                [
                                    'CatalogAutoCar',
                                    1,
                                    'FIELDS',
                                    'UF_COMPLECT',
                                    'SETTINGS',
                                    'HLBLOCK_ID'
                                ],
                                [
                                    'CatalogAutoCar',
                                    1,
                                    'FIELDS',
                                    'UF_COMPLECT',
                                    'SETTINGS',
                                    'HLFIELD_ID'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'CatalogAutoCar' => [
                'catalog_auto_car',
                [
                    'FIELDS' => [
                        'UF_NAME' => [
                            'USER_TYPE_ID' => 'string',
                            'SORT' => 100,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'name',
                                    'en' => 'name',
                                ],
                            ],
                            'SETTINGS' => [
                                'SIZE' => 20,
                                'ROWS' => 1,
                                'MIN_LENGTH' => 1,
                                'MAX_LENGTH' => 0
                            ]
                        ],
                        'UF_PRICE' => [
                            'USER_TYPE_ID' => 'double',
                            'SORT' => 200,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'price',
                                    'en' => 'price',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'price',
                                    'en' => 'price',
                                ],
                            ],
                            'SETTINGS' => [
                                'PRECISION' => 2,
                                'SIZE' => 20,
                                'MIN_VALUE' => 1,
				                'MAX_VALUE' => 0,
                                'DEFAULT_VALUE' => 0
                            ]
                        ],
                        'UF_YEAR' => [
                            'USER_TYPE_ID' => 'double',
                            'SORT' => 300,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'year',
                                    'en' => 'year',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'year',
                                    'en' => 'year',
                                ],
                            ],
                            'SETTINGS' => [
                                'PRECISION' => 2,
                                'SIZE' => 20,
                                'MIN_VALUE' => 1900,
                                'MAX_VALUE' => 2021,
                                'DEFAULT_VALUE' => 0
                            ]
                        ],
                        'UF_COMPLECT' => [
                            'USER_TYPE_ID' => 'hlblock',
                            'SORT' => 400,
                            'MULTIPLE' => 'N',
                            'MANDATORY' => 'Y',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'complect',
                                    'en' => 'complect',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'complect',
                                    'en' => 'complect',
                                ],
                            ],
                            'SETTINGS' => [
                                'DISPLAY' => 'LIST',
                                'HLBLOCK_ID' => 0,
                                'HLFIELD_ID' => 0,
                                'LIST_HEIGHT' => 5,
                                'DEFAULT_VALUE' => 0
                            ]
                        ],
                        'UF_OPTION' => [
                            'USER_TYPE_ID' => 'hlblock',
                            'SORT' => 500,
                            'MULTIPLE' => 'Y',
                            'MANDATORY' => 'N',
                            'LABEL' => [
                                'EDIT_FORM_LABEL' => [
                                    'ru' => 'option',
                                    'en' => 'option',
                                ],
                                'LIST_COLUMN_LABEL' => [
                                    'ru' => 'option',
                                    'en' => 'option',
                                ],
                            ],
                            'SETTINGS' => [
                                'DISPLAY' => 'LIST',
                                'HLBLOCK_ID' => 0,
                                'HLFIELD_ID' => 0,
                                'LIST_HEIGHT' => 5,
                                'DEFAULT_VALUE' => 0
                            ]
                        ],
                    ],
                    'ITEMS' => [
                        ['UF_NAME' => 'Toyota Camry 2020 Белая', 'UF_PRICE' => 2499000, 'UF_YEAR' => 2020, 'UF_COMPLECT' => 1, 'UF_OPTION' => [8,9,10]],
                        ['UF_NAME' => 'Toyota Camry 2018 Черная', 'UF_PRICE' => 1900000, 'UF_YEAR' => 2018, 'UF_COMPLECT' => 1, 'UF_OPTION' => [5,8,9,10]],
                        ['UF_NAME' => 'Toyota Camry 2014 2.5G Package', 'UF_PRICE' => 1500000, 'UF_YEAR' => 2014, 'UF_COMPLECT' => 2, 'UF_OPTION' => [1,3,7]],
                        ['UF_NAME' => 'Toyota Camry 2016 2.5AT Престиж', 'UF_PRICE' => 1655000, 'UF_YEAR' => 2016, 'UF_COMPLECT' => 2, 'UF_OPTION' => [1,3,7,8]],
                        ['UF_NAME' => 'Toyota Corolla 2013', 'UF_PRICE' => 839000, 'UF_YEAR' => 2013, 'UF_COMPLECT' => 3, 'UF_OPTION' => [6,8]],
                        ['UF_NAME' => 'Toyota Corolla 2013 1.6MT Classic Plus', 'UF_PRICE' => 765000, 'UF_YEAR' => 2013, 'UF_COMPLECT' => 3, 'UF_OPTION' => [3,4,6,8]],
                        ['UF_NAME' => 'Toyota Corolla 2008', 'UF_PRICE' => 600000, 'UF_YEAR' => 2008, 'UF_COMPLECT' => 4, 'UF_OPTION' => [4]],
                        ['UF_NAME' => 'Toyota Rav4 2021', 'UF_PRICE' => 2712000, 'UF_YEAR' => 2021, 'UF_COMPLECT' => 5, 'UF_OPTION' => [5,6,7,8,9,10]],
                        ['UF_NAME' => 'Toyota Rav4 2008 2.0 AT Standart', 'UF_PRICE' => 855000, 'UF_YEAR' => 2008, 'UF_COMPLECT' => 6, 'UF_OPTION' => [6,7,9,10]],
                        ['UF_NAME' => 'Лада Гранта 2019', 'UF_PRICE' => 440000, 'UF_YEAR' => 2019, 'UF_COMPLECT' => 8, 'UF_OPTION' => [1,2,4]],
                        ['UF_NAME' => 'Лада Приора 2010', 'UF_PRICE' => 235000, 'UF_YEAR' => 2010, 'UF_COMPLECT' => 9, 'UF_OPTION' => [1,4]],
                        ['UF_NAME' => 'Лада Приора 2014', 'UF_PRICE' => 330000, 'UF_YEAR' => 2014, 'UF_COMPLECT' => 10, 'UF_OPTION' => [1,4,6]],
                        ['UF_NAME' => 'Лада Веста 2016', 'UF_PRICE' => 545000, 'UF_YEAR' => 2016, 'UF_COMPLECT' => 11, 'UF_OPTION' => [1,2,4,6]],
                        ['UF_NAME' => 'Nissan X-Trail 2019 4WD', 'UF_PRICE' => 1670000, 'UF_YEAR' => 2019, 'UF_COMPLECT' => 14, 'UF_OPTION' => [4,5,6,7,8,9,10]],
                        ['UF_NAME' => 'Nissan Note 2007', 'UF_PRICE' => 420000, 'UF_YEAR' => 2007, 'UF_COMPLECT' => 15, 'UF_OPTION' => [6,8]],
                        ['UF_NAME' => 'Nissan Teana 2003', 'UF_PRICE' => 350000, 'UF_YEAR' => 2003, 'UF_COMPLECT' => 16, 'UF_OPTION' => [4,6,9]],
                        ['UF_NAME' => 'Nissan Teana 2011 2.5', 'UF_PRICE' => 719000, 'UF_YEAR' => 2011, 'UF_COMPLECT' => 17, 'UF_OPTION' => [3,4,6,9]],
                        ['UF_NAME' => 'Honda Fit 2002', 'UF_PRICE' => 240000, 'UF_YEAR' => 2002, 'UF_COMPLECT' => 18, 'UF_OPTION' => [1,6]],
                        ['UF_NAME' => 'Honda Fit 2008', 'UF_PRICE' => 430000, 'UF_YEAR' => 2008, 'UF_COMPLECT' => 19, 'UF_OPTION' => [1,4,6,7]],
                        ['UF_NAME' => 'Honda Civic 1989', 'UF_PRICE' => 45000, 'UF_YEAR' => 1989, 'UF_COMPLECT' => 20, 'UF_OPTION' => []]
                    ]
                ]
            ],
        ];
        foreach ($highBlockTypeProduct as $hlb_name => $hlb_item)
            $highBlockTypeProduct = $this->createHighLoadBlock($hlb_item[0], $hlb_name, $highBlockTypeProduct[$hlb_name][1], $highBlockTypeProduct);

    }
    function createHighLoadBlock($tableName, $highBlockName, array $hlData, array $highBlockTypeProduct)
    {
        global $APPLICATION;
        // Удаляем hlblock
        $hlblock = HLBlock::getList(array(
                'filter' => array(
                    'TABLE_NAME' => $tableName,
                ))
        )->fetch();
        if ($hlblock) {
            HLBlock::delete($hlblock['ID']);
        }

        // Создаем hlblock
        $highBlockName = preg_replace('/([^A-Za-z0-9]+)/', '', trim($highBlockName));
        $highBlockName = strtoupper(substr($highBlockName, 0, 1)) . substr($highBlockName, 1);
        $data = array(
            'NAME' => $highBlockName,
            'TABLE_NAME' => $tableName,
        );
        $result = HLBlock::add($data);
        $highBlockID = $result->getId();

        // Добавляем поля в hlblock
        $oUserTypeEntity = new CUserTypeEntity();
        foreach ($hlData['FIELDS'] as $fieldName => $fieldValue) {
            $aUserField = array(
                'ENTITY_ID' => 'HLBLOCK_' . $highBlockID,
                'FIELD_NAME' => $fieldName,
                'USER_TYPE_ID' => $fieldValue['USER_TYPE_ID'],
                'SORT' => $fieldValue['SORT'],
                'MULTIPLE' => $fieldValue['MULTIPLE'],
                'MANDATORY' => $fieldValue['MANDATORY'],
                'SHOW_FILTER' => 'N',
                'SHOW_IN_LIST' => 'Y',
                'EDIT_IN_LIST' => 'Y',
                'IS_SEARCHABLE' => 'N',
                'SETTINGS' => $fieldValue['SETTINGS'],
            );

            if (isset($fieldValue['LABEL']) && is_array($fieldValue['LABEL'])) {
                $aUserField = array_merge($aUserField, $fieldValue['LABEL']);
            }

            $resProperty = CUserTypeEntity::GetList(
                array(),
                array('ENTITY_ID' => $aUserField['ENTITY_ID'], 'FIELD_NAME' => $aUserField['FIELD_NAME'])
            );

            if($aUserHasField = $resProperty->Fetch()) {
                // Скорее всего сюда не попадём
                $idUserTypeProp = $aUserHasField['ID'];
                $oUserTypeEntity->Update($idUserTypeProp, $aUserField);
            } else {
                $idUserTypeProp = $oUserTypeEntity->Add($aUserField);
                if(!empty($hlData['DEPENENCE'][$aUserField['FIELD_NAME']])) {
                    foreach ($hlData['DEPENENCE'][$aUserField['FIELD_NAME']] as $dep) {
                        $highBlockTypeProduct
                        [$dep[0][0]]
                        [$dep[0][1]]
                        [$dep[0][2]]
                        [$dep[0][3]]
                        [$dep[0][4]]
                        [$dep[0][5]]
                            = $highBlockID;
                        $highBlockTypeProduct
                        [$dep[1][0]]
                        [$dep[1][1]]
                        [$dep[1][2]]
                        [$dep[1][3]]
                        [$dep[1][4]]
                        [$dep[1][5]]
                            = $idUserTypeProp;
                    }
                }
            }
        }

        // Добавляем записи в hlbock
        if(!empty($hlData['ITEMS'])) {
            $entity = HLBlock::compileEntity([
                'ID' => $highBlockID,
                'NAME' => $highBlockName,
                'TABLE_NAME' => $tableName
            ]);
            $entity_data_class = $entity->getDataClass();
            foreach ($hlData['ITEMS'] as $item) {
                $entity_data_class::add($item);
            }
        }
        return $highBlockTypeProduct;
    }
}