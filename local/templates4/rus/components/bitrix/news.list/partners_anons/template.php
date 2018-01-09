<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem){
	$url='';
	if(isset($arItem["PROPERTIES"]["URL"]["VALUE"][0])){
		$url=$arItem["PROPERTIES"]["URL"]["VALUE"][0];
		if(strpos($url,'http://')===false){
			$url='http://'.$url;
		}
	}
?>
<a href="<?=$url?>" class="ab-item">
	<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>150,"h"=>80))?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>">
</a>
<?}?>