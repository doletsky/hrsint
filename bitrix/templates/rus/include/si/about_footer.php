			<div class="clr"></div>
			<div class="ab-left">
				<a href="/svn/about/team/" class="abl-title">
					<h4>Ekipa</h4>
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
				<a href="/svn/about/hrs/" class="abl-title">
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
				<a href="/svn/about/client/" class="abl-title">
					<h4>Stranke</h4>
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
				"IBLOCK_TYPE" => "svn_dir",
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
				<a href="/svn/about/reviews/" class="abl-title">
					<h4>Povratne informacije</h4>
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
						<div class="expand-comment">Razširi</div>
					</div>
					<div class="abs-controls">
						<b class="abs-right"><i></i></b>
						<b class="abs-left"><i></i></b>
					</div>
					<div class="abs-container">
						<?$APPLICATION->IncludeComponent("bitrix:news.list", "about_reviews", array(
							"IBLOCK_TYPE" => "svn_dir",
							"IBLOCK_ID" => "108",
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
					<h4>Območje</h4>
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
				<!-- <div class="map-note">В 2013 году планируется открытие офиса в Новосибирске.</div> -->
				<div class="about-map">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/about_map_new-4.png" alt="" class="interactive-map">
					<b data-address="Эстония, 109028, г. Таллин<br>ул. Тарту, 18" class="am-tallin">Talin</b>
					<b data-address="Россия, 143028, г. Санкт-Петербург<br>ул. Льва Толстого, д. 9" class="am-spb">St. Petersburg</b>
					<b data-address="Россия, 104328, г. Москва<br>Тессинский пер., д. 4, стр.1" class="am-moscow">Moskva</b>
					<b data-address="Украина, 209548, г. Киев<br>ул. Шелковичная, 42-44" class="am-kiev">Kijev</b>
					<b data-address="Россия, 109032, г. Сочи<br>ул. Виноградная, д. 20 А, оф. 55" class="am-sochi">Soči</b>
					<b data-address="Грузия, 154028, г. Тбилиси<br>ул. Бочоришвили, д. 88/15" class="am-tbil">Tbilisi</b>
					<b data-address="Россия, 620000, г. Екатеринбург<br>ул. 8 Марта, 51" class="am-ekat">Ekaterinburg</b>
					<b data-address="Россия, 6300132, г. Новосибирск<br>ул. Красноярская, 35" class="am-novosib">Novosibirsk</b>
					<b data-address="Казахстан, 769028, г. Алматы<br>ул. Бектурова, д. 77 А, офис 6-2" class="am-alma">Almaty</b>
					<b data-address="Узбекистан, 104368, г. Ташкент<br>ул. Буз-Базар, 7-проезд, д. 21" class="am-tash">Taškent</b>
					<b data-address="Россия, 439028, г. Владивосток<br>ул. Морская, д. 9" class="am-vlad">Vladivostok</b>
					<b data-address="220012, Республика Беларусь, г. Минск<br>ул. Толбухина, 2" class="am-minsk">Minsk</b>
					<b data-address="Азербайджан АЗ1025, г. Баку<br>пр-т Ходжалы, 55" class="am-baku">Baku</b>
					<b data-address="Литва, LT09309, г. Вильнюс<br>ул. Калварию, 2" class="am-vilnus">Vilnius</b>
					<b data-address="Латвия, LV1010, г. Рига<br>ул. Кристиана Валдемара, 38" class="am-riga">Riga</b>
					<b data-address="Россия, 420111, г. Казань<br>ул. Право-Булачная, 35/2" class="am-kaz">Kazan</b>
					<b data-address="Чехия, 102 00, Прага 10<br>Nad Botičem 593/8" class="am-praha">Praga</b>
					<b data-address="Россия, 350063, Краснодар<br>Ул. Комсомольская, д.15" class="am-kras">Krasnodar</b>
					<b data-address="София 1505 България<br>Ул. «Калиманци», 22, ап. 1" class="am-cofia">Sofija</b>
					<b data-address="Будапешт, 1054 Венгрия<br>Kálmán Imre u. 1." class="am-budapest">Будапешт</b>
					<b data-address="Словакия – Братислава" class="am-bratislava">Bratislava</b>
					<b data-address="10000 Zagreb Croatia<br>Trg Krešimira Čosića 9" class="am-zagreb">Budimpešta</b>
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
					<h4>Storitve</h4>
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
						<a href="/svn/about/news/" class="abl-title">
							<h4>Novice</h4>
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
						<a href="/svn/about/tv/" class="abl-title">
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
						<a href="/svn/about/webinars/" class="abl-title">
							<h4>Webinarji</h4>
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
						<a href="/svn/about/vacancies/" class="abl-title">
							<h4>Prosta delovna mesta</h4>
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
				<a href="/svn/about/partners/" class="abl-title">
					<h4>Partnerji</h4>
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
					"IBLOCK_TYPE" => "svn_dir",	// Тип информационного блока (используется только для проверки)
					"IBLOCK_ID" => "135",	// Код информационного блока
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
