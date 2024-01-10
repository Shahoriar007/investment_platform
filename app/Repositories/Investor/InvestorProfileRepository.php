<?php

namespace App\Repositories\Investor;


use App\Models\InvestorProfile;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class InvestorProfileRepository
{

    private InvestorProfile $model;
    private Photo $model2;




    public function __construct(InvestorProfile $model, Photo $model2)
    {
        $this->model = $model;
        $this->model2 = $model2;


    }

    /**
     * @return array
     */

    public function index()
    {

        try {
            $data = $this->model->latest('created_at')->paginate(10);
            return $data;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    /**
     * @param $validated
     * @return bool
     */

    public function store($validated, $request): bool
    {

        try {
            $investor = $this->model->create($validated);
            $id = auth()->user()->id;
            $investor->update([
                'user_id' => $id,
            ]);


            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/investorProfile/photos', $image, $filename);

                try{
                    $this->model2->create([
                        'photoable_type' => 'App\\Models\\InvestorProfile',
                        'photoable_id' => $investor->id,
                        'photo_url' => 'storage/investorProfile/photos/' . $filename
                    ]);
                }catch(\Exception $exception){
                    info($$exception->getMessage());
                    error_log($$exception->getMessage());
                    return false;
                }
            }

            return true;
        } catch (\Exception $e) {
            info($e->getMessage());
            error_log($e->getMessage());
            return false;
        }
    }


    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {

        try {
            $data = $this->findById($id);
            return $data;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function update($validated, $id, $request): bool
    {
        try {
            $data = $this->findById($id);
            $data->update($validated);
            return true;

        } catch (\Exception $e) {
            error_log($e->getMessage());
            info($e);
            return false;
        }
    }


    /**
     * @param $id
     * @return bool
     */

    public function destroy($id): bool
    {

        try {
            $data = $this->findById($id);
            $data->delete();
            return true;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @return InvestorProfile
     */

    public function findById($id): InvestorProfile
    {

        try {
            $data = $this->model->findOrFail($id);
            return $data;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }



    public function apiShow($id)
    {

        try {
            $data = $this->findById($id);
            return $data;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }




}
