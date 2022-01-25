<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

\CBitrixComponent::includeComponentClass('bitrix:advertising.banner');

class QsoftBanner extends AdvertisingBanner
{
    public function onPrepareComponentParams(array $params) : array
    {
        global $USER;

        $newParams = parent::onPrepareComponentParams($params);

        if (! $USER->IsAuthorized()) {
            $newParams['QUANTITY'] = 1;
        }
        return $newParams;
    }
    protected function loadBanners() : void
    {
        parent::loadBanners();
        if (! empty($this->arResult['BANNERS_PROPERTIES'])) {
            $imageFilter = [];
            foreach ($this->arResult['BANNERS_PROPERTIES'] as $item) {
                if (isset($item['IMAGE_ID'])) {
                    $imageFilter[] = $item['IMAGE_ID'];
                }
            }

            if (! empty($imageFilter)) {
                if ($requestFilesDB = \CFile::GetList([], ['MODULE_ID' => 'advertising', '@ID' => $imageFilter])) {
                    $imagesSRC = [];
                    while ($responseFilesDB = $requestFilesDB->GetNext()) {
                        $imagesSRC[$responseFilesDB['ID']] = \CFile::GetFileSRC($responseFilesDB);
                    }
                }
            }

            foreach ($this->arResult['BANNERS_PROPERTIES'] as &$banner) {
                $banner['IMAGE_SRC'] = $imagesSRC[$banner['IMAGE_ID']] ?? NO_IMAGE_PATH;
            }
        }
    }
}
