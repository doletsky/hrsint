<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($USER->GetID()==19):?>
    <?echo LANGUAGE_ID;?>
<pre><?print_r($arParams)?></pre>
<?endif?>
<?foreach($arResult["ITEMS"] as $arItem){?>
  <?
  $isLink=false;
  if($arItem["PROPERTIES"]["LINK"]["VALUE"]){
    $isLink=true;
  }
  ?>
  <div class="ms-item">
  	<div class="msr-right">
  		<h2><?=$arItem["NAME"]?></h2>
  		<p><?=$arItem["PREVIEW_TEXT"]?></p>
  		<?if(!$isLink){?><b class="slider-button show-overlay"><?=GetMessage('ask')?></b><?}?>
      <?if($isLink){?><a class="slider-button more" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><i></i><?=GetMessage('more')?></a><?}?>
  	</div>
  	<div class="msr-left">
  		<img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="">
  	</div>
  </div>
<?}?>