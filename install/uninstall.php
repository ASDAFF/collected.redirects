<? if (!check_bitrix_sessid()) return; ?>
<?
/**
 * Copyright (c) 13/2/2020 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

global $APPLICATION;
//var_dump($savedata);exit;
$sModuleId = "collected.redirects";
$DB = CDatabase::GetModuleConnection($sModuleId);

$errors = false;


// Admin Files
DeleteDirFiles($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/" . $sModuleId . "/install/admin/", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin/");
DeleteDirFilesEx("/bitrix/images/seo2_redirects");
DeleteDirFiles($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/" . $sModuleId . "/install/themes/.default/", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/themes/.default/");
DeleteDirFilesEx("/bitrix/themes/.default/icons/seo2_redirects");

UnRegisterModuleDependences('main', 'OnBeforeProlog', "collected.redirects", 'seo2Redirects', 'handlerOnBeforeProlog');

$DB->Query("DROP TABLE IF EXISTS seo2_redirects_404");
$DB->Query("DROP TABLE IF EXISTS seo2_redirects_rules");
$DB->Query("DROP TABLE IF EXISTS seo2_redirects_404_ignore");

// Module Dependences
UnRegisterModule($sModuleId);

if ($errors === false):
	echo CAdminMessage::ShowNote(GetMessage("MOD_UNINST_OK"));
else:
	for ($i = 0; $i < count($errors); $i++)
		$alErrors .= $errors[$i] . "<br>";
	echo CAdminMessage::ShowMessage(Array("TYPE" => "ERROR", "MESSAGE" => GetMessage("MOD_UNINST_ERR"), "DETAILS" => $alErrors, "HTML" => true));
endif;
?>
<form action="<? echo $APPLICATION->GetCurPage() ?>">
	<input type="hidden" name="lang" value="<? echo LANG ?>">
	<input type="submit" name="" value="<? echo GetMessage("MOD_BACK") ?>">	
</form>