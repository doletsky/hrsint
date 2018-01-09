<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h3><?=GetMessage('title')?></h3>
<?if (!empty($arResult)):?>
<?$onColumn=ceil(count($arResult)/3);?>
<div class="f-list">
	<ul>
<?
foreach($arResult as $i => $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($i%$onColumn==0 && $i>0){?></ul><ul><?}?>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
<?endforeach?>
	</ul>
</div>
<?endif?>