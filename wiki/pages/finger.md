---
author: ~ahriman
published: false
title: finger
description: finger as a social network
category:
  - main
---

# finger

the [finger protocol](https://en.wikipedia.org/wiki/Finger_protocol) was created way back in 1977. its purpose was to display information about the queried user of a system, or all the users of a system.

it fell out of use in the 1990s due to various security concerns. the old finger daemons were buggy and easily exploited, while the information garnered from a query could be used for social engineering attacks. nowadays, the finger daemons have been refined and are no longer so vulnerable.

in the post-facebook world, new types of social networks are popping up. the latest in this movement is a resurgence of the finger protocol. what follows is a rough guide for getting yourself up to speed with finger on [tilde.team](https://tilde.team).

## tilde.team specifics

here on ~team, we run efingerd. see `man efingerd` for more info.

you can create a script called `~/.efingerd` which will be run when anyone fingers you.

## querying

the standard query for finger is simply

```bash
finger user@host
```

which displays login name, home directory, shell, real name, current login time, idle time, whether or not the user has mail, and the contents of the user's ~/.plan file. Here is an example of the output:

```
Login: username                          Name: Bob Bobson XXII
Directory: /home/username                Shell: /bin/bash
On since Wed Jan  2 04:04 (EST) on pts/94 from 168.297.83.21 via mosh [6420]
    8 minutes 26 seconds idle
Last login Wed Jan  2 04:33 (EST) on pts/91 from 168.297.83.21
No mail.
Plan:
hey hey hey everybody!
```

## .plan

The ~/.plan file displayed at the end of the finger query response allows for some customization. You can put literally any text you want there. Status updates, summaries, etc. This little file allows us to use finger as a rudimentary social network.

For example, say you want to use it as a personal summary, like having a blurb about what you're working on. Place the statement into ~/.plan and you're ready to go!

For a more traditional social network style format, put dated and timed status updates as if you're tooting on a mastodon instance. The sky's the limit! Well, actually, text is the limit. But you get the idea. Right?

hope to see you on finger soon!
