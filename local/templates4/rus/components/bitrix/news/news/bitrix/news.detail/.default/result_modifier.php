<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
 
$cp = $this->__component;
if (is_object($cp)){
  $arResult["og-description"]=$arResult["PREVIEW_TEXT"];
  $arResult["og-image"]=$arResult["PREVIEW_PICTURE"]["SRC"];
  #echo '<!--#og-image='.print_r($arResult,1).'-->';
  $cp->SetResultCacheKeys(array('og-description','og-image'));
}