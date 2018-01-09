<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
global $USER;

$units=array();
$items=array();

foreach($arResult["ITEMS"] as $arItem){
	$unit=$arItem["PROPERTIES"]["UNIT"];
	$units[$unit["VALUE_XML_ID"]]=$unit["VALUE"];
	$items[$unit["VALUE_XML_ID"]][]=$arItem;
}

ksort($items);
?>
<div class="inner-wrapper w961">
<?
$unitI=0;
foreach ($items as $unit => $arItems) {
	$unitI++;
	if($unitI==1){
?>
	<div class="product-category">
		<h6><?=$units[$unit]?></h6>
		<div class="products-matrix">
<?
		$count=count($arItems);
		if($count){
?>
			<div class="pm-line">
<?
			for($i=0;$i<=1;$i++){
				$arItem=$arItems[$i];
?>
				<div class="pm-item size-half">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<?if($arItem["PREVIEW_PICTURE"]["SRC"]){?><img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>400,"h"=>350,"f"=>"png"))?>" alt=""><?}?>
						<span class="pm-overlay"></span>
						<div class="pm-logo">
							<?if($arItem["PROPERTIES"]["IS_MICROS"]["VALUE_XML_ID"]=="Y"){?>
							<div class="pm-image">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/ph/product_list_logo_01.png" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/ph/product_list_logo_01_active.png" alt="">
							</div>
							<?}?>
							<p class="pm-title"><?=$arItem["NAME"]?></p>
						</div>
						<div class="pm-description"><?=$arItem["PREVIEW_TEXT"]?></div>
						<i class="pm-next"></i>
						<div class="pm-type">
							<?foreach($arItem["PROPERTIES"]["TAG"]["VALUE_XML_ID"] as $tag){?>
							<i class="pmt-<?=$tag?>"></i>
							<?}?>
						</div>
						<?#pre($arItem["PROPERTIES"]["TAG"])?>
					</a>
				</div>
<?
			}
?>
			</div>
<?
			if($count>2){
?>
			<div class="pm-line">
<?
				for($i=0;$i<=$count-3;$i++){
					$arItem=$arItems[$i+2];
?>
					<div class="pm-item size-fourth">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>178,"h"=>178,"f"=>"png"))?>" alt="">
							<span class="pm-overlay"></span>
							<div class="pm-logo">
								<?if($arItem["PROPERTIES"]["IS_MICROS"]["VALUE_XML_ID"]=="Y"){?>
								<div class="pm-image">
									<img src="<?=SITE_TEMPLATE_PATH?>/images/ph/product_list_logo_01.png" alt="">
									<img src="<?=SITE_TEMPLATE_PATH?>/images/ph/product_list_logo_01_active.png" alt="">
								</div>
								<?}?>
								<p class="pm-title"><?=$arItem["NAME"]?></p>
							</div>
							<div class="pm-description"><?=$arItem["PREVIEW_TEXT"]?></div>
							<div class="pm-type">
							<?foreach($arItem["PROPERTIES"]["TAG"]["VALUE_XML_ID"] as $tag){?>
							<i class="pmt-<?=$tag?>"></i>
							<?}?>
							</div>
							<i class="pm-next"></i>
						</a>
					</div>
<?
					if($i%4==3){
?>
			</div>
			<div class="pm-line">
			
<?
					}
				}
?>
			</div>
<?
			}
		}
?>
		</div>
	</div>
<?
	}
	else{ // not first
?>
	<div class="product-category">
		<h6><?=$units[$unit]?></h6>
		<div class="products-matrix">
<?
		$count=count($arItems);
		if($count){
?>
			<div class="pm-line">
<?
			foreach( $arItems as $i => $arItem ){
?>
				<div class="pm-item size-third">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<?if($arItem["PREVIEW_PICTURE"]["SRC"]){?><img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>178,"h"=>178,"f"=>"png"))?>" alt=""><?}?>
						<span class="pm-overlay"></span>
						<div class="pm-logo">
							<?if($arItem["PROPERTIES"]["IS_MICROS"]["VALUE_XML_ID"]=="Y"){?>
							<div class="pm-image">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/ph/product_list_logo_01.png" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/ph/product_list_logo_01_active.png" alt="">
							</div>
							<?}?>
							<p class="pm-title"><?=$arItem["NAME"]?></p>
						</div>
						<div class="pm-description"><?=$arItem["PREVIEW_TEXT"]?></div>
						<i class="pm-next"></i>
						<div class="pm-type">
							<?foreach($arItem["PROPERTIES"]["TAG"]["VALUE_XML_ID"] as $tag){?>
							<i class="pmt-<?=$tag?>"></i>
							<?}?>
						</div>
					</a>
				</div>
<?
				if($i%3==2){
?>
			</div>
			<div class="pm-line">
			
<?
				}
			}
?>
			</div>
<?
		}
?>
		</div>
	</div>
<?
	}
}
#pre($units);
?>
</div>