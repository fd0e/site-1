---
author: ~ben and ~khuxkm
published: true
title: administration
description: ~team admin guide
category:
    - main
---

# administration
 1. [adding users](#adding-users)
 2. [backups](#backups)
 3. [bypassing resource limits as services user](#bypassing-resource-limits)
 4. [runaway processes/excessive resource usage](#runaway-processes)

## adding users

> see the [makeuser](https://tildegit.org/team/makeuser) script's documentation

the signup page ([source](
https://tildegit.org/team/site/src/branch/master/signup/signup-handler.php))
writes `makeuser` commands into `/var/signups`.

once you've looked through signups and removed spam (by just commenting that
line in the signups file), you can run

    sh /var/signups

and enter your sudo password to approve all pending requests


## backups

tilde.team uses [borg](https://borgbackup.readthedocs.io/en/stable/) (via 
[borgmatic](https://torsion.org/borgmatic)) for backups and is configured 
to save 7 daily backups, 4 weekly backups, 6 monthly, and 1 yearly backup.
backups run once daily during the night.

to see a list of the backups:

    sudo borgmatic list

to see general backup stats:

    sudo borgmatic info

to restore a backup:

    sudo borgmatic extract --archive <archive name> --progress --path /path/to/restore

we keep backups of:
* `/home`
* `/etc`
* mysql and postgres databases (dumped before each backup run)
* [nextcloud](https://cloud.tilde.team/) data
* [tildegit](https://tildegit.org) database and repos
* `/var/spool/cron` - your crontabs
* `/tilde` - user-submitted scripts
* [mailman3](https://lists.tildeverse.org) list and archive data


## bypassing resource limits

(by [~khuxkm](https://khuxkm.tilde.team/))

So occasionally, when you're working with the services user, you'll run into 
"error: fork: retry: Resource temporarily unavailable" errors.

Here's how to fix it:

    07:11 <~khuxkm>  so this is seriously dumb
    07:11 <~khuxkm>  so how you fix limits is
    07:12 <~khuxkm>  sudo -iu services
    07:12 <~khuxkm>  use ps -aux to find the bash process ("-bash")
    07:12 <~khuxkm>  then `sudo prlimit --pid <pid> --nproc 1000000:100000000`
    07:12 <~khuxkm>  then do what you need to do
    07:12 <~khuxkm>  then exit the bash session


## runaway processes

if a user consistently uses a lot of resources, send them a note via email
to request that they mind their usage levels. if they fail to respond within
a day or two, feel free to kill the process by pid or with `killall`. if they
resume using excessive resources and haven't responded to communications, then
feel free to lock them out by changing their shell to `/usr/sbin/nologin`.

    sudo chsh -s /usr/sbin/nologin <username>

don't forget to kill their existing session with:

    sudo loginctl terminate-user <username>

