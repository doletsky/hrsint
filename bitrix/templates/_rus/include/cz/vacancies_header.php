<div class="inner-wrapper"> 
	<div class="jobs-wrapper">
		<?$APPLICATION->IncludeComponent("bitrix:form", "vacancies", array(
			"START_PAGE" => "new",
			"SHOW_LIST_PAGE" => "N",
			"SHOW_EDIT_PAGE" => "N",
			"SHOW_VIEW_PAGE" => "Y",
			"SUCCESS_URL" => "",
			"WEB_FORM_ID" => "1",
			"RESULT_ID" => "",
			"SHOW_ANSWER_VALUE" => "N",
			"SHOW_ADDITIONAL" => "N",
			"SHOW_STATUS" => "Y",
			"EDIT_ADDITIONAL" => "N",
			"EDIT_STATUS" => "N",
			"NOT_SHOW_FILTER" => array(
				0 => "",
				1 => "",
			),
			"NOT_SHOW_TABLE" => array(
				0 => "",
				1 => "",
			),
			"IGNORE_CUSTOM_TEMPLATE" => "N",
			"USE_EXTENDED_ERRORS" => "Y",
			"SEF_MODE" => "N",
			"SEF_FOLDER" => "/cze/about/vacancies/",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "3600",
			"CHAIN_ITEM_TEXT" => "",
			"CHAIN_ITEM_LINK" => "",
			"AJAX_OPTION_ADDITIONAL" => "",
			"VARIABLE_ALIASES" => array(
				"action" => "action",
			)
			),
			false
		);?>
		<?
		$selectedCity=null;
		$cities=array();
		$propertyEnums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>41, "CODE"=>"CITY"));
		while($enumFields = $propertyEnums->GetNext()){
			if(is_null($selectedCity) || $enumFields["ID"]==$_REQUEST["city"]){
				$selectedCity=$enumFields["ID"];
			}
			$cities[$enumFields["ID"]]=$enumFields["VALUE"];

		}
		?>
		<div class="choice-region">
			<span class="cr-label">Váš region:</span>
			<form id="city-form">
			<select class="styled-select" name="city" id="city-select">
				<?foreach($cities as $code=>$city){?>
				<option value="<?=$code?>" <?if($selectedCity==$code){?>selected<?}?>><?=$city?></option>
				<?}?>
			</select>
			</form>
		</div>
		<?$GLOBALS["vacanciesFilter"]=array("PROPERTY_CITY"=>$selectedCity);?>
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "vacancies", array(
			"IBLOCK_TYPE" => "cze_dir",
			"IBLOCK_ID" => "41",
			"NEWS_COUNT" => "200",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "SORT",
			"SORT_ORDER2" => "ASC",
			"FILTER_NAME" => "vacanciesFilter",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "CITY",
				1 => "RESPONSIBILIY",
				2 => "REQUIREMENTS",
				3 => "OFFER",
				4 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "N",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"PAGER_TITLE" => "Новости",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"AJAX_OPTION_ADDITIONAL" => ""
			),
			false
		);?>
		
	</div>