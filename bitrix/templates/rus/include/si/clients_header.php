<div class="clients-map">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/markerclusterer_packed.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/infobubble-compiled.js"></script>
	<div id="gc-map"></div>
	<div class="inner-wrapper">
		<div class="cm-filter-wrap">
			<div class="cm-filters">
				<div class="cm-country">
					<select class="styled-select-live">
						<?
						$countries=array();
						$arSectionObj=CIBlockSection::GetList(Array("sort"=>"asc"), Array("IBLOCK_ID"=>11,"SECTION_ID"=>"","ACTIVE"=>"Y"),false, Array("ID","NAME","CODE","UF_LNT_LAT","UF_ZOOM"));
						$i=0;
						while($arSection=$arSectionObj->GetNext()){
							$countries[]=$arSection;
						?>
						<option data-lat-lng="<?=$arSection["UF_LNT_LAT"]?>" data-zoom="<?=$arSection["UF_ZOOM"]?>" data-country-id="<?=$arSection["ID"]?>"><?=$arSection["NAME"]?></option>
						<?
							$i++;
						}
						?>
					</select>
				</div>
				<div class="cm-city">
					<select class="styled-select-live">
						<option value="">Vsa mesta</option>
					</select>
				</div>
				<div class="cm-type">
					<select class="styled-select-live">
						<option value="">Vsa poslovna področja</option>
						<option value="" data-type="hotel">Hoteli</option>
						<option value="" data-type="restaurant">Restavracije</option>
						<option value="" data-type="retail">Maloprodaja</option>
						<option value="" data-type="cruise">Spa/fitnes</option>
						<option value="" data-type="warehouse">Izobraževalne ustanove</option>
						<option value="" data-type="stadium">Stadioni in drugo</option>
					</select>
				</div>
			</div>
			<div class="cm-search">
				<div class="input-wrap">
					<input type="search" placeholder="Iščem" class="styled-input" id="cm-search" required>
					<i class="styled-submit"></i>
				</div>
				<ul class="cm-search-results select-dropdown"></ul>
			</div>
			<b class="clr"></b>
			<b class="cm-resizer"></b>
		</div>
	</div>
</div>
<div class="clients-categories">
	<div class="inner-full-wrapper">
		<table class="cc-table">
			<tr>
				<td class="cc-hotels" data-type="hotel"><p><i></i>Hoteli</p></td>
				<td class="cc-restaurants" data-type="restaurant"><p><i></i>Restavracije</p></td>
				<td class="cc-retail" data-type="retail"><p><i></i>Maloprodaja</p></td>
				<td class="cc-cruise" data-type="cruise"><p><i></i>Spa/fitnes</p></td>
				<td class="cc-warehouse" data-type="warehouse"><p><i></i>Izobraževalne</p></td>
				<td class="cc-stadiums" data-type="stadium"><p><i></i>Stadioni in drugo</p></td>
			</tr>
		</table>
	</div>
</div>
<?
// Логика выбора страны для отображения клиентов
$foundOffice=null;
foreach($countries as $arSection){
	if($_SESSION["SV"]["COUNTRY"]==$arSection["CODE"]){
		$foundOffice=$arSection["CODE"];
	}
}
if(!$foundOffice){
	$foundOffice="Russia";
	if($_SESSION["SV"]["CONTINENT"]=="Europe") $foundOffice="Czech Republic";
}
?>
<div class="clients-places">
	<div class="inner-wrapper">
		<div class="clp-overlay">
			<div class="clpo-aligner">
				<div class="clpo-inner"><img src="<?=SITE_TEMPLATE_PATH?>/images/loading.gif" alt="">loading...</div>
			</div>
		</div>
		<div class="clp-left">
			<div class="places-tabs-wrap">
				<ul class="places-tabs">
					<?foreach($countries as $i => $arSection){?>
					<li <?if($arSection["CODE"]==$foundOffice) echo 'class="active"';?> data-lat-lng="<?=$arSection["UF_LNT_LAT"]?>" data-zoom="<?=$arSection["UF_ZOOM"]?>" data-country-id="<?=$arSection["ID"]?>"><?=$arSection["NAME"]?></li>
					<?}?>
				</ul>
			</div>
		</div>
		<div class="clp-right">
			<div class="address-list-wrap">
				<h2 class="address-list-header"></h2>
				<span class="al-close">Вернуться к списку городов</span>
				<ul class="address-list"></ul>
			</div>
			<div class="places-list-wrap">
				<ul class="places-list"></ul>
			</div>
		</div>
	</div>
</div>
