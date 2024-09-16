<?php

namespace App\Http\Resources;

use App\Support\Resources\MappingTranslate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @see \App\Models\Advice
 */
class DetailAdviceResource extends JsonResource
{
    use MappingTranslate;

    /**
     * The resource instance.
     *
     * @var mixed
     */
    protected $languageResource;

    /**
     * {@inheritDoc}
     */
    public function __construct($resource, $languageResource)
    {
        $this->resource = $resource;
        $this->languageResource = $languageResource;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'main_data' => [
                'name' => $this->translate('en')->name,
                'information' => $this->translate('en')->information,
                'actual_tip' => $this->translate('en')->actual_tip,
                'tip_example' => $this->translate('en')->tip_example,
            ],
            'translations' => $this->mappingTranslate(),
        ];
    }
}
