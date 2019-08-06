---
author: ~ben
published: true
title: tildepages
description: user pages on tilde.team
category: 
    - main
---

# tildepages


because [~ben](https://tilde.team/~ben/) hoards domain names, you can 
use the following domains with your tildepage:

see also the [master list of domains](domains).

* fuckup.club
* nand.sh
* ttm.sh
* tild3.org
* tild3.club
* tilde.ninja
* tilde.site
* tilde.team
* tildeteam.org

this means you can access your user page from any of the following 
url formats, substituting domain and username:

* `https://domain.tld/~username/`
* `https://domain.tld/u/username/`
* `https://username.domain.tld/`

## your public\_html

`~/public_html` is the webroot for your tildepage. files you place in there
are served at the addresses described above.

static files are served normally, along with the following dynamic options:
* php - name the file with a php extension or use index.php
* perl - name the file with a pl extension and make it executable
* cgi-bin - name it whatever you want and place it in `~/public_html/cgi-bin/`
    don't forget to make the cgi-bin script executable

if you're having trouble with .pl or cgi-bin scripts, make sure that you're
sending the content-type header as the first thing.

## static page generators

there are several static site generators available, including some cool blog
engines.

### blog engines

* [bashblog](tildeblogs) - a single shell script that helps you build a blog
    with plain html or markdown. also supports mirroring your posts into your
    [`~/public_gopher` gopherhole](gopher).

* [ttbp](ttbp) - tilde.team blogging platform. originally built for [tilde.town](
https://tilde.town/) by [~endorphant](https://tilde.town/~endorphant/). forked
with a handful of patches for our setup.

### ssgs

* [mkdocs](https://www.mkdocs.org) - markdown project documentation tool. 
additional themes are available from the [mkdocs-bootstrap](
http://mkdocs.github.io/mkdocs-bootstrap/) and [mkdocs-bootswatch](
http://mkdocs.github.io/mkdocs-bootswatch/) projects. just set your theme name
to one those listed and rebuild. generally recommended to not build the mkdocs
source directly in your webroot. set the destination to somewhere in `~/public_html`,
symlink, or move/copy the generated files manually. for example, if you wanted to
make a mkdocs site called mywiki available on the web, you could do:
`ln -s ~/mywiki ~/public_html/wiki`

* [hugo](https://gohugo.io/) - static site generator built in go

* [jekyll](https://jekyllrb.com/) - static site generator used by github for 
[github pages](https://pages.github.com) built in ruby

* [zola](https://getzola.org/) - single-binary static site generator written in rust

