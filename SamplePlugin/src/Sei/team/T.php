<?php

namespace Sei\team;

use pocketmine\Player;

class T {

	private static $team;
	private static $pteam;

	public static function createTeam(string $teamname){

		if(self::checkTeam($teamname)){
			return true;
		}

		static::$team[$teamname] = 0;

	}

	public static function checkTeam(string $teamname){

		return(isset(self::$team[$teamname])) ? true : false;

	}

	public static function checkPTeam(Player $player){

		$name = $player->getName();

		return(isset(self::$pteam[$name])) ? true : false;

	}


	public static function deleteTeam(string $teamname){

		if(self::checkTeam($teamname)){
			
			if(!self::getTeamData($teamname) === 0){
				
				unset(self::$team[$teamname]);

				foreach(self::$pteam as $name => $team){
					
					if($team === $teamname){

						unset(self::$pteam[$name]);

					}
				}
				return true;
			}
			return false;
		}
	}

	public static function joinTeam(string $teamname, Player $player){

		$name = $player->getName();

		if(self::checkTeam($teamname)){

			if(self::checkPTeam($player)) return true;

			self::$pteam[$name] = $teamname;
			++self::$team[$teamname];

		}

	}

	public static function leaveTeam(string $teamname, Player $player){
		$name = $player->getName();

		if(self::checkTeam($teamname)){

			if(!self::checkPTeam($player)) return true;

			self::$pteam[$name] = $teamname;
			--self::$team[$teamname];

		}

	}

	public static function getTeamData(string $teamname){

		if(!self::checkTeam($teamname)) return false;

		$team = self::$team[$teamname];

		//チームに入っている人数
		return $team;
		
	}

	public static function getPTeam(Player $player){

		if(!self::checkPTeam($player)) return false;

		$name = $player->getName();

		$team = self::$pteam[$name];

		//プレイヤーが入っているチーム
		return $team;

	}

	public static function getAllPlayer(){

		$all = self::$pteam;

		
		return $all;

	}

	public static function getAllTeam(){

		$all = self::$team;

		return $all;

	}

}
