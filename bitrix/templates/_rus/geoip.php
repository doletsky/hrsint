<?
if(isset($_REQUEST["debug"])){
  unset($_SESSION["SESS_IP"],$_SESSION["GEOIP"],$_SESSION["SV"]);
  #$_SERVER["HTTP_X_REAL_IP"]="193.25.120.235"; 
  #$_SERVER["HTTP_X_REAL_IP"]="84.54.136.254";
  #$_SERVER["HTTP_X_REAL_IP"]="196.25.255.250"; // south africa
  #$_SERVER["HTTP_X_REAL_IP"]="185.118.48.170";
  $_SERVER["HTTP_X_REAL_IP"]="89.249.207.65";//armenia
}
#$_SERVER["REMOTE_ADDR"]="46.148.184.183";

#$_SERVER["HTTP_X_REAL_IP"]="84.54.136.254";//bulgarian
#$_SERVER["HTTP_X_REAL_IP"]="178.124.180.246";//belarus
#$_SERVER["HTTP_X_REAL_IP"]="89.249.207.65";//armenia
#$_SERVER["HTTP_X_REAL_IP"]="85.132.36.35";//azer
#$_SERVER["HTTP_X_REAL_IP"]="213.157.39.202";//kaz
#if(isset($_REQUEST["debug"])) $_SERVER["HTTP_X_REAL_IP"]="188.129.255.226";//грузия
#$_SERVER["HTTP_X_REAL_IP"]="188.129.255.226";//грузия
#$_SERVER["HTTP_X_REAL_IP"]="84.237.218.116";//латвия
#$_SERVER["HTTP_X_REAL_IP"]="78.56.162.124";//литва
#$_SERVER["HTTP_X_REAL_IP"]="93.116.49.221";//молдова
#$_SERVER["HTTP_X_REAL_IP"]="212.5.221.25";//словакия
#$_SERVER["HTTP_X_REAL_IP"]="193.25.120.235";//украина
#$_SERVER["HTTP_X_REAL_IP"]="82.117.158.1";//чехия
#$_SERVER["HTTP_X_REAL_IP"]="213.219.114.106";//эстония
#$_SERVER["HTTP_X_REAL_IP"]="212.112.102.43";//кыргызстан
#$_SERVER["HTTP_X_REAL_IP"]="103.26.192.163";//монголия
#$_SERVER["HTTP_X_REAL_IP"]="217.11.185.226";//таджикистан
#$_SERVER["HTTP_X_REAL_IP"]="217.174.227.154";//Туркменистан
#$_SERVER["HTTP_X_REAL_IP"]="213.230.91.11";//Узбекистан
#$_SERVER["HTTP_X_REAL_IP"]="196.25.255.250"; // south africa
#$_SERVER["HTTP_X_REAL_IP"]="";//
#$_SERVER["HTTP_X_REAL_IP"]="";//
#$_SERVER["HTTP_X_REAL_IP"]="";//
if (!$loader = @include $_SERVER["DOCUMENT_ROOT"] . '/local/lib/GeoIP2-php-master/vendor/autoload.php') {
  echo '<!--!!!-->';
}
use GeoIp2\Database\Reader;

