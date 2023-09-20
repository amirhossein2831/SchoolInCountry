<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Repository\V1\CountryRepository;
use App\Http\Requests\V1\Country\StoreCountryRequest;
use App\Http\Requests\V1\Country\UpdateCountryRequest;
use App\Http\Resources\V1\Country\CountryResource;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    public function __construct(private CountryRepository $repository){}

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $country = $this->repository->index();

        $search = $request->query('q');
        $all = $request->query('all');
        $country = $search ? $country->where('name','LIKE',"%$search%"): $country ;
        $country = $all ? $country->get() : $country->paginate()->appends($request->query());

        return CountryResource::collection($country);
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return Response
     */
    public function show(Country $country)
    {
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
     * @param  \App\Http\Requests\V1\Country\UpdateCountryRequest  $request
     * @param Country $country
     * @return Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        //
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
