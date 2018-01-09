<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>
<?foreach($arResult["ITEMS"] as $arItem){?>
<div class="reviews-item">
	<div class="ab-comment">
		<i></i>
		<div class="ab-comment-wrapper">
			<div class="ab-comment-container">
				<?=$arItem["PREVIEW_TEXT"]?>
			</div>
		</div>
		<div class="expand-comment"><?=GetMessage('Expand')?></div>
	</div>
	<div class="abs-item">
		<div class="abi-image">
			<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>155,"h"=>90))?>" alt="">
		</div>
		<div class="abi-text">
			<p><?=$arItem["NAME"]?></p>
			<span><?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?></span>
			<strong class="abi-comment-text"></strong>
		</div>
	</div>
</div>
<?}?>
<?=$arResult["NAV_STRING"]?>