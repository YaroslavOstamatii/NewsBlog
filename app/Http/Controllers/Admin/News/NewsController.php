<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Models\News\News;
use App\Service\News\NewsService;

class NewsController extends Controller
{
    public function __construct(
        private readonly NewsService $newsService,
    )
    {
    }

    public function index()
    {
//        $news = News::where('title', 'test2')->get();
//        $news = $news->reject(function ($news) {
//            return $news->cancelled;
//        });

        return view('admin.news.index', ['news' => News::all()]);
    }
    public function create()
    {
        return view('admin.news.create');
    }


    public function store(StoreRequest $storeRequest)
    {
        $data = $storeRequest->validated();

        $user = $storeRequest->user();

        $this->newsService->createNews($data, $user);

        return redirect()->route('news.index');
    }


    public function show(string $id)
    {
    }


    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]);
    }


    public function update(UpdateNewsRequest $updateRequest, News $news)
    {

        $data = $updateRequest->validated();
        $this->newsService->updateNews($data,$news);

        return redirect()->route('news.index');

    }


    public function destroy(News $news)
    {
        $this->newsService->deleteNews($news);
//        $deleteNewsRequest=new NewsService();
//        $deleteNewsRequest->deleteNews($news);
        return redirect()->route('news.index');
    }
}
