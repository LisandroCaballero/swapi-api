<?php

namespace App\Http\Controllers;

use App\Http\Requests\StarshipStoreRequest;
use App\Http\Requests\StarshipUpdateRequest;
use App\Http\Resources\StarshipResource;
use App\Models\Starships;
use App\Services\StarshipsService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StarshipsController extends Controller
{
    private StarshipsService $starshipsService;

    public function __construct(StarshipsService $starshipsService)
    {
        $this->starshipsService = $starshipsService;
    }


    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $starships = Starships::search(\request('search'))->paginate(10);

        return StarshipResource::collection($starships);
    }


    public function store(StarshipStoreRequest $request): StarshipResource
    {
        $starship = Starships::create($request->validated());

        return StarshipResource::make($starship);
    }


    public function show($starships): JsonResource
    {
        $starships = Starships::where('id', $starships)
            ->sparseFieldset()
            ->firstOrFail();

        return StarshipResource::make($starships);
    }

    public function fetchApi()
    {
        try {
            return $this->starshipsService->fetch();
        } catch (\Exception $e) {
        }
    }

    public function apiGetAll(): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return $this->starshipsService->getAll();
    }


    public function update(StarshipUpdateRequest $request, Starships $starship): StarshipResource
    {
        $starship->update($request->validated());

        return StarshipResource::make($starship);
    }


    public function destroy(Request $request, Starships $starship): \Illuminate\Http\Response
    {
        $starship->delete();

        return response()->noContent();
    }
}
