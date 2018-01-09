			<div class="clr"></div>
			<div class="ab-left">
				<a href="/eng/about/team/" class="abl-title">
					<h4>Team</h4>
					<b class="ab-more"></b>
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
				<a href="/eng/about/hrs/" class="abl-title">
					<h4>About HRS</h4>
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
				<a href="/eng/about/client/" class="abl-title">
					<h4>Clients</h4>
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
				<a href="/eng/about/reviews/" class="abl-title">
					<h4>Reviews</h4>
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
						<div class="expand-comment">Expand</div>
					</div>
					<div class="abs-controls">
						<b class="abs-right"><i></i></b>
						<b class="abs-left"><i></i></b>
					</div>
					<div class="abs-container">
						<?$APPLICATION->IncludeComponent("bitrix:news.list", "about_reviews", array(
							"IBLOCK_TYPE" => "eng_dir",
							"IBLOCK_ID" => "31",
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
					<h4>Territory</h4>
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
					<b data-address="18, Tartu st.<br>Tallinn, 109028, Estonia" class = "am-tallin">Tallinn</b>
					<b data-address="9, Lva Tolstogo st.<br>St. Petersburg, 143028, Russia" class = "am-spb">St. Petersburg</b>
					<b data-address="4/1, Tessinsky pereulok<br>Moscow, 104328, Russia" class = "am-moscow">Moscow</b>
					<b data-address="42-44, Shelkovichnaya st.<br>Kiev, 209538, Ukraine" class = "am-kiev">Kyiv</b>
					<b data-address="office 55, 20 A, Vinogradnaya st.<br>Sochi, 109032, Russia" class = "am-sochi">Sochi</b>
					<b data-address="88/15, Botchorishvili st.<br>Tbilisi, 154028, Georgia" class = "am-tbil"> Tbilisi</b>
					<b data-address="51, 8 Marta st.<br>Yekaterinburg, 620000, Russia" class = "am-ekat">Yekaterinburg</b>
					<b data-address="35, Krasnoyarskaya st.<br>Novosibirsk, 630132, Russia" class = "am-novosib"> Novosibirsk</b>
					<b data-address="office 6-2, 77 A, Bekturova st.<br>Almaty, 769028, Kazakhstan" class = "am-alma">Almaty</b>
					<b data-address="21, 7-lane, Buz-Bazar st.<br>Tashkent, 104368, Uzbekistan" class = "am-tash">Tashkent</b>
					<b data-address="9, Morskaya st.<br>Vladivostok, 439028, Russia" class = "am-vlad">Vladivostok</b>
					<b data-address="2, Talbuchina st.<br>Minsk, 220012, Belarus" class="am-minsk">Minsk</b>
					<b data-address="55, Khojaly Ave<br>Baku, AЗ1025, Azerbaijan" class="am-baku">Baku</b>
					<b data-address="2, Kalvariju st.<br>Vilnius, LT09309, Lithuania" class="am-vilnus">Vilnius</b>
					<b data-address="38, Krišjāņa Valdemāra st.<br>Riga, LV1010, Latvia" class="am-riga">Rīga</b>
					<b data-address="35/2, Pravo-Bulachnaya st.<br>Kazan, 420111, Russia" class="am-kaz">Kazan</b>
					<b data-address="Nad Botičem 593/8<br>Prague 10, 102 00 Czech Republic" class="am-praha">Prague</b>
					<b data-address="15, Komsomolskaya st.<br>Krasnodar 350063 Russia" class="am-kras">Krasnodar</b>
					<b data-address="22, Kalimanci Str., app. 1<br>1505 Sofia, Bulgaria" class="am-cofia">Sofia</b>
					<b data-address="Kálmán Imre u. 1.<br>1054 Budapest, Hungary" class="am-budapest">Budapest</b>
					<b data-address="Slovakia - Bratislava" class="am-bratislava">Bratislava</b>
					<b data-address="10000 Zagreb Croatia<br>Trg Krešimira Čosića 9" class="am-zagreb">Zagreb</b>
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
					<h4>Services</h4>
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
						<a href="/eng/about/news/" class="abl-title">
							<h4>News</h4>
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
						<a href="/eng/about/tv/" class="abl-title">
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
						<a href="/eng/about/webinars/" class="abl-title">
							<h4>Webinars</h4>
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
						<a href="/eng/about/vacancies/" class="abl-title">
							<h4>Vacancies</h4>
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
				<a href="/eng/about/partners/" class="abl-title">
					<h4>Partners</h4>
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
				"IBLOCK_TYPE" => "eng_dir",	// Тип информационного блока (используется только для проверки)
				"IBLOCK_ID" => "21",	// Код информационного блока
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
