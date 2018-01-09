<?php

require($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/main/constants.php");
require($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/main/functions.php");

CModule::IncludeModule("iblock");

AddEventHandler("main", "OnBuildGlobalMenu", "SvMenus");
function SvMenus(&$adminMenu, &$moduleMenu)
{
    $moduleMenu[] = array(
        "parent_menu" => "global_menu_services", // поместим в раздел "Сервис"
        "section" => "import_clients",
        "sort" => 1000,                    // сортировка пункта меню
        "url" => "import_clients.php?lang=" . LANG,  // ссылка на пункте меню
        "text" => 'Импорт карты клиентов',       // текст пункта меню
        "title" => 'Импорт карты клиентов', // текст всплывающей подсказки
        "icon" => "iblock_menu_icon_types", // малая иконка
        "page_icon" => "form_page_icon", // большая иконка
        "items_id" => "import_clients",  // идентификатор ветви
        "items" => array()          // остальные уровни меню сформируем ниже.
    );
}


