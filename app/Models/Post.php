<?php


namespace App\Models;


use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $body;
    public $title;
    public $excerpt;
    public $date;
    public $slug;

    public function __construct(string $body, string $title, string $excerpt, int $date, string $slug)
    {
        $this->body = $body;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
    }

    /**
     * @throws Exception
     */
    static function all() : Collection
    {
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path('posts')))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->body(),
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->slug
                ))
                ->sortByDesc('date');
        });
    }

    static function find(string $slug) : Post
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
