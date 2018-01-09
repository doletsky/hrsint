<?
IncludeTemplateLangFile(__FILE__);
// page_type
$pageType=$APPLICATION->GetProperty("page_type","text");
include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/include/'.LANGUAGE_ID.'/'.$pageType.'_footer.php');
?>
<?
$rootArray=array(
	'/',
	'/rus/',
	'/eng/',
	'/cze/',
	'/bgr/',
	'/hun/',
	'/hrv/',
	'/svn/',
	'/mkd/',
);
$iblockDirType=array(
	'ru' => 'rus_dir',
	'en' => 'eng_dir',
	'cz' => 'cze_dir',
	'bg' => 'bgr_dir',
	'hu' => 'hun_dir',
	'hr' => 'hrv_dir',
	'si' => 'svn_dir',
	'mk' => 'mkd_dir',
);
?>
			</div>
			<div class="push"></div>
		</div>
		<div class="footer">
			<div class="pre-footer">
				<b class="f-collapse-button"><i></i></b>
				<i class="f-line"></i>
				<div class="inner-wrapper">
					<div class="f-links">
						<div class="f-block f-three-column">
							<?$APPLICATION->IncludeComponent("bitrix:menu", "about_foot", Array(
								"ROOT_MENU_TYPE" => "bot_about",	// Тип меню для первого уровня
								"MENU_CACHE_TYPE" => "A",	// Тип кеширования
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
								"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
								"MAX_LEVEL" => "1",	// Уровень вложенности меню
								"CHILD_MENU_TYPE" => "submain",	// Тип меню для остальных уровней
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
								),
								false
							);?>
						</div>
						<div class="f-block mobile f-one-column">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/central-office.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
						</div>
						<?
						$subscription=array(
							'ru' => '/rus/subscription/',
							'en' => '/eng/subscription/',
							'cz' => '/cze/subscription/',
							'bg' => '/bgr/subscription/',
							'hu' => '/hun/subscription/',
							'hr' => '/hrv/subscription/',
							'si' => '/svn/subscription/',
							'mk' => '/mkd/subscription/',
						);
						?>
						<div class="f-block no-tablet">
							<?$APPLICATION->IncludeComponent("bitrix:subscribe.form", "subscribe", array(
								"USE_PERSONALIZATION" => "Y",
								"SHOW_HIDDEN" => "N",
								"PAGE" => $subscription[LANGUAGE_ID],
								"CACHE_TYPE" => "A",
								"CACHE_TIME" => "3600"
								),
								false
							);?>
						</div>
						<div class="f-block f-three-column">
							<?
							$iblockID=array(
								'ru' => '9',
								'en' => '22',
								'cz' => '38',
								'bg' => '55',
								'hu' => '73',
								'hr' => '86',
								'si' => '136',
								'mk' => '116',
							);
							?>
							<?$APPLICATION->IncludeComponent("bitrix:news.list", "products_foot", array(
	"IBLOCK_TYPE" => "-",
	"IBLOCK_ID" => $iblockID[LANGUAGE_ID],
	"NEWS_COUNT" => "30",
	"SORT_BY1" => "SORT",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "UNIT",
		2 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "N",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
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
	"DISPLAY_BOTTOM_PAGER" => "N",
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
						<div class="f-block f-two-column">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/support.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
						</div>
					</div>
				</div>
			</div>
			<div class="f-lower">
				<div class="inner-wrapper">
					<div class="f-top-line"></div>
					<div class="f-copy">
						<p>Copyright © <?=date("Y");?> HRS All rights reserved.</p>
					</div>
					<div class="f-studio <?=LANGUAGE_ID?>">
						<a href="http://studio-v.ru" target="_blank" class="studio-logo"></a>
						<a href="http://studio-v.ru" target="_blank" class="studio-link"><?=GetMessage("Создание сайта");?></a>
					</div>
					<?/*?><div class="f-social">
						<div class="fc-button">
							<div class="fb-like" data-href="http://hrs.ru" data-send="false" data-layout="button_count" data-width="80" data-show-faces="true"></div>
						</div>
						<div class="fc-button">
							<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true">Tweet</a>
						</div>
					</div><?*/?>
					<b class="clr"></b>
				</div>
			</div>
		</div>
	</div>
</div>

<?$APPLICATION->IncludeFile("region.php")?>

<script src="<?=SITE_TEMPLATE_PATH?>/scripts/plugins.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/scripts/main.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-60670930-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=28989860&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/28989860/3_0_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:28989860,lang:'ru'});return false}catch(e){}" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter28989860 = new Ya.Metrika({
                    id:28989860,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/28989860" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>