---
author: ~ben
published: true
title: daemonize with user units
description: a quick tutorial on creating and managing daemonized processes with systemd user units
category: 
    - main
---

# daemonize all the things

so you've got a process that you want to keep running. you might have it in a
tmux or screen session. let's use systemd user units to manage it!

1. ensure that your user unit loadpath is set up:
```bash
mkdir -p ~/.config/systemd/user/
```

1. create a basic service. save something like this in 
`~/.config/systemd/user/my-new-service.service` (adjusting where necessary)
```bash
[Unit]
Description=foo

[Service]
ExecStart=/bin/bash -c "while true do; echo hi; done"

[Install]
WantedBy=default.target
```

1. enable it
```bash
systemctl --user enable --now my-new-service.service
```

1. enable-linger for your user account
```bash
loginctl enable-linger
```
this allows your user units to run even when you're not logged in.

done!

you can now use `systemctl --user` to manage your daemonized process.

pro-tip: add `alias sysu='systemctl --user'` to your shell's configuration
for a handy shortcut (or any other alias as you choose)
