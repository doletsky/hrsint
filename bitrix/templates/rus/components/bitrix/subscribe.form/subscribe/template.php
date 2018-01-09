<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h3><?=GetMessage("title")?></h3>
<form action="<?=$arResult["FORM_ACTION"]?>" method="POST" class="f-subscribe">
	<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
	<input type="hidden" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>" />
	<?endforeach;?>
	<p class="subscribe-ie-tip"><?=GetMessage("subscr_form_name_title")?></p>
	<div class="subscribe-input">
		<input type="text" name="sf_NAME" placeholder="<?=GetMessage("subscr_form_name_title")?>" required>
	</div>
	<p class="subscribe-ie-tip"><?=GetMessage("subscr_form_email_title")?></p>
	<div class="subscribe-input">
		<input type="email" name="sf_EMAIL" value="<?=$arResult["EMAIL"]?>" placeholder="<?=GetMessage("subscr_form_email_title")?>" required>
		<input type="submit" class="subscribe-submit" name="OK" value="">
	</div>
</form>

