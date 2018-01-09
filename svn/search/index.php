<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Iskanje");
?><?$APPLICATION->IncludeComponent("bitrix:search.form", "", array(
  "USE_SUGGEST" => "N",
  "PAGE" => "#SITE_DIR#search/index.php"
  ),
  false,
  array(
  "ACTIVE_COMPONENT" => "N"
  )
);?><?$APPLICATION->IncludeComponent("bitrix:search.page", "search", array(
  "RESTART" => "Y",
  "NO_WORD_LOGIC" => "N",
  "CHECK_DATES" => "Y",
  "USE_TITLE_RANK" => "Y",
  "DEFAULT_SORT" => "rank",
  "FILTER_NAME" => "",
  "arrFILTER" => array(
    0 => "main",
    1 => "iblock_svn_dir",
    2 => "iblock_svn_tree",
  ),
  "arrFILTER_main" => array(
  ),
  "arrFILTER_iblock_svn_dir" => array(
    0 => "all",
  ),
  "arrFILTER_iblock_svn_tree" => array(
    0 => "all",
  ),
  "SHOW_WHERE" => "N",
  "SHOW_WHEN" => "N",
  "PAGE_RESULT_COUNT" => "50",
  "AJAX_MODE" => "N",
  "AJAX_OPTION_JUMP" => "N",
  "AJAX_OPTION_STYLE" => "Y",
  "AJAX_OPTION_HISTORY" => "N",
  "CACHE_TYPE" => "A",
  "CACHE_TIME" => "3600",
  "DISPLAY_TOP_PAGER" => "Y",
  "DISPLAY_BOTTOM_PAGER" => "Y",
  "PAGER_TITLE" => "Результаты поиска",
  "PAGER_SHOW_ALWAYS" => "Y",
  "PAGER_TEMPLATE" => "",
  "USE_LANGUAGE_GUESS" => "N",
  "USE_SUGGEST" => "N",
  "AJAX_OPTION_ADDITIONAL" => ""
  ),
  false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>