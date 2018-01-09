<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?foreach($arResult["ITEMS"] as $arItem){
	if(isset($arItem["PREVIEW_PICTURE"]["SRC"])){
?>
<a href="<?if(LANGUAGE_ID!="ru") echo '/eng';?>/about/client/" class="ab-item">
	<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>150,"h"=>75))?>" alt="<?=$arItem["~NAME"]?>">
</a>
<?
	}
}?>