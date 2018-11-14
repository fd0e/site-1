---
author: ~ben
published: false
title: terms of service
description: tilde.team terms of service
category: 
    - main
---

# terms of service

tilde.team relies on the common courtesy and consideration of users to make its services fair for everyone. the following offences will result in a service ban:

tl;dr: don't do anything illegal or harmful, especially anything that could [anger the hosting company](https://www.hetzner.com/rechtliches/root-server/)

here are some things that we don't allow:

* deliberately defacing the accounts of other users
* deliberately trying to disrupt tilde.team's server
* using tilde.team as a launch pad for disrupting other servers
  - this includes outgoing net- and portscanning
* using tilde.team to impersonate other websites and businesses for criminal purposes
* storing/distributing pornography of any genre and medium (especially child pornography)
* storing/distributing content that defames any individual
* promoting racial, ethnic, religious, political & other forms of bigotry
* mining cryptocurrencies


## network considerations

outgoing net- and portscanning is prohibited on tilde.team.

after the [major outage](/~ben/blog/november-13-post-mortem.html) of november 13th, we have run in to the clause in the [hetzner tos](https://www.hetzner.com/rechtliches/root-server/) that prohibits net- and portscanning. please don't try to reach anything in the [RFC1918](https://tools.ietf.org/html/rfc1918) private address space. for some reason, packets sent there will end up at the default gateway and may be interpreted as an attack. 

i've added firewall rule to prevent outgoing requests to these subnets:

* 10.0.0.0/8            
* 172.16.0.0/12
* 192.168.0.0/16


## resource usage

in general, we have plenty of resources available. 

however, make sure to not run anything that would disrupt other users.

to this end, there are a few limits set on your accounts:

* 200 process/threads at a time
* soft 1gb limit on storage
