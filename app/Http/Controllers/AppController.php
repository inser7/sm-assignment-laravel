<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Metrics;
use App\HelperPosts;

class AppController extends Controller
{
    /**
     * Getting searched data.
     *
     * @param Request $request
     *
     * @return string
     */

    public function monthly($id)
    {
        $monthlyPosts = Metrics::getPosts()->PostsOfMonth($id);
        $data = [
            'Average character length' => round(HelperPosts::avgPostLength($monthlyPosts),2),
            'Average number of posts per user' => round(HelperPosts::avgPostsPerUser($monthlyPosts),2),
            'Longest post by character length' => HelperPosts::longPost($monthlyPosts),
        ];

        return response(json_encode($data))
            ->header('Content-Type', 'application/json');
    }

    /**
     * Getting stats  by year.
     */
    public function year()
    {
        $poststByWeek =  Metrics::getPosts()->postsByWeek();
        return response(json_encode(HelperPosts::groupByWeekCount($poststByWeek)))
            ->header('Content-Type', 'application/json');
    }
}
