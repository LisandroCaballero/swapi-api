<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Vehicles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VehiclesController
 */
class VehiclesControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $vehicles = Vehicles::factory()->count(3)->create();

        $response = $this->get(route('api.v1.vehicles.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }



    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $model = $this->faker->word;
        $manufacturer = $this->faker->word;
        $cost_in_credits = $this->faker->word;
        $length = $this->faker->word;
        $max_atmosphering_speed = $this->faker->word;
        $crew = $this->faker->word;
        $passengers = $this->faker->word;
        $cargo_capacity = $this->faker->word;
        $consumables = $this->faker->word;
        $vehicle_class = $this->faker->word;
        $pilots = $this->faker->word;
        $films = $this->faker->word;
        $url = $this->faker->url;

        $response = $this->post(route('api.v1.vehicles.store'), [
            'name' => $name,
            'model' => $model,
            'manufacturer' => $manufacturer,
            'cost_in_credits' => $cost_in_credits,
            'length' => $length,
            'max_atmosphering_speed' => $max_atmosphering_speed,
            'crew' => $crew,
            'passengers' => $passengers,
            'cargo_capacity' => $cargo_capacity,
            'consumables' => $consumables,
            'vehicle_class' => $vehicle_class,
            'pilots' => $pilots,
            'films' => $films,
            'url' => $url,
        ]);

        $vehicles = Vehicles::query()
            ->where('name', $name)
            ->where('model', $model)
            ->where('manufacturer', $manufacturer)
            ->where('cost_in_credits', $cost_in_credits)
            ->where('length', $length)
            ->where('max_atmosphering_speed', $max_atmosphering_speed)
            ->where('crew', $crew)
            ->where('passengers', $passengers)
            ->where('cargo_capacity', $cargo_capacity)
            ->where('consumables', $consumables)
            ->where('vehicle_class', $vehicle_class)
            ->where('pilots', $pilots)
            ->where('films', $films)
            ->where('url', $url)
            ->get();

        $vehicle = $vehicles->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $vehicle = Vehicles::factory()->create();

        $response = $this->get(route('api.v1.vehicles.show', $vehicle));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }




    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $vehicle = Vehicles::factory()->create();
        $name = $this->faker->name;
        $model = $this->faker->word;
        $manufacturer = $this->faker->word;
        $cost_in_credits = $this->faker->word;
        $length = $this->faker->word;
        $max_atmosphering_speed = $this->faker->word;
        $crew = $this->faker->word;
        $passengers = $this->faker->word;
        $cargo_capacity = $this->faker->word;
        $consumables = $this->faker->word;
        $vehicle_class = $this->faker->word;
        $pilots = $this->faker->word;
        $films = $this->faker->word;
        $url = $this->faker->url;

        $response = $this->put(route('api.v1.vehicles.update', $vehicle), [
            'name' => $name,
            'model' => $model,
            'manufacturer' => $manufacturer,
            'cost_in_credits' => $cost_in_credits,
            'length' => $length,
            'max_atmosphering_speed' => $max_atmosphering_speed,
            'crew' => $crew,
            'passengers' => $passengers,
            'cargo_capacity' => $cargo_capacity,
            'consumables' => $consumables,
            'vehicle_class' => $vehicle_class,
            'pilots' => $pilots,
            'films' => $films,
            'url' => $url,
        ]);

        $vehicle->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $vehicle->name);
        $this->assertEquals($model, $vehicle->model);
        $this->assertEquals($manufacturer, $vehicle->manufacturer);
        $this->assertEquals($cost_in_credits, $vehicle->cost_in_credits);
        $this->assertEquals($length, $vehicle->length);
        $this->assertEquals($max_atmosphering_speed, $vehicle->max_atmosphering_speed);
        $this->assertEquals($crew, $vehicle->crew);
        $this->assertEquals($passengers, $vehicle->passengers);
        $this->assertEquals($cargo_capacity, $vehicle->cargo_capacity);
        $this->assertEquals($consumables, $vehicle->consumables);
        $this->assertEquals($vehicle_class, $vehicle->vehicle_class);
        $this->assertEquals($pilots, $vehicle->pilots);
        $this->assertEquals($films, $vehicle->films);
        $this->assertEquals($url, $vehicle->url);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $vehicle = Vehicles::factory()->create();

        $response = $this->delete(route('api.v1.vehicles.destroy', $vehicle));

        $response->assertNoContent();

        $this->assertModelMissing($vehicle);
    }
}
