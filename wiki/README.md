# tilde.team wiki

hi there, welcome to our wiki!

to contribute to the wiki:

* [fork the repo](https://tildegit.org/repo/fork/1)

* clone the repo to your local machine (or your public_html folder on the tilde.team box for live testing)
```sh
git clone https://tildegit.org/yourusername/site
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

* test your changes with a local php server
```sh
composer install
php -S localhost:9000
```

* commit your changes and [create a pull request](https://tildegit.org/team/site/pulls) :)
```sh
git add --all
git commit -m "added my-new-page"
git push origin my-new-page # this should match the branch name you created earlier
```

* create a pull request on the [site](https://tildegit.org/team/site) repo

## deployment notes

as of a7305c7b the wiki uses pretty urls (while still supporting the old style
of `?page=` urls). to enable this functionality, add the following location
block to your nginx configs for this site:

```
location ~* ^/wiki/(.+)$ {
    try_files $uri $uri/ /wiki/index.php?page=$1;
    include snippets/php.conf;
}
```

thanks!~

ps. if you have any questions, ask on irc! (preferably in #team)
