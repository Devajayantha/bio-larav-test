<?php

namespace App\Support\Resources;

trait MappingTranslate
{
    /**
     * Show specific translation by locale with fallback to default locale.
     *S
     * @return array
     */
    public function mappingTranslate(): array
    {
        $dataName = $dataInformation =  $dataActual = $dataTip = [];

        foreach ($this->languageResource as $language) {
            $dataName[] = [
                'title' => $this->translate($language->code)?->name,
                'locale' => $language->code,
                'name_locale' => $language->name,
            ];

            $dataInformation[] = [
                'title' => $this->translate($language->code)?->information,
                'locale' => $language->code,
                'name_locale' => $language->name,
            ];

            $dataActual[] = [
                'title' => $this->translate($language->code)?->actual_tip,
                'locale' => $language->code,
                'name_locale' => $language->name,
            ];

            $dataTip[] = [
                'title' => $this->translate($language->code)?->tip_example,
                'locale' => $language->code,
                'name_locale' => $language->name,
            ];
        }

        return [
            'name' => $dataName,
            'information' => $dataInformation,
            'actual_tip' => $dataActual,
            'tip_example' => $dataTip,
        ];
    }
}
