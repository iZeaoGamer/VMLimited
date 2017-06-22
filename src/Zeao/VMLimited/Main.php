<?php
namespace Zeao;
 
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\ItemBlock;
use pocketmine\command\PluginCommand;
use pocketmine\permission\Permission;
use pocketmine\utils\TextFormat;
use pocketmine\command\CommandExecutor;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
 
class Main extends PluginBase implements Listener{
       
 
        public function onLoad(){
                    $this->getLogger()->info("Plugin Loading");
        }
        public function onEnable(){
            $this->getServer()->getPluginManager()->registerEvents($this, $this);
                    $this->getLogger()->info("Plugin is now Enabled.");
        }
        public function onDisable(){
                    $this->getLogger()->info("Plugin is now  Disabled");
        }
 
   
        public function onInteract(PlayerInteractEvent $ev){
        $chest = 54; //Id Chest
        if(($ev->getPlayer()->getGamemode() === 1) && ($ev->getBlock()->getId() === $chest)) $ev->setCancelled();
 
        }
	public function onInteract(PlayerInteractEvent $ev){
        $trapc = 146; //Id Trapchest
        if(($ev->getPlayer()->getGamemode() === 1) && ($ev->getBlock()->getId() === $trapc)) $ev->setCancelled();
 
        }
	public function onInteract(PlayerInteractEvent $ev){
        $endchest = 130; //EnderChest
        if(($ev->getPlayer()->getGamemode() === 1) && ($ev->getBlock()->getId() === $endchest)) $ev->setCancelled();
 
        }
	public function onInteract(PlayerInteractEvent $ev){
        $hopper = 154; //Id Hopper
        if(($ev->getPlayer()->getGamemode() === 1) && ($ev->getBlock()->getId() === $hopper)) $ev->setCancelled();
 
        }
		public function onInteract(PlayerInteractEvent $ev){
        $anvil = 145; //Id Anvil
        if(($ev->getPlayer()->getGamemode() === 1) && ($ev->getBlock()->getId() === $anvil)) $ev->setCancelled();
 
        }
	public function onInteract(PlayerInteractEvent $ev){
        $brewing = 379; //Id BrewingStand
        if(($ev->getPlayer()->getGamemode() === 1) && ($ev->getBlock()->getId() === $brewing)) $ev->setCancelled();
 
        }
	public function onInteract(PlayerInteractEvent $ev){
        $enchant = 116; //Id Enchantment Table
        if(($ev->getPlayer()->getGamemode() === 1) && ($ev->getBlock()->getId() === $enchant)) $ev->setCancelled();
 
        }
	public function onInteract(PlayerInteractEvent $ev){
        $furnace = 61; //Id Furnace
        if(($ev->getPlayer()->getGamemode() === 1) && ($ev->getBlock()->getId() === $furnace)) $ev->setCancelled();
 
        }
		public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
			$cmd = strlower($command->getName()):
			switch($cmd){
    
				case "creative":
                if (!($sender instanceof Player)){
                    $sender->sendMessage(TextFormat::GREEN."This command can only be run in Game!");
                    return true;
                }
                $player = $this->getServer()->getPlayer($sender->getName());
                
                if ($player->hasPermission("vmlimited.survival")){
                    if ($player->getGamemode() == 1){
                        $player->sendMessage(TextFormat::RED."You are already in creative mode, silly!");
                    } else {
                        $player->setGamemode(1);
                        $player->sendMessage(TextFormat::GREEN."You are now in creative mode! You may now fly around!");
						$player->getInventory()->clearAll();
                    }
                    return true;
                    
                } else {
                    $player->sendMessage(TextFormat::RED."I'm sorry, but you don't have permission to use this command.");
                    return true;
                }
                break;
      
				case "survival":
				  
				 if (!($sender instanceof Player)){
                    $sender->sendMessage(TextFormat::GREEN."This command can only be run in Game!");
                    return true;
                }
                $player = $this->getServer()->getPlayer($sender->getName());
                
                if ($player->hasPermission("vmlimited.creative")){ //perm
                    if ($player->getGamemode() == 0){
                        $player->sendMessage(TextFormat::RED."You are already in survival mode, silly!");
                    } else {
                        $player->setGamemode(0);
                        $player->sendMessage(TextFormat::GREEN."You are now in survival mode!");
						$player->getInventory()->clearAll();
                    }
                    return true;
                    
                } else {
                    $player->sendMessage(TextFormat::RED."I'm sorry, but you don't have permission to run this command.");
                    return true;
                }
                break;
			}
		}
}