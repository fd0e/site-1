---
author: ~ben
published: true
title: getting started
description: tilde.team getting started guide
category: 
    - main
---

# getting started

Welcome
New to the command line and all this webby cowfoolery? You're in luck! Here's a basic HELLO WORLD tutorial.

```
 _______________________________________
/ WELCOME TO TILDE.TEAM A PLACE FOR WEB \
\ PAGES                                 /
 ---------------------------------------
        \   ^__^
         \  (oo)\_______
            (__)\       )\/\
                ||----w |
                ||     ||
```

## Logging in

### PC (windows)

* On a PC, you'll need to get an ssh client. [PuTTY](http://www.putty.org/) is a good one.
    - host: tilde.team
* another option is to use [WSL (windows subsystem for linux)](https://docs.microsoft.com/en-us/windows/wsl/install-win10)
* or [git bash](https://git-scm.com) included with a standard git install

### Linux

* Open a terminal. Try ctrl + alt + t.
* `ssh your_username@tilde.team`
* Enter your password.


### Mac

* Browse to Applications/Utilities/Terminal and launch Terminal (or press cmd+space, start typing Terminal, and press return)
* `ssh your_username@tilde.team`
* Enter your password.


## Finding your index.html file

There are some basic command line commands you'll want to Google and learn, but for this tutorial you only need a few:

* `ls` = list files and folders in current directory
* `cd` = change directories
* `nano` = a command line text editor

Type: `ls` to see where you are. You should see a directory called "public_html"

Type: `cd public_html` to move into that folder. (cd stands for change directory.)

Type: `ls` to see where you are. You should see your index.html file
Editing your index.html file

Type: `nano index.html` to open your index.html file and begin editing

Edit your file, willy nilly

When done editing, use `ctrl + x` to close the file

You'll be asked if you want to save; say y and to return to the command line

Refresh your tilde page in your browser to see your new website

Note: If at any time you feel you made a mistake in editing, you can exit and n to not save.

see the [advanced ssh key guide](/wiki/view.php?page=advanced-ssh) for more information and cool tips :)
