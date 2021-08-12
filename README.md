# LobbyPlayerLimit

[![](https://poggit.pmmp.io/shield.state/LobbyPlayerLimit)](https://poggit.pmmp.io/p/LobbyPlayerLimit)
[![](https://poggit.pmmp.io/shield.api/LobbyPlayerLimit)](https://poggit.pmmp.io/p/LobbyPlayerLimit)
[![](https://poggit.pmmp.io/shield.dl.total/LobbyPlayerLimit)](https://poggit.pmmp.io/p/LobbyPlayerLimit)
[![](https://poggit.pmmp.io/shield.dl/LobbyPlayerLimit)](https://poggit.pmmp.io/p/LobbyPlayerLimit)

A plugin which adds an automatic player transfer throughout multiple lobbies when you do /lobby with a player limit for each lobby

## How to setup?
Updated setup notes can be found in the poggit page.

## Make yourself immune to the system
Whenever you join the server, you will immediately be joined to a lobby with an amount of players less than your limit. If you want to disable this, you have to remove the `lobbyplayerlimit.lobby` permission from yourself. 

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
