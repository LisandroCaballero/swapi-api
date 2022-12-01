<?php

namespace App\Services;


use App\Models\Vehicles;
use Illuminate\Support\Facades\Http;

class VehiclesService
{
    private Vehicles $vehicles;

    public function __construct(Vehicles $vehicles)
    {
       $this->vehicles = $vehicles;
    }


    public function getAll(): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        $starships = HTTP::get('https://swapi.dev/api/vehicles');
        $starships->json();

        return $starships;
    }

    public function fetch()
    {
        $response = Http::get('https://swapi.dev/api/vehicles');
        $spaces = json_decode($response->body());
        foreach ($spaces->results as $space) {
            $vehicles = new Vehicles();
            $vehicles->name = $space->name;
            $vehicles->model = $space->model;
            $vehicles->manufacturer = $space->manufacturer;
            $vehicles->cost_in_credits = $space->cost_in_credits;
            $vehicles->length = $space->length;
            $vehicles->max_atmosphering_speed = $space->max_atmosphering_speed;
            $vehicles->crew = $space->crew;
            $vehicles->passengers = $space->passengers;
            $vehicles->cargo_capacity = $space->cargo_capacity;
            $vehicles->consumables = $space->consumables;
            $vehicles->vehicle_class = $space->vehicle_class;
            $vehicles->pilots = $space->pilots;
            $vehicles->films = $space->films;
            $vehicles->created_at = $space->created;
            $vehicles->updated_at = $space->edited;
            $vehicles->url = $space->url;
            $vehicles->save();

        }


        return "DONE";
    }
}
