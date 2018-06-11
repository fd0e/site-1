---
author: ~ben
published: true
title: email
description: email settings for tilde.team
category: 
    - main
---

# email


as of june 10, 2018, the mx record for tilde.team is now set to our own mailserver!

you have a couple options:

* mutt - should work out of the box

* alpine - should work out of the box

* [webmail](https://mail.tilde.team)

* imap/smtp
    - email address: username@tilde.team
    - username: username
    - password: your shell password
    - imap: mail.tilde.team port 143 (starttls)
    - smtp: mail.tilde.team port 587 (starttls)

mail sent to your username@tilde.zone and username@tildeteam.org will also arrive in your inbox. feel free to add those addresses as aliases or alternates.

if you would like mail sent to username@tilde.team to be forwarded somewhere else, put that email address in ~/.forward.

ask [~ben](/~ben/) if you have any questions