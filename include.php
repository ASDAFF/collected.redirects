<?
/**
 * Copyright (c) 13/2/2020 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

global $DB, $APPLICATION, $MESS, $DBType;

CModule::AddAutoloadClasses(
	"collected.redirects",
	array(
		"seo2RedirectsRulesDB" => "classes/$DBType/seo2_redirects_rules.php",
        "seo2Redirects404DB" => "classes/$DBType/seo2_redirects_404.php",
        'seo2Redirects' => "classes/general/seo2_redirects.php",
        "seo2Redirects404IgnoreDB" => "classes/$DBType/seo2_redirects_404_ignore.php",
        'phpQuery' => "classes/general/phpQuery/phpQuery/phpQuery.php",
    )
);

?>