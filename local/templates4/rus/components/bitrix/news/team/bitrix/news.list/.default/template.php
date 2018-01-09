<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
/*
foreach($arResult["ITEMS"] as $arItem){
	LocalRedirect($arItem["DETAIL_PAGE_URL"]);
	break;
}
*/
?>
<div class="team-slider">
	<b class="ts-left"><i></i></b>
	<b class="ts-right"><i></i></b>
	<div class="ts-container">
		<div class="ts-ribbon">
<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="ts-item">
				<div class="ts-tooltip-placeholder"></div>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<div class="ts-tooltip">
						<p><?=$arItem["NAME"]?></p>
						<span><?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?></span>
						<i></i>
					</div>
					<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>90,"h"=>90))?>" alt="">
				</a>
			</div>
<?endforeach;?>
		</div>
	</div>
</div>