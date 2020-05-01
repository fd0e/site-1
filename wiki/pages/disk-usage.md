---
author: ~ben
published: true
title: disk usage tools and guidelines
description: tips and tricks for keeping track of your disk usage on tilde.team and elsewhere
category: 
    - main
---

# disk usage

files tend to keep growing and growing until you run out of disk space all of a sudden.

let's take a look at some tools to keep an eye on disk usage.

### du

`du` (short for `d`isk `u`sage) is the go-to tool.

common switches include:

* `-h`: human readable
* `-s`: summarize
* `-c`: total

example:

to see the disk usage of the current directory, run:
    du -sh

check the manpage for more information and additional switches

### ncdu

`ncdu` (short for `nc`urses `d`isk `u`sage) is extremely useful for visualizing
disk usage. 

call `ncdu` with no args to recurse starting in the current directory or
pass a dir name to start there

try it on your `$HOME` and see which files and dirs are taking up the most
space.

press `?` to see additional keybinds once you've started it up. you can change
the sort order, open a shell, and delete files without closing the program.

### df

`df` (short for `d`isk `f`ree) lists mounted disks with usage, free space,
and capacity. try it out from your shell to get a quick glance at total
disk usage

don't forget to use `-h` to get human readable units.


## tilde.team guidelines

even though we have plenty of disk space to go around on tilde.team,
we request that you try to keep your usage below 1 gb.

a good rule of thumb is to consider if _all_ teammates
were to use the same amount of resources and how that would affect
the experience for everyone else.

admins occasionally take a look at disk usage in `/home` and may
request that you delete large or unnecessary files.

please check with admins if you expect to use a lot of disk
for a short period of time so we don't bother you excessively.

