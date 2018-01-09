<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<table class="fm-table">
	<tr>

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<td><a href="<?=$arItem["LINK"]?>" class="selected"><p><?=$arItem["TEXT"]?></p></a></td>
	<?else:?>
		<td><a href="<?=$arItem["LINK"]?>"><p><?=$arItem["TEXT"]?></p></a></td>
	<?endif?>

<?endforeach?>
		<td><p class="fm-login"><?=GetMessage("Вход в личный кабинет");?></p></td>
		<td><p class="fm-phone">+7 495 796 99 00</p></td>
	</tr>
</table>
<?endif?>