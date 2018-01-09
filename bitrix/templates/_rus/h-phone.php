<?
$GLOBALS["phoneFilter"]=array("CODE"=>$_SESSION["SV"]["CONTACT"]);
echo '<!--##'.$_SESSION["SV"]["CONTACT"].'-->';
$phoneIblockType=array(
  'ru' => 'rus_dir',
  'en' => 'eng_dir',
  'cz' => 'cze_dir',
  'bg' => 'bgr_dir',
  'hu' => 'hun_dir',
  'hr' => 'hrv_dir'
);
$phoneIblockID=array(
  'ru' => 12,
  'en' => 23,
  'cz' => 42,
  'bg' => 57,
  'hu' => 74,
  'hr' => 84
);
?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "h-phone", Array(
  "IBLOCK_TYPE" => $phoneIblockType[LANGUAGE_ID], // Type of information block (used for verification only)
  "IBLOCK_ID" => $phoneIblockID[LANGUAGE_ID], // Information block code
  "NEWS_COUNT" => "20", // News per page
  "SORT_BY1" => "SORT", // Field for the news first sorting pass
  "SORT_ORDER1" => "ASC", // Direction for the news first sorting pass
  "SORT_BY2" => "SORT", // Field for the news second sorting pass
  "SORT_ORDER2" => "ASC", // Direction for the news second sorting pass
  "FILTER_NAME" => "phoneFilter", // Filter
  "FIELD_CODE" => array(  // Fields
    0 => "NAME",
    1 => "",
  ),
  "PROPERTY_CODE" => array( // Properties
    0 => "PHONE",
    1 => "",
  ),
  "CHECK_DATES" => "Y", // Show only currently active elements
  "DETAIL_URL" => "", // Detail page URL (from information block settings by default)
  "AJAX_MODE" => "N", // Enable AJAX mode
  "AJAX_OPTION_JUMP" => "N",  // Enable scrolling to component's top
  "AJAX_OPTION_STYLE" => "N", // Enable styles loading
  "AJAX_OPTION_HISTORY" => "N", // Emulate browser navigation
  "CACHE_TYPE" => "A",  // Cache type
  "CACHE_TIME" => "36000000", // Cache time (sec.)
  "CACHE_FILTER" => "Y",  // Cache if the filter is active
  "CACHE_GROUPS" => "Y",  // Respect Access Permissions
  "PREVIEW_TRUNCATE_LEN" => "", // Maximum preview text length (for Text type only)
  "ACTIVE_DATE_FORMAT" => "d.m.Y",  // Date display format
  "SET_TITLE" => "N", // Set page title
  "SET_STATUS_404" => "N",  // Set 404 status if no element or section was found
  "INCLUDE_IBLOCK_INTO_CHAIN" => "N", // Include information block into navigation chain
  "ADD_SECTIONS_CHAIN" => "N",  // Add Section name to breadcrumb navigation
  "HIDE_LINK_WHEN_NO_DETAIL" => "N",  // Hide link to the details page if no detailed description provided
  "PARENT_SECTION" => "", // Section ID
  "PARENT_SECTION_CODE" => "",  // Section code
  "DISPLAY_TOP_PAGER" => "N", // Display at the top of the list
  "DISPLAY_BOTTOM_PAGER" => "N",  // Display at the bottom of the list
  "PAGER_TITLE" => "News",  // Category name
  "PAGER_SHOW_ALWAYS" => "N", // Always show the pager
  "PAGER_TEMPLATE" => "", // Name of the pager template
  "PAGER_DESC_NUMBERING" => "N",  // Use reverse page navigation
  "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000", // Cache time for pages with reverse page navigation
  "PAGER_SHOW_ALL" => "N",  // Show the ALL link
  "DISPLAY_DATE" => "N",  // Display element date
  "DISPLAY_NAME" => "N",  // Display element title
  "DISPLAY_PICTURE" => "N", // Display element preview picture
  "DISPLAY_PREVIEW_TEXT" => "N",  // Display element preview text
  "AJAX_OPTION_ADDITIONAL" => "", // Additional ID
  ),
  false
);?>