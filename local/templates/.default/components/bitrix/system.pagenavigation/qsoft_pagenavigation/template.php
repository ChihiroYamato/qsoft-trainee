<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}
if (empty($arResult) || (! $arResult['NavShowAlways'] && ($arResult['NavRecordCount'] == 0 || ($arResult['NavPageCount'] == 1 && $arResult['NavShowAll'] == false)))) {
    return;
}

$strNavQueryString = $arResult['NavQueryString'] != '' ? $arResult['NavQueryString'].'&amp;' : '';
$strNavQueryStringFull = $arResult['NavQueryString'] != '' ? '?'.$arResult['NavQueryString'] : '';
?>
<div>
    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px text-lg" aria-label="Pagination">
        <?php if ($arResult['NavPageNomer'] > 1) :?>
            <a href="<?="{$arResult['sUrlPath']}?{$strNavQueryString}PAGEN_{$arResult['NavNum']}=" . ($arResult['NavPageNomer'] - 1)?>" class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="<?=$arResult['sUrlPath'] . $strNavQueryStringFull?>" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">1</a>
        <?php else :?>
            <span class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
            <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300">1</span>
        <?php endif?>
        <?php for ($navSpaceCheck = true; $arResult['nStartPage'] <= $arResult['nEndPage']; $arResult['nStartPage']++) :?>
            <?php if ($arResult['nStartPage'] == 1 || ($arResult['nStartPage'] == $arResult['nEndPage'] && $arResult['NavPageCount'] == $arResult['nEndPage'])) :
                continue;
            endif?>
            <?php if ($navSpaceCheck && $arResult['nStartPage'] - 1 > 1) :?>
                <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">...</span>
            <?php endif?>
            <?php if ($arResult['nStartPage'] == $arResult['NavPageNomer']) :?>
                <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300"><?=$arResult['nStartPage']?></span>
            <?php else :?>
                <a href="<?="{$arResult['sUrlPath']}?{$strNavQueryString}PAGEN_{$arResult['NavNum']}={$arResult['nStartPage']}"?>" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white"><?=$arResult['nStartPage']?></a>
            <?php endif?>
            <?php if ($arResult['nStartPage'] == $arResult['nEndPage'] && $arResult['nEndPage'] < $arResult['NavPageCount']) :?>
                <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">...</span>
            <?php endif?>
            <?php $navSpaceCheck = false?>
        <?php endfor?>
        <?php if ($arResult['NavPageNomer'] < $arResult['NavPageCount']) :?>
            <a href="<?="{$arResult['sUrlPath']}?{$strNavQueryString}PAGEN_{$arResult['NavNum']}={$arResult['NavPageCount']}"?>" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white"><?=$arResult['NavPageCount']?></a>
            <a href="<?="{$arResult["sUrlPath"]}?{$strNavQueryString}PAGEN_{$arResult["NavNum"]}=" . ($arResult["NavPageNomer"]+1)?>" class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        <?php else :?>
            <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300"><?=$arResult['NavPageCount']?></span>
            <span class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
        <?php endif?>
    </nav>
</div>
