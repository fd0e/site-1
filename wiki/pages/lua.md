---
author: ~evn
published: false
title: lua
category:
  - main
---

# Lua

This page will explain how to set up your tilde.team account for
[Lua](https://www.lua.org/) programming.

## Luarocks

[Luarocks](https://luarocks.org/) is a package manager for the Lua, similar to
Python's PIP, Perl's PPM, and other programming laguages' package mangers. To
download and install a package from the Luarocks repository type the following
into a terminal:
`luarocks install [package-name] --local`
where [package-name]
is the name of the package you want to install (without square brackets). The
'--local' argument is necessary to install the package to your user folder
rather than the default path of '/usr/local/', which tilde.team users do not
have write access to.

Lua uses the environment variables 'LUA_PATH' and 'LUA_CPATH' to find installed
packages. By default these paths do not include the paths that Luarocks installs
package to, so the Lua interpreter will not be able to find installed packages.
The `luarocks path` command can be used to modify the LUA_PATH and LUA_CPATH
environment variables to include the paths that Luarocks installs packages to.
The following command will modify the environment variables appropriately:
`eval $(luarocks path --bin)`
Add this to your ~/.bashrc file to make these environment variables always
include the necessary paths.

The version of Luarocks installed on tilde.team is configured for use with Lua
version 5.1, so packages installed with Luarocks will not be usable with lua
5.2.

## Lua Versions

Tilde.team has two versions of the Lua interpreter installed; version 5.1 and
version 5.2. When you type `lua` into a terminal it will run version 5.2 by
default. To run Lua version 5.1 simply type `lua5.1`.

To set the default Lua interpreter to version 5.1 set a bash alias with the
following command:
`alias lua="/usr/bin/lua5.1"`
Add this to your ~/.bashrc file to always use version 5.1 as the default Lua
interpreter.
