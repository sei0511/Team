<?php

namespace Sample;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\{PlayerJoinEvent,PlayerQuitEvent};
use Sei\team\T;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		T::createTeam("red");//チーム作成
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

		$player->sendMessage("あなたは {$tname} に参加しました");
	}

	public function onQuit(PlayerQuitEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$team = T::getPTeam($player);

		Server::getInstance()->broadcastMessage("{$name}が{$team}を抜けました");
		T::leaveTeam($team,$player);
	}

}
