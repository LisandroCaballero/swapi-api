<?php

namespace App\Http\Resources;

use App\JsonApi\Traits\JsonApiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    use JsonApiResource;

    public function toJsonApi(): array
    {
        return [
            'name' => $this->resource->name,
            'model' => $this->resource->model,
            'manufacturer' => $this->resource->manufacturer,
            'cost_in_credits' => $this->resource->cost_in_credits,
            'length' => $this->resource->length,
            'max_atmosphering_speed' => $this->resource->max_atmosphering_speed,
            'crew' => $this->resource->crew,
            'passengers' => $this->resource->passengers,
            'cargo_capacity' => $this->resource->cargo_capacity,
            'consumables' => $this->resource->consumables,
            'vehicle_class' => $this->resource->vehicle_class,
            'pilots' => $this->resource->pilots,
            'films' => $this->resource->films,
            'url' => $this->resource->url,
        ];
    }
}
