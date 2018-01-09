			<div class="clr"></div>
			<div class="ab-left">
				<a href="/hrv/about/team/" class="abl-title">
					<h4>TIM</h4>
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
				<a href="/hrv/about/hrs/" class="abl-title">
					<h4>О HRS</h4>
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
				<a href="/hrv/about/client/" class="abl-title">
					<h4>Кlijenti</h4>
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
				"IBLOCK_TYPE" => "{$arFolders[LANGUAGE_ID]}_dir",
				"IBLOCK_ID" => $clientsSliderId,
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
				<a href="/hrv/about/reviews/" class="abl-title">
					<h4>Оsvrti</h4>
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
						<div class="expand-comment">Развернуть</div>
					</div>
					<div class="abs-controls">
						<b class="abs-right"><i></i></b>
						<b class="abs-left"><i></i></b>
					</div>
					<div class="abs-container">
						<?$APPLICATION->IncludeComponent("bitrix:news.list", "about_reviews", array(
							"IBLOCK_TYPE" => "{$arFolders[LANGUAGE_ID]}_dir",
							"IBLOCK_ID" => $arIblockId[LANGUAGE_ID]['reviews'],
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
					<h4>Područje</h4>
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
                    <b data-address="Estonija, 109028, g. Tallinn<br>str. Tartu, 18" class="am-tallin">Тalin</b>
                    <b data-address="Rusija, 143028, g. St. Petersburg<br>str. Lav Tolstoj, ad 9" class="am-spb">Sankt Peterburg</b>
                    <b data-address="Rusija, 104328, godine, Zagreb<br>Тессинский premjesti, d. 4, stranica 1" class="am-moscow">Моskvа</b>
                    <b data-address="Ukrajina, 209548, g. Kijev<br>str. Шелковичная, 42-44" class="am-kiev">Кijev</b>
                    <b data-address="Rusija, 109032, g. Sočiju<br>str. Vinova, dv 20 A, ob. 55" class="am-sochi">Soči</b>
                    <b data-address="Georgia, 154028, g. Tbilisi<br>str. Бочоришвили, d. 88/15" class="am-tbil">Тbilisi</b>
                    <b data-address="Rusija, sa 620.000, g. Ekaterinburg<br>str. 8. Ožujka, 51" class="am-ekat">Jekaterinburg</b>
                    <b data-address="Rusija, 6300132, g. Novosibirsk<br>str. Красноярская, 35" class="am-novosib">Novosibirsк</b>
                    <b data-address="Kazahstan, 769028, g. Almaty<br>str. Бектурова, d. 77 A, ured 6-2" class="am-alma">Аlmati</b>
                    <b data-address="Uzbekistan, 104368, g. Taškent<br>str. Буз-Bazar, 7-smjerovi, dv 21" class="am-tash">Таškenт</b>
                    <b data-address="Rusija, 439028, od Vladivostok<br>str. Morska, ad 9" class="am-vlad">Vladivostok</b>
                    <b data-address="220012, Bjelorusija, g. Minsk<br>str. Толбухина, 2" class="am-minsk">Міпѕк</b>
                    <b data-address="Azerbejdžan АЗ1025, g. Baku<br>ol-t Ходжалы, 55" class="am-baku">Baku</b>
                    <b data-address="Litvanija, LT09309, g. Vilnius<br>str. kalvariju, tu 2" class="am-vilnus">Vilnus</b>
                    <b data-address="Latvija, LV1010, g. Riga<br>str. Christiane Валдемара, 38" class="am-riga">Riga</b>
                    <b data-address="Rusija, 420111, g. Kazan<br>str. Pravo-Булачная, 35/2" class="am-kaz">Каzanj</b>
                    <b data-address="republika Češka, 102 00, Prag 10<br>Nad Botičem 593/8" class="am-praha">Prag</b>
                    <b data-address="Rusija, 350063, Krapina<br>Str. Komsomolskaya, d. 15" class="am-kras">Кrasnodar</b>
                    <b data-address="Sofija 1505 България<br>Str. «Калиманци», 22, up. 1" class="am-cofia">Sofija</b>
                    <b data-address="Budimpešta, 1054 Mađarska<br>Kálmán Imre u. 1." class="am-budapest">Budimpešta</b>
                    <b data-address="Slovačka - Bratislava" class="am-bratislava">Bratislava</b>
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
					<h4>Usluge</h4>
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
						<a href="/hrv/about/news/" class="abl-title">
							<h4>Novosti</h4>
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
						<a href="/hrv/about/tv/" class="abl-title">
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
						<a href="/hrv/about/webinars/" class="abl-title">
							<h4>Webinari</h4>
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
						<a href="/hrv/about/vacancies/" class="abl-title">
							<h4>Slobodna radna mjesta</h4>
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
				<a href="/hrv/about/partners/" class="abl-title">
					<h4>Partneri</h4>
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
					"IBLOCK_TYPE" => "{$arFolders[LANGUAGE_ID]}_dir",	// Тип информационного блока (используется только для проверки)
					"IBLOCK_ID" => $arIblockId[LANGUAGE_ID]['partners'],	// Код информационного блока
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
