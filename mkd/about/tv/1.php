<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("predtext", "HRS TV - Бидете во тек со најновите развиени производи на компанијата HRS! Актуелни видеа за новините и можностите на апликативните решенија кои веќе постојат или се во фаза на проектирање. А исто така и најинтересното од животот на компанијата: корпоративни манифестации, средби со партнери и многу друго само на HRS TV.");
$APPLICATION->SetPageProperty("page_type", "tv");
$APPLICATION->SetTitle("HRS TV");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?><?
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
pre($list);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>