<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="team-slider">
	<b class="ts-left"><i></i></b>
	<b class="ts-right"><i></i></b>
	<div class="ts-container">
		<div class="ts-ribbon">
<?
$arFirst=null;
foreach($arResult["ITEMS"] as $i => $arItem){
	if($i==0) $arFirst=$arItem;
?>
			<div class="ts-item">
				<div class="ts-tooltip-placeholder"></div>
				<a data-team-id="<?=$arItem["ID"]?>">
					<div class="ts-tooltip">
						<p><?=$arItem["NAME"]?></p>
						<span><?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?></span>
						<i></i>
					</div>
					<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>90,"h"=>90))?>" alt="">
				</a>
			</div>
<?}?>
		</div>
	</div>
</div>
<?if($arFirst){?>
<div class="team-wrapper">
	<div class="inner-wrapper">
		<div class="team-photo">
			<div class="tp-wrapper">
				<img src="<?=MakeImage($arFirst["PREVIEW_PICTURE"]["SRC"],array("w"=>400))?>" alt="">
			</div>
		</div>
		<div class="team-description">
			<h3 class="tt-header"><?=$arFirst["NAME"]?></h3>
			<p class="tt-role"><?=$arFirst["PROPERTIES"]["POSITION"]["VALUE"]?></p>
			<div class="tt-text"><p><?=$arFirst["PREVIEW_TEXT"]?><p></div>
		</div>
		<b class="clr"></b>
	</div>
</div>
<?}?>