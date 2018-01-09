<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="mobile-dropdown-wrap">
	<div class="mdw-inner">
		<select name="" class="mobile-dropdown">
<?foreach($arResult as $arItem){?>
			<option value="<?=$arItem["LINK"]?>" <?if($arItem["SELECTED"]){?>class="active"<?}?>><?=$arItem["TEXT"]?></option>
<?}?>
		</select>
		<div class="styled-selectbox">
			<em></em>
			<div class="select-button"><i></i></div>
		</div>
	</div>
</div>
<div class="news-left">
	<div class="news-tabs-wrap">
		<ul class="news-tabs">
<?foreach($arResult as $arItem){?>
			<li><a href="<?=$arItem["LINK"]?>" <?if($arItem["SELECTED"]){?>class="active"<?}?>><?=$arItem["TEXT"]?></a></li>
<?}?>
		</ul>
	</div>
</div>