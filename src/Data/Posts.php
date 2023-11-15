<?php

namespace App\Data;

class Posts
{
    public const POST_FIELD_ID = 'id';
    public const POST_FIELD_TITLE = 'title';
    public const POST_FIELD_AUTHOR = 'author';
    public const POST_FIELD_DATE = 'date';
    public const POST_FIELD_CONTENT = 'content';

    public static array $POSTS = [
        [
            self::POST_FIELD_TITLE => "Hi, there!",
            self::POST_FIELD_AUTHOR => "Kate",
            self::POST_FIELD_DATE => "25.08.2023",
            self::POST_FIELD_CONTENT => "Welcome to my blog!",
        ],
        [
            self::POST_FIELD_TITLE => "About me",
            self::POST_FIELD_AUTHOR => "Kate",
            self::POST_FIELD_DATE => "26.08.2023",
            self::POST_FIELD_CONTENT => "My name is Kate and this will be programistic blog.",
        ],
        [
            self::POST_FIELD_TITLE => "My languages",
            self::POST_FIELD_AUTHOR => "Kate",
            self::POST_FIELD_DATE => "27.08.2023",
            self::POST_FIELD_CONTENT => "My favourite language is C++ but PHP is the one I've got commercial experience.",
        ],
    ];

    public static function getAll(): array
    {
        return self::$POSTS;
    }

    public static function get(int $id): array
    {
        return self::$POSTS[$id];
    }

    public function set(array $post): void
    {
        $id = $post[self::POST_FIELD_ID];

        $this->setPostField($id, self::POST_FIELD_TITLE, $post);
        $this->setPostField($id, self::POST_FIELD_AUTHOR, $post);
        $this->setPostField($id, self::POST_FIELD_DATE, $post);
        $this->setPostField($id, self::POST_FIELD_CONTENT, $post);
    }

    private function setPostField(int $post_id, string $post_field_name, array $post): void
    {
        self::$POSTS[$post_id][$post_field_name] = $post[$post_field_name];
    }
}