if(!isset($_SESSION["SV"]["CONTINENT"]) || $_REQUEST["clear_cache"]=="Y"){

  $APPLICATION->IncludeComponent("altasib:altasib.geoip", "geo", Array(),false);

  try{
    $reader = new Reader($_SERVER["DOCUMENT_ROOT"] . "/local/lib/GeoIP2-php-master/maxmind-db/GeoLite2-City.mmdb");
    $record = $reader->city($_SERVER["HTTP_X_REAL_IP"]);
    $_SESSION["SV"]["CONTINENT"]=$record->continent->name;
    $_SESSION["SV"]["COUNTRY"]=$record->country->name;
    $_SESSION["SV"]["CITY"]=$record->city->name;
  }
  catch( Exception $e ){
    $_SESSION["SV"]["CONTINENT"]="Europe";
    $_SESSION["SV"]["COUNTRY"]="Russia";
    $_SESSION["SV"]["CITY"]="Moscow";
  }
}
switch($_SESSION["SV"]["CONTINENT"]){
  ###################################
  case "Oceania":
    $lang="en";
    #$contact="moscow";
    #$region="moscow";
    $contact="prague";
    $region="prague";
    $uid="Oceania";
    break;
  ###################################
  case "Asia":
    $lang="en";
    #$contact="moscow";
    #$region="moscow";
    #$uid="Europe-Russia-Moscow";
    $contact="prague";
    $region="prague";
    $uid="Europe-Czech_Republic";
    switch($_SESSION["SV"]["COUNTRY"]){
      case "Azerbaijan":
        $lang="en";
        $contact="baku";
        $region="baku";
        $uid="Asia-Azerbaijan";
        break;
      case "Armenia":
        $lang="en";
        $contact="tbilisi";
        $region="tbilisi";
        $uid="Asia-Armenia";
        break;
      case "Georgia":
        $lang="en";
        $contact="tbilisi";
        $region="tbilisi";
        $uid="Asia-Georgia";
        break;
      case "Kazakhstan":
        $lang="ru";
        $contact="almaty";
        $region="almaty";
        $uid="Asia-Kazakhstan";
        break;
      case "Kyrgyzstan":
        $lang="ru";
        $contact="almaty";
        $region="almaty";
        $uid="Asia-Kyrgyzstan";
        break;
      case "Mongolia":
        $lang="en";
        $contact="novosibirsk";
        $region="novosibirsk";
        $uid="Asia-Mongolia";
        break;
      case "Tajikistan":
        $lang="ru";
        $contact="almaty";
        $region="almaty";
        $uid="Asia-Tajikistan";
        break;
      case "Turkmenistan":
        $lang="ru";
        $contact="almaty";
        $region="almaty";
        $uid="Asia-Turkmenistan";
        break;
      case "Uzbekistan":
        $lang="ru";
        $contact="tashkent";
        $region="tashkent";
        $uid="Asia-Uzbekistan";
        break;
    }
    break;
  ###################################
  case "North America":
    $lang="en";
    #$contact="moscow";
    #$region="moscow";
    #$uid="Europe-Russia-Moscow";
    $contact="prague";
    $region="prague";
    $uid="Europe-Czech_Republic";
    break;
  ###################################
  case "Africa":
    $lang="en";
    #$contact="moscow";
    #$region="moscow";
    #$uid="Europe-Russia-Moscow";
    $contact="prague";
    $region="prague";
    $uid="Europe-Czech_Republic";
    break;
  ###################################
  case "Europe":
    $lang="en";
    #$contact="moscow";
    #$region="moscow";
    #$uid="Europe-Russia-Moscow";
    $contact="prague";
    $region="prague";
    $uid="Europe-Czech_Republic";
    switch($_SESSION["SV"]["COUNTRY"]){
      case "Belarus":
        $lang="ru";
        $contact="minsk";
        $region="minsk";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Latvia":
        $lang="en";
        $contact="vilnius";
        $region="vilnius";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Republic_of_Lithuania":
        $lang="en";
        $contact="riga";
        $region="riga";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".str_replace(" ","_",$_SESSION["SV"]["COUNTRY"]);
        break;
      case "Republic_of_Moldova":
        $lang="en";
        $contact="kyiv";
        $region="kyiv";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".str_replace(" ","_",$_SESSION["SV"]["COUNTRY"]);
        break;
      case "Russia":
        $lang="ru";
        $contact="moscow";
        $region="moscow";
        $uid="Europe-Russia-Moscow";
        switch($_SESSION["GEOIP"]["city"]){
          case "Москва":
            $contact="moscow";
            $region="moscow";
            $uid="Europe-Russia-Moscow";
            break;
          case "Санкт-Петербург":
            $contact="saint-petersburg";
            $region="saint-petersburg";
            $uid="Europe-Russia-SPB";
            break;
          case "Сочи":
            $contact="sochi";
            $region="sochi";
            $uid="Europe-Russia-Sochi";
            break;
          case "Краснодар":
            $contact="krasnodar";
            $region="krasnodar";
            $uid="Europe-Russia-Krasnodar";
            break;
          case "Казань":
            $contact="kazan";
            $region="kazan";
            $uid="Europe-Russia-Kazan";
            break;
          case "Екатеринбург":
            $contact="yekaterinburg";
            $region="yekaterinburg";
            $uid="Europe-Russia-EKB";
            break;
          case "Новосибирск":
            $contact="novosibirsk";
            $region="novosibirsk";
            $uid="Europe-Russia-NSIB";
            break;
          case "Владивосток":
            $contact="vladivostok";
            $region="vladivostok";
            $uid="Europe-Russia-Vladivostok";
            break;
        }
        break;
      case "Slovak Republic":
        $lang="cz";
        $contact="prague";
        $region="prague";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".str_replace(" ","_",$_SESSION["SV"]["COUNTRY"]);
        break;
      case "Ukraine":
        $lang="ru";
        $contact="kyiv";
        $region="kyiv";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Czech Republic":
        $lang="cz";
        $contact="prague";
        $region="prague";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".str_replace(" ","_",$_SESSION["SV"]["COUNTRY"]);
        break;
      case "Estonia":
        $lang="en";
        $contact="tallinn";
        $region="tallinn";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Bulgaria":
        $lang="bg";
        $contact="sofia";
        $region="sofia";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Hungary":
        $lang="hu";
        $contact="budapest";
        $region="budapest";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Croatia":
        $lang="hr";
        $contact="zagreb";
        $region="zagreb";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Slovenia":
        $lang="hu";
        $contact="budapest";
        $region="budapest";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Bosnia and Herzegovina":
        $lang="hu";
        $contact="budapest";
        $region="budapest";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Macedonia":
        $lang="hu";
        $contact="budapest";
        $region="budapest";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Kosovo":
        $lang="hu";
        $contact="budapest";
        $region="budapest";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
      case "Albania":
        $lang="hu";
        $contact="budapest";
        $region="budapest";
        $uid=$_SESSION["SV"]["CONTINENT"]."-".$_SESSION["SV"]["COUNTRY"];
        break;
    }
    break;
}
$toRedirect=null;
if(!isset($_SESSION["SV"]["LANG"]) || $APPLICATION->GetCurPage()=='/'){
  switch ($lang) {
    case 'en':
      $toRedirect='/eng/';
      break;
    case 'ru':
      $toRedirect='/rus/';
      break;
    case 'cz':
      $toRedirect='/cze/';
      break;
    case 'bg':
      $toRedirect='/bgr/';
      break;
    case 'hu':
      $toRedirect='/hun/';
      break;
    case 'hr':
      $toRedirect='/eng/';
      //$toRedirect='/hrv/';
      break;
    default:
      $toRedirect='/cze/';
      break;
  }
}
$_SESSION["SV"]["LANG"]=$lang;
$_SESSION["SV"]["CONTACT"]=$contact;
$_SESSION["SV"]["REGION"]=$region;

# !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(
  $toRedirect 
  && !CSite::inDir($toRedirect)
  && !CSite::inDir("/contracts/")
  && !CSite::inDir("/rus/contracts/")
  && !CSite::inDir("/eng/contracts/")
  && !CSite::inDir("/cze/contracts/")
  && !CSite::inDir("/bgr/contracts/")
  && !CSite::inDir("/hun/contracts/")
  && !CSite::inDir("/hrv/contracts/")
  && !isset($_REQUEST["no_redirect"]) && !isset($_REQUEST["noredirect"])
  && !CSite::inDir("/about/news/")
  && !CSite::inDir("/rus/about/news/")
  && !CSite::inDir("/eng/about/news/")
  && !CSite::inDir("/cze/about/news/")
  && !CSite::inDir("/bgr/about/news/")
  && !CSite::inDir("/hun/about/news/")
  && !CSite::inDir("/hrv/about/news/")
) LocalRedirect($toRedirect);

if(!isset($_SESSION["SV"]["UID"])) $_SESSION["SV"]["UID"]=$uid;
if(isset($_REQUEST["d"])){
  pre($_SESSION["SV"]);
  pre($_SESSION["GEOIP"]);
  #pre($record);
}
