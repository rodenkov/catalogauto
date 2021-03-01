<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(false);
$this->addExternalCss("/local/modules/rodenkov.catalogauto/bootstrap/bootstrap.css");
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/local/modules/rodenkov.catalogauto/bootstrap/bootstrap.js"></script>
<?

$auto = $arParams['DATA'];
?><h1>Авто "<?=$auto['name']?>"</h1><?php
if(empty($auto)) {
    ?><div>Данные отсутствуют.</div><?
}
else {
    ?>
    <table class="table" border="1">
        <thead class="thead-dark">
            <th scope="col">Характеристика</th>
            <th scope="col">Значение</th>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Номер в каталоге</th>
                <td><?=$auto['id']?></td>
            </tr>
            <tr>
                <th scope="row">Брэнд</th>
                <td><?=$auto['brand']['name']?></td>
            </tr>
            <tr>
                <th scope="row">Модель</th>
                <td><?=$auto['model']['name']?></td>
            </tr>
            <tr>
                <th scope="row">Комплектация</th>
                <td><?=$auto['complect']['name']?></td>
            </tr>
            <tr>
                <th scope="row">Год выпуска</th>
                <td><?=$auto['year']?></td>
            </tr>
            <tr>
                <th scope="row">Опции</th>
                <td><?
                    foreach ($auto['options'] as $option) {
                        echo $option;
                        ?><br><?
                    }

                    ?></td>
            </tr>
            <tr>
                <th scope="row">Стоимость</th>
                <td><?=$auto['price']?> руб.</td>
            </tr>
        </tbody>
    </table>
    <?
}