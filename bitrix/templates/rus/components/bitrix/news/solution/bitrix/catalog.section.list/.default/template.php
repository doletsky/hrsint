<?
#pre($arResult);
if(count($arResult["SECTIONS"])){
$columns=array('','one','two','three','four','five','six','seven','eight');
$isInner=false;
if(isset($arResult["SECTION"]["ID"]) && $arResult["SECTION"]["ID"]){
	$isInner=true;
}
?>
<ul class="mobile-solutions">
<?
foreach($arResult["SECTIONS"] as $arSection){
?>
	<li><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></li>
<?
}
?>
</ul>
<table class="business-type solutions-table <?=$columns[count($arResult["SECTIONS"])]?>-column">
	<tr>
<?
foreach($arResult["SECTIONS"] as $arSection){
?>
		<td class="<?=$arSection["UF_CLASS"]?>">
			<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
				<div class="st-title-wrap">
					<div class="st-title"><?if(!$isInner){?><i></i><?}?><?=$arSection["NAME"]?></div>
				</div>
				<div class="st-image">
					<img src="<?=$arSection["PICTURE"]["SRC"]?>" alt=""><b></b>
				</div>
			</a>
		</td>
<?}?>
	</tr>
</table>
<?}?>