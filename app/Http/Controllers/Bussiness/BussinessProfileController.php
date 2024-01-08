<?php

namespace App\Http\Controllers\Bussiness;

use App\Http\Controllers\Controller;
use App\Http\Requests\BussinessProfile\StoreBussinessProfileRequest;
use App\Http\Requests\BussinessProfile\UpdateBussinessProfileRequest;
use App\Repositories\Bussiness\BussinessProfileRepository;
use Illuminate\Http\Request;

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



}
