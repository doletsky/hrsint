<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="partners-list">
<?foreach($arResult["ITEMS"] as $arItem){?>
	<div class="pl-item">
		<div class="pl-image">
			<div class="pli-wrap">
				<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>150,"h"=>80))?>" alt="">
			</div>
		</div>
		<div class="pl-links">
			<?foreach($arItem["PROPERTIES"]["URL"]["VALUE"] as $i => $arURL){
				$simple=$arURL;
				if(strpos($arURL,'http://')===false){
					$arURL='http://'.$arURL;
				}
			?>
				<a href="<?=$arURL?>"><?=$simple?></a>
			<?}?>
		</div>
		<div class="pl-description">
			<h2><?=$arItem["NAME"]?></h2>
			<p><?=$arItem["PREVIEW_TEXT"]?></p>
		</div>
	</div>
<?}?>