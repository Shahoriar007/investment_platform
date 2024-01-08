<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestorProfile\StoreInvestorProfileRequest;
use App\Http\Requests\InvestorProfile\UpdateInvestorProfileRequest;
use App\Repositories\Investor\InvestorProfileRepository;
use App\Transformers\InvestorProfileTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class InvestorProfileController extends Controller
{
    private InvestorProfileRepository $repository;

    public function __construct(InvestorProfileRepository $repository)
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
            ['link' => "/investor-profile", 'name' => "investor profile"], ['name' => "Index"]
        ];

        $data = $this->repository->index();

        return view('investor.investor-profile.index', compact('data', 'breadcrumbs'));


    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "/investor-profile", 'name' => "investor profile"], ['name' => "Create"]
        ];

        return view('investor.investor-profile.create', compact('breadcrumbs'));
    }


    public function store( StoreInvestorProfileRequest $request){

        $validated = $request->validated();

        $data = $this->repository->store($validated);

        if($data){
            return redirect()->route('investor-profile')->with('success', 'investor profile successfully created.');
        }else{
            return redirect()->route('investor-profile')->with('error', 'investor profile failed created.');
        }

    }

    public function edit($id)
    {
        $breadcrumbs = [
            ['link' => "/investor-profile", 'name' => "investor profile"], ['name' => "Edit"]
        ];

        $data = $this->repository->edit($id);

        return view('investor.investor-profile.edit', compact('data', 'breadcrumbs'));
    }

    public function update(UpdateInvestorProfileRequest $request, $id)
    {
        $validated = $request->validated();

        $data = $this->repository->update($validated, $id, $request);

        if($data){
            return redirect()->route('investor-profile')->with('success', 'investor profile successfully updated.');
        }else{
            return redirect()->route('investor-profile')->with('error', 'investor profile failed updated.');
        }

    }

    public function destroy(Request $request)
    {
        $id = $request->investorProfile_id;

        $data = $this->repository->destroy($id);

        if($data){
            return redirect()->route('investor-profile')->with('success', 'investor Profile successfully deleted.');
        }else{
            return redirect()->route('investor-profile')->with('error', 'investor Profile failed deleted.');
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
        $resource = new Item($data, new InvestorProfileTransformer);

        $transformedData = $manager->createData($resource)->toArray();
        info($transformedData);
        return response()->json([
            'data' => $transformedData
        ]);
    }

}
