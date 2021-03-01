<?php
use \Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);
class rodenkov_catalogauto extends CModule
{
	function __construct()
	{
		$arModuleVersion = [];
        include(__DIR__."/version.php");
        $this->MODULE_ID = "rodenkov.catalogauto";
        $this->MODULE_NAME = Loc::getMessage("RODENKOV_CATALOGAUTO_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("RODENKOV_CATALOGAUTO_MODULE_DESCRIPTION");
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->PARTNER_NAME = Loc::getMessage("RODENKOV_CATALOGAUTO_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("RODENKOV_CATALOGAUTO_PARTNER_URI");
	}

	function DoInstall()
	{
        global $step;
        if (IsModuleInstalled($this->MODULE_ID) || !check_bitrix_sessid()) {
            return false;
        }
        $step = IntVal($step);
        if ($step < 2) {
            $GLOBALS['APPLICATION']->IncludeAdminFile(
                Loc::getMessage("RODENKOV_CATALOGAUTO_INSTALL_TITLE")." \"".Loc::getMessage("RODENKOV_CATALOGAUTO_MODULE_NAME")."\"",
                __DIR__."/step1.php"
            );
        } else if ($step == 2) {
            $GLOBALS['APPLICATION']->IncludeAdminFile(
                Loc::getMessage("RODENKOV_CATALOGAUTO_INSTALL_TITLE")." \"".Loc::getMessage("RODENKOV_CATALOGAUTO_MODULE_NAME")."\"",
                __DIR__."/step2.php"
            );
        } else if($_GET['install_done'] == 'OK') {
            return true;
        }
	}

	function DoUninstall()
	{
	    // lang=ru&mod=rodenkov.catalogauto&result=DELOK
        //ModuleManager::unRegisterModule($this->MODULE_ID);
        //return true;
        /**/
        global $unstep;
        $unstep = IntVal($unstep);
        if (!IsModuleInstalled($this->MODULE_ID) || !check_bitrix_sessid()) {
            return false;
        }
        if ($unstep < 2) {
            $GLOBALS['APPLICATION']->IncludeAdminFile(
                Loc::getMessage("RODENKOV_CATALOGAUTO_UNINSTALL_TITLE")." \"".Loc::getMessage("RODENKOV_CATALOGAUTO_MODULE_NAME")."\"",
                __DIR__."/unstep.php"
            );
        } else if($unstep == 2) {
            if($_GET['uninstall_tables'] == 'on') {
                require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/rodenkov.catalogauto/lib/uninstalltables.php");
                new \Rodenkov\CatalogAuto\UnInstallTables();
            }
            ModuleManager::unRegisterModule($this->MODULE_ID);
            //echo(CAdminMessage::ShowNote(Loc::getMessage("RODENKOV_CATALOGAUTO_UNINSTALL_DONE")));
            return true;

        }
        /**/
	}
}