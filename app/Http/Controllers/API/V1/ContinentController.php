<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Repository\V1\ContinentRepository;
use App\Http\Requests\V1\Continent\StoreContinentRequest;
use App\Http\Requests\V1\Continent\UpdateContinentRequest;
use App\Http\Resources\V1\ContinentResource;
use App\Http\Service\V1\ContinentService;
use App\Models\Continent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Throwable;

class ContinentController extends Controller
{
    public function __construct(
        private ContinentRepository $repository,
        private ContinentService    $service
    )
    {}

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $continent = $this->repository->getQuery();

        $continent = $this->service->applyFilter($request, $continent);

        return $this->repository->getAll($continent);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Continent $continent
     * @return void
     */
    public function show(Request $request, Continent $continent)
    {
        $continent = $this->service
            ->singleRelation($continent, $request->query('relation'), 'countries');

        return $this->repository->getEntity($continent);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContinentRequest $request
     * @return Response
     */
    public function store(StoreContinentRequest $request)
    {
        return $this->repository->create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContinentRequest $request
     * @param Continent $continent
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(UpdateContinentRequest $request, Continent $continent)
    {
        return $this->repository->update($continent, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Continent $continent
     * @return JsonResponse
     */
    public function destroy(Continent $continent)
    {
        return $this->repository->delete($continent);
    }
}
