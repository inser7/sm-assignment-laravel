<?php


namespace App;


class HelperPosts
{
    public static function avgPostLength(array $posts)
    {
        $postCollections  = collect($posts);
        $newCol = collect();
        $postCollections->each(function($item, $key) use ($newCol) {
            $newCol->push(strlen($item['message']));
        });

        return $newCol->avg();
    }

    public static function avgPostsPerUser(array $posts)
    {
        $postCollections  = collect($posts);
        $grouped = $postCollections->groupBy([
            'from_id',
        ], $preserveKeys = true);

        $groupCount = $grouped->map(function ($item, $key) {
            return collect($item)->count();
        });

        return $groupCount->avg();
    }

    public static function longPost(array $posts)
    {
        $postCollections  = collect($posts);
        $newCol = collect();
        $postCollections->each(function($item, $key) use ($newCol) {
            $newCol->push(strlen($item['message']));
        });

        return $newCol->max();

    }

    public static function groupByWeekCount(array $posts)
    {
        $postCollections  = collect($posts);
        $grouped = $postCollections->groupBy([
            'week',
        ], $preserveKeys = true);

        $groupCount = $grouped->map(function ($item, $key) {
            return collect($item)->count();
        });

        return $groupCount;
    }
}
