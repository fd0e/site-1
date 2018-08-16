---
author: ~cmccabe
published: true
title: irc-bots
description: information about irc bots on tilde.team
category: 
    - main
---

# tilde.team irc bots

tilde.team is a place for socializing, learning, and making cool stuff. one fun activity for this is the creation of [irc](https://tilde.team/wiki/?page=irc) bots.

if you keep your bots clean and efficient, your irc bots are welcome on tilde.team.

bots should be well behaved and efficient with system resources. if you see a bot that is not, please remind the botmaster about this and/or notify an admin. naughty bots can make the system less enjoyable for everyone, and we all have to work together to police them.

## rules and etiquette for tilde.team irc bots

your bot must respond to !botlist with the following information:
- your system username (as creator/botmaster) - so we can contact you if the bot misbehaves
- one line description of the bot's functionality
- list of the bots public commands

be conservative about automatically re-connecting to the server or channel.

if your bot's code is not stable, keep it in the #bots channel and do testing there.

## tilde.team bot starter kit

[khuxkm](https://khuxkm.tilde.team) is hard at work developing a starter kit framework in python that you can use to build your own irc bot. find the [source here](https://git.tildeverse.org/team/teambot). it's installed globally, so get coding!

## add your bot to the list below

follow the example of sedbot when you add your bot in a PR to the wiki

* sedbot
    - botmaster: [~ben](https://ben.tilde.team)
    - short description: sent a typo in chat? fix it up with a sed expression and sedbot will try to correct it
    - list of functions:
        + s/needle/replace/flags
        + most regex character classes match here
        + flags include `g` and `i`
    - [source](https://git.tildeverse.org/ben/sedbot)
