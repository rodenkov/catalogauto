<?php
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if(!check_bitrix_sessid())
    return;

?>

<form action="<? echo($GLOBALS['APPLICATION']->GetCurPage()); ?>">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="hidden" name="lang" value="<?=$_GET['lang']?>">
    <input type="hidden" name="install" value="<?=$_GET['install']?>">
    <input type="hidden" name="sessid" value="<?=$_GET['sessid']?>">
    <input type="hidden" name="step" value="2">
    <input name="reinstall_tables" id="reinstall_tables" type="checkbox">
    <label for="reinstall_tables">Удалить существующие таблицы и создать их заново</label>
    <br><br>
    <input type="submit" value="<? echo(Loc::getMessage("RODENKOV_CATALOGAUTO_NEXT_STEP")); ?>">
</form>
