<?php
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if(!check_bitrix_sessid())
    return;

?>

<form action="<? echo($GLOBALS['APPLICATION']->GetCurPage()); ?>">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="hidden" name="lang" value="<?=$_GET['lang']?>">
    <input type="hidden" name="uninstall" value="Y">
    <input type="hidden" name="sessid" value="<?=$_GET['sessid']?>">
    <?//<input type="hidden" name="result" value="DELOK">?>
    <input type="hidden" name="unstep" value="2">
    <input name="uninstall_tables" id="uninstall_tables" type="checkbox">
    <label for="uninstall_tables">Удалить существующие таблицы</label>
    <br><br>
    <input type="submit" value="<? echo(Loc::getMessage("RODENKOV_CATALOGAUTO_NEXT_STEP")); ?>">
</form>
