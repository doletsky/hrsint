<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?#pre($arResult)?>
<div class="tv-container">
	<?foreach($arResult["ITEMS"] as $i => $arItem){?>
		<div class="tv-item show-overlay <?if($i%4==0){?>clr<?}?>" data-youtube-id="<?=$arItem["PROPERTIES"]["YOUTUBE_ID"]["VALUE"]?>">
			<div class="tvi-image">
				<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>250,"h"=>150,"zc"=>1))?>" alt="">
				<b><i></i></b>
			</div>
			<p class="tvi-title"><?=$arItem["NAME"]?></p>
			<p class="tvi-date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></p>
			<div class="tvi-text"><?=$arItem["PREVIEW_TEXT"]?></div>
		</div>
	<?}?>
</div>
<div class="clr"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<?=$arResult["NAV_STRING"]?>
<?endif;?>
