---
author: ~ben
published: true
title: gopher
description: gopher server and proxy
category:
    - main
---

# gopher

the [gopher protocol](http://en.wikipedia.org/wiki/Gopher_(protocol)) was 
created in 1991. it didn't survive long due to [draconic licensing](
    http://www.nic.funet.fi/pub/vms/networking/gopher/gopher-software-licensing-policy.ancient).

we're trying to keep this cool corner of the web alive.

## add and create your gophersite

tilde.team serves user gopherholes from your `~/public_gopher` directory.

to get listed on the [main gophermap](gopher://tilde.team),
make some changes to your root gophermap. the [root gophermap](
https://tildegit.org/team/gopherhole/src/branch/master/gophermap)
diffs against the default gophermap that was included with your account.

if a file called `gophermap` exists in the directory you're currently
browsing to in gopher, it will get processed and displayed.

see [this example](https://github.com/gophernicus/gophernicus/blob/master/README.gophermap)
for more information on file types and special chars.

one of the coolest item types supported in gophernicus is `=` which allows you
to include other gophermaps or the output of executables.

you can even make your whole gophermap executable and it will be run through
whatever interpreter you specify in the shebang.

---

## browse gophersites

if you're currently connected from a tilde.team shell, you can use the
[`lynx`](https://lynx.browser.org/) browser.
```bash
lynx gopher://tilde.team
```

if you want to access the gophersite in your public\_gopher dir, use the following
link structure: [gopher://tilde.team/1/~username](gopher://tilde.team/1/~username)

you can install it on your local machine too :)

otherwise, you can use our [http proxy](https://gopher.tildeverse.org/tilde.team) to browse the gophernet.

hope to see you on there soon!

