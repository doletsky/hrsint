<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$leftHalf=array('SIMPLE_QUESTION_752');
$rightHalf=array('SIMPLE_QUESTION_317');

?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
<h2><?=GetMessage('fill')?></h2>
	<?
	
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion){
	
	
		if($FIELD_SID=='SIMPLE_QUESTION_855'){
	?>
		<input type="hidden" class="styled-input" name="form_text_19" value="" size="0" id="form-city">
	<?
		}
		else{
		
		if($arQuestion['STRUCTURE'][0]['FIELD_TYPE']!='checkbox'){
	?>
		<div class="contacts-line <?if(in_array($FIELD_SID,$leftHalf)){?>half<?}?> <?if(in_array($FIELD_SID,$rightHalf)){?>half<?}?>">
			<p><?=GetMessage($FIELD_SID)?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></p>
			<div class="input-wrap"><?=$arQuestion["HTML_CODE"]?><?#=$FIELD_SID?></div>
			<?#pre($arQuestion)?>
		</div>
		<?/*<tr>
			<td>
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
				<?endif;?>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
			</td>
			<td><?=$arQuestion["HTML_CODE"]?></td>
		</tr>*/?>
	<?}else{?>
			<div class="contacts-line captcha">
					<p><input type="checkbox" name="form_checkbox_<?=$FIELD_SID?>[]" <?if($arResult['arrVALUES']['form_checkbox_'.$FIELD_SID][0]==$arQuestion['STRUCTURE'][0]['ID']) echo 'checked'; ?> required  value="<?=$arQuestion['STRUCTURE'][0]['ID']?>"> 	<?=GetMessage($FIELD_SID)?></p>
					
					
				</div>	
	
		<?}
		}
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y"){
?>
		<div class="contacts-line captcha">
			<p><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?></p>
			<div class="captcha-fields-wrap">
				<div class="input-wrap"><input type="text" name="captcha_word" required size="30" maxlength="50" value="" class="styled-input" /></div>
				<div class="input-captcha"><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="140" height="31" /></div>
			</div>
			<b class="clr"></b>
		</div>
<?
} // isUseCaptcha
?>
	<div class="button-wrap"><input type="submit" name="web_form_submit" value="<?=GetMessage("FORM_ADD")?>" class="styled-button validate" /><input type="hidden" name="web_form_apply" value="Y" /></div>
<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>