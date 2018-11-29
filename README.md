# Team
PMMP Team Library  
**How to use**  
Please be sure to write in use statement!  
`use Sei\team\T;`  
When you want to call a function  
`T::function()`

**Functions**  

    createTeam(string $teamname)//create new Team! True will be returned if the team has already been created.
    checkTeam(string $teamname)//Make sure that the team exists.Returns true if the team exists, false otherwise.
    checkPTeam(Player $player)//Make sure the player belongs to the team. In that case, it returns true, otherwise it returns false.
    deleteTeam(string $teamname)//Delete the team but return false if the team does not exist.
    joinTeam(string $teamname, Player $player)//Returns false if the player is to join the team but the team does not exist.
    leaveTeam(string $teamname, Player $player)//Player leave team.However, if the team does not exist or does not belong to the team, false is returned.
    
