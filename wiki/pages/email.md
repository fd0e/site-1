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
    - email address: username@tilde.team (or any of the aliased domains)
    - username: username
    - password: your shell password
    - imap: imap.tilde.team port 143 (starttls)
    - smtp: smtp.tilde.team port 587 (starttls)

---

because [~ben](https://tilde.team/~ben/) likes to buy domain names, you can use the following domains as aliases for your inbox:
* tilde.zone
* tilde.chat
* tilde.site
* tildeteam.org
* tildenet.org
* tildeverse.org

mail sent to your_username@ any of those domains will end up in your inbox. most clients will allow you to add additional identities/aliases. 
additionally, any address with a `-` or `+` and arbitrary text behind it will be forwarded to you email: ie. your_username+somethingcool@tildeverse.org or your_username-notcool@tilde.site.
feel free to use as many as you'd like :)

if you would like your tildemail to be forwarded somewhere else, put that email address in ~/.forward

ask [~ben](/~ben/) if you have any questions
