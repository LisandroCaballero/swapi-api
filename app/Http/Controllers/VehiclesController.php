<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Http\Resources\VehicleCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicles;
use App\Services\VehiclesService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class VehiclesController extends Controller
{
    private VehiclesService $vehiclesService;

    public function __construct(VehiclesService $vehiclesService)
    {
        $this->vehiclesService = $vehiclesService;
    }

    public function fetchApi()
    {
        try {
            return $this->vehiclesService->fetch();
        } catch (\Exception $e) {
        }
    }

    public function apiGetAll()
    {
        return $this->vehiclesService->getAll();
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $vehicles = Vehicles::search(\request('search'))->paginate(10);

        return VehicleResource::collection($vehicles);
    }


    public function store(VehicleStoreRequest $request): VehicleResource
    {
        $vehicle = Vehicles::create($request->validated());

        return VehicleResource::make($vehicle);
    }


    public function show($vehicle): JsonResource
    {
        $vehicle = Vehicles::where('id', $vehicle)
            ->sparseFieldset()
            ->firstOrFail();
        return VehicleResource::make($vehicle);
    }


    public function update(VehicleUpdateRequest $request, Vehicles $vehicle): VehicleResource
    {
        $vehicle->update($request->validated());

        return VehicleResource::make($vehicle);
    }


    public function destroy(Request $request, Vehicles $vehicle)
    {
        $vehicle->delete();

        return response()->noContent();
    }
}
