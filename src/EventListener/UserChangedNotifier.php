<?php
namespace App\EventListener;

use App\Entity\AdminUser;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: AdminUser::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: AdminUser::class)]
class UserChangedNotifier
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function prePersist(AdminUser $user): void
    {
        $this->hashPassword($user);
    }

    public function preUpdate(AdminUser $user): void
    {
        $this->hashPassword($user);
    }

    private function hashPassword(AdminUser $user): void
    {
        if ($user->getPlainPassword() !== null) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPlainPassword());
            $user->setPassword($hashedPassword);
            $user->setPlainPassword(null);
        }
    }
}
