<?php

namespace App\Http\Controllers\Newsfeed;

use App\Http\Controllers\Controller;
use App\Repositories\Newsfeed\NewsfeedRepository;
use App\Transformers\NewsfeedTransformer;
use Illuminate\Http\Request;
use App\Transformers\PostTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;


class NewsfeedController extends Controller
{

    private NewsfeedRepository $repository;

    public function __construct(NewsfeedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function apiShow(Request $request)
    {
        $includeProfileable = $request->query('include') === 'profileable';

        $data = $this->repository->apiShow($includeProfileable);

        if (!$data) {
            return response()->json([
                'data' => []
            ]);
        }

        $manager = new Manager();
        $resource = new Collection($data, new PostTransformer());
        $transformedData = $manager->createData($resource)->toArray();

        info($transformedData);
        return response()->json([
            'data' => $transformedData
        ]);
    }

}
