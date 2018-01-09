<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
#pre($arResult);
$cur_page = $APPLICATION->GetCurPage(true);
$cur_page_no_index = $APPLICATION->GetCurPage(false);
?>
<div class="mobile-dropdown-wrap">
	<div class="mdw-inner">
		<select name="" class="mobile-dropdown">
<?foreach($arResult["SECTIONS"] as $i => $arSection){
			$arResult["SECTIONS"][$i]["SELECTED"] = CMenu::IsItemSelected($arSection["SECTION_PAGE_URL"], $cur_page, $cur_page_no_index);
?>
			<option value="<?=$arSection["SECTION_PAGE_URL"]?>" <?if($arSection["SELECTED"]){?>class="active"<?}?>><?=$arSection["NAME"]?></option>
<?}?>
		</select>
		<div class="styled-selectbox">
			<em></em>
			<div class="select-button"><i></i></div>
		</div>
	</div>
</div>
<?#pre($arResult["SECTIONS"])?>
<div class="news-left">
	<div class="news-tabs-wrap">
		<ul class="news-tabs">
<?foreach($arResult["SECTIONS"] as $arSection){?>
			<li><a href="<?=$arSection["SECTION_PAGE_URL"]?>" <?if($arSection["SELECTED"]){?>class="active"<?}?>><?=$arSection["NAME"]?></a></li>
<?}?>
		</ul>
	</div>
</div>