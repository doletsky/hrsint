<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?#pre($arResult);?>

<div class="solutions-item-wrap">
<?
foreach($arResult["PROPERTIES"]["TEXTBLOCKS"]["VALUE"] as $i => $elementID){
	ShowTextBlockS($arResult["PROPERTIES"]["TEXTBLOCKS"]["LINK_IBLOCK_ID"],$elementID,$arResult);
}
?>
</div>
<?if($arResult["PROPERTIES"]["IS_SOCNETWORK"]["VALUE_XML_ID"]=="Y"){?>
<div class="multi-block">
      <div class="inner-wrapper">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55ce012a8ed5f973" async="async"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_native_toolbox"></div>
      </div>
</div>
<?}?>
<?

function ShowTextBlockS($iblockID,$elementID,$arResult){
      $arSelect = array("IBLOCK_ID"=>$iblockID,"ID"=>$elementID);
      $res = CIBlockElement::GetList(
              array("sort"=>"asc"),
              $arSelect,
              false,
              false,
              array("*","PROPERTY_5","PROPERTY_12","PROPERTY_24","PROPERTY_25","PROPERTY_89","PROPERTY_90","PROPERTY_138","PROPERTY_139","PROPERTY_185","PROPERTY_186","PROPERTY_220","PROPERTY_221", "PROPERTY_246","PROPERTY_247", "PROPERTY_297", "PROPERTY_298")
          );
      if($arItem = $res->GetNext()){

            #pre($arItem);
            if(LANGUAGE_ID=="en"){
                  $iii="PROPERTY_24_ENUM_ID";
            }
            elseif(LANGUAGE_ID=="cz"){
                  $iii="PROPERTY_89_ENUM_ID";
            }
            elseif(LANGUAGE_ID=="bg"){
                  $iii="PROPERTY_138_ENUM_ID";
            }
             elseif(LANGUAGE_ID=="hu"){
                  $iii="PROPERTY_185_ENUM_ID";
            }
             elseif(LANGUAGE_ID=="hr"){
                  $iii="PROPERTY_220_ENUM_ID";
            } elseif(LANGUAGE_ID=="si"){
                  $iii="PROPERTY_246_ENUM_ID";
            } elseif(LANGUAGE_ID=="mk"){
                  $iii="PROPERTY_297_ENUM_ID";
            }
            else{
                  $iii="PROPERTY_5_ENUM_ID";     
            }
            switch($arItem[$iii]){
                  case 12: // в шапке сайта - Первый блок
                  case 26:
                  case 84:
                  case 180:
                  case 239:
				  case 257:
				  case 428:
				  case 412:
?>
<div class="multi-block">
      <div class="inner-wrapper">
      	<div class="si-description">
      		<h4><?=$arItem["NAME"]?></h4>
      		<?=$arItem["PREVIEW_TEXT"]?>
      	</div>
      	<div class="si-buttons">
                  <?#pre($arResult["PROPERTIES"]["IS_COM"]["VALUE_XML_ID"])?>
      		<?if( $arResult["PROPERTIES"]["IS_BRO"]["VALUE_XML_ID"]=="Y" ){?><a href="<?=CFile::GetPath($arResult["PROPERTIES"]["BRO"]["VALUE"])?>" class="sib-book" target="_blank"><i></i><?=GetMessage("DOWNLOAD")?></a><?}?>
      		<?/*if( $arResult["PROPERTIES"]["IS_COM"]["VALUE_XML_ID"]=="Y" ){?><a href="" class="sib-order show-overlay"><i></i><?=GetMessage("ASK_COMM")?></a><?}*/?>
      	</div>
      </div>
</div>
<?
                        break;
                  case 14: // Текст слева, фото справа
                  case 28:
                  case 86:
                  case 182:
                  case 241:
				  case 259:
				  case 414:
				  case 430:
?>
<div class="multi-block">
      <div class="inner-wrapper">
      	<div class="si-left">
                  <?if($arItem["NAME"]){?><h4><?=$arItem["NAME"]?></h4><?}?>
      	      <?=$arItem["PREVIEW_TEXT"]?>
      	</div>
      	<div class="si-right">
      	      <?if($arItem["PREVIEW_PICTURE"]){?><img src="<?=MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>461,"h"=>475,"f"=>"png"))?>" alt=""><?}?>
      	</div>
      </div>
</div>
<?
                        break;
                  case 15: // Текст справа, фото слева
                  case 29:
                  case 87:
                  case 183:
                  case 242:
				  case 260:
				  case 415:
				  case 431:
?>
<div class="si-gear">
      <div class="inner-wrapper">
            <div class="sig-left">
                  <?if($arItem["PREVIEW_PICTURE"]){?><img src="<?=CFile::GetPath($arItem["PREVIEW_PICTURE"])?>" alt=""><?}?>
            </div>
            <div class="sig-right">
                  <?if($arItem["NAME"]){?><h4><?=$arItem["NAME"]?></h4><?}?>
                  <?=$arItem["PREVIEW_TEXT"]?>
            </div>
      </div>
</div>
<?
                        break;
                  case 16: // одна широкая картинка
                  case 30:
                  case 88:
                  case 184:
                  case 243:
				  case 261:
				  case 416:
				  case 432:
?>
<div class="multi-block">
      <?
      if($arItem["PREVIEW_TEXT"]){
      ?>
      <div class="ind-wrapper">
            <div class="inner-full-wrapper">
                  <div class="inner-description">
                        <p><?=$arItem["PREVIEW_TEXT"]?></p>
                  </div>
            </div>
      </div>
      <?
      }
      if($arItem["PREVIEW_PICTURE"]){?>
      <div class="product-big-image resize-bg">
            <img src="<?=CFile::GetPath($arItem["PREVIEW_PICTURE"])?>" alt="">
      </div>
      <?}?>
</div>
<?
                        break;
                  case 17: // Множество текстов - Блок множественных текстов
                  case 31:
                  case 89:
                  case 185:
                  case 244:
				  case 262:
				  case 417:
				  case 433:
                        $langArr=array(
                              'ru'=>12,
                              'en'=>25,
                              'cz'=>90,
                              'bg'=>139,
                              'hu'=>186,
							  'hr'=>221,
							  'si'=>247,
							  'mk'=>298,
                        );
                        $id=$langArr[LANGUAGE_ID];

                        $textsAll=$arItem["PROPERTY_".$id."_VALUE"];
                        $texts=array();
                        $icons=array();
                        $strToIcon=array(
                              "battery"=>"battery.png",
                              "diagram"=>"diagram.png",
                              "settings"=>"settings.png",
                              "check-it"=>"check-it.png",
                              "clock"=>"clock.png",
                              "default"=>"default.png",
                              "cloud"=>"cloud.png",
                              "cloud-in"=>"cloud-in.png"
                        );


?>
<div class="multi-block">
      <div class="inner-wrapper">
            <h4><?=$arItem["NAME"]?></h4>
            <?if($arItem["PREVIEW_TEXT"]){?>
            <div class="tc-inner-description">
                  <p><?=$arItem["PREVIEW_TEXT"]?></p>
            </div>
            <?}
            ?>
      	<div class="si-features">
                  <?foreach($textsAll as $i => $text){?>
      		<div class="sif-item <?if($i%3==0){?>clr<?}?>">
      			<i class="sif-number"><?=$i+1?></i>
      			<?if($arItem["PROPERTY_".$id."_DESCRIPTION"][$i]){?><h4><?=$arItem["PROPERTY_".$id."_DESCRIPTION"][$i]?></h4><?}?>
      			<div class="sif-text"><?=$text["TEXT"]?></div>
      		</div>
                  <?}?>
      	</div>
      </div>
</div>
<?
                        break;
                  default:
?>
<div class="multi-block">
      <div class="inner-wrapper">
            <div class="inner-text">
                  <h4><?=$arItem["NAME"]?></h4>
                  <?=$arItem["PREVIEW_TEXT"]?>
            </div>
      </div>
</div>
<?                 
                        break;
            }
      }
}
?>