<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="team-wrapper">
	<div class="inner-wrapper">
		<div class="team-photo">
			<div class="tp-wrapper">
				<img src="<?=MakeImage($arResult["PREVIEW_PICTURE"]["SRC"],array("w"=>400))?>" alt="">
			</div>
		</div>
		<div class="team-description">
			<h3 class="tt-header"><?=$arResult["NAME"]?></h3>
			<p class="tt-role"><?=$arResult["PROPERTIES"]["POSITION"]["VALUE"]?></p>
			<div class="tt-text"><p><?=$arResult["PREVIEW_TEXT"]?><p></div>
		</div>
		<b class="clr"></b>
	</div>
</div>
