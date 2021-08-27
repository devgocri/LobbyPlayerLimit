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

use pocketmine\scheduler\{TaskScheduler, ClosureTask};
use pocketmine\command\{CommandSender, Command};
use pocketmine\utils\{TextFormat, Config};
use pocketmine\{Player, Server};
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\level\Level;


class Main extends PluginBase implements Listener{
  public $lobbyConfig;
    public function onEnable(){
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveResource("lobbies.yml");
        $this->lobbyConfig = new Config($this->getDataFolder() . "lobbies.yml", Config::YAML);
        if ($this->getLimit() < 0 || is_null($this->getMsg()) || count($this->getLobbies()) === 0 || is_null($this->getFallback()) || Server::getInstance()->isLevelGenerated($this->getFallback())){
          $this->error();
        }
        
        $this->getScheduler()->scheduleRepeatingTask(new ClosureTask(
            function(int $currentTick): void{
                $this->getServer()->loadLevel($this->getFallback());
                foreach ($this->getServer()->getLevelByName($this->getFallback())->getPlayers() as $player) {
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
        $this->getServer()->loadLevel($fallback);
        foreach ($lobbies as $lobby) {
          if(Server::getInstance()->isLevelGenerated($lobby)){
            $this->error();
          }
            $this->getServer()->loadLevel($lobby);
            if (count($this->getServer()->getLevelByName($lobby)->getPlayers()) < $this->getLimit()){
                $sender->teleport($this->getServer()->getLevelByName($lobby)->getSafeSpawn());
                return true;
            }
        }
        $sender->teleport($this->getServer()->getLevelByName($fallback)->getSafeSpawn());
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
