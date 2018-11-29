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
    getTeamData(string $teamname)//The number of people belonging to that team is returned, but false is returned if the team does not exist.
    getPTeam(Player $player)//Returns the name of the team the player belongs to, but false if the player does not belong to the team.
    getAllPlayer()//The team to which all the players belong is returned as an array.
    getAllTeam()//All teams and the number of people belonging to them are returned as an array.


Thank you for watching! If you have any problems, please do so to Twitter.
Twitter : https://twitter.com/MS_SEI0511
