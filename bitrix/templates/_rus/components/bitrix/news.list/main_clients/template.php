<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?#pre($arResult)?>
<div class="ip-controls">
	<h3><?=GetMessage('title')?></h3>
	<b class="ip-left"><i></i></b>
	<b class="ip-right"><i></i></b>
</div>
<div class="ip-slider">
	<div class="ip-ribbon">
		<?foreach($arResult["ITEMS"] as $arItem){
			if(isset($arItem["PREVIEW_PICTURE"]["SRC"])){
		?>
		<a href="<?if(LANGUAGE_ID!="ru"){echo '/eng';}else{echo '/rus';}?>/about/client/" class="ip-item">
			<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>150,"h"=>75))?>" alt="<?=$arItem["~NAME"]?>">
			<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>150,"h"=>75,"fltr"=>array("gray")))?>" alt="<?=$arItem["~NAME"]?>">
		</a>
		<?
			}
		}
		?>
	</div>
</div>