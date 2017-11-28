<?php

namespace GuardianJoinEffect;

use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat as c;
class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->notice("GuardianJoinEffect by Enrick3344 Enabled!");
    }
    
    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $this->getServer()->getScheduler()->scheduleDelayedTask(new ElderGuardianTask($this, $player), 30);
        $player->addTitle(c::RED . c::BOLD . "Welcome to BadLandsPvP");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->notice("GuardianJoinEffect by Enrick3344 Disabled.");
    }
}
