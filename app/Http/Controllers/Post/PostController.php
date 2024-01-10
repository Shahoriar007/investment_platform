<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Repositories\Post\PostRepository;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class PostController extends Controller
{

    private PostRepository $repository;

    public function __construct(PostRepository $repository)
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
            ['link' => "/post", 'name' => "post"], ['name' => "Index"]
        ];

        $data = $this->repository->index();

        return view('post.post-detail.index', compact('data', 'breadcrumbs'));


    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "/post", 'name' => "post"], ['name' => "Create"]
        ];

        return view('post.post-detail.create', compact('breadcrumbs'));
    }


    public function store( StorePostRequest $request){

        info($request);

        $validated = $request->validated();

        $data = $this->repository->store($validated);

        if($data){
            return redirect()->route('post')->with('success', 'post successfully created.');
        }else{
            return redirect()->route('post')->with('error', 'post failed created.');
        }

    }

    public function edit($id)
    {
        $breadcrumbs = [
            ['link' => "/post", 'name' => "post"], ['name' => "Edit"]
        ];

        $data = $this->repository->edit($id);

        return view('post.post-detail.edit', compact('data', 'breadcrumbs'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $validated = $request->validated();

        $data = $this->repository->update($validated, $id, $request);

        if($data){
            return redirect()->route('post')->with('success', 'post successfully updated.');
        }else{
            return redirect()->route('post')->with('error', 'post failed updated.');
        }

    }

    public function destroy(Request $request)
    {
        $id = $request->post_id;

        $data = $this->repository->destroy($id);

        if($data){
            return redirect()->route('post')->with('success', 'post successfully deleted.');
        }else{
            return redirect()->route('post')->with('error', 'post failed deleted.');
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
        $resource = new Item($data, new PostTransformer);

        $transformedData = $manager->createData($resource)->toArray();
        info($transformedData);
        return response()->json([
            'data' => $transformedData
        ]);
    }

    public function fetch(Request $request){
        $profile_type = $request->get('profile_type');
        $data = $this->repository->fetchAll($profile_type);

        return response()->json([
            'data' => $data,
        ]);

    }

}
