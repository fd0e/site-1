---
author: ~ben
published: false
title: administration
description: ~team admin guide
category: 
    - main
---

# administration
---


## adding users

1. create a new user account:
```bash
sudo adduser newusername
```
use the default password `tilde`

1. su newusername and then copy the ssh key into ~/.ssh/authorized_keys

1. reply all to their email (so that sudoers will know that the account creation is done) with their account information and encourage them to hop onto irc/#meta to meet the community

welcome mail template:
```
hey ~[[username]],

welcome to tilde.team!

your new account has been established. you can ssh into tilde.team with 
the ssh key you supplied on registration.

if you need to change your shell, the default password is tilde. feel 
free to change it.

to get started, type motd at the command prompt to see a few ways to 
get started. have fun!

the greatest value of tilde.team is not the services provided by the 
server, but rather the interesting and welcoming community built by its 
users. this is possible because of people like you who choose to make 
this a great place. the best way you can help tilde.team is by working 
to support a great system culture. chat on irc; build cool programs and 
share them with others; focus on learning, and help others learn; be a 
good example for others; have fun!

also, your ~/public_html directory is served at 
https://tilde.team/~[[username]] 
(you can also use https://[[username]].tilde.team)

check out our wiki at https://tilde.team/wiki for more information (and 
maybe help us write a new wiki article:)

our irc is at tilde.chat. see the wiki article 
(https://tilde.team/wiki/?page=irc) for information on how to connect. 
we also have a webclient at https://irc.tilde.team that you can 
register for by running the webirc command from a shell session.

we look forward to seeing you around! welcome to the ~team!

~tilde.team admins
```



---
## backups

tilde.team uses [tarsnap](https://tarsnap.com) for backups and is configured to save 12 hourly backups, 7 daily backups, 6 weekly backups, and 2 years' worth of monthly backups.

to see a list of the backups:
```bash
sudo tarsnap --list-archives
```

to restore a backup:
```bash
tarsnap -x -f name-of-backup
```

we keep backups of:
* `/home`
* `/etc`
* `/var` (excluding `/var/log`)

see the [tarsnap documentation](https://www.tarsnap.com/usage.html) for more information.
