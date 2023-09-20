<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Country\StoreCountryRequest;
use App\Http\Requests\V1\Country\UpdateCountryRequest;
use App\Http\Resources\V1\Country\CountryResource;
use App\Models\Country;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CountryResource::collection(Country::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\Country\StoreCountryRequest  $request
     * @return Response
     */
    public function store(StoreCountryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\Country\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
