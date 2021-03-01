<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
Loc::loadMessages(__FILE__);

if(!check_bitrix_sessid())
    return;

if($errorException = $GLOBALS['APPLICATION']->GetException()) {
    echo(CAdminMessage::ShowMessage($errorException->GetString()));
} else {
    if($_GET['reinstall_tables'] == 'on') {
        require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/rodenkov.catalogauto/lib/installtables.php");
        new \Rodenkov\CatalogAuto\InstallTables();
    }
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/rodenkov.catalogauto/lib/installfiles.php");
    new \Rodenkov\CatalogAuto\InstallFiles(__DIR__);
    ModuleManager::registerModule($_GET['id']);
    echo(CAdminMessage::ShowNote(Loc::getMessage("RODENKOV_CATALOGAUTO_INSTALL_DONE")));
}
?>

<form action="<? echo($GLOBALS['APPLICATION']->GetCurPage()); ?>">
    <input type="hidden" name="install_done" value="OK">
    <input type="submit" value="<? echo(Loc::getMessage("RODENKOV_CATALOGAUTO_SUBMIT_BACK")); ?>">
</form>
