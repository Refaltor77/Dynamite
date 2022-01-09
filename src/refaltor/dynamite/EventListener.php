<?php

namespace refaltor\dynamite;

use pocketmine\entity\projectile\Egg;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\entity\ProjectileHitEntityEvent;
use pocketmine\event\entity\ProjectileHitEvent;
use pocketmine\event\Listener;
use pocketmine\world\Explosion;
use pocketmine\world\Position;

class EventListener implements Listener
{
     public function onHitEntity(ProjectileHitEntityEvent $event)
    {
       $entity = $event->getEntity();
       if ($entity instanceof Egg) {
       	$explosion = new Explosion(new Position($entity->getPosition()->getX(), $entity->getPosition()->getY(), $entity->getPosition()->getZ(), $entity->getWorld()), 3.4, $entity);
       	$explosion->explodeA();
       	$explosion->explodeB();
       	$entity->flagForDespawn();
       }
    }

    public function onHitEntity2(ProjectileHitEvent $event)
    {
        $entity = $event->getEntity();
        if ($entity instanceof Egg) {
        	$explosion = new Explosion(new Position($entity->getPosition()->getX(), $entity->getPosition()->getY(), $entity->getPosition()->getZ(), $entity->getWorld()), 3.4, $entity);
        	$explosion->explodeA();
        	$explosion->explodeB();
        	$entity->flagForDespawn();

        }
    }

    public function onExplodeEntity(EntityExplodeEvent $event){
         $entity = $event->getEntity();
         $block = $entity->getWorld()->getBlock($entity->getPosition());
         $list = [];
         if ($entity instanceof Egg){
             if (!$event->isCancelled()){
                 for($i = 0; $i <= (3.3*2); $i++) {
                     $list[] = $block->getSide($i);
                 }
             }
         }
    }
}