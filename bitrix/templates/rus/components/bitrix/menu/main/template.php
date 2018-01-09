<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$main=array(
	'ru' => '/rus/',
	'en' => '/eng/',
	'cz' => '/cze/',
	'si' => '/svn/',
	'mk' => '/mkd/',
);
?>
<?if (!empty($arResult)):?>
<div class="main-nav">
	<table>
		<tr>
			<td><b class="mni-wrap">
				<a href="<?=$main[LANGUAGE_ID]?>" title="Главная"><i></i></a>
			</b></td>
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<td><b class="mni-wrap">
				<a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]){?>active<?}?>"><span><?=$arItem["TEXT"]?></span><i></i></a>
				<div class="mn-nested-wrap">
					<ul class="mn-nested">
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<td><b class="mni-wrap">
					<a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]){?>active<?}?>"><span><?=$arItem["TEXT"]?></span></a>
				</b></td>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]){?>active<?}?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></div></b></td>", ($previousLevel-1) );?>
<?endif?>

		</tr>
	</table>
</div>
<?endif?>