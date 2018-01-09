<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="form-notes"><?=$arResult["FORM_NOTE"]?></div>
<div class="vacancies-form <?if($arResult["isFormErrors"] != "Y"){?>dn<?}?>">
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?if (1){
?>
<?=$arResult["FORM_HEADER"]?>
<?
foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion){
	#pre($arQuestion);
	if($arQuestion["STRUCTURE"][0]["FIELD_ID"]==3){
		?><input type="hidden" name="form_text_3" value="" size="0"><?
	}
	else{
?>
	<div class="jl-label">
		<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
		<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
		<?endif;?>
		<?=GetMessage($FIELD_SID)?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
		<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
	</div>
	<div class="jl-text"><?
		switch ($arQuestion["STRUCTURE"][0]["FIELD_ID"]) {
			case 1:
				?>
				<?=GetMessage("please")?>
				<div class="jobs-file">
					<div class="jf-file-input">
						<input name="form_file_1" class="jf-file" size="0" type="file" required>
						<div class="jf-button"><?=GetMessage('choose_file')?></div>
						<div class="jf-label"><?=GetMessage('not15mb')?></div>
						<div class="jf-text"></div>
					</div>
				</div>
				<?
				break;
			case 2:
				?><textarea name="form_textarea_2" cols="40" rows="5" class="styled-input" required></textarea><?
				break;
			case 3:
				?><input type="hidden" name="form_text_3" value="" size="0"><?
				break;
			default:
				# code...
				break;
		}
		#$arQuestion["HTML_CODE"];
	?></div>
<?
	}
} //endwhile
?>
<?
if($arResult["isUseCaptcha"] == "Y"){
?>
	<div class="jl-label"><?=GetMessage('Enter_Captcha')?></div>
	<div class="jl-text">
		<div class="jl-captcha-wrap">
			<div class="jlc-image"><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" class="captcha-sid" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="158" height="35" class="captcha-img" /></div>
			<div class="jlc-refresh"></div>
			<input type="text" name="captcha_word" class="jlc-input" required>
		</div>
		<input type="submit" name="web_form_submit" value="<?=GetMessage('Send_Captcha')?>" class="styled-button">
		<input type="hidden" name="web_form_apply" value="Y" />
	</div>
<?
} // isUseCaptcha
?>
<?/*?>
				<input type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
				<?if ($arResult["F_RIGHT"] >= 15):?>
				&nbsp;<input type="hidden" name="web_form_apply" value="Y" /><input type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" />
				<?endif;?>
				&nbsp;<input type="reset" value="<?=GetMessage("FORM_RESET");?>" />
<?*/?>			
<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>
</div>