<?php

namespace App\Repositories\Post;


use App\Models\BussinessProfile;
use App\Models\InvestorProfile;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostRepository
{

    private Post $model;
    private BussinessProfile $model2;
    private InvestorProfile $model3;


    public function __construct(Post $model, BussinessProfile $model2, InvestorProfile $model3)
    {
        $this->model = $model;
        $this->model2 = $model2;
        $this->model3 = $model3;

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
            $post = $this->model->create($validated);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/post/photos', $image, $filename);

                try{
                    $this->model2->create([
                        'photoable_type' => 'App\\Models\\Post',
                        'photoable_id' => $post->id,
                        'photo_url' => 'storage/post/photos/' . $filename
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
            $validated['updated_by'] = auth()->user()->id;
            $data->update($validated);
            $post = $data->fresh();

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/post/photos', $image, $filename);

                try{
                    $this->model2->create([
                        'photoable_type' => 'App\\Models\\Post',
                        'photoable_id' => $post->id,
                        'photo_url' => 'storage/post/photos/' . $filename
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
            $data->delete();
            return true;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @return Post
     */

    public function findById($id): Post
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

    public function fetchAll($profile_type){
        try{
            if($profile_type == 'App\Models\BussinessProfile'){
                $data = $this->model2::all();

            }
            else if($profile_type == 'App\Models\InvestorProfile'){
                $data = $this->model3::all();

            }
            else{
                $data = [];
            }

            return $data;


        } catch(\Exception $e){
            error_log($e->getMessage());
            return [];

        }

    }



}
