<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

use Bitrix\Main\Loader;

\CBitrixComponent::includeComponentClass('qsoft:stores.list');

class QsoftModelWeek extends \QsoftStoresComponent
{
    public function executeComponent()
    {
        $showButt = $this->getComponentButtons();

        if ($this->startResultCache(false, $showButt)) {
            if (! (Loader::includeModule('iblock') && Loader::includeModule('sale'))) {
                $this->abortResultCache();
                return;
            }

            $this->arResult = $this->getDBResponse($this->getDBParams());

            if (! empty($this->arResult['ITEMS'])) {

                $this->arResult = $this->getElementsImage();
                $this->arResult = $this->getElementsButtons($showButt);

                $this->arResult = $this->getPrice();
                $this->arResult = $this->getDiscountPrice();

                $this->setResultCacheKeys([]);
                $this->IncludeComponentTemplate();
            }
        }
    }

    protected function getDBParams() : array
    {
        $paramsDB = parent::getDBParams();

        $paramsDB['filter']['!PROPERTY_MODEL_WEEKS'] = false;
        $paramsDB['selectFields'] = [
            'IBLOCK_ID',
            'ID',
            'NAME',
            'PREVIEW_PICTURE',
            'DETAIL_PAGE_URL',
            'PROPERTY_MODEL_WEEKS',
        ];

        return $paramsDB;
    }

    protected function getPrice() : array
    {
        if (! empty($this->arResult['ITEMS'])) {
            $filter = [];
            foreach ($this->arResult['ITEMS'] as $item) {
                $filter['@PRODUCT_ID'][] = $item['ID'];
            }

            $selectFields = ['PRODUCT_ID', 'PRICE', 'CURRENCY'];

            if ($requestDB = \CPrice::GetList([], $filter, false, false, $selectFields)) {
                $responseDB = [];
                $arPrice = [];
                while ($responseDB = $requestDB->GetNext()) {
                    $arPrice[$responseDB['PRODUCT_ID']] = [
                        'PRICE' => (int) $responseDB['PRICE'],
                        'CURRENCY' => $responseDB['CURRENCY'],
                    ];
                }

                foreach ($this->arResult['ITEMS'] as $key => &$product) {
                    if (isset($arPrice[$key])) {
                        $product = array_merge($product, $arPrice[$key]);
                    }
                }
            }
        }

        return $this->arResult;
    }

    protected function getDiscountPrice() : array
    {
        if (! empty($this->arResult['ITEMS'])) {
            $Params = [
                'filter' => [
                    'ACTIVE' => 'Y',
                ],
                'select' => [
                    'ID',
                    'CONDITIONS_LIST',
                    'SHORT_DESCRIPTION_STRUCTURE',
                ],
            ];

            if ($requestDB = \Bitrix\Sale\Internals\DiscountTable::getList($Params)) {
                $responseDB = [];
                $arDiscount = [];
                while ($responseDB = $requestDB->Fetch()) {
                    if (isset($responseDB['SHORT_DESCRIPTION_STRUCTURE']) && $responseDB['SHORT_DESCRIPTION_STRUCTURE']['VALUE_TYPE'] === 'P') {
                        foreach ($responseDB['CONDITIONS_LIST']['CHILDREN'] as $group) {
                            foreach ($group['CHILDREN'] as $list) {
                                foreach ($list['DATA']['value'] as $element) {
                                    $arDiscount[$element] = (100 - ((int) $responseDB['SHORT_DESCRIPTION_STRUCTURE']['VALUE'])) / 100;
                                }
                            }
                        }
                    }
                }

                foreach ($this->arResult['ITEMS'] as $key => &$product) {
                    if (isset($arDiscount[$key])) {
                        $product['OLD_PRICE'] = $product['PRICE'];
                        $product['PRICE'] = round($product['PRICE'] * $arDiscount[$key]);
                    }
                }
            }
        }

        return $this->arResult;
    }
}
