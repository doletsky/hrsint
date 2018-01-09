<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?#pre($arParams);?>
<div class="news-container">
	<div class="news-right">
<?foreach($arResult["ITEMS"] as $arItem){?>
		<div class="news-item">
			<?if(isset($arItem["PREVIEW_PICTURE"]["SRC"])){?>
			<div class="ni-left">
				<div class="ni-image">
					<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>160,"h"=>125))?>" alt="">
				</div>
			</div>
			<?}?>
			<div class="ni-right">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="ni-title"><?=$arItem["NAME"]?></a>
				<span class="ni-date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
				<div class="ni-text"><?=$arItem["PREVIEW_TEXT"]?></div>
<?
if(CModule::IncludeModule("search")) {
	$tags=tags_prepare($arItem["TAGS"]);
?>
				<div class="ni-tags">
<?foreach ($tags as $tag) {?>
					<a href="<?=$arParams["IBLOCK_URL"]?>?arrFilter_ff[TAGS]=<?=str_replace(' ','+',$tag)?>&set_filter=Y"><?=$tag?></a>
<?}?>
				</div>
<?
}?>
			</div>
		</div>
<?}?>
	</div>
	<?=$arResult["NAV_STRING"]?>
</div>