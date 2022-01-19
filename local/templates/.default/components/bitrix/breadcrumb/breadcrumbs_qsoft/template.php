<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}
if (empty($arResult)) {return '';}

$strReturn = '<nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">';

for ($index = 0, $lastElement = count($arResult) - 1; $index <= $lastElement; $index++) {
    $strReturn .= ($index === $lastElement) ? '<span>' . $arResult[$index]['TITLE'] . '</span></nav>' : '<a class="hover:text-orange" href="' . $arResult[$index]['LINK'] . '">'. $arResult[$index]['TITLE'] .'</a><svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" /></svg>';
}

return $strReturn;
