<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="mobile-dropdown-wrap">
	<div class="mdw-inner">
		<select name="" class="contacts-city mobile-dropdown">
<?foreach($arResult["ITEMS"] as $arItem){?>
			<option value="#<?=$arItem["CODE"]?>"><?=$arItem["NAME"]?></option>
<?}?>
		</select>
		<div class="styled-selectbox">
			<em></em>
			<div class="select-button"><i></i></div>
		</div>
	</div>
</div>
<ul class="cl-tabs">
<?foreach($arResult["ITEMS"] as $i => $arItem){?>
<?#pre($arItem)?>
	<?
	$class='';
	if($arItem["CODE"]==$_SESSION["SV"]["CONTACT"] || (!$_SESSION["SV"]["CONTACT"] && $i==0) ){ $class='active'; }?>
	<li><a data-google-coord="<?=$arItem["PROPERTIES"]["GOOGLE"]["VALUE"]?>" href="#<?=$arItem["CODE"]?>" class="<?=$class?>"><?=$arItem["NAME"]?></a></li>
<?}?>
</ul>
<div class="cl-container">
<?foreach($arResult["ITEMS"] as $arItem){?>
	<div class="clc-item" id="<?=$arItem["CODE"]?>">
		<h3><?=$arItem["PROPERTIES"]["INNER_NAME"]["VALUE"]?></h3>
		<?if($arItem["PREVIEW_PICTURE"]){?><div class="clc-image">
			<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>230))?>" alt="">
		</div><?}?>
		<div class="clc-adress"><?=$arItem["PREVIEW_TEXT"]?></div>
	</div>
<?}?>
</div>
<script>
$(document).ready(function(){
	$('.cl-tabs').find('a.active').click();
});
</script>