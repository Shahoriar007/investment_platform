<?php

namespace App\Http\Controllers\Bussiness;

use App\Http\Controllers\Controller;
use App\Http\Requests\BussinessProfile\StoreBussinessProfileRequest;
use App\Http\Requests\BussinessProfile\UpdateBussinessProfileRequest;
use App\Repositories\Bussiness\BussinessProfileRepository;
use App\Transformers\BussinessProfileTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;


class BussinessProfileController extends Controller
{
    private BussinessProfileRepository $repository;

    public function __construct(BussinessProfileRepository $repository)
    {
        $this->repository = $repository;
    }
/**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function index(Request $request){
        $breadcrumbs = [
            ['link' => "/bussiness-profile", 'name' => "Bussiness profile"], ['name' => "Index"]
        ];

        $data = $this->repository->index();

        return view('bussiness.bussiness-profile.index', compact('data', 'breadcrumbs'));


    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "/bussiness-profile", 'name' => "Bussiness profile"], ['name' => "Create"]
        ];

        return view('bussiness.bussiness-profile.create', compact('breadcrumbs'));
    }


    public function store( StoreBussinessProfileRequest $request){

        $validated = $request->validated();

        $data = $this->repository->store($validated);

        if($data){
            return redirect()->route('bussiness-profile')->with('success', 'bussiness profile successfully created.');
        }else{
            return redirect()->route('bussiness-profile')->with('error', 'bussiness profile failed created.');
        }

    }

    public function edit($id)
    {
        $breadcrumbs = [
            ['link' => "/bussiness-profile", 'name' => "bussiness profile"], ['name' => "Edit"]
        ];

        $data = $this->repository->edit($id);

        return view('bussiness.bussiness-profile.edit', compact('data', 'breadcrumbs'));
    }

    public function update(UpdateBussinessProfileRequest $request, $id)
    {
        $validated = $request->validated();

        $data = $this->repository->update($validated, $id, $request);

        if($data){
            return redirect()->route('bussiness-profile')->with('success', 'bussiness profile successfully updated.');
        }else{
            return redirect()->route('bussiness-profile')->with('error', 'bussiness profile failed updated.');
        }

    }

    public function destroy(Request $request)
    {
        $id = $request->bussinessProfile_id;

        $data = $this->repository->destroy($id);

        if($data){
            return redirect()->route('bussiness-profile')->with('success', 'bussiness Profile successfully deleted.');
        }else{
            return redirect()->route('bussiness-profile')->with('error', 'bussiness Profile failed deleted.');
        }

    }

    public function apiShow(Request $request, $id)
    {
        $data = $this->repository->apiShow($id);
        info($data);

        if (!$data) {
            return response()->json([
                'data' => []
            ]);
        }

        $manager = new Manager();
        $resource = new Item($data, new BussinessProfileTransformer);

        $transformedData = $manager->createData($resource)->toArray();
        info($transformedData);
        return response()->json([
            'data' => $transformedData
        ]);
    }



}
