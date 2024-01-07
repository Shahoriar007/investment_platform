<?php

namespace App\Http\Controllers\Bussiness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Bussiness\BussinessCategoryRepository;
use App\Http\Requests\BussinessCategory\StoreBussinessCategoryRequest;


class BussinessCategoryController extends Controller
{

    private BussinessCategoryRepository $repository;

    public function __construct(BussinessCategoryRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request){
        $breadcrumbs = [
            ['link' => "/bussiness-category", 'name' => "Bussiness Category"], ['name' => "Index"]
        ];

        $data = $this->repository->index();

        return view('bussiness.bussiness-category.index', compact('data', 'breadcrumbs'));


    }

    public function store( StoreBussinessCategoryRequest $request){

        $validated = $request->validated();

        $data = $this->repository->store($validated);

        if($data){
            return redirect()->route('bussiness-category')->with('success', 'bussiness Category successfully created.');
        }else{
            return redirect()->route('bussiness-category')->with('error', 'bussiness Category failed created.');
        }

    }
    public function destroy(Request $request)
    {
        $id = $request->bussinessCategory_id;

        $data = $this->repository->destroy($id);

        if($data){
            return redirect()->route('bussiness-category')->with('success', 'Bussiness Category successfully deleted.');
        }else{
            return redirect()->route('bussiness-category')->with('error', 'Bussiness Category failed deleted.');
        }

    }


}
