<?
$APPLICATION->SetPageProperty("header-details",$arResult["header-details"]);
$APPLICATION->SetPageProperty("header-details-kp",$arResult["header-details-kp"]);
$APPLICATION->SetPageProperty("header-bg-image","inner_bg_02.jpg");
$APPLICATION->SetPageProperty("predtext-dn","dn");
$APPLICATION->SetPageProperty("inner-header-class","product-element");

$APPLICATION->SetTitle($arResult['NAME']);
$APPLICATION->AddChainItem($arResult['NAME']);
?>