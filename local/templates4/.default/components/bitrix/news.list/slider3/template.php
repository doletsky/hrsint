<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem){?>
<div class="ms-item">
	<div class="msr-right">
		<h2><?=$arItem["NAME"]?></h2>
		<p><?=$arItem["PREVIEW_TEXT"]?></p>
		<b class="slider-button show-overlay"><?=GetMessage('ask')?></b>
	</div>
	<div class="msr-left">
		<img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="">
	</div>
</div>
<?}?>