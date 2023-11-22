<?php

namespace App\EventSubscriber;

use App\Entity\Post;
use App\Event\PostSavedEvent;
use Doctrine\Common\EventSubscriber;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class PostSavedEventSubscriber implements EventSubscriber
{

    /**
     * @inheritDoc
     */
    public function getSubscribedEvents()
    {
        return [
            'post.saved' => 'onPostSaved',
        ];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $post = $args->getObject();

        // Vérifiez si l'entité est de type Post
        if ($post instanceof Post) {
            $event = new PostSavedEvent($post);
            // Déclenchez l'événement
            $args->getObjectManager()->getEventManager()->dispatchEvent($event);
        }
    }
}