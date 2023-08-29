<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController
{
    public static array $postCategories = [
        'personal',
        'technical',
        'humanistic',
    ];

    public static array $posts = [
        [
            'title' => "Hi, there!",
            'author' => "Kate",
            'date' => "25.08.2023",
            'category_id' => 0,
            'content' => "Welcome to my blog!",
        ],
        [
            'title' => "About me",
            'author' => "Kate",
            'date' => "26.08.2023",
            'category_id' => 0,
            'content' => "My name is Kate and this will be programistic blog.",
        ],
        [
            'title' => "My languages",
            'author' => "Kate",
            'date' => "27.08.2023",
            'category_id' => 1,
            'content' => "My favourite language is C++ but PHP is the one I've got commercial experience.",
        ],
    ];

    public function welcome(): Response
    {
        $content = '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="../styles.css">
            </head>
            <body>
            <main>
            <h1>Welcome to our Blog ⭐</h1>
            <h2>Don\'t be shy and visit our...</h2>
            <div class="link-field"><a href="/blog/posts">Posts</a></div>
            <div class="link-field"><a href="/blog/categories">Post categories</a></div>
            </main>
            </body>
            </html>';

        return new Response($content);
    }

    #[Route('/blog/posts', name: 'blog_posts')]
    public function posts(): Response
    {
        $content = '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="../styles.css">
            </head>
            <body>
            <main>
            <h1>Blog</h1>
            <div class="posts">';

        for ($i = 0; $i < count(self::$posts); $i++) {
            $content .= '<div class="post" id="' . $i . '">';
                foreach (self::$posts[$i] as $key => $value)
                {
                    if ($key == 'category_id') {
                        $key = 'category';
                        $categoryId = $value;
                        $id = $value;
                        $value = self::$postCategories[$id];

                        $contentSnippet = '<span class="post-field-content">'
                            . '<a href="/blog/posts/category/' . $categoryId . '">' . $value . '</a>'
                            . '</span>';
                    } else {
                        $contentSnippet = '<span class="post-field-content">' 
                            . $value 
                            . '</span>';
                    }

                    $content .= '<div class="post-field">'
                        . '<span class="post-field-name">' . $key . '</span>'
                        . $contentSnippet
                        . '</div>';
                }
            $content .= '</div>';
        }

        $content .= '</div>'
            . '</main>
            </body>
            </html>';

        return new Response($content);
    }

    #[Route('/blog/categories', name: 'blog_post_categories')]
    public function postCategories(): Response
    {
        $content = '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="../styles.css">
            </head>
            <body>
            <main>
            <h1>Blog</h1><h2>Post categories</h2>
            <div class="post-cateories">';

        for ($i = 0; $i < count(self::$postCategories); $i++) {
            $content .= '<div class="post-category" id="' . $i . '">'
                . '<div class="post-category-field">'
                . '<a href="/blog/posts/category/' . $i . '">' . self::$postCategories[$i] . '</a>'
                . '</div>'
                . '</div>';
        }

        $content .= '</div>'
            . '</main>
            </body>
            </html>';

        return new Response($content);
    }

    #[Route('/blog/posts/category/{id}', name: 'blog_category_posts', methods: ['GET', 'HEAD'])]
    public function categoryPosts(int $id): Response
    {
        $category = self::$postCategories[$id];

        $categoryPosts = array_filter(self::$posts, function($element) use ($id) {
            if ($element['category_id'] == $id)
                return true;
            return false;
        });

        $content = '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="../../../styles.css">
            </head>
            <body>
            <main>
            <h1>Blog</h1>
            <h2>Posts of ' . $category . ' category</h2>
            <div class="post-cateories">';

        for ($i = 0; $i < count($categoryPosts); $i++) {
            $content .= '<div class="post" id="' . $i . '">';
                foreach (self::$posts[$i] as $key => $value)
                {
                    if ($key == 'category_id') {
                        continue;
                    }

                    $content .= '<div class="post-field">'
                        . '<span class="post-field-name">' . $key . '</span>'
                        . '<span class="post-field-name-content">' . $value . '</span>'
                        . '</div>';
                }
            $content .= '</div>';
        }

        $content .= '</div>'
            . '</main>
            </body>
            </html>';

        return new Response($content);
    }
}
