<?IncludeTemplateLangFile(__FILE__);?>
<?
$class='';
$isRussia=false;
if(isset($_SESSION["SV"]["COUNTRY"]) && $_SESSION["SV"]["COUNTRY"]=="Russia"){
  $isRussia=true;
}
if(substr($_SESSION["SV"]["UID"],0,13)=="Europe-Russia"){
  $isRussia=true;
}
if($isRussia){
  $class='region-modal_ru';
}
?>
<div class="<?=$class?> region-modal modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-header__inner">
          <div class="aligned row_m">
            <div class="item">
              <h3 class="region-modal__head hd_0">
                <span class="region-modal__head-txt_ru region-modal__head-txt"><?=GetMessage("Выберите город")?></span>
                <span class="region-modal__head-txt_other region-modal__head-txt"><?=GetMessage("Выберите регион")?></span>
              </h3>
            </div>
            <div class="item">
              <button type="button" class="region-modal__switch_other region-modal__switch btn"><?=GetMessage("Выбрать континент")?></button>
            </div>
            <span class="aligned__under"></span>
          </div>
        </div>
        <button title="<?=GetMessage("Закрыть")?>" type="button" class="modal__close btn" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="region-modal__choose_ru region-modal__choose">
          <div class="ru">
            <img class="ru__map" src="<?=SITE_TEMPLATE_PATH?>/images/map.jpg" alt="" width="575" height="321"/>
            <button type="button" data-region="<?=GetMessage("Россия")?>" class="btn region_sub region ru__mark_spb ru__mark" data-uid="Europe-Russia-SPB"><?=GetMessage("Санкт-Петербург")?></button>
            <button type="button" data-region="<?=GetMessage("Россия")?>" class="btn region_active region_sub region ru__mark_msk ru__mark" data-uid="Europe-Russia-Moscow"><?=GetMessage("Москва")?></button>
            <button type="button" data-region="<?=GetMessage("Россия")?>" class="btn region_sub region ru__mark_sch ru__mark" data-uid="Europe-Russia-Sochi"><?=GetMessage("Сочи")?></button>
            <button type="button" data-region="<?=GetMessage("Россия")?>" class="btn region_sub region ru__mark_krs ru__mark" data-uid="Europe-Russia-Krasnodar"><?=GetMessage("Краснодар")?></button>
            <button type="button" data-region="<?=GetMessage("Россия")?>" class="btn region_sub region ru__mark_kzn ru__mark" data-uid="Europe-Russia-Kazan"><?=GetMessage("Казань")?></button>
            <button type="button" data-region="<?=GetMessage("Россия")?>" class="btn region_sub region ru__mark_ekb ru__mark" data-uid="Europe-Russia-EKB"><?=GetMessage("Екатеринбург")?></button>
            <button type="button" data-region="<?=GetMessage("Россия")?>" class="btn region_sub region ru__mark_nvs ru__mark" data-uid="Europe-Russia-NSIB"><?=GetMessage("Новосибирск")?></button>
            <button type="button" data-region="<?=GetMessage("Россия")?>" class="btn region_sub region ru__mark_vd ru__mark" data-uid="Europe-Russia-Vladivostok"><?=GetMessage("Владивосток")?></button>
          </div>
        </div>
        <div class="region-modal__choose_other region-modal__choose">
          <div class="row_wrap row">
            <div class="region-item item">
              <ul class="list_0 fs0 list">
                <li>
                  <button type="button" class="btn region_shifted region hd_1" data-uid="Oceania"><?=GetMessage("Австралия и Океания")?></button>
                </li>
                <li>
                  <button type="button" class="btn region_shifted region hd_1" data-uid="North_America"><?=GetMessage("Америка")?></button>
                </li>
                <li>
                  <button type="button" class="btn region_shifted region hd_1" data-uid="Africa"><?=GetMessage("Африка")?></button>
                </li>
              </ul>
            </div>
            <div class="region-item item" style="width:150px">
              <button type="button" class="hd_1 btn region_shifted region" data-uid="Asia"><?=GetMessage("Азия")?></button>
              <ul class="list_0 list">
                <li>
                  <button type="button" class="btn region_shifted region" data-uid="Asia-Kazakhstan"><?=GetMessage("Казахстан")?></button>
                </li>
                <li>
                  <button type="button" class="btn region_shifted region" data-uid="Asia-Kyrgyzstan"><?=GetMessage("Кыргызстан")?></button>
                </li>
                <li>
                  <button type="button" class="btn region_shifted region" data-uid="Asia-Mongolia"><?=GetMessage("Монголия")?></button>
                </li>
                <li>
                  <button type="button" class="btn region_shifted region" data-uid="Asia-Tajikistan"><?=GetMessage("Таджикистан")?></button>
                </li>
                <li>
                  <button type="button" class="btn region_shifted region" data-uid="Asia-Turkmenistan"><?=GetMessage("Туркменистан")?></button>
                </li>
                <li>
                  <button type="button" class="btn region_shifted region" data-uid="Asia-Uzbekistan"><?=GetMessage("Узбекистан")?></button>
                </li>
              </ul>
            </div>
            <div class="region-item item" style="width:250px">
              <button type="button" class="hd_1 btn region_shifted region" data-uid="Europe"><?=GetMessage("Европа")?></button>
              <div class="row_wrap row">
                <div class="region-item-sub item">
                  <ul class="list_1 list">
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Asia-Azerbaijan"><?=GetMessage("Азербайджан")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Asia-Armenia"><?=GetMessage("Армения")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Belarus"><?=GetMessage("Беларусь")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Bulgaria"><?=GetMessage("Болгария")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Asia-Georgia"><?=GetMessage("Грузия")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Latvia"><?=GetMessage("Латвия")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Republic_of_Lithuania"><?=GetMessage("Литва")?></button>
                    </li>
                  </ul>
                </div>
                <div class="region-item-sub item">
                  <ul class="list_1 list">
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Republic_of_Moldova"><?=GetMessage("Молдова")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region-modal__switch_ru region-modal__switch region" data-uid="Europe-Russia"><?=GetMessage("Россия")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Slovak_Republic"><?=GetMessage("Словакия")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Ukraine"><?=GetMessage("Украина")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Hrvatska"><?=GetMessage("Хорватия")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Czech_Republic"><?=GetMessage("Чехия")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Estonia"><?=GetMessage("Эстония")?></button>
                    </li>
                    <li>
                      <button type="button" class="btn region_shifted region" data-uid="Europe-Hungary"><?=GetMessage("Венгрия")?></button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?if(isset($_SESSION["SV"]["UID"]) && $_SESSION["SV"]["UID"]){?>
<script>
$(document).ready(function(){
  $(".region.region_active").removeClass("region_active");
  var $regi=$(".region[data-uid=<?=$_SESSION["SV"]["UID"]?>]").addClass("region_active");
  updateHandlerText($regi,0);
});
</script>
<?}?>
<div id="ajax-area" style="visibility:hidden;width:1px;height:1px;"></div>