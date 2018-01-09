<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
 
global $APPLICATION;
$list=array();
if( CModule::IncludeModule("iblock") ){
	$arFilter = Array('IBLOCK_ID'=>123, 'ACTIVE'=>'Y');
	$db_list = CIBlockSection::GetList(Array("sort"=>"asc"), $arFilter,true);
	while($ar_result = $db_list->GetNext()){
		// echo $ar_result['ID'].' '.$ar_result['NAME'].': '.$ar_result['ELEMENT_CNT'].'<br>';
		$list[]=array(
			"name" => $ar_result['NAME']
			, "href" => "/mkd/about/tv/".$ar_result['CODE']."/"//$ar_result["DETAIL_PAGE_URL"]
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
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks );
?>