<?php


namespace App\Library\Services;


use App\Library\Services\Contracts\DownloaderInterface;
use App\Library\Services\Contracts\ISuperMetrics;
use \SuperToken;
use Carbon\Carbon;

class SuperMetrics implements ISuperMetrics
{
    private $downloader;
    private $posts;

    public function __construct(DownloaderInterface $downloader) {
        $this->downloader = $downloader;
        $cacher = new Cacher(env('DOWNLOADER_CACHE_TIMEOUT'), 10);
        $this->downloader->setCacher($cacher);
    }

    public function getPosts()
    {
        $this->posts = $this->getAllPosts();
        return $this;
    }

    public function postsByWeek()
    {
        $postsByWeek = [];

        foreach($this->posts as $post){
            $postMonth = Carbon::parse($post['created_time'])->weekOfYear;

            $postsByWeek[] = ['week' => $postMonth, 'message' => $post['message']];
        }

        return $postsByWeek;
    }

    public function postsOfMonth(int $month)
    {
        $postOfMonth = [];

        foreach($this->posts as $post){
            $postMonth = Carbon::parse($post['created_time'])->month;
            if($postMonth == $month){
                $postOfMonth[] = $post;
            }
        }

        return $postOfMonth;
    }

    private function getAllPosts()
    {
        $arr = [];
        $totalPage = env('TOTAL_PAGES', 10);

        for($i = 1; $i <= $totalPage; $i++){
            $posts = json_decode($this->getPost($i))->data->posts;
            foreach ($posts as $post)
            {
                $arr[] = (array) $post;
            }
        }
        return $arr;
    }

    private function getPost(int $page)
    {
        $this->downloader->setUrl(sprintf(config('app.api_url_mask'), env('API_BASE_URL')."/posts", $page, SuperToken::getToken()));

        return $this->downloader->get();
    }
}
