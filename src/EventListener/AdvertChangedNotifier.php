<?php
namespace App\EventListener;

use App\Entity\Advert;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Advert::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Advert::class)]
class AdvertChangedNotifier
{
    public function __construct(){

    }

    public function prePersist(Advert $advert): void
    {
        $advert->setCreatedAt(new \DateTime());
    }

public function preUpdate(Advert $advert): void
    {
        $advert->setCreatedAt(new \DateTime());
    }
}