<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

        public $title;

        public $excerpt;

        public $date;

        public $body;

        public $slug;

        public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return collect(File::files(resource_path("posts")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($document) => new post (
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ))
        ->sortByDesc('date');
    }
    public static function find($slug)
    {
        $post = static::all()->firstWhere('slug', $slug);

        if (! $post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }

    public static function findorfail($slug)
    {
        $post = static::all()->firstWhere('slug', $slug);

        if (! $post){
            throw new ModelNotFoundException();
        }
        $post;
    }

}
