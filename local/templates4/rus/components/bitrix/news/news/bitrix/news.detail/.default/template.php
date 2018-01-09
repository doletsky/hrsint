<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?#pre($arResult)?>
<div class="text-content">
	<h2><?=$arResult["NAME"]?></h2>
	<div class="news-item-header">
		<div class="nih-date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
<?
$tags=array();
if(CModule::IncludeModule("search")) {
	$tags=tags_prepare($arResult["TAGS"]);
}?>

		<div class="nih-tags">
<?foreach ($tags as $tag) {?>
			<a href="<?=$arResult["LIST_PAGE_URL"]?>?arrFilter_ff[TAGS]=<?=str_replace(' ','+',$tag)?>&set_filter=Y"><?=$tag?></a>
<?}?>
		</div>
	</div>
	<h3><?=$arResult["PREVIEW_TEXT"]?></h3>
<?if($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]){?>
	<div class="zoom-slider">
		<div class="zs-slider">
			<b class="zs-up"><i></i></b>
			<div class="zs-container">
				<div class="zs-ribbon">
<?foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $photoID) {?>
					<div class="zs-item" data-big-image="<?=MakeImage($photoID,array("w"=>811,"h"=>470,"zc"=>0))?>"><i></i><img src="<?=MakeImage($photoID,array("w"=>120,"h"=>120,"zc"=>1))?>" alt=""></div>
<?}?>
				</div>
			</div>
			<b class="zs-down"><i></i></b>
		</div>
		<div class="zs-image"></div>
	</div>
<?}?>
<?=$arResult["DETAIL_TEXT"]?>

<?if($arResult["PROPERTIES"]["IS_SOCNETWORK"]["VALUE_XML_ID"]=="Y"){?>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<div class="addthis_sharing_toolbox"></div>
<?}?>

</div>
<?/*
<div class="news-share">
	<div class="mobile-inner">
		<p>Поделиться новостью:</p>
		<div class="ns-buttons"></div>
		<a href="" class="print-version">Версия для печати</a>
		<div class="clr"></div>
	</div>
</div>*/?>
<div class="back-to-all">
	<div class="mobile-inner">
		<a href="<?=$arResult["LIST_PAGE_URL"]?>"><?=GetMessage('back')?></a>
	</div>
</div>