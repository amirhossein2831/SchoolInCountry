<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Repository\V1\CountryRepository;
use App\Http\Requests\V1\Country\StoreCountryRequest;
use App\Http\Requests\V1\Country\UpdateCountryRequest;
use App\Http\Resources\V1\CountryResource;
use App\Http\Service\V1\CountryService;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    public function __construct(
        private CountryRepository $repository,
        private CountryService $service
    )
    {}

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $country = $this->repository->index();

        $country = $this->service->applyFilter($request, $country);

        return CountryResource::collection($country);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Country $country
     * @return Response
     */
    public function show(Request $request,Country $country)
    {
        $country = $this->service->singleRelation($country, $request->query('relation'), 'states');
        return CountryResource::make($country);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryRequest $request
     * @return Response
     */
    public function store(StoreCountryRequest $request)
    {
        return $this->repository->create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountryRequest $request
     * @param Country $country
     * @return JsonResponse
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        return $this->repository->update($country, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return JsonResponse
     */
    public function destroy(Country $country)
    {
        return $this->repository->delete($country);
    }
}
