<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$leftHalf=array('SIMPLE_QUESTION_342','SIMPLE_QUESTION_641','SIMPLE_QUESTION_379','SIMPLE_QUESTION_774');
$rightHalf=array('SIMPLE_QUESTION_451','SIMPLE_QUESTION_962','SIMPLE_QUESTION_491','SIMPLE_QUESTION_419');
?>
<div class="of-wrapper">
	<div class="of-body">
		<div class="of-text">
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>
		</div>
<?if ($arResult["isFormNote"] != "Y"){
?>

<?=$arResult["FORM_HEADER"]?>

<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>

	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion){
		//print_r($arQuestion);
		if($FIELD_SID=='SIMPLE_QUESTION_863'){ // URL
			?>
			<input type="hidden" class="inputtext" name="form_text_13" value="<?=$APPLICATION->GetCurUri()?>" size="0">
			<?
		}elseif($FIELD_SID=='SIMPLE_QUESTION_133'){
			?>
			<input type="hidden" class="inputtext" name="form_text_27" value="<?=$APPLICATION->GetCurUri()?>" size="0">
			<?
		}else{
			if($arQuestion['STRUCTURE'][0]['FIELD_TYPE']!='checkbox'){
			?>
				<div class="contacts-line <?if(in_array($FIELD_SID,$leftHalf)){?>left-half<?}?> <?if(in_array($FIELD_SID,$rightHalf)){?>right-half<?}?>">
					<p><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></p>
					<?if(in_array($FIELD_SID,array('SIMPLE_QUESTION_641','SIMPLE_QUESTION_774'))){?>
						<div class="mdw-inner"><?=$arQuestion["HTML_CODE"]?>
							<div class="styled-selectbox">
								<em></em>
								<div class="select-button"><i></i></div>
							</div>
						</div>
					<?}else{?>
						<div class="input-wrap"><?=$arQuestion["HTML_CODE"]?><?#=$FIELD_SID?></div>
					<?}?>
				</div>
			<?}else{?>
				<div class="contacts-line captcha">
					<p><input type="checkbox" name="form_checkbox_<?=$FIELD_SID?>[]" <?if($arResult['arrVALUES']['form_checkbox_'.$FIELD_SID][0]==$arQuestion['STRUCTURE'][0]['ID']) echo 'checked'; ?> required  value="<?=$arQuestion['STRUCTURE'][0]['ID']?>"> 	<?=$arQuestion['CAPTION']?></p>
					
					<b class="clr"></b>
				</div>	
			<?
		
			}
		}
	} //endwhile
	?>
	

	
	
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
	<div class="contacts-line captcha">
		<p><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></p>
		<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
		<div class="captcha-fields-wrap">
			<div class="input-wrap"><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="styled-input" required /></div>
			<div class="input-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></div>
		</div>
		<b class="clr"></b>
	</div>
		
<?
} // isUseCaptcha
?>



<div class="button-wrap"><input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" class="styled-button validate" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
<?if ($arResult["F_RIGHT"] >= 15):?><input type="hidden" name="web_form_apply" value="Y" /><?/*<input type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" />*/?>
<?endif;?>
<?/*&nbsp;<input type="reset" value="<?=GetMessage("FORM_RESET");?>" />*/?>
</div><b class="clr"></b>
			
<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>
	</div>
</div>