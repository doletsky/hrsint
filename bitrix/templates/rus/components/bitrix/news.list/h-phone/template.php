<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--
<?#pre($arResult["ITEMS"])?>
-->
<?
if(count($arResult["ITEMS"])){
	foreach($arResult["ITEMS"] as $arItem){
		echo $arItem["PROPERTIES"]["PHONE"]["VALUE"];
	}
}
else{
	echo '+7 495 796 99 00<!--default-->';
}
?>