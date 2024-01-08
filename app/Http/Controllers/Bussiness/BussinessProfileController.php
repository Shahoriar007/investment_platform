<?php

namespace App\Http\Controllers\Bussiness;

use App\Http\Controllers\Controller;
use App\Http\Requests\BussinessProfile\StoreBussinessProfileRequest;
use App\Repositories\Bussiness\BussinessProfileRepository;
use Illuminate\Http\Request;

class BussinessProfileController extends Controller
{
    private BussinessProfileRepository $repository;

    public function __construct(BussinessProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request){
        $breadcrumbs = [
            ['link' => "/bussiness-profile", 'name' => "Bussiness profile"], ['name' => "Index"]
        ];

        $data = $this->repository->index();

        return view('bussiness.bussiness-profile.index', compact('data', 'breadcrumbs'));


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



}
