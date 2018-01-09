<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h3><?=GetMessage("title")?></h3>
<div class="in-slider">
	<div class="in-ribbon">
		<?foreach($arResult["ITEMS"] as $arItem){?>
		<div class="in-item">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
			<p><?=$arItem["DISPLAY_ACTIVE_FROM"]?></p>
		</div>
		<?}?>
	</div>
	<div class="in-controls">
		<b class="in-up"><i></i></b>
		<b class="in-down"><i></i></b>
	</div>
</div>