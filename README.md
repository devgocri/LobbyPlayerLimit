# LobbyPlayerLimit
A plugin which adds an automatic player transfer throughout multiple lobbies when you do /lobby

NOTE: This plugin requires PurePerms

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

Now, restart the server and you're all done!

## Make yourself immune to the system
Whenever you join the server, you will immediately be joined to a lobby with an amount of players less than 30. If you want to disable this, you have to remove the `lobby.tp` permission from yourself. 

Assuming you have PurePerms installed and the server is online, run this command in console or in game:
`/unsetuperm PLAYERNAME lobbyplayerlimit.lobby`
Note: Doing this also disables your ability to run `/lobby`.

Now you will be immune to the system!

To add yourself back to the system, assuming you have PurePerms installed and the server is online, run this command in console or in game:
`/setupeem PLAYERNAME lobbyplayerlimit.lobby`

## Something broken or have a suggestion?
Create an issue through GitHub [here](https://github.com/BestCodrEver/LobbyPlayerLimit/issues/new)

## Credits and Special Mentions
- BestCodrEver (That's me!)
- Pumpedpixel (This plugin was originally made for him)
- Everyone in the PMMP Discord (who helped me with my questions)
