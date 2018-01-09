<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h3><?=GetMessage("title")?></h3>
<?$onColumn=ceil(count($arResult["ITEMS"])/3);?>
<div class="f-list">
	<ul>
		<?foreach($arResult["ITEMS"] as $i => $arItem){?>
		<?if($i%$onColumn==0 && $i>0){?></ul><ul><?}?>
		<li><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></li>
		<?}?>
	</ul>
</div>