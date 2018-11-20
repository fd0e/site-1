lessc := node_modules/.bin/lessc
lightserver := node_modules/.bin/light-server

NPM != command -v npm 2> /dev/null
PLEX = less/plex.css
HACKER = less/hacker/*.less $(PLEX)
DRACULA = less/dracula/*.less $(PLEX)

.PHONY: build dev clean

# First target is default
build: hacker.css dracula.css

dev: build
	$(lightserver) -s . -p 9000 -w "index.html, **/*.less \# make" -o

hacker.css: node_modules $(HACKER)
	$(lessc) less/hacker.less hacker.css --clean-css="--s1 --advanced --compatibility=ie8"

dracula.css: node_modules $(DRACULA)
	$(lessc) less/dracula.less dracula.css --clean-css="--s1 --advanced --compatibility=ie8"

node_modules: package.json package-lock.json Makefile
ifndef NPM
	$(error Missing dependency 'npm'. Please install and try again.)
endif
	npm install
	touch node_modules # fixes watch bug if you manually ran npm install

clean:
	rm -rf node_modules
	rm dracula.css 
	rm hacker.css
