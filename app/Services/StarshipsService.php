<?php

namespace App\Services;

use App\Http\Resources\StarshipResource;
use App\Models\Starships;
use Exception;
use Illuminate\Support\Facades\Http;

class StarshipsService
{

    private Starships $starships;

    public function __construct(Starships $starships)
    {
        $this->starships = $starships;
    }

    public function getAll(): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        $starships = HTTP::get('https://swapi.dev/api/starships');
        $starships->json();

        return $starships;
    }

    /**
     * @throws Exception
     */
    public function fetch()
    {
        $response = Http::get('https://swapi.dev/api/starships');
        $spaces = json_decode($response->body());
            foreach ($spaces->results as $space) {
                $starship = new Starships;
                $starship->name = $space->name;
                $starship->model = $space->model;
                $starship->manufacturer = $space->manufacturer;
                $starship->cost_in_credits = $space->cost_in_credits;
                $starship->length = $space->length;
                $starship->max_atmosphering_speed = $space->max_atmosphering_speed;
                $starship->crew = $space->crew;
                $starship->passengers = $space->passengers;
                $starship->cargo_capacity = $space->cargo_capacity;
                $starship->consumables = $space->consumables;
                $starship->hyperdrive_rating = $space->hyperdrive_rating;
                $starship->mglt = $space->MGLT;
                $starship->starship_class = $space->starship_class;
                $starship->pilots = $space->pilots;
                $starship->films = $space->films;
                $starship->created_at = $space->created;
                $starship->updated_at = $space->edited;
                $starship->url = $space->url;
                $starship->save();

            }


        return "DONE";
    }


}
