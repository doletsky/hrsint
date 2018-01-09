<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$count=count($arResult["ITEMS"]);
if($count==1){
	LocalRedirect($arResult["ITEMS"][0]["DETAIL_PAGE_URL"]);
}
else{
#pre($arResult);
$columns=array('','one','two','three','four','five','six','seven','eight');
?>
<ul class="mobile-solutions">
<?
foreach($arResult["ITEMS"] as $arItem){
?>
	<li><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></li>
<?
}
?>
</ul>
<table class="business-type solutions-table <?=$columns[count($arResult["ITEMS"])]?>-column">
	<tr>
<?
foreach($arResult["ITEMS"] as $arItem){
?>
		<td>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<div class="st-title-wrap">
					<div class="st-title"><?=$arItem["NAME"]?></div>
				</div>
				<div class="st-image">
					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""><b></b>
				</div>
			</a>
		</td>
<?}?>
	</tr>
</table>
<?}?>