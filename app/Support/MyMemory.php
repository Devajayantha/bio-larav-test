<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;

class MyMemory
{
    /**
     * The URL of the MyMemory API.
     *
     * @var string
     */
    public string $url = "https://api.mymemory.translated.net/get";

    /**
     * The default locale.
     *
     * @var string
     */
    public string $defaultLocale = 'en';


    /**
     * Translate the given text to the specified locale.
     *
     * @param string $text
     * @param string $to
     * @return array
     */
    public function translate(string $text, string $to = 'id'): array
    {
        $url = $this->url . "?q=" . urlencode($text) . "&langpair=" . $this->defaultLocale . "|" . $to;

        try {
            $response = Http::get($url);

            if ($response->ok()) {
                $responseData = $response->json();

                if ($responseData['responseStatus'] == 200) {
                    return [
                        'success' => true,
                        'data' => $responseData['responseData']['translatedText']
                    ];
                }
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'data' => 'Error: An exception occurred while fetching the translation: ' . $e->getMessage()
            ];
        }

        return [
            'success' => false,
            'data' => 'Error: Unable to fetch translated text.'
        ];
    }
}
