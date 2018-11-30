<?php

namespace Sample;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\{PlayerJoinEvent,PlayerQuitEvent};
use Sei\team\T;

class Main extends PluginBase implements Listener{
	
	const LANGUAGE = "eng";//please select your language!(eng or jpn)
	public function onEnable(){
		T::createTeam("red");
		T::createTeam("blue");

		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$rand = mt_rand(1,2);
		$team = $rand === 1  ? "red" : "blue";
		echo $team;
		T::joinTeam($team,$player);

		$tname = T::getPTeam($player);
		$lang = self::LANGUAGE;
		
		$lang === "eng"
		? $player->sendMessage("Your joined {$tname} team.")
		: $player->sendMessage("あなたは {$tname} チームに参加しました");

	}

	public function onQuit(PlayerQuitEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$team = T::getPTeam($player);
		$lang = self::LANGUAGE;
		
		$lang === "eng"
		? Server::getInstance()->broadcastMessage("{$name} left {$team} team.")
		: Server::getInstance()->broadcastMessage("{$name}が{$team}チームを抜けました"); 
		
		T::leaveTeam($team,$player);
	}

}
