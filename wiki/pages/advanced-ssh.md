---
author: ~ubergeek
published: true
title: advanced ssh
description: advanced ssh tricks
category: 
    - main
---

# advanced ssh

Some more advanced ssh topics.

## SSH Tunnels

SSH can be used as a sort of "poor man's VPN". For example, you want to get into IRC with your local client (mIRC, Weechat, etc), but your local network blocks IRC ports.

However! Your local network will almost always allow SSH (sysadmins need this for most day to day work). You can connect to tilde.team, and use port forwarding to get on.

If you are connecting from a Linux machine, you can do this:
```
ssh -L 6667:localhost:6667 tilde.team
```

After being logged in, open your local IRC client, and use 127.0.0.1:6667 for your server setting. Voila! You're now on team's IRC server.

What that SSH command did was open a local port tunnel (-L), using local port 6667 (6667:) pointed at localhost (From the remote's point of view), on remote port 6667 (Default IRC port).

Putty has the same ability (For Windows and Mac users), under Connection --> SSH --> Tunnels.

You can do this for any arbitrary port.

## File Copying

What if you don't want to edit files on the team server, but instead, you want to create it on your local machine? You don't want to have to copy/paste or re-type all of that, right?

SCP to the rescue! SCP copies files over the ssh protocol. It works just like the cp command, but allows you to do this:

`scp MyNewFileILove.txt tilde.team:~/AhYesOnTheServerNow.txt`

As long as you can ssh, you can copy files to and from the remote side. It also works like this, to download a file:

`scp tilde.team:~/CrapINeedThisFileLocally.js ./AwesomeLocalJSFile.js`

## Remote execution

What if you don't want to really log into team.tilde, but you just need to run a command. You can do that too, with ssh!

`ssh tilde.team ping google.com`

The above executes the ping command from the server side of the house. The one thing you need to be careful of here are quotes and input redirection. It can have surprising affects, mixing remote and local pipes.

## SSH config
Each user has their own, personal configuration for ssh. The configuration files lives at `~/.ssh/config.`

A very common thing to do in this file is to create hosts aliases.

```
host tilde
	hostname tilde.team
	user ubergeek
    LocalForward localhost:6667 localhost:6667
```

There are tons of other options, including this LocalForward line to automatically set up the tunnel as show [above](#ssh-tunnels).

For more information about the available options, check the man page: `man ssh_config`.

You can set this up remotely, to make jumping to other hosts easier, or locally (If supported in your ssh setup) to make connecting easier for you.
