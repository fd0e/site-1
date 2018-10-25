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
 4. [lxd](#lxd)

## adding users

> this is deprecated. use the new [makeuser](https://tildegit.org/team/makeuser/src/branch/bash-edition) script

1. generate a random password
    ```
    pwgen -1B 15
    ```

1. create a new user account:
    ```
    sudo adduser newusername
    ```

1. add their ssh pubkey:

    ```
    echo "ssh pubkey from their signup email" | sudo tee /home/newusername/.ssh/authorized_keys
    ```

1. drop the requested username and generated password in the placeholder below. reply all so that other admins will know that it's been handled.

welcome mail template:

    hey ~newusername,

    welcome to tilde.team!

    your new account has been established. you can ssh into tilde.team with
    the ssh key you supplied on registration.

    your password is "[[password]]". please change it when you log in for
    the first time. the password is used for imap/smtp auth, not shell login,
    which is set to only use ssh key authentication.

    to get started, type `motd` at the command prompt to see a few ways to
    get started. have fun!

    the greatest value of tilde.team is not the services provided by the
    server, but rather the interesting and welcoming community built by its
    users. this is possible because of people like you who choose to make
    this a great place. the best way you can help tilde.team is by working
    to support a great system culture. chat on irc; build cool programs and
    share them with others; focus on learning, and help others learn; be a
    good example for others; have fun!

    also, your ~/public_html directory is served at
    https://tilde.team/~newusername/
    (you can also use https://newusername.tilde.team)

    check out our wiki at https://tilde.team/wiki/ for more information (and
    maybe help us write a new wiki article:)

    our irc is tilde.chat, an irc network connecting several
    tilde servers. the `chat` command on your ~team shell will open up
    weechat with some nice default configs and plugins.
    see our wiki article (https://tilde.team/wiki/?page=irc)
    or https://tilde.chat site for information on how to connect from elsewhere.
    we also have a webclient at https://irc.tilde.team that you can
    register for by running the `webirc` command from a shell session.

    we look forward to seeing you around! welcome to the ~team!

    ~tilde.team admins



## backups

tilde.team uses [tarsnap](https://tarsnap.com) for backups and is configured to save 12 hourly backups, 7 daily backups, 6 weekly backups, and 2 years' worth of monthly backups.

to see a list of the backups:

```
sudo tarsnap --list-archives
```

to restore a backup:

```
tarsnap -x -f name-of-backup
```

we keep backups of:
* `/home`
* `/etc`
* `/var` (excluding `/var/log` and `/var/lib/lxd`)

see the [tarsnap documentation](https://www.tarsnap.com/usage.html) for more information.

## bypassing resource limits

(by [~khuxkm](https://khuxkm.tilde.team/))

So occasionally, when you're working with the services user, you'll run into "error: fork: retry: Resource temporarily unavailable" errors.

Here's how to fix it:

    07:11 <~khuxkm>  so this is seriously dumb
    07:11 <~khuxkm>  so how you fix limits is
    07:12 <~khuxkm>  sudo -iu services
    07:12 <~khuxkm>  use ps -aux to find the bash process ("-bash")
    07:12 <~khuxkm>  then `sudo prlimit --pid <pid> --nproc 1000000:100000000`
    07:12 <~khuxkm>  then do what you need to do
    07:12 <~khuxkm>  then exit the bash session


## lxd

this is the process that i use to create lxd containers for users.

you need two things from the user: an ssh public key (on their ~team shell) and a [distro choice](https://us.images.linuxcontainers.org/)


1. create the container
    ```
    # debian
    lxc launch images:debian/stretch <username>
    # ubuntu
    lxc launch ubuntu: <username>
    ```

1. make sure the container has an sshd running
    ```
    lxc exec <username> bash
    # might have to adjust this if the image is not a debian-derivative
    root@<username> $ apt install openssh-server
    ```

1. copy the user's ssh pubkey to root on the container
    ```
    lxc exec <username> bash
    mkdir -m 700 .ssh
    echo "pubkey" >> ~/.ssh/authorized_keys
    chmod 600 ~/.ssh/authorized_keys
    ```

> now the user can run `ssh root@<username>.lxd` to get a shell inside their container
> the .lxd dns resolver is provided by the lxd daemon itself through dnsmasq

### make the container public

> check with the user and find out what they want the container to be available as (which domain)
> nginx matches concrete `server_name`s first, so you can replace the `*.tilde.team` match

1. copy user-lxd.template
    ```
    cd /etc/nginx/sites-available
    sudo cp user-lxd.template <username>.tilde.team
    sudo vim <username>.tilde.team
    ```

1. replace the username
    ```
    :%s/<user>/<username>/g
    :wq
    ```

1. enable the vhost
    ```
    cd /etc/nginx/sites-enabled
    sudo ln -s ../sites-available/<username>.tilde.team .
    ```

1. reload nginx
    ```
    # make sure the configs look ok
    sudo nginx -t
    sudo service nginx reload
    ```

bam! now `<username>.tilde.team` will forward requests to the container.

make sure that the user is running some kind of webserver on port 80 inside the container!

feel free to add other configs to their vhost or use any of the other [tildepage domains](?page=tildepages)