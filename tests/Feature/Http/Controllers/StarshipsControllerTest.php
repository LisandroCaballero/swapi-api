<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Starships;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StarshipsController
 * @method assertActionUsesFormRequest(string $class, string $string, string $class1)
 */
class StarshipsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $starships = Starships::factory()->count(3)->create();

        $response = $this->getJson(route('api.v1.starships.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }



    /** @test */
    public function can_create_starships()
    {
        $response = $this->postJson(route('api.v1.starships.store'),[
            'data' => [
                'type' => 'starships',
                'attributes' => [
                    'name' => 'nuevo dato',
                    'model' => 'nuevo dato',
                    'manufacturer' => 'nuevo dato',
                    'cost_in_credits' => 'nuevo dato',
                    'length' => 'nuevo dato',
                    'max_atmosphering_speed' => 'nuevo dato',
                    'crew' => 'nuevo dato',
                    'passengers' => 'nuevo dato',
                    'cargo_capacity' => 'nuevo dato',
                    'consumables' => 'nuevo dato',
                    'hyperdrive_rating' => 'nuevo dato',
                    'MGLT' => 'nuevo dato',
                    'starship_class' => 'nuevo dato',
                    'pilots' => 'null',
                    'films' => 'null',
                    'url' => 'nuevo dato',
                ],
            ]
        ]);

        $starship = Starships::first();

        $response->assertExactJson([
            'data' => [
                'type' => 'starship',
                'id' => (string) $starship->getRouteKey(),
                'attributes' => [
                    'name' => 'nuevo dato',
                    'model' => 'nuevo dato',
                    'manufacturer' => 'nuevo dato',
                    'cost_in_credits' => 'nuevo dato',
                    'length' => 'nuevo dato',
                    'max_atmosphering_speed' => 'nuevo dato',
                    'crew' => 'nuevo dato',
                    'passengers' => 'nuevo dato',
                    'cargo_capacity' => 'nuevo dato',
                    'consumables' => 'nuevo dato',
                    'hyperdrive_rating' => 'nuevo dato',
                    'MGLT' => 'nuevo dato',
                    'starship_class' => 'nuevo dato',
                    'pilots' => 'null',
                    'films' => 'null',
                    'url' => 'nuevo dato'
                ],
                'links' =>[
                    'self' => route('api.v1.starships.show', $starship)
                ]
            ]
        ]);
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
        $hyperdrive_rating = $this->faker->word;
        $MGLT = $this->faker->word;
        $starship_class = $this->faker->word;
        $pilots = $this->faker->word;
        $films = $this->faker->word;
        $url = $this->faker->url;

        $response = $this->post(route('api.v1.starship.store'), [
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
            'hyperdrive_rating' => $hyperdrive_rating,
            'MGLT' => $MGLT,
            'starship_class' => $starship_class,
            'pilots' => $pilots,
            'films' => $films,
            'url' => $url,
        ]);

        $starships = Starships::query()
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
            ->where('hyperdrive_rating', $hyperdrive_rating)
            ->where('MGLT', $MGLT)
            ->where('starship_class', $starship_class)
            ->where('pilots', $pilots)
            ->where('films', $films)
            ->where('url', $url)
            ->get()->dump();
        $this->assertCount(1, $starships);
        $starship = $starships->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $this->withExceptionHandling();

        $starship = Starships::factory()->create();

        $response = $this->getJson(route('api.v1.starship.show', $starship));

        $response->assertExactJson(data: [
            'data' => [
                'type' => 'starship',
                'id' => $starship->getRouteKey(),
                'attributes' => [
                    'name' => $starship->name,
                    'model' => $starship->model,
                    'manufacturer' => $starship->manufacturer,
                    'cost_in_credits' => $starship->cost_in_credits,
                    'length' => $starship->length,
                    'max_atmosphering_speed' => $starship->max_atmosphering_speed,
                    'crew' => $starship->crew,
                    'passengers' => $starship->passengers,
                    'cargo_capacity' => $starship->cargo_capacity,
                    'consumables' => $starship->consumables,
                    'hyperdrive_rating' => $starship->hyperdrive_rating,
                    'MGLT' => $starship->mglt,
                    'starship_class' => $starship->starship_class,
                    'pilots' => $starship->pilots,
                    'films' => $starship->films,
                    'url' => $starship->url
                ],
                'links' => [
                    'self' => route('api.v1.starship.show', $starship)
                ]

            ]
        ]);

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StarshipsController::class,
            'update',
            \App\Http\Requests\StarshipsUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $starship = Starships::factory()->create();
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
        $hyperdrive_rating = $this->faker->word;
        $MGLT = $this->faker->word;
        $starship_class = $this->faker->word;
        $pilots = $this->faker->word;
        $films = $this->faker->word;
        $url = $this->faker->url;

        $response = $this->put(route('api.v1.starship.update', $starship), [
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
            'hyperdrive_rating' => $hyperdrive_rating,
            'MGLT' => $MGLT,
            'starship_class' => $starship_class,
            'pilots' => $pilots,
            'films' => $films,
            'url' => $url,
        ]);

        $starship->refresh();


        $response->assertJsonStructure([]);

        $this->assertEquals($name, $starship->name);
        $this->assertEquals($model, $starship->model);
        $this->assertEquals($manufacturer, $starship->manufacturer);
        $this->assertEquals($cost_in_credits, $starship->cost_in_credits);
        $this->assertEquals($length, $starship->length);
        $this->assertEquals($max_atmosphering_speed, $starship->max_atmosphering_speed);
        $this->assertEquals($crew, $starship->crew);
        $this->assertEquals($passengers, $starship->passengers);
        $this->assertEquals($cargo_capacity, $starship->cargo_capacity);
        $this->assertEquals($consumables, $starship->consumables);
        $this->assertEquals($hyperdrive_rating, $starship->hyperdrive_rating);
        $this->assertEquals($MGLT, $starship->MGLT);
        $this->assertEquals($starship_class, $starship->starship_class);
        $this->assertEquals($pilots, $starship->pilots);
        $this->assertEquals($films, $starship->films);
        $this->assertEquals($url, $starship->url);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $starship = Starships::factory()->create();

        $response = $this->delete(route('starship.destroy', $starship));

        $response->assertNoContent();

        $this->assertModelMissing($starship);
    }
}
