<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="ms-images">
	<?foreach($arResult["ITEMS"] as $arItem){?>
	<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
	<?}?>
</div>