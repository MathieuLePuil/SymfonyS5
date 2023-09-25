<?php

namespace App\Event;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Event\MovieSavedEvent;
use App\Entity\Movie;

class MovieSavedEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::postPersist,
        ];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        // Vérifiez si l'entité est de type YourEntity (à adapter selon votre entité)
        if ($entity instanceof Movie) {
            $event = new MovieSavedEvent($entity);
            // Déclenchez l'événement
            $args->getObjectManager()->getEventManager()->dispatchEvent($event);
        }
    }
}