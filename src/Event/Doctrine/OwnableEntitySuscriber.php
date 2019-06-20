<?php

namespace App\Event\Doctrine;

use App\Entity\OwnableEntityInterface;
use App\Entity\User;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Security;

class OwnableEntitySuscriber implements EventSubscriber
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function getSubscribedEvents()
    {
        return [Events::prePersist];
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $user = $this->security->getUser();
        $entity = $eventArgs->getObject();

        if ($entity instanceof OwnableEntityInterface) {
            if (null === $user || !($user instanceof User)) {
                throw new AccessDeniedException(sprintf('You can\'t create a %s without be logged.', get_class($entity)));
            }

            $entity->setUser($user);
        }
    }
}
