<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arSection=$arResult["SECTION"]["PATH"][0];
if(CModule::IncludeModule("iblock")){
	$arFilter = array('IBLOCK_ID' => $arSection['IBLOCK_ID'],"ID"=>$arSection["ID"]);
  $rsSect = CIBlockSection::GetList(array('sort' => 'asc'),$arFilter,false,array("IBLOCK_ID","ID","UF_VERSION"));
  if($arSect = $rsSect->GetNext()){
  	#pre($arSect);
  	$arSection["UF_VERSION"]=$arSect["UF_VERSION"];
  }
}	
?>
<div class="gap47 heading row_b aligned">
    <div class="heading__head item">
        <h2 class="hd_2 noMrg"><?=$arSection["NAME"]?></h2>
    </div>
    <div class="heading__sub item">
        <div class="ver"><?=GetMessage("VERSION")?> <?=$arSection["UF_VERSION"]?></div>
    </div>
    <span class="aligned__under"></span>
</div>
<?#pre($arResult)?>
<div class="gap47 spec1"><?=$arSection["DESCRIPTION"]?></div>
<table class="gap47 toc table">
	<?foreach($arResult["ITEMS"] as $arItem){?>
		<?#pre($arItem)?>
    <tbody>
    	<?
    	$fileCount=count($arItem["PROPERTIES"]["FILES"]["VALUE"]);
    	foreach($arItem["PROPERTIES"]["FILES"]["VALUE"] as $i => $arFile1){?>
        <?
        $arFile=$arItem["DISPLAY_PROPERTIES"]["FILES"]["FILE_VALUE"][$i];
        if($fileCount==1) $arFile=$arItem["DISPLAY_PROPERTIES"]["FILES"]["FILE_VALUE"];
        ?>
        <tr>
        		<?if($i==0){?>
            <td rowspan="<?=$fileCount?>" class="toc__icon-cell">
                <a class="download-icon"></a>
            </td>
            <?}?>
            <td class="toc__content-cell">
                <?if($i==0){?><h4 class="toc__header"><?=$arItem["NAME"]?></h4><?}?>
                <ul class="toc__list">
                    <li class="toc__list-item">
                        <div class="connector">
                            <span class="connector__inner">
                                <a class="toc__list-link" href="<?=$arFile["SRC"]?>" target="_blank">
                                	<?if($arFile["DESCRIPTION"]){?>
                                		<?=$arFile["DESCRIPTION"]?>
                                	<?}else{?>
                                		<?=$arFile["ORIGINAL_NAME"]?>
                                	<?}?>
                                </a>
                            </span>
                        </div>
                    </li>
                </ul>
            </td>
            <?
            $ext=pathinfo($arFile["FILE_NAME"],PATHINFO_EXTENSION);
            ?>
            <td class="toc__stat-cell">
                <div class="toc__stat"><?=strtoupper($ext)?>, <?=sizeFormatted($arFile["FILE_SIZE"])?></div>
            </td>
        </tr>
      <?}?>
    </tbody>
	<?}?>
</table>