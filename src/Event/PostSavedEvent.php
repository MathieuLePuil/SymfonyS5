<?php

namespace App\Event;

use App\Entity\Post;
use Symfony\Contracts\EventDispatcher\Event;

class PostSavedEvent extends Event
{
    private $post;
    private $test;

    public function __construct(Post $post, $test = null)
    {
        $this->post = $post;
        $this->test = $test;
    }

    public function getEntity()
    {
        return $this->post;
    }

    public function getTest()
    {
        return $this->test;
    }

    public function setTest($test)
    {
        $this->test = $test;
    }
}
