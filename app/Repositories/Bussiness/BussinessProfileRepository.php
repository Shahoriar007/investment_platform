<?php

namespace App\Repositories\Bussiness;


use App\Models\BussinessProfile;
use App\Models\UserPivotProfile;

class BussinessProfileRepository
{

    private BussinessProfile $model;

    public function __construct(BussinessProfile $model)
    {
        $this->model = $model;

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

    public function store($validated): bool
    {

        try {
             $this->model->create($validated);


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
