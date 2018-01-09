<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
global $USER;
//if ($USER->IsAdmin()) echo pre($arResult);
// Текстовые блоки
$langArr=array(
    'ru'=>6,
    'en'=>16,
    'cz'=>49,
    'bg'=>62,
    'hu'=>82,
    'hr'=>97,
    'si'=>106,
    'mk'=>117,
  );
if(isset($_REQUEST["ddd"])) pre($arResult["PROPERTIES"]["TEXTBLOCKS"]["VALUE"]);
foreach($arResult["PROPERTIES"]["TEXTBLOCKS"]["VALUE"] as $i => $elementID){
	ShowTextBlock($langArr[LANGUAGE_ID],$elementID,false);
}
?>
<?if($arResult["PROPERTIES"]["IS_SOCNETWORK"]["VALUE_XML_ID"]=="Y"){?>
<div class="multi-block">
  <div class="inner-wrapper">
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55ce012a8ed5f973" async="async"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_native_toolbox"></div>
  </div>
</div>
<?}?>