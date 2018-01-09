<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$found=false;
$url=null;
foreach($arResult as $arItem){
	if(is_null($url)) $url=$arItem["LINK"];
	if($arItem["SELECTED"]){
		$found=true;
		break;
	}
}
if(!$found) LocalRedirect($url);
?>
<?if (!empty($arResult)):?>
<div class="hor-tabs">
	<ul>
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" class="active"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>
	</ul>
</div>
<?endif?>