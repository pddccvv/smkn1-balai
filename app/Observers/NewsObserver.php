<?php

namespace App\Observers;

use App\Models\News;

class NewsObserver
{
    /**
     * Handle the News "creating" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function creating(News $news)
    {
        // Setel author dengan nama user yang sedang login
        $news->author = auth()->user()->name ?? 'Unknown';
    }
}
