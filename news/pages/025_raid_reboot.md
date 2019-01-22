---
published: true
date: 6 jan 2019
title: RAID change; reboot
author: fosslinux
---

yesterday/today, depending on your timezone, ~team rebooted.
this was in order for ~ben to change the raid config. 

as some of you may have noticed, we had been running out of disk space.
the raid config was raid 1 between two disks, however, a poll on the mailing
list found that the ~teamverse would prefer to have raid 0 with more disk
space as opposed to the small redundancy raid 1 gives.

we already have hourly backups, so if one disk goes down, we just need to
wait for hetzner to replace the disk and restore the backup. while raid 0
means more downtime if one disk goes down, we have far more space.

there were a few issues, but they have been ironed out. any processes you were
running will now be stopped and you will have to reconnect back to irc if you
had your irc client running on ~team. thelounge should have automatically
reconnected.

if there's any further issues, let ~ben know on irc or at &lt;ben at ttm dot sh>.

once again, thanks to ~ben for the work he does maintaining ~team!
