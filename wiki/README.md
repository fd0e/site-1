# tilde.team wiki

hi there, welcome to our wiki!

to contribute to the wiki:

* [fork the repo](https://git.tildeverse.org/repo/fork/1)

* clone the repo to your local machine (or your public_html folder on the tilde.team box for live testing)
```sh
git clone git@tilde.team:yourusername/site
```

* create a new branch for your page
```sh
git checkout -b my-new-page
```

* if you want to add a new page, copy `template.md` into your new page!
```sh
cp template.md my-new-page.md
```

* edit as needed!

* commit your changes and [create a pull request](https://git.tildeverse.org/team/site/pulls) :)
```sh
git add --all
git commit -m "added my-new-page"
git push origin my-new-page # this should match the branch name you created earlier
```

* create a pull request on the [site](https://git.tilde.team/team/site) repo

thanks!~

ps. if you have any questions, ask on irc! (preferably in #team)
