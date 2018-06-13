---
author: ~ben
published: true
title: ssh
description: ssh tutorial and background info
category: 
    - main
---

# ssh
*or, how to tell other computers to do cool things*

---

> all users are now required to use an ssh keypair for login, or will be required to proceed with manual account recovery with [~ben](/~ben/)


** if you just want to get right to a tutorial you can [skip over this background info](#tutorial)**

while [tilde.team](https://tilde.team) is accessible on the web and features lovely web pages written by its users, all of the interaction with tilde.team takes place **inside the machine** that runs tilde.team as opposed to via web forms that have an effect from **outside** tilde.team's computer.

this is what sets tilde.team apart from most other online communities. you connect directly to another computer from yours alongside other people and then write your web pages, chat, and play games all via text-based interfaces right on tilde.team's computer.

prior to the web (which debuted in 1995) this is how pretty much all computer stuff got done. you connected directly to a machine (usually over a direct, physical phone line) and did your work there.

for a long time, people used a tool called [`telnet`](https://en.wikipedia.org/wiki/telnet) to connect to other computers. these days we use a tool called **ssh**.

`ssh` is a text-based tool that provides a direct connection from your computer to another. ssh is an acronym that stands for secure shell. the *shell* part refers to the fact that it's a text-based tool; we use the word shell to refer to a text-based interface that you give commands to. the *secure* part refers to the fact that, when you're using ssh, no one can spy on your connection to another computer (unlike the old `telnet` command).

**why bother with all of this?** passwords are really insecure and hard to manage. using keys makes life easier for you, fair user (your account is less likely to be hacked) and for me, your humble sysadmin (less administration than passwords). 



---
## how to make an ssh key
<a class="anchor" name="tutorial"></a>

pick your fighter: [[mac](#mac)] | [[windows](#windows)] | [[linux](#linux)]


---
### mac
<a class="anchor" name="mac"></a>

#### generating your keypair

1. open terminal (it's in `/Applications/Utilities`)

1. create your .ssh directory: 
```bash
mkdir -m 700 ~/.ssh
```

1. create your keys: 
```bash
ssh-keygen -t rsa -b 2048
```

1. if you press enter to accept the defaults, your public and private key will be located at `~/.ssh/id_rsa.pub` and `~/.ssh/id_rsa` respectively

1. `cat ~/.ssh/id_rsa.pub`

1. copy the output of the last command and paste it in the sshkey field on the signup form (or email it to [~ben](mailto:ben@tilde.team) if you already have an account)

#### using your keypair

once [~ben](https://tilde.team/~ben/) or another admin approves your signup, you can join the tilde.team

1. open terminal (it's in `/Applications/Utilities`)

1. `ssh` to tilde.team:
```bash
ssh username@tilde.team
```
where username is your username (~ben would use `ssh ben@tilde.team`)

1. profit???


---
### windows
<a class="anchor" name="windows"></a>

there are a couple options for using ssh on windows these days. i like to use [git bash](https://git-scm.com).

#### generating your keypair

choose from any of the following options:
* [windows subsystem for linux](https://docs.microsoft.com/en-us/windows/wsl/install-win10)
* [cmder](http://cmder.net)
* [cygwin](https://cygwin.com)
* [putty](https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html)
* [msys2](http://www.msys2.org/)
* [git bash](https://git-scm.com)

1. open your new shell

1. create your .ssh directory
```bash
mkdir .ssh
```

1. create your keypair
```bash
ssh-keygen -t rsa -b 2048
```

1. if you press enter to accept the defaults, your public and private key will be located at `~/.ssh/id_rsa.pub` and `~/.ssh/id_rsa` respectively

1. `cat ~/.ssh/id_rsa.pub`

1. copy the output of the last command and paste it in the sshkey field on the signup form (or email it to [~ben](mailto:ben@tilde.team) if you already have an account)


#### using your keypair

once [~ben](https://tilde.team/~ben/) or another admin approves your signup, you can join the tilde.team

1. open terminal (it's in `/Applications/Utilities`)

1. `ssh` to tilde.team:
```bash
ssh username@tilde.team
```
where username is your username (~ben would use `ssh ben@tilde.team`)

1. profit???


---
### linux
<a class="anchor" name="linux"></a>

there are a lot of linux distros, but `ssh` and `ssh-keygen` should be available in almost all cases.

#### generating your keypair

1. make sure you have a `~/.ssh` directory
```bash
mkdir -m 700 ~/.ssh
```

1. create your keys
```bash
ssh-keygen -t rsa -b 2048
```

1. if you press enter to accept the defaults, your public and private key will be located at `~/.ssh/id_rsa.pub` and `~/.ssh/id_rsa` respectively

1. `cat ~/.ssh/id_rsa.pub`

1. copy the output of the last command and paste it in the sshkey field on the signup form (or email it to [~ben](mailto:ben@tilde.team) if you already have an account)


#### using your keypair

once [~ben](https://tilde.team/~ben/) or another admin approves your signup, you can join the tilde.team

1. open a terminal (this depends on your distro)

1. `ssh` to tilde.team:
```bash
ssh username@tilde.team
```
where username is your username (~ben would use `ssh ben@tilde.team`)

1. profit???

---

this tutorial is based on and uses parts of [the tilde.club ssh primer](https://github.com/tildeclub/tilde.club/blob/master/docs/ssh.md) and [the tilde.town ssh guide](https://tilde.town/wiki/ssh.html).
