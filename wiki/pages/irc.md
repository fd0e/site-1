---
author: ~ben
published: true
title: irc
description: irc information
category: 
    - main
---

# [tildeverse irc](https://tilde.chat)

hi teammates!

the tilde.chat irc network is available at irc.tilde.chat:6697 (with ssl) as a round robin of 
[available nodes](https://tilde.chat/wiki/?page=servers).

this is the beginning of the [tilde.chat](https://tilde.chat) irc federation! more info on that site.

## here are some options to connect:

* `weechat` when logged in with ssh
* `irssi`
* [`znc`](https://znc.tilde.team/) - log in with your shell password and configure as needed
* run `webirc` to register your thelounge account for [our webchat](https://irc.tilde.team)
  note that thelounge does not authenticate with your shell password.
* any other client that you like: connect to our node at team.tilde.chat:6697 with ssl

local connections (weechat, irssi, znc) can use 6667 without ssl

## weechat relays

weechat introduced [unix socket relays](
https://weechat.org/files/doc/stable/weechat_user.en.html#relay_unix_socket)
in version 2.5 which is a much easier way to offer per-user relay access.

username.ttm.sh/weechat is configured to proxy to the default unix relay socket
location (`~/.weechat/relay_socket`). to get started using it, follow these steps.

1. in weechat:
    * `/relay add unix.weechat %h/relay_socket`
    * `/set relay.network.password mysupersecretpassword` - don't use this password
        of course. note that you might already have this set.

1. at your shell:
    * `chmod o+rw ~/.weechat/relay_socket` - note that other members of the team group
        are not included in the granted permissions. this allows nginx to connect
        to your socket on your behalf

1. in your relay client:
    * glowing-bear:
        - $user.ttm.sh
        - port 443
        - your relay password

    * weechat-android:
        - connection type: websocket (ssl)
        - websocket path: weechat
        - relay host: $user.ttm.sh
        - relay port: 443
        - your relay password

## znc 

the system znc authenticates using your shell password (same as with email and
[nextcloud](https://cloud.tilde.team). reach out to an admin on irc or send an
email to [sudoers@tilde.team](mailto:sudoers@tilde.teaem).

the webadmin interface is available at [znc.tilde.team](https://znc.tilde.team).

client connections are on port 6699 with ssl.

you can add network connections (up to 10) via webadmin or via a direct client
connection.

see the [znc wiki](https://wiki.znc.in/Connecting_to_ZNC) for more information.

---

for more info, see the [tilde.chat wiki](https://tilde.chat/wiki/) for info on bots and other specifics.

