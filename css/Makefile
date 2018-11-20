OBJS = \
	less/**/*.less \
	less/plex.css

.PHONY: all dev build clean

all:
	make build

dev: $(OBJS) Makefile
	npm install
	npm run dev

build: $(OBJS) Makefile
	npm install
	npm run build

clean:
	rm -rf node_modules; rm dracula.css hacker.css; touch Makefile; make
