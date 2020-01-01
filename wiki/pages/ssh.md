---
author: ~ben
published: true
title: ssh
description: ssh tutorial and background info
category:
  - main
---

# ssh

_or, how to tell other computers to do cool things_

---

> all users are required to use an ssh keypair for login, or will be required
to proceed with manual account recovery with [~ben](/~ben/) or another admin.
drop a line to [sudoers@tilde.team](mailto:sudoers@tilde.team) or hop on
[irc](https://web.tilde.chat/?join=sudoers) for assistance.

## tilde.team details

ports 22, 80, 443, and 2222 are available for ssh.

the primary ip has 80 and 443 in use by nginx.

use ssh.tilde.team to reach the secondary ip and use 80 and 443 for ssh.

so, for example, you can do:

```
ssh -p 443 user@ssh.tilde.team
ssh user@tilde.team  # this uses port 22, which can be blocked on some networks
```

tilde.team's ECDSA key fingerprint is SHA256:R3qNfKIF3IiXhKCbFX6rCKl73yzexi9Wodsow6XFres.

the key fingerprints are in dns as sshfp records as well, which you can check against
by setting VerifyHostKeyDNS to yes in your `~/.ssh/config`.

you can check the records yourself with the `dig` tool like this:

    dig sshfp tilde.team

---

## intro

** if you just want to get right to a tutorial you can
[skip over this background info](#how-to-make-an-ssh-key)**

while [tilde.team](https://tilde.team) is accessible on the web and features
lovely web pages written by its users, most interaction with tilde.team takes
place **inside the machine** that runs tilde.team as opposed to via web forms
that have an effect from **outside** tilde.team's computer.

this is what sets tilde.team apart from most other online communities. you
connect directly to another computer from yours alongside other people and then
write your web pages, chat, and play games all via text-based interfaces right
on tilde.team's computer.

prior to the web (which debuted in 1995) this is how pretty much all computer
stuff got done. you connected directly to a machine (usually over a direct,
physical phone line) and did your work there.

for a long time, people used a tool called
[`telnet`](https://en.wikipedia.org/wiki/telnet) to connect to other computers.
these days we use a tool called **ssh**.

`ssh` is a text-based tool that provides a direct connection from your computer
to another. ssh is an acronym that stands for secure shell. the _shell_ part
refers to the fact that it's a text-based tool; we use the word shell to refer
to a text-based interface that you give commands to. the _secure_ part refers
to the fact that, when you're using ssh, no one can spy on your connection to
another computer (unlike the old `telnet` command).

**why bother with all of this?** passwords are really insecure and hard to manage.
using keys makes life easier for you, fair user (your account is less likely to
be hacked) and for me, your humble sysadmin (less administration than passwords).

---

## how to make an ssh key

SSH supports a handful of types of cryptographic keys. The most used are [RSA](
  <https://en.wikipedia.org/wiki/RSA_(cryptosystem)>) and the more modern [Ed25519](
    https://en.wikipedia.org/wiki/EdDSA#Ed25519).

RSA is the de-facto standard and is supported everywhere (just choose a big
enough key like 4096 bits to be secure). Ed25519 is designed to be faster and
smaller withouth sacrificing security, so is best suited for embedded devices
or machines with low resources. It's supported on tilde (and really on any
modern system) but you may find older systems which do not support it.

Below you'll find instructions to generate either type (or both if you want).

Keep in mind that these instructions leave your private keys unencrypted in
your local hard disk. So keep them private; never share them. A good solution
is to provide a password for them at creation time, but this implies entering
a password any time you used them (impractical) or use something like [ssh-agent](
  https://man.openbsd.org/ssh-agent.1) (a bit more complex)

We don't have documentation for this [(yet)](https://tildegit.org/team/site/src/branch/master/wiki)
so either go with no password keys, or ask on IRC ([#team](https://web.tilde.chat/?join=team)) for help.

pick your fighter: [[mac](#mac)] | [[windows](#windows)] | [[linux](#linux)]

---

### mac

#### generating your keypair

1. open terminal (it's in `/Applications/Utilities`)

1. create your .ssh directory:

```bash
mkdir -m 700 ~/.ssh
```

1. create your keys:

for rsa keys:

```bash
ssh-keygen -t rsa -b 4096
```

for dd25519 keys:

```bash
ssh-keygen -t ed25519 -a 100
```

1. if you press enter to accept the defaults, your public and private key will
be located at `~/.ssh/id_rsa.pub` and `~/.ssh/id_rsa` respectively (or
`~/.ssh/id_ed25519.pub` and `~/.ssh/id_ed25519` if you chose ed25519 type)

1. `cat ~/.ssh/id_rsa.pub` (or `cat ~/.ssh/id_ed25519.pub` for ed25519)

1. copy the output of the last command and paste it in the sshkey field on the
signup form (or email it to [~sudoers](mailto:sudoers@tilde.team) if you already have an account)

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

### windows 10

windows 10 1809 or later has openssh built in, so you no longer need to install third-party tools. if openssh is not enabled, please see microsoft's documentation on [openssh in windows](https://docs.microsoft.com/en-us/windows-server/administration/openssh/openssh_overview).

#### generating your keypair

1. open your new shell

1. create your .ssh directory

```powershell
mkdir .ssh
```

1. create your keypair

for rsa keys:

```powershell
ssh-keygen -t rsa -b 4096
```

for ed25519 keys:

```powershell
ssh-keygen -t ed25519 -a 100
```

1. if you press enter to accept the defaults, your public and private key will
be located at `%UserProfile%\.ssh\id_rsa.pub` and `%UserProfile$\.ssh\id_rsa` respectively (or
`%UserProfile%\.ssh\id_ed25519.pub` and `%UserProfile%\.ssh\id_ed25519` if you chose ed25519 type)

1. `type %UserProfile%\.ssh\id_rsa.pub` (or `type %UserProfile%\.ssh\id_ed25519.pub` for ed25519)

1. copy the output of the last command and paste it in the sshkey field on the
signup form (or email it to [~sudoers](mailto:sudoers@tilde.team) if you already have an account)

#### using your keypair

once [~ben](https://tilde.team/~ben/) or another admin approves your signup, you can join the tilde.team

1. open powershell (right click start button and select "windows powershell")

1. `ssh` to tilde.team:

```bash
ssh username@tilde.team
```

where username is your username (~ben would use `ssh ben@tilde.team`)

1. profit???

---

### legacy windows

older versions of windows unfortunately do not come with openssh, and you will need to install a third-party tool. you may choose from any of the following options:

- [windows subsystem for linux](https://docs.microsoft.com/en-us/windows/wsl/install-win10)
- [msys2](http://www.msys2.org/)
- [git bash](https://git-scm.com)

1. open your new shell

1. create your .ssh directory

```bash
mkdir .ssh
```

1. create your keypair

for rsa keys:

```bash
ssh-keygen -t rsa -b 4096
```

for ed25519 keys:

```bash
ssh-keygen -t ed25519 -a 100
```

1. if you press enter to accept the defaults, your public and private key will
be located at `~/.ssh/id_rsa.pub` and `~/.ssh/id_rsa` respectively (or
`~/.ssh/id_ed25519.pub` and `~/.ssh/id_ed25519` if you chose ed25519 type)

1. `cat ~/.ssh/id_rsa.pub` (or `cat ~/.ssh/id_ed25519.pub` for ed25519)

1. copy the output of the last command and paste it in the sshkey field on the
signup form (or email it to [~sudoers](mailto:sudoers@tilde.team) if you already have an account)

#### using your keypair

once [~ben](https://tilde.team/~ben/) or another admin approves your signup, you can join the tilde.team

1. open terminal (location will vary depending on your choice)

1. `ssh` to tilde.team:

```bash
ssh username@tilde.team
```

where username is your username (~ben would use `ssh ben@tilde.team`)

1. profit???

---

### linux

there are a lot of linux distros, but `ssh` and `ssh-keygen` should be available
in almost all cases. if they're not, look up how to install ssh for your distro.

#### generating your keypair

1. make sure you have a `~/.ssh` directory

```bash
mkdir -m 700 ~/.ssh
```

1. create your keys

for rsa keys:

```bash
ssh-keygen -t rsa -b 4096
```

for ed25519 keys:

```bash
ssh-keygen -t ed25519 -a 100
```

1. if you press enter to accept the defaults, your public and private key will
be located at `~/.ssh/id_rsa.pub` and `~/.ssh/id_rsa` respectively (or 
`~/.ssh/id_ed25519.pub` and `~/.ssh/id_ed25519` if you chose ed25519 type)

1. `cat ~/.ssh/id_rsa.pub` (or `cat ~/.ssh/id_ed25519.pub` for ed25519)

1. copy the output of the last command and paste it in the sshkey field on the 
signup form (or email it to [sudoers@tilde.team](mailto:sudoers@tilde.team) if you already have an account)

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
