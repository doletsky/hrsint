<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="abs-ribbon">
	<?foreach($arResult["ITEMS"] as $arItem){?>
	<div class="abs-item">
		<div class="abi-image">
			<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>155,"h"=>90))?>" alt="">
		</div>
		<div class="abi-text">
			<p><?=$arItem["NAME"]?></p>
			<span><?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?></span>
			<strong class="abi-comment-text"><?=$arItem["PREVIEW_TEXT"]?></strong>
		</div>
	</div>
	<?}?>
</div>