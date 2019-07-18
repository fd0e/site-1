---
author: ~ben
published: true
title: email
description: email settings for tilde.team
category:
  - main
---

# email

tilde.team has a mailserver. here are your options:

### clients and connection settings

- mutt - should work out of the box
- alpine - should work out of the box
- [webmail](https://mail.tilde.team)
- imap/smtp
  - email address: username@tilde.team (or any of the aliased [domains](domains))
  - username: username (without the domain)
  - password: your shell password
  - imap: imap.tilde.team port 143 (starttls)
  - smtp: smtp.tilde.team port 587 (starttls)
  - (any subdomain of tilde.team works for smtp and imap. just make sure you have tls selected)
  - some clients will autoconfigure (tested with thunderbird)

### alternate domains and addresses

because [~ben](https://tilde.team/~ben/) hoards domain names, you can use any of the [domains on this list](domains) with your tildemail:

mail sent to yourusername@ any of those domains will end up in your inbox. most clients will allow you to add additional identities/aliases.

additionally, any address with a `+` and arbitrary text behind it will be forwarded to you email: ie. `your_username+somethingcool@tildeteam.org`.
feel free to use as many as you'd like :)

### forwarding and sieve

if you would like your tildemail to be forwarded somewhere else, put that email address in ~/.forward

```bash
echo myotheraddress@example.com > ~/.forward
```

we also have [sieve](http://sieve.info) and [managesieve](https://wiki1.dovecot.org/ManageSieve) support.

scripts belong in `~/sieve/`, with the active sieve script in `~/.dovecot.sieve` (to conform with managesieve).

here are some [example sieve scripts](https://wiki.dovecot.org/Pigeonhole/Sieve/Examples)

managesieve is available on the default port (4190) if you want to use an external managesieve client (like the [thunderbird add-on](https://github.com/thsmi/sieve)).

[webmail](https://mail.tilde.team) is pre-configured to work with your local sieve scripts.

---

ask [~ben](/~ben/) if you have any questions
