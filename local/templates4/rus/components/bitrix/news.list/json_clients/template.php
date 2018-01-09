<?
$out=array();
$cities=array();
$points=array();
foreach($arResult["ITEMS"] as $arItem){
	#$res = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
	$langArr=array(
		'ru' => 11,
		'en' => 27,
		'cz' => 45,
		'bg' => 64,
		'hu' => 78,
		'hr' => 92
	);
	$arFilter=array("IBLOCK_ID"=>$langArr[LANGUAGE_ID], "ID"=>$arItem["IBLOCK_SECTION_ID"],"ACTIVE"=>"Y");
	$res=CIBlockSection::GetList(array("SORT"=>"ASC"),$arFilter,false,array("ID","IBLOCK_ID","NAME","UF_LNT_LAT"));
	if($ar_res = $res->GetNext()){
		$city=$ar_res['NAME'];
		$cityLngLat=$ar_res["UF_LNT_LAT"];
		$cities[$city]=$ar_res["ID"];
		ksort($cities);
		// точки
		$img='';
		if($arItem["PREVIEW_PICTURE"]){
			$img='<img src="'.MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("h"=>135)).'">';
		}
		$propertyID=array(
			'ru' => 15,
			'en' => 46,
			'cz' => 83,
			'bg' => 144,
			'hu' => 181,
			'hr' => 211
		);
		$points[$ar_res["ID"]][]=array(
			"latLng" => $arItem["PROPERTIES"]["GOOGLE"]["VALUE"] //$arItem["PROPERTY_".$propertyID[LANGUAGE_ID]]
			, "city" => $city
			, "city_lnglat" => $cityLngLat
			, "type" => $arItem["PROPERTIES"]["BUSINESS_TYPE"]["VALUE_XML_ID"]
			, "title" => $arItem["NAME"]
			, "html" => ''//$arItem["PREVIEW_TEXT"].$img
			, "ID" => $arItem["ID"]
			, "IBLOCK_ID" => $arItem["IBLOCK_ID"]
		);
	}
}
#pre($ar_res);
foreach($cities as $cityName => $cityID){
	foreach($points[$cityID] as $arItem){
		$out[]=$arItem;
	}
}
echo json_encode($out);
?>