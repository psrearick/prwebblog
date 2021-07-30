<?php


namespace App\Repositories;


use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostRepository extends Repository
{
    public function filteredPosts(array $filters) : Builder
    {
        $posts  = Post::whereNotNull('published_at');
        if (array_key_exists('category', $filters)
            && $filters['category']
            && $filters['category'] > -1) {
            $posts = $posts->where('category_id', $filters['category']);
        }

        if (array_key_exists('author', $filters)
            && $filters['author']
            && $filters['author'] > -1) {
            $posts = $posts->where('user_id', $filters['author']);
        }

        if (array_key_exists('post', $filters)
            && $filters['post']
            && strlen($filters['post']) > 0) {
            $post   = $filters['post'];
            $quoted = preg_match('/^(["\']).*\1$/m', $post);
            $post   = $quoted
                ? preg_replace('~^[\'"]?(.*?)[\'"]?$~', '$1', $post)
                : str_replace(' ', '%', $post);
            $posts  = $posts->where(function ($query) use ($post) {
                $post = '%' . $post . '%';
                $query
                    ->where('body', 'like', $post)
                    ->orWhere('title', 'like', $post)
                    ->orWhere('slug', 'like', $post);
            });
        }

        return $posts
            ->with('category', 'author')
            ->orderBy('published_at', 'desc');
    }
}
