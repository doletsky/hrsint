<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$cities=array();
foreach($arResult["ITEMS"] as $arItem){
	$cities[$arItem["PROPERTIES"]["CITY"]["VALUE_XML_ID"]]=$arItem["PROPERTIES"]["CITY"]["VALUE"];
}?>
<div class="jobs-container">
<?foreach($arResult["ITEMS"] as $arItem){?>
	<div class="jobs-item">
		<div class="jobs-title">
			<h3><?=$arItem["NAME"]?></h3>
			<i></i>
		</div>
		<div class="jobs-inner">
			<?if(strlen($arItem["PREVIEW_TEXT"])){?><div class="jobs-line"><?=$arItem["PREVIEW_TEXT"]?></div><?}?>
			<?if(strlen($arItem["PROPERTIES"]["RESPONSIBILIY"]["~VALUE"]["TEXT"])){?><div class="jobs-line">
				<div class="jl-label"><?=GetMessage("RESPONSIBILIY")?>:</div>
				<div class="jl-text"><?=$arItem["PROPERTIES"]["RESPONSIBILIY"]["~VALUE"]["TEXT"]?></div>
			</div><?}?>
			<?if(strlen($arItem["PROPERTIES"]["REQUIREMENTS"]["~VALUE"]["TEXT"])){?><div class="jobs-line">
				<div class="jl-label"><?=GetMessage("REQUIREMENTS")?>:</div>
				<div class="jl-text"><?=$arItem["PROPERTIES"]["REQUIREMENTS"]["~VALUE"]["TEXT"]?></div>
			</div><?}?>
			<?if(strlen($arItem["PROPERTIES"]["OFFER"]["~VALUE"]["TEXT"])){?><div class="jobs-line">
				<div class="jl-label"><?=GetMessage("OFFER")?>:</div>
				<div class="jl-text"><?=$arItem["PROPERTIES"]["OFFER"]["~VALUE"]["TEXT"]?></div>
			</div><?}?>
			<div class="jobs-line"><button class="styled-button apply-button"><?=GetMessage("SEND")?></button></div>
		</div>
	</div>
<?}?>
</div>
