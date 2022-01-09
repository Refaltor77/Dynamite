<?php

namespace refaltor\dynamite;

use pocketmine\plugin\PluginBase;

class Dynamite extends PluginBase
{
    protected function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}