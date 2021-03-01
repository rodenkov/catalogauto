<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(false);
$this->addExternalCss("/local/modules/rodenkov.catalogauto/bootstrap/bootstrap.css");

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/local/modules/rodenkov.catalogauto/bootstrap/bootstrap.js"></script>
<h1>Таблица "<?=$arParams['DATA_TYPE']?>"</h1>
<?
$list = $arParams['DATA']['list'];
if(empty($list)) {
    ?><div>Данные отсутствуют.</div><?
}
else {
    ?>
    <table class="table" border="1">
        <thead class="thead-dark">
        <?
            foreach ($list[0] as $key => $item) {
                ?><th scope="col"><?=$key?> <span class="glyphicon glyphicon-sort"></th><?
            }
        ?>
        </thead>
        <tbody>
        <?
            foreach ($list as $elem) {
                ?><tr><?
                foreach ($elem as $key => $value) {
                    if(is_array($value))
                        $val = implode(', ',$value);
                    else
                        $val = $value;
                    if($key == 'id') {
                        ?><th scope="row"><?=$val?></th><?
                    }
                    else {
                        ?><td><?=$val?></td><?
                    }
                }
                ?></tr><?
            }
        ?>
        </tbody>
    </table>
    <?
}
?>
<br>
<div>P.S. Это базовый шаблон компонента '<?=$componentPath?>'</div>