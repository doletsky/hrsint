<div class="inner-wrapper">
	<div class="contacts-wrapper">
		<div class="contacts-left">
<?$APPLICATION->IncludeComponent("bitrix:news.list", "contacts", Array(
	"IBLOCK_TYPE" => "rus_dir",	// Тип информационного блока (используется только для проверки)
	"IBLOCK_ID" => "12",	// Код информационного блока
	"NEWS_COUNT" => "200",	// Количество новостей на странице
	"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
	"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
	"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
	"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
	"FILTER_NAME" => "",	// Фильтр
	"FIELD_CODE" => array(	// Поля
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(	// Свойства
		0 => "GOOGLE",
		1 => "INNER_NAME",
		2 => "",
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
	"CONTACT" => $_SESSION["SV"]["CONTACT"],
	),
	false
);?>
		</div>
		<div class="contacts-right">
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
			<div id="g-map"></div>
			<div class="contacts-form">
				<?$APPLICATION->IncludeComponent("sv:form", "contacts", Array(
					"START_PAGE" => "new",	// Начальная страница
					"SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
					"SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
					"SHOW_VIEW_PAGE" => "Y",	// Показывать страницу просмотра результата
					"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
					"WEB_FORM_ID" => "3",	// ID веб-формы
					"RESULT_ID" => "",	// ID результата
					"SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
					"SHOW_ADDITIONAL" => "N",	// Показать дополнительные поля веб-формы
					"SHOW_STATUS" => "Y",	// Показать текущий статус результата
					"EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
					"EDIT_STATUS" => "N",	// Выводить форму смены статуса
					"NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
						0 => "",
						1 => "",
					),
					"NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
						0 => "",
						1 => "",
					),
					"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
					"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
					"SEF_MODE" => "N",	// Включить поддержку ЧПУ
					"SEF_FOLDER" => "/contacts/",	// Каталог ЧПУ (относительно корня сайта)
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
					"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"VARIABLE_ALIASES" => array(
						"action" => "action",
					)
					),
					false
				);?>
			</div>
		</div>
	</div>
</div> 