#!/bin/bash
gulp

rsync.exe -arouvH --delete --exclude-from '.rsyncignore'  * jppayette.com:/home/docker/volumes/devurandom_io_home/_data/htdocs/wiki/

git add *; git commit -m 'update'; git push
