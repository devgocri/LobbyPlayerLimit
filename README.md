<div align="center">
<a href="https://poggit.pmmp.io/p/LobbyPlayerLimit"><img src="https://poggit.pmmp.io/shield.state/LobbyPlayerLimit"></a>
<a href="https://poggit.pmmp.io/p/LobbyPlayerLimit"><img src="https://poggit.pmmp.io/shield.api/LobbyPlayerLimit"></a>
<a href="https://poggit.pmmp.io/p/LobbyPlayerLimit"><img src="https://poggit.pmmp.io/shield.dl.total/LobbyPlayerLimit"></a>
<a href="https://poggit.pmmp.io/p/LobbyPlayerLimit"><img src="https://poggit.pmmp.io/shield.dl/LobbyPlayerLimit"></a>

</div>
<hr/>
<div align="center">
<img src="icon.png" width="64" height="64">
<h1 align="center">LobbyPlayerLimit</h1>
</div>
<div align="center">
<p align="center">A plugin which adds an automatic player transfer throughout multiple lobbies when you do /lobby with a player limit for each lobby.</p>

If you didn’t know, a lobby is where people spawn and they can join minigames, teleport to places etc. It is the starting point of a server as players spawn there for the first time. It’s practically a hub :D
</div>
<hr/>

## Downloads

- [Public Releases](https://poggit.pmmp.io/p/LobbyPlayerLimit)
- [Developer Builds](https://poggit.pmmp.io/ci/BestCodrEver/LobbyPlayerLimit)

## How to setup?

Drop the plugin into your server and start-and-stop it. Navigate to your `plugin_data` folder and find `lobbies.yml`.

Now, add the names of the worlds of your lobbies after `lobbies:`. You can add as many as you want as long as they follow the `- "Example"` format. Make sure they have the same amount of indentation!

Example:

```yaml
lobbies:
 - "world"
 - "worldone"
```

Then, add your fallback lobby world after `fallback:"`. Check the comments in the config if you don’t know what a fallback lobby is.

Example:

```yaml
fallback: "fallbackworld"
```

After that, replace `limit: 0` with `limit: AMOUNT OF PLAYERS PER LOBBY`.

Add your “lobby full” message after `lobbyfullmsg:`.

Now, restart the server and you're all done!

## Make yourself immune to the system
Whenever you join the server, you will immediately be joined to a lobby with an amount of players less than your limit. If you want to disable this, you have to remove the `lobbyplayerlimit.lobby` permission from yourself. 

Assuming you have PurePerms installed and the server is online, run this command in console or in game:
`/unsetuperm PLAYERNAME lobbyplayerlimit.lobby`
Note: Doing this also disables your ability to run `/lobby`.

Now you will be immune to the system!

To add yourself back to the system, assuming you have PurePerms installed and the server is online, run this command in console or in game:
`/setuperm PLAYERNAME lobbyplayerlimit.lobby`

## Commands

`/lobby` - Teleport to a lobby (LobbyPlayerLimit main command)

## Permissions

`lobbyplayerlimit.lobby` - Ability to run /lobby and be teleported to a lobby automatically on join.

## Report a bug/leave a suggestion!

Feel free to tell me [here](https://github.com/BestCodrEver/LobbyPlayerLimit/issues/new)!

<hr/>

<p align="center">This plugin was made with ❤️ by <a href="https://github.com/BestCodrEver">BestCodrEver</a> for Pumpedpixel</p>
