<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
 
global $APPLICATION;
$list=array();
if( CModule::IncludeModule("iblock") ){
	$arFilter = Array('IBLOCK_ID'=>127, 'ACTIVE'=>'Y');
	$db_list = CIBlockSection::GetList(Array("sort"=>"asc"), $arFilter, true);
	while($ar_result = $db_list->GetNext()){
		$list[]=array(
			"name" => $ar_result['NAME']
			, "href" => $ar_result["SECTION_PAGE_URL"]
		);
	}
}
 
foreach($list as $item){
	$aMenuLinksExt[]=array(
			$item["name"]
			, $item["href"]
			, array()
			, array("FROM_IBLOCK"=> 1, "IS_PARENT" => false, "DEPTH_LEVEL" => "1")
	);
}
 
// pre($aMenuLinksExt);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt );
?>