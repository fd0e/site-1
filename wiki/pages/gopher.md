---
author: ~ben
published: true
title: gopher
description: tilde.team gopher server and proxy
category: 
    - main
---

# gopher

the [gopher protocol](http://en.wikipedia.org/wiki/Gopher_(protocol)) was created in 1991. it didn't survive long due to [draconic licensing](http://www.nic.funet.fi/pub/vms/networking/gopher/gopher-software-licensing-policy.ancient).

we're trying to keep this cool corner of the web alive. 

## add and create your gophersite

to add your own gopher site, run the following command:
```bash
mkdir -p -m 755 ~/public_gopher
```
(this presumes you don't already have a public_gopher dir in your $HOME. new users from here on out will have a public_gopher by default)

if a file called `gophermap` exists in the directory you're currently browsing to in gopher, it will get processed and displayed. 

see [this example](https://github.com/prologic/gophernicus/blob/master/README.Gophermap) for more information on file types and special chars.

---

## browse gophersites

if you're currently connected from a tilde.team shell, you can use the [`lynx`](https://lynx.browser.org/) browser.
```bash
lynx gopher://tilde.team
```

if you want to access the gophersite in your public_gopher dir, use the following link structure:
[gopher://tilde.team/1/~username](gopher://tilde.team/1/~username)

you can install it on your local machine too :)

otherwise, you can use our [http proxy](https://gopher.tilde.team) to browse the gophernet.

hope to see you on there soon!
