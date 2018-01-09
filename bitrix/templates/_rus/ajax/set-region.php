<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
session_start();
if(count($_POST)){
  #print_r($_POST);

  $cities=array(
    'SPB'=>'Санкт-Петербург',
    'Moscow'=>'Москва',
    'Sochi'=>'Сочи',
    'Krasnodar'=>'Краснодар',
    'Kazan'=>'Казань',
    'EKB'=>'Екатеринбург',
    'NSIB'=>'Новосибирск',
    'Vladivostok'=>'Владивосток'
  );

  $_SESSION["SV"]["TITLE"]=$_POST["region"];
  $uid=$_POST["uid"];
  $arr=explode("-",str_replace("_"," ",$uid));
  switch(count($arr)){
    case 1:
      $_SESSION["SV"]["CONTINENT"]=$arr[0];
      $_SESSION["SV"]["COUNTRY"]='';
      $_SESSION["SV"]["CITY"]='';
      break;
    case 2:
      $_SESSION["SV"]["CONTINENT"]=$arr[0];
      $_SESSION["SV"]["COUNTRY"]=$arr[1];
      $_SESSION["SV"]["CITY"]='';
      break;
    case 3:
      $_SESSION["SV"]["CONTINENT"]=$arr[0];
      $_SESSION["SV"]["COUNTRY"]=$arr[1];
      $_SESSION["SV"]["CITY"]=$arr[2];
      $_SESSION["GEOIP"]["city"]=$cities[$arr[2]];
      break;
  }

  $_SESSION["SV"]["UID"]=$_POST["uid"];
}
$APPLICATION->IncludeFile("geoip.php");
// Always
if(1 || $_SESSION["SV"]["LANG"]!=$_POST["lang"]){
  $langArr=array(
    'ru' => '/rus/',
    'en' => '/eng/',
    'cz' => '/cze/',
    'bg' => '/bgr/',
    'hu' => '/hun/',
    'hr' => '/hrv/',
  );
?>
<script type="text/javascript">
  window.location.replace("<?=$langArr[$_SESSION["SV"]["LANG"]]?>");
</script>
<?
}
#print_r($_SESSION["SV"]);



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");