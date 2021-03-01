<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Context;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Request;
use Bitrix\Main\SystemException;

// корень проекта
define("PROJECT_ROOT", realpath($_SERVER["DOCUMENT_ROOT"] . "/.."));

// подключение модуля
try {
    Loader::includeModule($mid);
} catch (LoaderException $loaderException) {
}

// подключение файлов локализации
Loc::loadMessages($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/options.php");
Loc::loadMessages(__FILE__);

// проверка доступа к модулю
$MOD_RIGHT = $APPLICATION->GetGroupRight($mid);
if ($MOD_RIGHT < "S") {
    $APPLICATION->AuthForm(Loc::getMessage("ACCESS_DENIED"));
}

/** @var CAdminTabControl $tabControl Объекь для управления вкладками. */
$tabControl = new CAdminTabControl("tabControl", [
    [
        "DIV" => "tab_main_settings",
        "TAB" => Loc::getMessage("PEC_LK_MAIN_SETTINGS"),
    ]
]);

/** @var array $urlParams Параметры для URL. */
$urlParams = [
    "mid" => $mid,
    "lang" => LANGUAGE_ID,
];

/** @var string $formActionUrl URL-адрес для формы. */
$formActionUrl = sprintf("%s?%s", $APPLICATION->GetCurPage(), http_build_query($urlParams));

/** @var Context $context Контекст. */
$context = Context::getCurrent();

/** @var Request $request Запрос. */
$request = $context->getRequest();

// установка значений
if ($context->getServer()->getRequestMethod() == "POST" && check_bitrix_sessid()) {

//    // сохранение признака необходимости перезагрузки заявки (при изменении клиентской части)
//    COption::SetOptionString($mid, "enable_bid_reload", $request->get("enable_bid_reload") === "Y" ? "Y" : "N");
}
?>
<form method="post" action="<?= $formActionUrl; ?>">
    <?= bitrix_sessid_post(); ?>
    <? $tabControl->Begin(); ?>
    <? $tabControl->BeginNextTab(); ?>
    <tr class="heading">
        <td colspan="2">
            <b><?= Loc::getMessage("PEC_LK_EVENTS_SETTINGS"); ?></b>
        </td>
    </tr>

    <tr>
        <td width="40%">
            <label for="lk_events_timeout"><?= Loc::getMessage("PEC_LK_EVENTS_TIMEOUT_DEFAULT") ?>
                :</label>
        </td>
        <td width="60%">
            <input id="lk_events_timeout"
                   class="adm-input"
                   name="lk_events_timeout"
                   min="1"
                   required
                   type="number"
                   value="<?= COption::GetOptionInt($mid, "lk_events_timeout", 15); ?>"
        </td>
    </tr>
    <? $tabControl->Buttons(); ?>
    <input type="submit"
           name="Update"<?= ($MOD_RIGHT < "W") ? " disabled" : null; ?>
           value="<?= Loc::getMessage("MAIN_SAVE"); ?>"
           class="adm-btn-save">
    <input type="reset"
           name="reset"
           value="<?= Loc::getMessage("MAIN_RESET"); ?>">
    <? $tabControl->End(); ?>
</form>
