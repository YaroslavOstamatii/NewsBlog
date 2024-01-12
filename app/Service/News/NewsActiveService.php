<?php

namespace App\Service\News;

use App\Models\Comment;
use App\Models\News\News;
use App\Models\User;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsActiveService
{
    private const DIR = '/images';
    public function __construct(
        private readonly Filesystem $filesystem
    ){
    }

    public function getNews(array $params): Collection
    {
        $id = $params[0];
        $title = $params[1];

        $news = News::query();

        if (!is_null($id)) {
            $news->where('id', $id);
        }
        if (!is_null($title)) {
            $news->where('title', 'like', '%' . $title . '%');
        }

        $news->orderBy('title');

        return $news->get();
    }

    public function createNews(array $data, User $user)
    {

        $news = new News();
        $news->title = $data['title'];
        $news->text = $data['text'];
        $news->image = $this->filesystem->put(self::DIR, $data['image']);
        $news->is_active = $data['is_active'];

        $news->user()->associate($user);
        $news->save();

    }

    public function updateNews($data,$news): void
    {
        if (key_exists('image',$data)) {
            $this->deleteImage($news->image);
            $data['image'] = $this->filesystem->put(self::DIR, $data['image']);
        }
        $news->update($data);

    }

    public function deleteNews(News $news): void
    {
        $this->deleteImage($news->image);
        $news->delete();
    }

    private function deleteImage($img){
        $this->filesystem->delete($img);
    }

        public function addComment($data, $newsId)
    {
        $news = News::findOrFail($newsId);

        $comment = new Comment(['content' => $data]);
        $news->comments()->save($comment);

        return redirect()->back()->with('success', 'Комментарий успешно добавлен');
    }

}
