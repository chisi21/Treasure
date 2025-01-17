<?php

namespace TheBalkanDev;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\level\sound\PopSound;
use pocketmine\level\particle\LavaParticle;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->saveDefaultConfig();
		
		$this->getServer()->getLogger()->info(TextFormat::GREEN."[Treasure] Active!");
	}

	public function onBreak(BlockBreakEvent $e){
		$p = $e->getPlayer();
		$b = $e->getBlock();
		if($e->getBlock()->getId() == 1 && mt_rand(0,$this->getConfig()->get("lvl1-chance")) == "1"){
			for($i = 0; $i <= 5; $i++){
				$p->getLevel()->addParticle(new LavaParticle($b, 2));
			}
			$p->getLevel()->addSound(new PopSound($p));
			$p->sendMessage($config->get("treasure-common") . "§1§lYou find an §a§lCommon Treasure §1§lunderground!");
			foreach($this->getConfig()->get("lvl1-loot") as $loot){
				$p->getInventory()->addItem(Item::get($loot,0,mt_rand(0,$this->getConfig()->get("lvl1-item-max"))));
			}
		}
		if($e->getBlock()->getId() == 1 && mt_rand(0,$this->getConfig()->get("lvl2-chance")) == "1"){
			for($i = 0; $i <= 8; $i++){
				$p->getLevel()->addParticle(new LavaParticle($b, 2));
			}
			$p->getLevel()->addSound(new PopSound($p));
			$p->sendMessage($config->get("treasure-rare") . "§2You find an §b§lRare Treasure §2§lunderground!");
			foreach($this->getConfig()->get("lvl2-loot") as $loot){
				$p->getInventory()->addItem(Item::get($loot,0,mt_rand(0,$this->getConfig()->get("lvl2-item-max"))));
			}
		}
		if($e->getBlock()->getId() == 1 && mt_rand(0,$this->getConfig()->get("lvl3-chance")) == "1"){
			for($i = 0; $i <= 11; $i++){
				$p->getLevel()->addParticle(new LavaParticle($b, 2));
			}
			$p->getLevel()->addSound(new PopSound($p));
			$p->sendMessage($config->get("treasure-epic") . "§gYou find an §5§lEPIC Treasure §g§lunderground!");
			foreach($this->getConfig()->get("t3-loot") as $loot){
				$p->getInventory()->addItem(Item::get($loot,0,mt_rand(0,$this->getConfig()->get("lvl3-item-max"))));
			}
		}
	}
}
