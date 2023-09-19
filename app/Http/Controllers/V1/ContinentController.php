<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Repository\V1\ContinentRepository;
use App\Http\Requests\StoreContinentRequest;
use App\Http\Requests\UpdateContinentRequest;
use App\Http\Resources\ContinentResource;
use App\Models\Continent;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use LaravelIdea\Helper\App\Models\_IH_Continent_C;
use Throwable;

class ContinentController extends Controller
{
    public function __construct(private ContinentRepository $repository){}

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $continent = $this->repository->index();

        $search = $request->query('q');
        $all = $request->query('all');
        $continent = $search ? $continent->where('name','LIKE',"%$search%"): $continent ;
        $continent = $all ? $continent->get() : $continent->paginate();

        return ContinentResource::collection($continent);
    }

    /**
     * Display the specified resource.
     *
     * @param Continent $continent
     * @return void
     */
    public function show(Continent $continent)
    {
        return ContinentResource::make($continent);
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
        return $this->repository->update($continent,$request->all());
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
