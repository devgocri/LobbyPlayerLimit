# LobbyPlayerLimit

[![](https://poggit.pmmp.io/shield.state/LobbyPlayerLimit)](https://poggit.pmmp.io/p/LobbyPlayerLimit)
[![](https://poggit.pmmp.io/shield.api/LobbyPlayerLimit)](https://poggit.pmmp.io/p/LobbyPlayerLimit)
[![](https://poggit.pmmp.io/shield.dl.total/LobbyPlayerLimit)](https://poggit.pmmp.io/p/LobbyPlayerLimit)
[![](https://poggit.pmmp.io/shield.dl/LobbyPlayerLimit)](https://poggit.pmmp.io/p/LobbyPlayerLimit)

A plugin which adds an automatic player transfer throughout multiple lobbies when you do /lobby with a player limit for each lobby

## How to setup?
Drop the plugin into your server and start-and-stop it.
Navigate to your `plugin_data` folder and find `lobbies.yml`. 

It will contain this:
```yaml

#If fields are not filled default values will be used.
#Default:
#Lobby - "world"
#Fallback - "fallback"
#Player Limit - 20
#Lobby full message: "Sorry, but all of our lobbies are full. Don't worry, you have been teleported to a fallback lobby, and we'll keep trying to send you to a lobby."

#Lobby full message
#Enter the message that is sent to the player when a lobby is full
lobbyfullmsg: "Sorry, but all of our lobbies are full. Don't worry, you have been teleported to a fallback lobby, and we'll keep trying to send you to a lobby."

#Player Limit
#Enter the number of players the lobbies need to be limited to.
limit: 20

#Lobbies
#Enter a "- " followed the names of the lobbies inside "". This is case sensitive!
#Example:
# - "Lobby1"
# - "Lobby2"
lobbies:
 - "dummy"
 - "dummy1"

#Fallback lobby
#Players are teleported to a fallback lobby when all lobbies are full. They will be teleported to a lobby once that lobby has enough space.
#Enter the name of the fallback lobby inside "". This is case sensitive!
#Example:
# fallback: "FallbackLobby1"
fallback: "Dummeh"
```
Now, replace `- "dummy1"` and `- "dummy1"` the names of the worlds of your lobbies. You can add as many as you want as long as they follow the `- "Example"` format. Make sure they have the same amount of indentation!

Then, replace `fallback: "dummeh"` with `fallback: "YOUR FALLBACK LOBBY WORLD NAME HERE"`. 

After that, replace `limit: 20` with `limit: AMOUNT OF PLAYERS PER LOBBY`

Replace `lobbyfullmsg: "Sorry, but all of our lobbies are full. Don't worry, you have been teleported to a fallback lobby, and we'll keep trying to send you to a lobby."` with `lobbyfullmsg: YOUR LOBBY FULL MESSAGE HERE` if you are not happy with the default.

Now, restart the server and you're all done!

## Make yourself immune to the system
Whenever you join the server, you will immediately be joined to a lobby with an amount of players less than your limit. If you want to disable this, you have to remove the `lobby.tp` permission from yourself. 

Assuming you have PurePerms installed and the server is online, run this command in console or in game:
`/unsetuperm PLAYERNAME lobbyplayerlimit.lobby`
Note: Doing this also disables your ability to run `/lobby`.

Now you will be immune to the system!

To add yourself back to the system, assuming you have PurePerms installed and the server is online, run this command in console or in game:
`/setuperm PLAYERNAME lobbyplayerlimit.lobby`

## Permissions

`lobbyplayerlimit.lobby` - Ability to run /lobby and be teleported to a lobby automatically on join.

## Commands

`/lobby` - Teleport to a lobby (LobbyPlayerLimit main command)

## Something broken or have a suggestion?
Create an issue through GitHub [here](https://github.com/BestCodrEver/LobbyPlayerLimit/issues/new)

## Credits and Special Mentions
- BestCodrEver (That's me!)
- Pumpedpixel (This plugin was originally made for him)
- Everyone in the PMMP Discord (who helped me with my questions)
