<?php

/*
  ____            _    _____          _      ______              
 |  _ \          | |  / ____|        | |    |  ____|             
 | |_) | ___  ___| |_| |     ___   __| |_ __| |____   _____ _ __ 
 |  _ < / _ \/ __| __| |    / _ \ / _` | '__|  __\ \ / / _ \ '__|
 | |_) |  __/\__ \ |_| |___| (_) | (_| | |  | |___\ V /  __/ |   
 |____/ \___||___/\__|\_____\___/ \__,_|_|  |______\_/ \___|_|   

This plugin was made by BestCodrEver.
if you use/copy any part of this code, please credit me.
I'm fine with you learning something using this or using this in your code, but crediting is just common sense.
 
Made for Dreampixel with <3
*/

namespace BestCodrEver\LobbyPlayerLimit;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\scheduler\TaskScheduler;
use pocketmine\scheduler\ClosureTask;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\Server;


class Main extends PluginBase implements Listener{
  public $lobbyConfig;
    public function onEnable(){
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveResource("lobbies.yml");
        $this->lobbyConfig = new Config($this->getDataFolder() . "lobbies.yml", Config::YAML);
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
        if (!$sender->hasPermission("lobby.tp")) return true;
        if (!$sender instanceof Player){
            $sender->sendMessage(TextFormat::RED . "This command must be run ingame");
            return true;
        }
        $lobbies = $this->getLobbies();
        $fallback = $this->getFallback();
        $this->getServer()->loadLevel($fallback);
        foreach ($lobbies as $lobby) {
            $this->getServer()->loadLevel($lobby);
            if (count($this->getServer()->getLevelByName($lobby)->getPlayers()) < 30){
                $sender->teleport($this->getServer()->getLevelByName($lobby)->getSafeSpawn());
                return true;
            }
        }
        $sender->teleport($this->getServer()->getLevelByName($fallback)->getSafeSpawn());
        $sender->sendMessage(TextFormat::LIGHT_PURPLE . TextFormat::BOLD . "DP: " . TextFormat::RED . "Sorry but all of our lobbies are full, and you have been transferred onto a fallback lobby. Don't worry, we will still try to teleport to a lobby every 30 seconds.");
        return true;
    }

    public function getLobbies(): array{
        return (array) $this->lobbyConfig->getNested("lobbies", []);
    }

    public function getFallback(): string{
        return (string) $this->lobbyConfig->getNested("fallback");
    }
}