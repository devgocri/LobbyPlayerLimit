<?php

/*
  ____            _    _____          _      ______              
 |  _ \          | |  / ____|        | |    |  ____|             
 | |_) | ___  ___| |_| |     ___   __| |_ __| |____   _____ _ __ 
 |  _ < / _ \/ __| __| |    / _ \ / _` | '__|  __\ \ / / _ \ '__|
 | |_) |  __/\__ \ |_| |___| (_) | (_| | |  | |___\ V /  __/ |   
 |____/ \___||___/\__|\_____\___/ \__,_|_|  |______\_/ \___|_|   

This plugin was made by BestCodrEver.
Discord: FaithlessMC#7013
*/

namespace BestCodrEver\LobbyPlayerLimit;

use pocketmine\scheduler\ClosureTask;
use pocketmine\command\{CommandSender, Command};
use pocketmine\utils\{TextFormat, Config};
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{
  public $lobbyConfig;
    public function onEnable():void {
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveResource("lobbies.yml");
        $this->lobbyConfig = new Config($this->getDataFolder() . "lobbies.yml", Config::YAML);
        if ($this->getLimit() < 0 || is_null($this->getMsg()) || count($this->getLobbies()) === 0 || is_null($this->getFallback()) || !Server::getInstance()->getWorldManager()->isWorldGenerated($this->getFallback())){
          $this->error();
		      return;
        }
        
        $this->getScheduler()->scheduleRepeatingTask(new ClosureTask(
            function(int $currentTick): void{
                $this->getServer()->getWorldManager()->loadWorld($this->getFallback());
                foreach ($this->getServer()->getWorldManager()->getWorldByName($this->getFallback())->getPlayers() as $player) {
                    $this->getServer()->dispatchCommand($player, "lobby");
                }
            }
        ), 600);
    }

    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $this->getServer()->dispatchCommand($player, "lobby");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool {
        if ($cmd->getName() !== 'lobby') return true;
        if (!$sender->hasPermission("lobbyplayerlimit.lobby")) return true;
        if (!$sender instanceof Player){
            $sender->sendMessage(TextFormat::RED . "This command must be run ingame");
            return true;
        }
        $lobbies = $this->getLobbies();
        $fallback = $this->getFallback();
        $this->getServer()->getWorldManager()->loadWorld($fallback);
        foreach ($lobbies as $lobby) {
		      if(!Server::getInstance()->getWorldManager()->isWorldGenerated($lobby)){
            $this->error();
			      return true;          
          }
          $this->getServer()->getWorldManager()->loadWorld($lobby);
          if (count($this->getServer()->getWorldManager()->getWorldByName($lobby)->getPlayers()) < $this->getLimit()){
            $sender->teleport($this->getServer()->getWorldManager()->getWorldByName($lobby)->getSafeSpawn());
            return true;
          }
        }
        $sender->teleport($this->getServer()->getWorldManager()->getWorldByName($fallback)->getSafeSpawn());
        $sender->sendMessage($this->getMsg());
        return true;
    }
    
    public function error(){
      $this->getLogger()->info("Your config file has invalid or missing information. Please correct it and restart the server.");
      $this->getServer()->getPluginManager()->disablePlugin($this);
    }

    public function getLobbies(){
        return $this->lobbyConfig->getNested("lobbies", []);
    }

    public function getFallback(){
        return $this->lobbyConfig->getNested("fallback", null);
    }
  
   public function getLimit(){
        return $this->lobbyConfig->getNested("limit", 0);
   }
   
   public function getMsg(){
        return $this->lobbyConfig->getNested("lobbyfullmsg", null);
   }
}