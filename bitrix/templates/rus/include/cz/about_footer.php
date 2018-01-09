			<div class="clr"></div>
			<div class="ab-left">
				<a <?/*href="/cze/about/team/"*/?> class="abl-title">
					<h4>Náš Tým</h4>
					<?/*<b class="ab-more"></b>*/?>
				</a>
				<div class="abl-text">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-stuff.php",
							"EDIT_MODE" => "php",
						),
						false
					);?>
				</div>
			</div>
			<div class="ab-right">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-stuff-img.php",
						"EDIT_MODE" => "php",
					),
					false
				);?>
			</div>
		</div>
	</div>
	<div class="about-block">
		<div class="inner-wrapper">
			<div class="ab-left">
				<a href="/cze/about/hrs/" class="abl-title">
					<h4>O HRS</h4>
					<b class="ab-more"></b>
				</a>
				<div class="abl-text">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-about.php",
							"EDIT_MODE" => "php",
						),
						false
					);?>
				</div>
			</div>
			<div class="ab-right">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-logos.php",
						"EDIT_MODE" => "php",
					),
					false
				);?>
			</div>
		</div>
	</div>
	<div class="about-block rightish">
		<div class="inner-wrapper">
			<div class="ab-left">
				<a href="/cze/about/client/" class="abl-title">
					<h4>Klienti</h4>
					<b class="ab-more"></b>
				</a>
				<div class="abl-text">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-clients.php",
							"EDIT_MODE" => "php",
						),
						false
					);?>
				</div>
			</div>
			<div class="ab-right">
				<?$GLOBALS["clientsFilter"]=array("!PREVIEW_PICTURE"=>"");?>
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "about_clients", array(
				"IBLOCK_TYPE" => "rus_dir",
				"IBLOCK_ID" => "35",
				"NEWS_COUNT" => "6",
				"SORT_BY1" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "SORT",
				"SORT_ORDER2" => "ASC",
				"FILTER_NAME" => "clientsFilter",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"PROPERTY_CODE" => array(
					0 => "BUSINESS_TYPE",
					1 => "GOOGLE",
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
		</div>
	</div>
	<div class="about-block rightish">
		<div class="inner-wrapper">
			<div class="ab-left">
				<a href="/cze/about/reviews/" class="abl-title">
					<h4>Reference</h4>
					<b class="ab-more"></b>
				</a>
				<div class="abl-text">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-reviews.php",
							"EDIT_MODE" => "php",
						),
						false
					);?>
				</div>
			</div>
			<div class="ab-right">
				<div class="about-slider">
					<div class="ab-comment">
						<i></i>
						<div class="ab-comment-wrapper">
							<p class="ab-comment-container">loading...</p>
						</div>
						<div class="expand-comment">Rozšířit</div>
					</div>
					<div class="abs-controls">
						<b class="abs-right"><i></i></b>
						<b class="abs-left"><i></i></b>
					</div>
					<div class="abs-container">
						<?$APPLICATION->IncludeComponent("bitrix:news.list", "about_reviews", array(
							"IBLOCK_TYPE" => "cze_dir",
							"IBLOCK_ID" => "40",
							"NEWS_COUNT" => "10",
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
								0 => "POSITION",
								1 => "",
							),
							"CHECK_DATES" => "N",
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
				</div>
			</div>
		</div>
	</div>
	<div class="about-block rightish">
		<div class="inner-wrapper">
			<div class="ab-left">
				<a class="abl-title">
					<h4>Území</h4>
					<!--<b class="ab-more"></b>-->
				</a>
				<div class="abl-text">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-ter.php",
							"EDIT_MODE" => "php",
						),
						false
					);?>
				</div>
			</div>
			<div class="ab-right">
				<!-- <div class="map-note">In 2013, plans to open an office in Novosibirsk.</div> -->
				<div class="about-map">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/about_map_new-4.png" alt="" class="interactive-map">
					<b data-address="18 Tartu mnt<br>10115 Tallinn, Estonsko" class = "am-tallin">Tallinn</b>
					<b data-address="9, Lev Tolstoy Ul. <br>St. Petersburg 197022 Rusko" class = "am-spb">St.Petersburg</b>
					<b data-address="4 Tessinsky lane, bld. 1<br>Moskva 109028 Rusco" class = "am-moscow">Moskva</b>
					<b data-address="42-44 Shovkovychna Ul. <br>Kyjev 01601 Ukrajině" class = "am-kiev">Kyjev</b>
					<b data-address="22 A Vinogradnaya Ul., Office 55<br>Soči 354008 Rusko" class = "am-sochi">Soči</b>
					<b data-address="88/15 Bochorishvili Ul. <br>Tbilisi 0171 Gruzie" class = "am-tbil"> Tbilisi</b>
					<b data-address="51,51, 8 Marta Ul.<br>Jekatěrinburg 620000 Rusko" class = "am-ekat">Jekatěrinburg</b>
					<b data-address="35 Krasnoyarskaya Ul. <br>Novosibirsk 630132 Rusko" class = "am-novosib"> Novosibirsk</b>
					<b data-address="77 A Bekturova Ul., Office 6-2<br>Almaty 050051 Kazachstan" class = "am-alma">Almaty</b>
					<b data-address="Buz-Bazar Ul., 7-passage, 21<br>Taškent 100077 Uzbekistán" class = "am-tash">Taškent</b>
					<b data-address="9, 1 Morskaya Ul. <br>Vladivostok 690003 Rusko" class = "am-vlad">Vladivostok</b>
					<b data-address="2, Talbuchina st. <br>Minsk 220012 Bělorusko" class="am-minsk">Minsk</b>
					<b data-address="55 Khojaly Prospect<br>Baku АЗ1025 Ázerbajdžán" class="am-baku">Baku</b>
					<b data-address="2 Kalvariju Ul.<br>Vilnius LT-09309 Litva" class="am-vilnus">Vilnius</b>
					<b data-address="38 Krišjāņa Valdemāra Ul.<br>Riga LV1010 Lotyšsko" class="am-riga">Riga</b>
					<b data-address="35/2 Pravo-Bulachnaya Ul.<br>Kazan 420111 Rusko" class="am-kaz">Kazan</b>
					<b data-address="Nad BOTIČEM 593/8 <br> Praha 10, 102 00, Česká republika" class="am-praha">Praha</b>
					<b data-address="15, Komsomolskaya Ul.<br>Krasnodar 350063 Rusko" class="am-kras">Krasnodar</b>
					<b data-address="1505 Sofia, Bulharsko<br>Str. Kalimanci, 22, ap. 1" class="am-cofia">Sofia</b>
					<b data-address="1054 Budapešť, Maďarsko<br>Kálmán Imre u. 1." class="am-budapest">Budapešť</b>
					<b data-address="Slovensko - Bratislava" class="am-bratislava">Bratislava</b>
					<b data-address="10000 Zagreb Croatia<br>Trg Krešimira Čosića 9" class="am-zagreb">Záhřeb</b>
					<div class="am-address"><i></i><span class="ama-text"></span></div>
				</div>
				<img src="<?=SITE_TEMPLATE_PATH?>/images/about_map_static.png" alt="" class="static-map">
			</div>
		</div>
	</div>
	<div class="about-block leftish">
		<div class="inner-wrapper">
			<div class="ab-left">
				<a class="abl-title">
					<h4>Služby</h4>
					<!--<b class="ab-more"></b>-->
				</a>
				<div class="abl-text">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-services.php",
							"EDIT_MODE" => "php",
						),
						false
					);?>
				</div>
			</div>
			<div class="ab-right">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-services-logos.php",
						"EDIT_MODE" => "php",
					),
					false
				);?>
			</div>
		</div>
	</div>
	<div class="about-block">
		<div class="ab-quick-links">
			<div class="inner-wrapper">
				<div class="ql-item left-half">
					<div class="ab-left">
						<a href="/cze/about/news/" class="abl-title">
							<h4>Novinky</h4>
							<b class="ab-more"></b>
						</a>
						<div class="abl-text">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-news.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
						</div>
					</div>
				</div>
				<div class="ql-item right-half">
					<div class="ab-left">
						<a href="/cze/about/tv/" class="abl-title">
							<h4>HRS TV</h4>
							<b class="ab-more"></b>
						</a>
						<div class="abl-text">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-tv.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
						</div>
					</div>
				</div>
			</div>
			<i class="divider clr"></i>
			<div class="inner-wrapper">
				<div class="ql-item left-half">
					<div class="ab-left">
						<a href="/cze/about/webinars/" class="abl-title">
							<h4>Webináře</h4>
							<b class="ab-more"></b>
						</a>
						<div class="abl-text">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-webinars.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
						</div>
					</div>
				</div>
				<div class="ql-item right-half">
					<div class="ab-left">
						<a href="/cze/about/vacancies/" class="abl-title">
							<h4>Kariéra</h4>
							<b class="ab-more"></b>
						</a>
						<div class="abl-text">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-vacancy.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="about-block">
		<div class="inner-wrapper">
			<div class="ab-left">
				<a href="/cze/about/partners/" class="abl-title">
					<h4>Partneři</h4>
					<b class="ab-more"></b>
				</a>
				<div class="abl-text">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/about-partners.php",
							"EDIT_MODE" => "php",
						),
						false
					);?>
				</div>
			</div>
			<div class="ab-right">
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "partners_anons", Array(
				"IBLOCK_TYPE" => "cze_dir",	// Тип информационного блока (используется только для проверки)
				"IBLOCK_ID" => "43",	// Код информационного блока
				"NEWS_COUNT" => "8",	// Количество новостей на странице
				"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
				"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
				"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
				"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
				"FILTER_NAME" => "",	// Фильтр
				"FIELD_CODE" => array(	// Поля
					0 => "PREVIEW_TEXT",
					1 => "PREVIEW_PICTURE",
					2 => "",
				),
				"PROPERTY_CODE" => array(	// Свойства
					0 => "URL",
					1 => "",
				),
				"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
				"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
				"AJAX_MODE" => "N",	// Включить режим AJAX
				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
				"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
				"CACHE_TYPE" => "A",	// Тип кеширования
				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
				"CACHE_GROUPS" => "N",	// Учитывать права доступа
				"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
				"PARENT_SECTION" => "",	// ID раздела
				"PARENT_SECTION_CODE" => "",	// Код раздела
				"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
				"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
				"PAGER_TITLE" => "Новости",	// Название категорий
				"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
				"PAGER_TEMPLATE" => "",	// Название шаблона
				"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
				"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
				"DISPLAY_DATE" => "N",	// Выводить дату элемента
				"DISPLAY_NAME" => "Y",	// Выводить название элемента
				"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
				"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
				"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
				),
				false
			);?>
			</div>
		</div>
	</div>
</div>
