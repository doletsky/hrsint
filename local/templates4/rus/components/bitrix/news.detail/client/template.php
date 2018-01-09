<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="bubble-wrapper"><div class="bubble-header"><span><?=$arResult["NAME"]?></span><b class="bubble-close"><i></i></b></div><div class="bubble-content"><?
$img='';
if($arResult["PREVIEW_PICTURE"]){
  $img='<img src="'.MakeImage($arResult["PREVIEW_PICTURE"]["SRC"],array("h"=>135)).'">';
}
echo $arResult["PREVIEW_TEXT"].$img;
?></div></div>