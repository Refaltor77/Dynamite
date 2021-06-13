<?php

namespace refaltor\dynamite;

use pocketmine\plugin\PluginBase;

class Dynamite extends PluginBase
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}