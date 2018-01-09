<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

$mainArr=array(
	'ru' => '<a href="/">Главная</a>',
	'en' => '<a href="/eng/">Main page</a>',
	'cz' => '<a href="/cze/">Hlavní strana</a>',
	'bg' => '<a href="/bgr/">Основните</a>',
	'hu' => '<a href="/hun/">Föoldal</a>',
	'hr' => '<a href="/hrv/">Naslovnica</a>'
);

$strReturn = '<ul class="breadcrumbs"><li>'.($mainArr[LANGUAGE_ID]).'</li>';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	#if($index > 0) $strReturn .= '<li><em>—</em></li>';

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index<=$itemSize-2)
		$strReturn .= '<li><em>—</em><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
	else
		$strReturn .= '<li><em>—</em><span>'.$title.'</span></li>';
	$lastName=$title;
}

$strReturn .= '</ul>
<h1>'.$title.'</h1>';
return $strReturn;
?>
