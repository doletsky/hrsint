<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="webinar">
	<div class="web-line">
		<div class="web-date"><?=GetMessage("date")?></div>
		<div class="web-time"><?=GetMessage("time")?></div>
		<div class="web-title"><?=GetMessage("topic")?></div>
		<div class="web-register"><?=GetMessage("registration")?></div>
	</div>
<?foreach($arResult["ITEMS"] as $arItem){?>
<?#pre($arItem)?>
	<div class="web-line">
		<div class="web-date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
		<div class="web-time"><?=$arItem["PROPERTIES"]["TIME"]["VALUE"]?></div>
		<div class="web-title"><a href="<?=$arItem["PROPERTIES"]["URL"]["VALUE"]?>" target="_blank"><?=$arItem["NAME"]?></a></div>
		<div class="web-register">
			<div class="button-wrap">
				<a href="<?=$arItem["PROPERTIES"]["URL_REG"]["VALUE"]?>" class="styled-button" target="_blank"><?=GetMessage("register")?></a>
			</div>
		</div>
	</div>
<?}?>
</div>

<?=$arResult["NAV_STRING"]?>