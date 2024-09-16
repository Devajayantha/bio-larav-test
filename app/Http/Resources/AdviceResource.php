<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdviceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $defaultLanguage = $this->translations->firstWhere('locale', 'en');

        return [
            'id' => $this->id,
            'name' => $this->name ?? $defaultLanguage->name,
            'information' => $this->information ?? $defaultLanguage->information,
            'actual_tip' => $this->actual_tip ?? $defaultLanguage->actual_tip,
            'tip_example' => $this->tip_example ?? $defaultLanguage->tip_example,
        ];
    }
}
