<?IncludeTemplateLangFile(__FILE__);?>
<?$APPLICATION->IncludeFile("geoip.php");?>
<?
// page_type
$pageType=$APPLICATION->GetProperty("page_type","text");
if(file_exists($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/include/'.LANGUAGE_ID.'/'.$pageType.'_before.php')){
	include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/include/'.LANGUAGE_ID.'/'.$pageType.'_before.php');
}
?>
<?
$rootArray=array(
	'/',
	'/rus/',
	'/eng/',
	'/cze/',
	'/bgr/',
	'/hun/',
	'/hrv/'
);
$iblockDirType=array(
	'ru' => 'rus_dir',
	'en' => 'eng_dir',
	'cz' => 'cze_dir',
	'bg' => 'bgr_dir',
	'hu' => 'hun_dir',
	'hr' => 'hrv_dir'
);
$iblockTreeType=array(
	'ru' => 'rus_tree',
	'en' => 'eng_tree',
	'cz' => 'cze_tree',
	'bg' => 'bgr_tree',
	'hu' => 'hun_tree',
	'hr' => 'hrv_tree'
);
?>
<!DOCTYPE html>
<html>
<head>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?$APPLICATION->ShowTitle()?>" /> 
	<meta property="og:url" content="http://<?=$_SERVER["HTTP_HOST"]?><?=$APPLICATION->GetCurPage()?>" /> 
	<meta property="og:image" content="http://<?=$_SERVER["HTTP_HOST"]?><?$APPLICATION->ShowProperty("og-image","/bitrix/templates/rus/images/logo_soc.png")?>" />
	<link rel="image_src" href="http://<?=$_SERVER["HTTP_HOST"]?><?$APPLICATION->ShowProperty("og-image","/bitrix/templates/rus/images/logo_soc.png")?>" />
	<meta property="og:image:width" content="400" />
	<meta property="og:description" content="<?$APPLICATION->ShowProperty("og-description","система управления отелем, система управления гостиницей, автоматизация отеля, автоматизация гостиниц, система Fidelio, управление отелем, управление гостиницей, программа для гостиниц, программа для отеля, автоматизация ресторана, автоматизация кафе, система Micros, купить Микрос, управление рестораном, управление кафе, программа для кафе, HRS Back Office, управление лояльностью, система управления клубом, управление фитнесом, программа для клуба, система лояльности, система для магазина, автоматизация торговли, система управления магазином");?>" />
<title><?$APPLICATION->ShowTitle()?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="robots" content="all">
<meta name='yandex-verification' content='7dde087c6420a705' />
<meta name="keywords" content="система управления отелем, система управления гостиницей, автоматизация отеля, автоматизация гостиниц, система Fidelio, управление отелем, управление гостиницей, программа для гостиниц, программа для отеля, автоматизация ресторана, автоматизация кафе, система Micros, купить Микрос, управление рестораном, управление кафе, программа для кафе, HRS Back Office, управление лояльностью, система управления клубом, управление фитнесом, программа для клуба, система лояльности, система для магазина, автоматизация торговли, система управления магазином">
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-title" content="HRS">
<meta name="format-detection" content="telephone=yes">
<link href="<?=SITE_TEMPLATE_PATH?>/images/icon_57.png" sizes="57x57" rel="apple-touch-icon">
<link href="<?=SITE_TEMPLATE_PATH?>/images/icon_114.png" sizes="114x114" rel="apple-touch-icon">
<link href="<?=SITE_TEMPLATE_PATH?>/images/icon_72.png" sizes="72x72" rel="apple-touch-icon">
<link href="<?=SITE_TEMPLATE_PATH?>/images/icon_144.png" sizes="144x144" rel="apple-touch-icon">
<!--<link href="<?=SITE_TEMPLATE_PATH?>/styles/main.css" rel="stylesheet" type="text/css">-->
<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/styles/main.css");?>
<!--<script src="<?=SITE_TEMPLATE_PATH?>/scripts/less-1.3.3.min.js"></script>-->
<link href="<?=SITE_TEMPLATE_PATH?>/images/favicon.ico" rel="shortcut icon">
<!--[if lte IE 8]><link href="<?=SITE_TEMPLATE_PATH?>/styles/ie8.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if lte IE 9]><link href="<?=SITE_TEMPLATE_PATH?>/styles/ie9.css" rel="stylesheet" type="text/css"><![endif]-->
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<?$APPLICATION->ShowHead()?>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script src="<?=SITE_TEMPLATE_PATH?>/scripts/jquery.min.js"></script>
</head>
<body<?if(!in_array($APPLICATION->GetCurPage(),$rootArray)){?> class="inner-page"<?}?> data-lang="<?=LANGUAGE_ID?>">
<?$APPLICATION->ShowPanel()?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55ce012a8ed5f973" async="async"></script>
<?
if(LANGUAGE_ID=='ru'){
	$kp='<b class="hd-order show-overlay"><i></i>Получить<br>бесплатную<br>консультацию</b>';
}
elseif(LANGUAGE_ID=='cz'){
	$kp='<b class="hd-order show-overlay"><i></i>Požádat<br>O Cenovou<br>Nabídku</b>';
}
elseif(LANGUAGE_ID=='bg'){
	$kp='<b class="hd-order show-overlay"><i></i>Заявка<br>за<br>оферта</b>';
}
elseif(LANGUAGE_ID=='hu'){
	$kp='<b class="hd-order show-overlay"><i></i>Kérjen<br>ajánlatot</b>';
}
elseif(LANGUAGE_ID=='hr'){
	$kp='<b class="hd-order show-overlay"><i></i>Zatražiti<br>poslovnu<br>ponudu</b>';
}
else{
	$kp='<b class="hd-order show-overlay"><i></i>Request<br>free<br>demo</b>';
}
if( !CSite::inDir(SITE_DIR."about/vacancies/") && !CSite::inDir(SITE_DIR."about/webinars/") ){
	echo $kp;
}
?>
<div class="total-wrapper">
	<div class="overlay">
		<div class="order-form">
			<div class="of-header">
				<h2><?=GetMessage('form')?></h2>
				<b class="of-close"><i></i></b>
			</div>
			<?
			$langArr=array(
				"ru"=>2,
				"en"=>4,
				"cz"=>5,
				"bg"=>6,
				"hu"=>7,
				"hr"=>8
			);
			?>
			<?$APPLICATION->IncludeComponent("sv:form", "offer", Array(
				"START_PAGE" => "new",	// Начальная страница
				"SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
				"SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
				"SHOW_VIEW_PAGE" => "Y",	// Показывать страницу просмотра результата
				"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
				"WEB_FORM_ID" => $langArr[LANGUAGE_ID],	// ID веб-формы
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
				"USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
				"SEF_MODE" => "N",	// Включить поддержку ЧПУ
				"SEF_FOLDER" => $APPLICATION->GetCurPage(),	// Каталог ЧПУ (относительно корня сайта)
				"AJAX_MODE" => "Y",	// Включить режим AJAX
				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
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
		<div class="video-container">
			<b class="vc-left"><i></i></b>
			<b class="vc-right"><i></i></b>
			<div class="inner-wrapper">
				<div class="vc-right-part">
					<iframe width="100%" height="315" src="" frameborder="0" allowfullscreen id="vc-video"></iframe>
					<b class="vc-close"><i></i></b>
				</div>
				<div class="vc-left-part">
					<h2 class="vc-title"></h2>
					<p class="vc-date"></p>
					<div class="vc-text"></div>
				</div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
	<div class="mobile-search-wrapper">
		<b></b>
		<div class="mobile-search">
			<?
			$search=array(
				'ru' => '/rus/search/',
				'en' => '/eng/search/',
				'cz' => '/cze/search/',
				'bg' => '/bgr/search/',
				'hu' => '/hun/search/',
				'hr' => '/hrv/search/'
			);
			?>
			<form action="<?=$search[LANGUAGE_ID]?>" method="GET">
				<input type="submit" class="m-search-submit" value="">
				<div class="m-search-wrapper"><input type="search" name="q" class="m-search-input" placeholder="<?=GetMessage("Что вы ищете?");?>" required></div>
			</form>
		</div>
	</div>

	<div class="mobile-menu-wrapper">
		<b></b>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "mobile-menu", Array(
			"ROOT_MENU_TYPE" => "main",	// Тип меню для первого уровня
			"MENU_CACHE_TYPE" => "A",	// Тип кеширования
			"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
			"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
			"MAX_LEVEL" => "1",	// Уровень вложенности меню
			"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
			"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
			"DELAY" => "N",	// Откладывать выполнение шаблона меню
			"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
			),
			false
		);?>
		<div class="mobile-menu-social">
			<p><?=GetMessage("Следите за нами")?></p>
			<ul>
				<li><a href="" class="mmc-fb"><i></i></a></li>
				<li><a href="" class="mmc-ln"><i></i></a></li>
				<li><a href="" class="mmc-yt"><i></i></a></li>
			</ul>
		</div>
		<div class="mm-end-marker clr"></div>
	</div>
	<?if(in_array($APPLICATION->GetCurPage(),array(
		'/rus/about/','/rus/products/',
		'/eng/about/','/eng/products/',
		'/cze/about/','/cze/products/',
		'/bgr/about/','/bgr/products/',
		'/hun/about/','/hun/products/',
		'/hrv/about/','/hrv/products/'
	))){?>
		<div class="floating-menu">
			<div class="inner-full-wrapper">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "fixed", Array(
					"ROOT_MENU_TYPE" => "main",	// Тип меню для первого уровня
					"MENU_CACHE_TYPE" => "A",	// Тип кеширования
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
					"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					),
					false
				);?>
			</div>
		</div>
	<?}?>
	<div class="full-wrapper">
		<div class="wrapper">
			<div class="header-login">
				<div class="inner-wrapper">
					<div class="hl-title"><?=GetMessage("Вход в личный кабинет");?></div>
					<form>
						<div class="hl-buttons">
							<b></b>
							<div class="hl-movable">
								<div class="hl-links">
									<a href=""><?=GetMessage("Регистрация");?></a>
									<a href=""><?=GetMessage("Забыли пароль");?>?</a>
								</div>
								<input type="submit" class="styled-submit validate" value="<?=GetMessage("Войти");?>">
							</div>
						</div>
						<div class="hl-inputs">
							<div class="hl-input-field"><div class="input-wrap hl-login"><i></i><input type="text" placeholder="<?=GetMessage("Логин");?>" required></div></div>
							<div class="hl-input-field"><div class="input-wrap hl-password"><i></i><input type="password" placeholder="<?=GetMessage("Пароль");?>" required></div></div>
							<b class="clr"></b>
						</div>
						<div class="mobile-links-placeholder"></div>
					</form>
					<div class="clr"></div>
				</div>
			</div>
			<?if(in_array($APPLICATION->GetCurPage(),$rootArray)){?>
			
			<div class="main-slider">
				<?
				$iblockID=array(
					'ru' => '33',
					'en' => '34',
					'cz' => '36',
					'bg' => '58',
					'hu' => '68',
					'hr' => '88'
				);
				?>
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "slider1", Array(
					"IBLOCK_TYPE" => $iblockDirType[LANGUAGE_ID],	// Type of information block (used for verification only)
					"IBLOCK_ID" => $iblockID[LANGUAGE_ID],	// Information block code
					"NEWS_COUNT" => "200",	// News per page
					"SORT_BY1" => "SORT",	// Field for the news first sorting pass
					"SORT_ORDER1" => "ASC",	// Direction for the news first sorting pass
					"SORT_BY2" => "SORT",	// Field for the news second sorting pass
					"SORT_ORDER2" => "ASC",	// Direction for the news second sorting pass
					"FILTER_NAME" => "",	// Filter
					"FIELD_CODE" => array(	// Fields
						0 => "",
						1 => "",
					),
					"PROPERTY_CODE" => array(	// Properties
						0 => "",
						1 => "",
					),
					"CHECK_DATES" => "Y",	// Show only currently active elements
					"DETAIL_URL" => "",	// Detail page URL (from information block settings by default)
					"AJAX_MODE" => "N",	// Enable AJAX mode
					"AJAX_OPTION_JUMP" => "N",	// Enable scrolling to component's top
					"AJAX_OPTION_STYLE" => "N",	// Enable styles loading
					"AJAX_OPTION_HISTORY" => "N",	// Emulate browser navigation
					"CACHE_TYPE" => "A",	// Cache type
					"CACHE_TIME" => "36000000",	// Cache time (sec.)
					"CACHE_FILTER" => "N",	// Cache if the filter is active
					"CACHE_GROUPS" => "N",	// Respect Access Permissions
					"PREVIEW_TRUNCATE_LEN" => "",	// Maximum preview text length (for Text type only)
					"ACTIVE_DATE_FORMAT" => "m/d/Y",	// Date display format
					"SET_TITLE" => "Y",	// Set page title
					"SET_STATUS_404" => "N",	// Set 404 status if no element or section was found
					"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Include information block into navigation chain
					"ADD_SECTIONS_CHAIN" => "Y",	// Add Section name to breadcrumb navigation
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Hide link to the details page if no detailed description provided
					"PARENT_SECTION" => "",	// Section ID
					"PARENT_SECTION_CODE" => "",	// Section code
					"DISPLAY_TOP_PAGER" => "N",	// Display at the top of the list
					"DISPLAY_BOTTOM_PAGER" => "N",	// Display at the bottom of the list
					"PAGER_TITLE" => "News",	// Category name
					"PAGER_SHOW_ALWAYS" => "N",	// Always show the pager
					"PAGER_TEMPLATE" => "",	// Name of the pager template
					"PAGER_DESC_NUMBERING" => "N",	// Use reverse page navigation
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Cache time for pages with reverse page navigation
					"PAGER_SHOW_ALL" => "N",	// Show the ALL link
					"DISPLAY_DATE" => "Y",	// Display element date
					"DISPLAY_NAME" => "Y",	// Display element title
					"DISPLAY_PICTURE" => "Y",	// Display element preview picture
					"DISPLAY_PREVIEW_TEXT" => "Y",	// Display element preview text
					"AJAX_OPTION_ADDITIONAL" => "",	// Additional ID
					),
					false
				);?>
				<div class="inner-wrapper">
					<div class="header">
						<div class="h-logo">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/logo_new.png" alt="">
							<!-- <p>Hospitality &amp; Retail Systems</p> -->
						</div>
						<div class="h-mobile-login">
							<b class="hm-menu"></b>
							<a class="hm-login" href="<?if(LANGUAGE_ID=="ru"){?>http://support.hrsinternational.com/crm/index.php<?}else{?>http://support.hrsinternational.com/crm/index_en.php<?}?>"><i></i></a>
							<b class="hm-search"></b>
						</div>
						<div class="h-login">
							<a class="h-login-button" href="<?if(LANGUAGE_ID=="ru"){?>http://support.hrsinternational.com/crm/index.php<?}else{?>http://support.hrsinternational.com/crm/index_en.php<?}?>"><i></i><?=GetMessage("Вход в личный кабинет");?></a>
							<div class="h-search">
								<?
								$search=array(
									'ru' => '/rus/search/',
									'en' => '/eng/search/',
									'cz' => '/cze/search/',
									'bg' => '/bgr/search/',
									'hu' => '/hun/search/',
									'hr' => '/hrv/search/'
								);
								?>
								<form action="<?=$search[LANGUAGE_ID]?>" method="GET">
									<input type="submit" class="search-submit" value="">
									<input type="search" name="q" class="search-input" required>
								</form>
							</div>
							<?$APPLICATION->IncludeFile("h-lang.php");?>
							<div class="h-phone">
								<?if(1 || isset($_REQUEST["debug"])){?>
									<?$APPLICATION->IncludeFile("h-phone.php");?>
								<?}else{?>
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_SHOW" => "file",
											"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/phone.php",
											"EDIT_MODE" => "php",
										),
										false
									);?>
								<?}?>
							</div>
							<?$APPLICATION->IncludeComponent("bitrix:menu", "main", Array(
								"ROOT_MENU_TYPE" => "main",	// Тип меню для первого уровня
								"MENU_CACHE_TYPE" => "A",	// Тип кеширования
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
								"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
								"MAX_LEVEL" => "2",	// Уровень вложенности меню
								"CHILD_MENU_TYPE" => "submain",	// Тип меню для остальных уровней
								"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
								),
								false
							);?>
							<?if(1 || isset($_REQUEST["debug"])){?>
								<div class="h-region">
									<div tabindex="0" class="h-region__trigger">Rusko, Moskva</div>
								</div>
							<?}?>
						<b class="clr"></b>
					</div>
				</div>
				<div class="ms-container">
					<b class="ms-left ms-arrow"><i></i></b>
      		<b class="ms-right ms-arrow"><i></i></b>
      		<div class="ms-container-i">
            <div class="ms-container-i-1">
							<ul class="ms-controls"></ul>
							<div class="ms-business-header"><?=GetMessage("Выберите ваш тип бизнеса")?></div>
							<?$APPLICATION->IncludeComponent("bitrix:news.list", "slider3", Array(
								"IBLOCK_TYPE" => $iblockDirType[LANGUAGE_ID],	// Type of information block (used for verification only)
								"IBLOCK_ID" => $iblockID[LANGUAGE_ID],
								"NEWS_COUNT" => "200",	// Количество новостей на странице
								"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
								"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
								"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
								"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
								"FILTER_NAME" => "",	// Фильтр
								"FIELD_CODE" => array(	// Поля
									0 => "DETAIL_PICTURE",
									1 => "",
								),
								"PROPERTY_CODE" => array(	// Свойства
									0 => "LINK",
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
								"ACTIVE_DATE_FORMAT" => "m/d/Y",	// Формат показа даты
								"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
								"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
								"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
								"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
								"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
								"PARENT_SECTION" => "",	// ID раздела
								"PARENT_SECTION_CODE" => "",	// Код раздела
								"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
								"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
								"PAGER_TITLE" => "News",	// Название категорий
								"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
								"PAGER_TEMPLATE" => "",	// Название шаблона
								"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
								"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
								"DISPLAY_DATE" => "Y",	// Выводить дату элемента
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
			<div class="business-type-wrapper">
				<div class="inner-wrapper">
					<?if(LANGUAGE_ID=='ru'){?>
					<table class="business-type three-column">
						<tr>
							<td class="bt-hotels"><a href="/rus/solution/hotels-and-resorts/"><i></i><?=GetMessage("Отели и курорты");?></a></td>
							<td class="bt-restaraunts"><a href="/rus/solution/complexes-and-restaurants/"><i></i><?=GetMessage("Рестораны и комплексы");?></a></td>
							<td class="bt-sports"><a href="/rus/solution/sports-facilities/"><i></i><?=GetMessage("Спортивные объекты");?></a></td>
						</tr>
					</table>
					<table class="business-type three-column">
						<tr>
							<td class="bt-fitness"><a href="/rus/solution/spa-and-fitness/"><i></i><?=GetMessage("SPA и фитнес");?></a></td>
							<td class="bt-retail"><a href="/rus/solution/retail/"><i></i><?=GetMessage("Ритейл");?></a></td>
							<td class="bt-study"><a href="/rus/solution/educational-institutions/"><i></i><?=GetMessage("Учебные заведения");?></a></td>
						</tr>
					</table>
					<?}elseif(LANGUAGE_ID=='en'){?>
					<table class="business-type three-column">
						<tr>
							<td class="bt-hotels"><a href="/eng/solution/hotels-and-resorts/"><i></i><?=GetMessage("Отели и курорты");?></a></td>
							<td class="bt-restaraunts"><a href="/eng/solution/complexes-and-restaurants/"><i></i><?=GetMessage("Рестораны и комплексы");?></a></td>
							<td class="bt-sports"><a href="/eng/solution/sports-facilities/"><i></i><?=GetMessage("Спортивные объекты");?></a></td>
						</tr>
					</table>
					<table class="business-type three-column">
						<tr>
							<td class="bt-fitness"><a href="/eng/solution/spa-and-fitness/"><i></i><?=GetMessage("SPA и фитнес");?></a></td>
							<td class="bt-retail"><a href="/eng/solution/retail/"><i></i><?=GetMessage("Ритейл");?></a></td>
							<td class="bt-study"><a href="/eng/solution/educational-institutions/"><i></i><?=GetMessage("Учебные заведения");?></a></td>
						</tr>
					</table>
					<?}elseif(LANGUAGE_ID=='cz'){?>
					<table class="business-type three-column">
						<tr>
							<td class="bt-hotels"><a href="/cze/solution/hotely-a-lazne/"><i></i><?=GetMessage("Отели и курорты");?></a></td>
							<td class="bt-restaraunts"><a href="/cze/solution/restaurace-cz/"><i></i><?=GetMessage("Рестораны и комплексы");?></a></td>
							<td class="bt-sports"><a href="/cze/solution/sportovni-arealy/"><i></i><?=GetMessage("Спортивные объекты");?></a></td>
						</tr>
					</table>
					<table class="business-type three-column">
						<tr>
							<td class="bt-fitness"><a href="/cze/solution/spa-a-fitness/"><i></i><?=GetMessage("SPA и фитнес");?></a></td>
							<td class="bt-retail"><a href="/cze/solution/maloobchod/"><i></i><?=GetMessage("Ритейл");?></a></td>
							<td class="bt-study"><a href="/cze/solution/vzdelavaci-instituce/"><i></i><?=GetMessage("Учебные заведения");?></a></td>
						</tr>
					</table>
					<?}elseif(LANGUAGE_ID=='bg'){?>
					<table class="business-type three-column">
						<tr>
							<td class="bt-hotels"><a href="/bgr/solution/hotels-and-resorts/"><i></i><?=GetMessage("Отели и курорты");?></a></td>
							<td class="bt-restaraunts"><a href="/bgr/solution/complexes-and-restaurants/"><i></i><?=GetMessage("Рестораны и комплексы");?></a></td>
							<td class="bt-sports"><a href="/bgr/solution/sports-facilities/"><i></i><?=GetMessage("Спортивные объекты");?></a></td>
						</tr>
					</table>
					<table class="business-type three-column">
						<tr>
							<td class="bt-fitness"><a href="/bgr/solution/spa-and-fitness/"><i></i><?=GetMessage("SPA и фитнес");?></a></td>
							<td class="bt-retail"><a href="/bgr/solution/retail/"><i></i><?=GetMessage("Ритейл");?></a></td>
							<td class="bt-study"><a href="/bgr/solution/educational-institutions/"><i></i><?=GetMessage("Учебные заведения");?></a></td>
						</tr>
					</table>
					<?}elseif(LANGUAGE_ID=='hu'){?>
					<table class="business-type three-column">
						<tr>
							<td class="bt-hotels"><a href="/hun/solution/hotels-and-resorts/"><i></i><?=GetMessage("Отели и курорты");?></a></td>
							<td class="bt-restaraunts"><a href="/hun/solution/complexes-and-restaurants/"><i></i><?=GetMessage("Рестораны и комплексы");?></a></td>
							<td class="bt-sports"><a href="/hun/solution/sports-facilities/"><i></i><?=GetMessage("Спортивные объекты");?></a></td>
						</tr>
					</table>
					<table class="business-type three-column">
						<tr>
							<td class="bt-fitness"><a href="/hun/solution/spa-and-fitness/"><i></i><?=GetMessage("SPA и фитнес");?></a></td>
							<td class="bt-retail"><a href="/hun/solution/retail/"><i></i><?=GetMessage("Ритейл");?></a></td>
							<td class="bt-study"><a href="/hun/solution/educational-institutions/"><i></i><?=GetMessage("Учебные заведения");?></a></td>
						</tr>
					</table>
					<?}elseif(LANGUAGE_ID=='hr'){?>
						<table class="business-type three-column">
							<tr>
								<td class="bt-hotels"><a href="/hrv/solution/hotels-and-resorts/"><i></i><?=GetMessage("Отели и курорты");?></a></td>
								<td class="bt-restaraunts"><a href="/hrv/solution/complexes-and-restaurants/"><i></i><?=GetMessage("Рестораны и комплексы");?></a></td>
								<td class="bt-sports"><a href="/hrv/solution/sports-facilities/"><i></i><?=GetMessage("Спортивные объекты");?></a></td>
							</tr>
						</table>
						<table class="business-type three-column">
							<tr>
								<td class="bt-fitness"><a href="/hrv/solution/spa-and-fitness/"><i></i><?=GetMessage("SPA и фитнес");?></a></td>
								<td class="bt-retail"><a href="/hrv/solution/retail/"><i></i><?=GetMessage("Ритейл");?></a></td>
								<td class="bt-study"><a href="/hrv/solution/educational-institutions/"><i></i><?=GetMessage("Учебные заведения");?></a></td>
							</tr>
						</table>
					<?}?>
				</div>
				<i class="bt-line"></i>
			</div>
			<div class="index-info">
				<div class="inner-wrapper">
					<div class="ii-left">
						<div class="iil-logo">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/logo_info.png" alt="">
						</div>
						<div class="iil-info">
							<h3><?$APPLICATION->ShowTitle(false)?></h3>
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/index.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
							</div>
					</div>
					<div class="ii-right">
						<?
						$iblockID=array(
							'ru' => '13',
							'en' => '28',
							'cz' => '37',
							'bg' => '65',
							'hu' => '79',
							'hr' => '93'
						);
						?>
						<?$APPLICATION->IncludeComponent("bitrix:news.list", "main_news", Array(
							"IBLOCK_TYPE" => $iblockTreeType[LANGUAGE_ID],	// Тип информационного блока (используется только для проверки)
							"IBLOCK_ID" => $iblockID[LANGUAGE_ID],	// Код информационного блока
							"NEWS_COUNT" => "20",	// Количество новостей на странице
							"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
							"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
							"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
							"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
							"FILTER_NAME" => "",	// Фильтр
							"FIELD_CODE" => array(	// Поля
								0 => "",
								1 => "",
							),
							"PROPERTY_CODE" => array(	// Свойства
								0 => "",
								1 => "",
							),
							"CHECK_DATES" => "N",	// Показывать только активные на данный момент элементы
							"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
							"AJAX_MODE" => "N",	// Включить режим AJAX
							"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
							"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
							"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
							"CACHE_TYPE" => "A",	// Тип кеширования
							"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
							"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
							"CACHE_GROUPS" => "Y",	// Учитывать права доступа
							"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
							"ACTIVE_DATE_FORMAT" => "j F Y",	// Формат показа даты
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
							"DISPLAY_DATE" => "Y",	// Выводить дату элемента
							"DISPLAY_NAME" => "Y",	// Выводить название элемента
							"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
							"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
							"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
							),
							false
						);?>
						<div class="in-social">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/follow-us.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
						</div>
					</div>
				</div>
			</div>
			<div class="index-partners">
				<div class="inner-wrapper">
					<?#$GLOBALS["clientsFilter"]=array("!PREVIEW_PICTURE"=>"");?>
					<?/*$APPLICATION->IncludeComponent("bitrix:news.list", "main_clients", Array(
						"IBLOCK_TYPE" => ("ru"==LANGUAGE_ID?"rus_tree":"eng_tree"),	// Тип информационного блока (используется только для проверки)
						"IBLOCK_ID" => ("ru"==LANGUAGE_ID?"11":"27"),	// Код информационного блока
						"NEWS_COUNT" => "20",	// Количество новостей на странице
						"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
						"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
						"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
						"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
						"FILTER_NAME" => "clientsFilter",	// Фильтр
						"FIELD_CODE" => array(	// Поля
							0 => "",
							1 => "",
						),
						"PROPERTY_CODE" => array(	// Свойства
							0 => "BUSINESS_TYPE",
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
						"CACHE_GROUPS" => "Y",	// Учитывать права доступа
						"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
						"ACTIVE_DATE_FORMAT" => "j F Y",	// Формат показа даты
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
					);*/?>
					<?
					$APPLICATION->IncludeComponent("bitrix:news.list", "main_clients", Array(
						"IBLOCK_TYPE" => ("ru"==LANGUAGE_ID?"rus_dir":"rus_dir"),	// Тип информационного блока (используется только для проверки)
						"IBLOCK_ID" => ("ru"==LANGUAGE_ID?"35":"35"),	// Код информационного блока
						"NEWS_COUNT" => "20",	// Количество новостей на странице
						"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
						"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
						"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
						"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
						"FILTER_NAME" => "clientsFilter",	// Фильтр
						"FIELD_CODE" => array(	// Поля
							0 => "",
							1 => "",
						),
						"PROPERTY_CODE" => array(	// Свойства
							0 => "BUSINESS_TYPE",
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
						"CACHE_GROUPS" => "Y",	// Учитывать права доступа
						"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
						"ACTIVE_DATE_FORMAT" => "j F Y",	// Формат показа даты
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
					);
					?>
				</div>
			<?
			} // Для главной страницы
			else{
				// Внутренние страницы
			?>
			<div class="inner-header <?$APPLICATION->ShowProperty("inner-header-class");?>">
				<div class="ms-images">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/ph/<?$APPLICATION->ShowProperty("header-bg-image","inner_bg_01.jpg");?>" alt="">
				</div>
				<!-- <div class="ms-gradient"></div> -->
				<div class="inner-wrapper">
					<div class="header">
						<?
						$logo=array(
							'ru' => '/rus/',
							'en' => '/eng/',
							'cz' => '/cze/',
							'bg' => '/bgr/',
							'hu' => '/hun/',
							'hr' => '/hrv/'
						);
						?>
						<div class="h-logo inner-logo">
							<a href="<?=$logo[LANGUAGE_ID]?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo_new.png" alt=""></a>
							<p>Hospitality &amp; Retail Systems</p>
						</div>
						<div class="h-mobile-login">
							<b class="hm-menu"></b>
							<b class="hm-login"><i></i></b>
							<b class="hm-search"></b>
						</div>
						<div class="h-login">
							<a class="h-login-button" href="<?if(LANGUAGE_ID=="ru"){?>http://support.hrs.ru/crm/index.php<?}else{?>http://support.hrs.ru/crm/index_en.php<?}?>"><i></i><?=GetMessage("Вход в личный кабинет1");?></a>
							<div class="h-search">
								<?
								$search=array(
									'ru' => '/rus/search/',
									'en' => '/eng/search/',
									'cz' => '/cze/search/',
									'bg' => '/bgr/search/',
									'hu' => '/hun/search/',
									'hr' => '/hrv/search/'
								);
								?>
								<form action="<?=$search[LANGUAGE_ID]?>" method="GET">
									<input type="submit" class="search-submit" value="">
									<input type="search" name="q" class="search-input" required>
								</form>
							</div>
							<?$APPLICATION->IncludeFile("h-lang.php");?>
						<div class="h-phone">
							<?if(1 || isset($_REQUEST["debug"])){?>
							<?$APPLICATION->IncludeFile("h-phone.php");?>
							<?}else{?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_TEMPLATE_PATH."/inc/".LANGUAGE_ID."/phone.php",
									"EDIT_MODE" => "php",
								),
								false
							);?>
							<?}?>
							</div>
						<?$APPLICATION->IncludeComponent("bitrix:menu", "main", Array(
							"ROOT_MENU_TYPE" => "main",	// Тип меню для первого уровня
							"MENU_CACHE_TYPE" => "A",	// Тип кеширования
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MAX_LEVEL" => "2",	// Уровень вложенности меню
							"CHILD_MENU_TYPE" => "submain",	// Тип меню для остальных уровней
							"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							),
							false
						);?>
						<?if(1 || isset($_REQUEST["debug"])){?>
						<div class="h-region">
							<div tabindex="0" class="h-region__trigger">...</div>
						</div>
						<?}?>
						<b class="clr"></b>
					</div>
					<?if( !CSite::inDir("/rus/contracts/") && !CSite::inDir("/eng/contracts/") && !CSite::inDir("/cze/contracts/") && !CSite::inDir("/bgr/contracts/") && !CSite::inDir("/hun/contracts/") ){?>
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "bc", array(
						"START_FROM" => "0",
						"PATH" => "",
						"SITE_ID" => "-"
						),
						false
					);?>
					<?}?>
					<?/*?><h1><?$APPLICATION->ShowTitle(false)?></h1><?*/?>
<?$APPLICATION->ShowProperty("header-details");?>
				</div>
<?#$APPLICATION->ShowProperty("header-details-kp");?>
			</div>
			<div class="content">
			<?
			}
			?>
			<?if($APPLICATION->GetProperty("predtext")){?>
			<div class="inner-full-wrapper <?$APPLICATION->ShowProperty("predtext-dn","")?>">
				<div class="inner-description">
					<p><?$APPLICATION->ShowProperty("predtext")?></p>
				</div>
			</div>
			<?}?>
			<?
			// page_type
			$pageType=$APPLICATION->GetProperty("page_type","text");
			include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/include/'.LANGUAGE_ID.'/'.$pageType.'_header.php');
			?>