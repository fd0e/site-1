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
    - username: username (without the domain)
    - password: your shell password
    - imap: imap.tilde.team port 143 (starttls)
    - smtp: smtp.tilde.team port 587 (starttls)
    - (any subdomain of tilde.team works for smtp and imap. just make sure you have tls selected)

---

because [~ben](https://tilde.team/~ben/) hoards domain names, you can use the following domains with your tildemail:

* ttm.sh
* tilde.chat
* tilde.life
* tilde.news
* tilde.ninja
* tilde.pizza
* tilde.site
* tilde.wtf
* tilde.zone
* tildeteam.org
* tildenet.org
* tildeverse.org

mail sent to yourusername@ any of those domains will end up in your inbox. most clients will allow you to add additional identities/aliases. 

additionally, any address with a `-` or `+` and arbitrary text behind it will be forwarded to you email: ie. `your_username+somethingcool@tildeverse.org` or `yourusername-notcool@tilde.site`.
feel free to use as many as you'd like :)

if you would like your tildemail to be forwarded somewhere else, put that email address in ~/.forward

ask [~ben](/~ben/) if you have any questions
