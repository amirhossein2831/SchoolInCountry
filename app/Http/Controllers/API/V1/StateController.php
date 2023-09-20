<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Repository\V1\StateRepository;
use App\Http\Requests\V1\State\StoreStateRequest;
use App\Http\Requests\V1\State\UpdateStateRequest;
use App\Http\Resources\V1\CountryResource;
use App\Http\Resources\V1\StateResource;
use App\Http\Service\V1\StateService;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StateController extends Controller
{

    public function __construct(
        private StateRepository $repository,
        private StateService $service
    )
    {}

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $state = $this->repository->getQuery();

        $state = $this->service->applyFilter($request, $state);

        return $this->repository->getAll($state);
    }

    /**
     * Display the specified resource.
     *
     * @param State $state
     * @return void
     */
    public function show(State $state)
    {
        return $this->repository->getEntity($state);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStateRequest $request
     * @return Response
     */
    public function store(StoreStateRequest $request)
    {
        return $this->repository->create($request->all());
    }



    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStateRequest $request
     * @param State $state
     * @return JsonResponse
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        return $this->repository->update($state, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param State $state
     * @return JsonResponse
     */
    public function destroy(State $state)
    {
        return $this->repository->delete($state);
    }
}
