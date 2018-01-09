<?php
/**
 * Created by PhpStorm.
 * User: nikello
 * Date: 27.12.2016
 * Time: 23:50
 */

function pre($param)
{
    global $USER;
    if ($USER->IsAdmin()) {
        echo '<pre>';
        print_r($param);
        echo '</pre>';
    }
}

function sizeFormatted($size)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}

function ShowTextBlock($iblockID, $elementID, $isTop = false)
{

    echo '<!--## ShowTextBlock ' . $iblockID . ' - ' . $elementID . '-->';
    $arFilter = array(
        "IBLOCK_ID" => $iblockID,
        "ID" => $elementID
    );

    $arTypes  = array();
    $arTypesOnXml  = array();
    $propertyEnums = CIBlockPropertyEnum::GetList(
        Array("ID"=>"ASC"),
        Array("IBLOCK_ID"=>$iblockID, "CODE"=>"TYPE")
    );
    while ($enumFields = $propertyEnums->Fetch()) {
        $arTypes[$enumFields['ID']] = $enumFields;
        $arTypesOnXml[$enumFields['XML_ID']] = $enumFields;
    }

    if ($isTop) {
        $arFilter["PROPERTY_TYPE"] = $arTypesOnXml[1]["ID"];
    } else {
        $arFilter["!PROPERTY_TYPE"] = $arTypesOnXml[1]["ID"];
    }


    $res = CIBlockElement::GetList(
        array("sort" => "asc"),
        $arFilter,
        false,
        false,
        array("*", "PROPERTY_TYPE", "PROPERTY_TEXTBLOCK")
    );
    if ($arItem = $res->GetNext()) {


        switch ($arTypes[$arItem["PROPERTY_TYPE_ENUM_ID"]]["XML_ID"]) {
            case 1: // Первый блок (в шапке сайта)
                ?>
                <div class="header-details">
                    <div class="hd-description">
                        <div class="hd-next-wrap">
                            <?/*<a href="" class="hd-next">
                        <p>Следующий продукт</p>
                        <h3>Micros 3700</h3>
                        <i></i>
                  </a>*/
                            ?>
                        </div>
                        <h2><?= $arItem["NAME"] ?></h2>
                        <div class="hdd-text">
                            <p><?= $arItem["PREVIEW_TEXT"] ?></p>
                        </div>
                    </div>
                    <div class="hd-features">
                        <?
                        if (isset($arItem["PROPERTY_TEXTBLOCK_VALUE"][0]["TEXT"])) {
                            echo $arItem["PROPERTY_TEXTBLOCK_VALUE"][0]["TEXT"];
                        }
                        ?>
                    </div>
                    <div class="hd-image">
                        <? if ($arItem["PREVIEW_PICTURE"]) {
                            ?><img src="<?= MakeImage($arItem["PREVIEW_PICTURE"], array("w" => 371, "f" => "png")) ?>"
                                   alt=""><?
                        } ?>
                    </div>
                    <div class="clr"></div>
                </div>
                <?
                break;
            case 2: // Заголовок и текст
                ?>
                <div class="multi-block">
                    <div class="inner-wrapper">
                        <div class="inner-text">
                            <h4><?= $arItem["NAME"] ?></h4>
                            <?= $arItem["PREVIEW_TEXT"] ?>
                        </div>
                    </div>
                </div>
                <?
                break;
            case 3: // Текст слева, фото справа
                ?>
                <div class="multi-block">
                    <div class="inner-wrapper">
                        <?/*?><div class="hd-image-mobile">
                  <?if($arItem["PREVIEW_PICTURE"]){?><img src="<?=MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>461,"h"=>475,"f"=>"png"))?>" alt=""><?}?>
            </div><?*/
                        ?>
                        <div class="two-column rightish">
                            <div class="left-half">
                                <h4><?= $arItem["NAME"] ?></h4>
                                <?= $arItem["PREVIEW_TEXT"] ?>
                            </div>
                            <div class="right-half">
                                <? if ($arItem["PREVIEW_PICTURE"]) {
                                    ?><img src="<?= CFile::GetPath($arItem["PREVIEW_PICTURE"]) ?>" alt=""><?
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                break;
            case 4: // Текст справа, фото слева
                ?>
                <div class="multi-block">
                    <div class="inner-wrapper">
                        <?/*?><div class="hd-image-mobile">
                  <?if($arItem["PREVIEW_PICTURE"]){?><img src="<?=MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>461,"h"=>475,"f"=>"png"))?>" alt=""><?}?>
            </div><?*/
                        ?>
                        <div class="two-column lefttish">
                            <div class="right-half">
                                <h4><?= $arItem["NAME"] ?></h4>
                                <?= $arItem["PREVIEW_TEXT"] ?>
                            </div>
                            <div class="left-half">
                                <? if ($arItem["PREVIEW_PICTURE"]) {
                                    ?><img src="<?= CFile::GetPath($arItem["PREVIEW_PICTURE"]) ?>" alt=""><?
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                break;
            case 5: // одна широкая картинка
                ?>
                <div class="multi-block">
                    <div class="ind-wrapper">
                        <div class="inner-full-wrapper">
                            <div class="inner-description">
                                <p><?= $arItem["PREVIEW_TEXT"] ?></p>
                            </div>
                        </div>
                    </div>
                    <? if ($arItem["PREVIEW_PICTURE"]) {
                        ?>
                        <div class="product-big-image resize-bg">
                            <img src="<?= CFile::GetPath($arItem["PREVIEW_PICTURE"]) ?>" alt="">
                        </div>
                        <?
                    } ?>
                </div>
                <?
                break;
            case 6: // Множество текстов
                $textsAll = $arItem["PROPERTY_TEXTBLOCK_VALUE"];
                #pre($arItem);
                $texts = array();
                $icons = array();
                $strToIcon = array(
                    "battery" => "battery.png",
                    "diagram" => "diagram.png",
                    "settings" => "settings.png",
                    "check-it" => "check-it.png",
                    "clock" => "clock.png",
                    "default" => "default.png",
                    "cloud" => "cloud.png",
                    "cloud-in" => "cloud-in.png"
                );


                if( !empty( $textsAll['TEXT'] ) ){
                    $tmpText = $textsAll;
                    $textsAll = array();
                    $textsAll[] = $tmpText;
                }

                foreach ($textsAll as $i => $text) {

                    if (strlen($text["TEXT"])) {
                        $texts[$i % 2][] = $text["TEXT"];
                        $icon = trim($arItem["PROPERTY_TEXTBLOCK_DESCRIPTION"][$i]);
                        #echo $icon;
                        if (!strlen($icon) || !isset($strToIcon[$icon])) {
                            $icon = "default";
                        }

                        $icons[$i % 2][] = $strToIcon[$icon];
                    }
                }
                #pre($arItem);
                ?>
                <div class="multi-block">
                    <div class="inner-wrapper">
                        <div class="two-column">
                            <h4><?= $arItem["NAME"] ?></h4>
                            <? if ($arItem["PREVIEW_TEXT"]) {
                                ?>
                                <div class="tc-inner-description">
                                    <p><?= $arItem["PREVIEW_TEXT"] ?></p>
                                </div>
                                <?
                            } ?>
                            <div class="left-half">
                                <? foreach ($texts[0] as $i => $text) {
                                    ?>
                                    <div class="product-feature">
                                        <i><img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/<?= $icons[0][$i] ?>"
                                                alt=""></i>
                                        <div class="pf-text">
                                            <p><?= html_entity_decode($text) ?></p>
                                        </div>
                                    </div>
                                    <?
                                } ?>
                            </div>
                            <?
                            if( !empty($texts[1]) ){
                                ?><div class="right-half">
                                <? foreach ($texts[1] as $i => $text) {
                                    ?>
                                    <div class="product-feature">
                                        <i><img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/<?= $icons[1][$i] ?>"
                                                alt=""></i>
                                        <div class="pf-text">
                                            <p><?= html_entity_decode($text) ?></p>
                                        </div>
                                    </div>
                                    <?
                                } ?>
                                </div><?
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <?
                break;
            default:
                break;
        }
    }
}

function getDateMonth($ruStandart)
{ // конвертирует формат даты с 04.11.2008 в 04 Ноября, 2008
    $MES = array(
        "01" => "января",
        "02" => "февраля",
        "03" => "марта",
        "04" => "апреля",
        "05" => "мая",
        "06" => "июня",
        "07" => "июля",
        "08" => "августа",
        "09" => "сентября",
        "10" => "октября",
        "11" => "ноября",
        "12" => "декабря"
    );
    $arData = explode(".", $ruStandart);
    $d = ($arData[0] < 10) ? substr($arData[0], 1) : $arData[0];

    $newData = $d . " " . $MES[$arData[1]] . " " . $arData[2];
    return $newData;
}

function small_russian_date()
{
    $translation = array(
        "am" => "дп",
        "pm" => "пп",
        "AM" => "ДП",
        "PM" => "ПП",
        "Monday" => "понедельник",
        "Mon" => "пн",
        "Tuesday" => "вторник",
        "Tue" => "вт",
        "Wednesday" => "среда",
        "Wed" => "ср",
        "Thursday" => "четверг",
        "Thu" => "чт",
        "Friday" => "пятница",
        "Fri" => "пт",
        "Saturday" => "суббота",
        "Sat" => "сб",
        "Sunday" => "воскресенье",
        "Sun" => "вс",
        "January" => "января",
        "Jan" => "янв",
        "February" => "февраля",
        "Feb" => "фев",
        "March" => "марта",
        "Mar" => "мар",
        "April" => "апреля",
        "Apr" => "апр",
        "May" => "мая",
        "June" => "июня",
        "Jun" => "июн",
        "July" => "июля",
        "Jul" => "июл",
        "August" => "августа",
        "Aug" => "авг",
        "September" => "сентября",
        "Sep" => "сен",
        "October" => "октября",
        "Oct" => "окт",
        "November" => "ноября",
        "Nov" => "ноя",
        "December" => "декабря",
        "Dec" => "дек",
        "st" => "ое",
        "nd" => "ое",
        "rd" => "е",
        "th" => "ое",
    );
    if (func_num_args() > 1) {
        $timestamp = func_get_arg(1);
        return strtr(date(func_get_arg(0), $timestamp), $translation);
    } else {
        return strtr(date(func_get_arg(0)), $translation);
    }
}

function russian_date()
{
    $translation = array(
        "am" => "дп",
        "pm" => "пп",
        "AM" => "ДП",
        "PM" => "ПП",
        "Monday" => "Понедельник",
        "Mon" => "Пн",
        "Tuesday" => "Вторник",
        "Tue" => "Вт",
        "Wednesday" => "Среда",
        "Wed" => "Ср",
        "Thursday" => "Четверг",
        "Thu" => "Чт",
        "Friday" => "Пятница",
        "Fri" => "Пт",
        "Saturday" => "Суббота",
        "Sat" => "Сб",
        "Sunday" => "Воскресенье",
        "Sun" => "Вс",
        "January" => "Января",
        "Jan" => "Янв",
        "February" => "Февраля",
        "Feb" => "Фев",
        "March" => "Марта",
        "Mar" => "Мар",
        "April" => "Апреля",
        "Apr" => "Апр",
        "May" => "Мая",
        "June" => "Июня",
        "Jun" => "Июн",
        "July" => "Июля",
        "Jul" => "Июл",
        "August" => "Августа",
        "Aug" => "Авг",
        "September" => "Сентября",
        "Sep" => "Сен",
        "October" => "Октября",
        "Oct" => "Окт",
        "November" => "Ноября",
        "Nov" => "Ноя",
        "December" => "Декабря",
        "Dec" => "Дек",
        "st" => "ое",
        "nd" => "ое",
        "rd" => "е",
        "th" => "ое",
    );
    if (func_num_args() > 1) {
        $timestamp = func_get_arg(1);
        return strtr(date(func_get_arg(0), $timestamp), $translation);
    } else {
        return strtr(date(func_get_arg(0)), $translation);
    }
}

/**
 * Генерация превьюшек для больших изображений
 *
 * @param string $src путь от корня сайта к исходной картинке
 * @param int $size размер изображения (сторона квадрата в пикселях)
 * @param int $lifeTime время жизни превьюшки в секундах (по дефолту месяц)
 * @return string
 */
function MakeImage($src, $params = false)
{
    if (!is_array($params) AND is_numeric($params)) $params = array('w' => intval($params)); // подмена
    if (is_numeric($src)) if ($src > 0) $src = CFile::GetPath($src);
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $src)) {
        $ext = strtolower(pathinfo($_SERVER['DOCUMENT_ROOT'] . $src, PATHINFO_EXTENSION)); // Расширение файла картинки
        $allowed_ext = array("jpg", "jpeg", "gif", "png");
        if (in_array($ext, $allowed_ext)) {
            $base_name = basename($src, "." . $ext); // Основное имя файла (без расширения)
            $code = substr(md5(serialize($params)), 8, 16); // сократим суффикс с параметрами до 16 символов, но возьмем его из середины хэша
            $newExt = $ext;
            if (isset($params["f"])) {
                $newExt = $params["f"];
            }
            $target_file = $_SERVER['DOCUMENT_ROOT'] . dirname($src) . "/" . $base_name . "_thumb_" . $code . "." . $newExt; // Имя файла с превьюшкой
            $source_filemtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $src);
            if (file_exists($target_file)) $target_filemtime = filemtime($target_file);
            else $target_filemtime = 0;
            if ($source_filemtime > $target_filemtime) { // файл-исходник обновлен, либо нету сгенерированного
                require_once($_SERVER['DOCUMENT_ROOT'] . "/local/lib/phpThumb/phpthumb.class.php"); // Подключаем и иннициализируем phpThumb
                $phpThumb = new phpThumb();
                $phpThumb->f = $ext;
                $phpThumb->src = $src;
                $phpThumb->config_allow_src_above_docroot = true; // Разрешаем работать в других разделах (для многосайтовости)
                // Дефолтные параметры:
                $phpThumb->q = 100;
                $phpThumb->bg = "ffffff";
                $phpThumb->far = "C";
                $phpThumb->aoe = 0;
                /*$phpThumb->zc = 1;*/
                // Применение всех параметров
                if (is_array($params)) {
                    foreach ($params as $param => $value) {
                        $phpThumb->$param = $value;
                    }
                }
                $phpThumb->GenerateThumbnail();
                $phpThumb->RenderToFile($target_file);
            }
        }
        if (file_exists($target_file)) {
            return substr($target_file, strlen($_SERVER['DOCUMENT_ROOT']));
        }
    }
    return false;
}
