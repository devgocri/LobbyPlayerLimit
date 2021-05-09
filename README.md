# LobbyPlayerLimit
Plugin for Dreampixel, adding a automatic player transfer with multiple lobbies

By: [BestCodrEver](https://github.com/BestCodrEver) (Dev for DP)

## How to setup?
Navigate to your `plugin_data` folder and find `lobbies.yml`. **MAKE SURE THE SERVER IS COMPLETELY TURNED OFF, DON'T EVEN START IT WITHOUT CONFIGURING THE YAML FILE!!!**

It will contain this:
```yaml
#Another epic plugin made by BestCodrEver
#For Dreampixel
#Luv dem pixels boiii

#MAKE SURE ALL FIELDS ARE FILLED!!! IF NOT, THE PLUGIN WILL BREAK!!!

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
fallback: "dummeh"
```
Now, replace `- "dummy1"` and `- "dummy1"` the names of the worlds of your lobbies. You can add as many as you want as long as they follow the `- "Example"` format. Make sure they have the same amount of indentation!

Then, replace `fallback: "dummeh"` with `fallback: "YOUR FALLBACK LOBBY WORLD NAME HERE"`. 

Now, restart the server and you're all done!

## Make yourself immune to the system
Whenever you join the server, you will immediately be joined to a lobby with an amount of players less than 30. If you want to disable this, you have to remove the `lobby.tp` permission from yourself. 

Assuming you have PurePerms installed and the server is online, run this command in console or in game:
`/unsetuperm PLAYERNAME lobby.tp`
