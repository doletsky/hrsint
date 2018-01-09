<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("predtext", "Будьте в курсе последних разработок компании HRS! Актуальные видеоролики о новинках и возможностях программных решений. Существующих и находящихся в стадии проектирования. А также самое интересное из жизни компании: корпоративные мероприятия, встречи с партнерами и многое другое только на HRS TV.");
$APPLICATION->SetPageProperty("page_type", "tv");
$APPLICATION->SetTitle("HRS TV");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?>
<?
global $APPLICATION;
$list=array();
if( CModule::IncludeModule("iblock") ){
  $arFilter = Array('IBLOCK_ID'=>4, 'ACTIVE'=>'Y');
  $db_list = CIBlockSection::GetList(Array("sort"=>"asc"), $arFilter,true);
  while($ar_result = $db_list->GetNext()){
    // echo $ar_result['ID'].' '.$ar_result['NAME'].': '.$ar_result['ELEMENT_CNT'].'<br>';
    $list[]=array(
      "name" => $ar_result['NAME']
      , "href" => "/svn/about/tv/".$ar_result['CODE']."/"//$ar_result["DETAIL_PAGE_URL"]
    );
  }
}
pre($list);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>