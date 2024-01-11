<?php

namespace App\Repositories\Bussiness;


use App\Models\BussinessProfile;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class BussinessProfileRepository
{

    private BussinessProfile $model;
    private Photo $model2;


    public function __construct(BussinessProfile $model, Photo $model2)
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
             $id = auth()->user()->id;
             $validated['created_by'] = $id;
             $bussiness = $this->model->create($validated);
             $bussiness->update([
                'user_id' => $id,
            ]);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/bussinessProfile/photos', $image, $filename);

                try{
                    $this->model2->create([
                        'photoable_type' => 'App\\Models\\BussinessProfile',
                        'photoable_id' => $bussiness->id,
                        'photo_url' => 'storage/bussinessProfile/photos/' . $filename
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
            $data = $this->model->with('photos')->where('id', '=', $id)->first();
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
            $validated['updated_by'] = auth()->user()->id;
            $data->update($validated);
            $bussiness = $data->fresh();

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/bussinessProfile/photos', $image, $filename);

                try{
                    $this->model2->create([
                        'photoable_type' => 'App\\Models\\BussinessProfile',
                        'photoable_id' => $bussiness->id,
                        'photo_url' => 'storage/bussinessProfile/photos/' . $filename
                    ]);
                }catch(\Exception $exception){
                    info($$exception->getMessage());
                    error_log($$exception->getMessage());
                    return false;
                }



            }
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
            $data['deleted_by'] = auth()->user()->id;
            $data->delete();
            return true;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @return BussinessProfile
     */

    public function findById($id): BussinessProfile
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
