<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Http\Requests\Admin\News\UpdateNewsActiveRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Models\News\News;
use App\Service\News\NewsActiveService;
use App\Service\News\NewsService;
use Carbon\Carbon;

class NewsActiveController extends Controller
{
    public function __construct(
        private readonly NewsActiveService $newsActiveService,
    )
    {
    }

    public function index()
    {


        return view('admin.newsActive.index', ['news' => News::where('is_active',true)->
        where('published_at','>=',now())
            ->where('user_id', auth()->user()->id)
            ->get()]);
    }
    public function create()
    {
        return view('admin.newsActive.create');
    }


    public function store(UpdateNewsActiveRequest $updateNewsActiveRequest)
    {
        $data = $updateNewsActiveRequest->validated();
        $user = $updateNewsActiveRequest->user();
        $this->newsActiveService->createNews($data, $user);

        return redirect()->route('newsActive.index');
    }


    public function show(string $id)
    {
    }


    public function edit(News $newsActive)
    {
        return view('admin.newsActive.edit', ['news' => $newsActive]);
    }


    public function update(UpdateNewsActiveRequest $updateRequest, News $newsActive)
    {

        $data = $updateRequest->validated();
        $this->newsActiveService->updateNews($data,$newsActive);

        return redirect()->route('newsActive.index');
    }


    public function destroy(News $newsActive)
    {
        $this->newsActiveService->deleteNews($newsActive);
//        $deleteNewsRequest=new NewsService();
//        $deleteNewsRequest->deleteNews($news);
        return redirect()->route('news.index');
    }
}
