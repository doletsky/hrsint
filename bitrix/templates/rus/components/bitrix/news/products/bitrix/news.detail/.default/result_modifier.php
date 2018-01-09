<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$cp = $this->__component; // объект компонента
if (is_object($cp)){
	// Сохраняем данные по PROPERTIES - UNITS

	ob_start();
	// Верхняя часть (в шапке)

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

	foreach($arResult["PROPERTIES"]["TEXTBLOCKS"]["VALUE"] as $i => $elementID){
		ShowTextBlock($langArr[LANGUAGE_ID],$elementID,true);
	}
	$buf=ob_get_contents();
	ob_end_clean();

	$arResult["header-details"]=$buf;
	if(LANGUAGE_ID=='ru'){
		$arResult["header-details-kp"]='<b class="hd-order show-overlay"><i></i>Получить<br>бесплатную<br>консультацию</b>';
	}
	elseif(LANGUAGE_ID=='cz'){
		$arResult["header-details-kp"]='<b class="hd-order show-overlay"><i></i>Požádat<br>O Cenovou<br>Nabídku</b>';
	}
	elseif(LANGUAGE_ID=='bg'){
		$arResult["header-details-kp"]='<b class="hd-order show-overlay"><i></i>Заявка<br>за<br>оферта</b>';
	}
	elseif(LANGUAGE_ID=='hu'){
		$arResult["header-details-kp"]='<b class="hd-order show-overlay"><i></i>Kérjen<br>ajánlatot</b>';
	}
	elseif(LANGUAGE_ID=='hr'){
		$arResult["header-details-kp"]='<b class="hd-order show-overlay"><i></i>Zatražiti<br>poslovnu<br>ponudu</b>';
	}elseif(LANGUAGE_ID=='si'){
		$arResult["header-details-kp"]='<b class="hd-order show-overlay"><i></i>Pridobite<br>brezplačno<br>posvetovanje</b>';
	}elseif(LANGUAGE_ID=='mk'){
		$arResult["header-details-kp"]='<b class="hd-order show-overlay"><i></i>Добијте<br>бесплатна<br>консултација</b>';
	}
	else{
		$arResult["header-details-kp"]='<b class="hd-order show-overlay"><i></i>Request<br>a quote</b>';
	}


	$cp->SetResultCacheKeys(array('header-details','header-details-kp'));

}
?>