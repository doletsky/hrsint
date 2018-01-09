<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
 
$cp = $this->__component;
if (is_object($cp)){
  $arResult["og-description"]=trim(strip_tags($arResult["PREVIEW_TEXT"]));
  if(!$arResult["og-description"]){
    $obParser = new CTextParser;
    $arResult["og-description"]=trim(str_replace( "\n", "", strip_tags($obParser->html_cut($arResult["DETAIL_TEXT"], 100))));
  }
  $arResult["og-image"]=$arResult["PREVIEW_PICTURE"]["SRC"];
  #echo '<!--#og-image='.print_r($arResult,1).'-->';
  $cp->SetResultCacheKeys(array('og-description','og-image'));
}