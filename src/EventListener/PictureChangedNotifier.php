<?php
namespace App\EventListener;

use App\Entity\Picture;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Picture::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Picture::class)]
class PictureChangedNotifier
{
    public function __construct(){

    }

    public function prePersist(Picture $picture): void
    {
        $picture->setCreatedAt(new \DateTime());
    }

public function preUpdate(Picture $picture): void
    {
        $picture->setCreatedAt(new \DateTime());
    }
}