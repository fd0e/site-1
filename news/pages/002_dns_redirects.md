---
published: true
date: dec 2017
title: username dns redirects
author: ben
---

hey all

there is now a dns record (and virtual host) that will redirect requests from $user.tilde.team to tilde.team/~$user -- for example ben.tilde.team redirects to tilde.team/~ben
also, the redirect preserves paths, so you can link to something under your user directory like this ben.tilde.team/blog => becomes tilde.team/~ben/blog

there are no ssl certs for these subdomains, so you will have to request those with plain http

edit: there is now a wildcard cert from letsencrypt for *.tilde.team, so you can use https with your username as a subdomain!! :)

edit2: there are now more than one domains that will server your user page. see [the wiki article about it](/wiki/?page=tildepages)
