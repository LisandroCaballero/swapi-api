<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        return [
            'name' => ['required', 'string'],
            'model' => ['required', 'string'],
            'manufacturer' => ['required', 'string'],
            'cost_in_credits' => ['required', 'string'],
            'length' => ['required', 'string'],
            'max_atmosphering_speed' => ['required', 'string'],
            'crew' => ['required', 'string'],
            'passengers' => ['required', 'string'],
            'cargo_capacity' => ['required', 'string'],
            'consumables' => ['required', 'string'],
            'vehicle_class' => ['required', 'string'],
            'pilots' => ['nullable'],
            'films' => ['nullable'],
            'url' => ['required', 'string', 'url'],
        ];
    }
}
