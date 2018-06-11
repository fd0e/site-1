---
author: ~ben
published: false
title: administration
description: advanced ssh tutorial
category: 
    - main
---

# administration
---


## adding users

1. create a new user account:
```bash
sudo adduser newusername
```
use the default password `tilde`

1. respond to their email with their account information

1. click the link in the signup email from the server to open the domain control panel and add their forwarding address if they've opted in

1. profit??

account creation is something that i would like to look into. maybe this can be an admin portal (similar to ~town) that would notify admins when a new signup arrives and prompt them to go to the web interface to approve/deny/respond to the account request.


---
## backups

tilde.team uses [tarsnap](https://tarsnap.com) for backups and is configured to save 12 hourly backups, 7 daily backups, 6 weekly backups, and 2 years' worth of monthly backups.

to see a list of the backups:
```bash
sudo tarsnap --list-archives
```

to restore a backup:
```bash
tarsnap -x -f name-of-backup
```

we keep backups of:
* `/home`
* `/etc`
* `/var` (excluding `/var/log`)

see the [tarsnap documentation](https://www.tarsnap.com/usage.html) for more information.