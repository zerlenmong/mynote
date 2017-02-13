#!/bin/sh
#function m1create {
   #docker run --net br0 --ip 172.20.0.2 -d --name php53 -v /home/claudio/www:/var/www/html -v /home/claudio/config/vhost-m1.conf:/etc/httpd/conf.d/vhost.conf -v /etc/hosts:/etc/hosts -v /home/claudio/logs/php53apache:/var/log/apache2/  --link mysql56 php53apache:latest
#}
function dockerexec(){
  if [ ! -n "$1" ] ;then
    echo "please enter container id || name!"
  else
    docker exec -it $1 /bin/bash
  fi
}
function dockerexecsh(){
  if [ ! -n "$1" ] ;then
    echo "please enter container id || name!"
  else
    docker exec -it $1 sh
  fi
}
function showip(){
  if [ ! -n "$1" ] ;then
      echo "please enter container id || name!"
  else
      docker exec -it $1 ip addr | grep global
  fi
}
function dockerlist(){
  docker ps -a
}
function  concreate(){
    docker run --net br0 --ip $1 -d --name $2 --restart=always  -v /home/louis/logs/$2:/var/log/apache2/  $3
}
function dbcreate {
   docker run --net br0 --ip 172.20.0.11 --name mysql56 --restart=always -v /home/louis/config/mysql:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=root -d mysql:5.6
}

function m1create {
   docker run --net br0 --ip 172.20.0.22 -d --name php53 --restart=always -v /etc/apache2/ssl:/etc/apache2/ssl -v /home/louis/www:/var/www -v /home/louis/config/sites-available/filmtools.conf:/etc/httpd/conf.d/vhost.conf -v /home/louis/logs/php53apache:/var/log/apache2/  --link mysql56 php53apache:v5
}

function m2create {
    docker run -tid --net br0 --ip 172.20.0.56 -v ~/www:/var/www/html -v  /home/louis/config/vhost-ub.conf:/etc/apache2/sites-available/vhost.conf  --name php56 --restart=always --link mysql56 php56ubhttpd:v4
}

function m27create {
    if [ ! -n "$1" ] ;then
      docker run -tid --net br0 --ip 172.20.0.71 -v ~/www/docker/magento2ee:/var/www/magento2 --name php7 --restart=always --link mysql56 magento2:latest
  else
    docker run -tid --net br0 --ip 172.20.0.71 -v ~/www:/var/www/html -v  /home/louis/config/sites-available/$1:/etc/apache2/sites-available/vhost.conf --name php7 --restart=always --link mysql56 magento2:latest
  fi
}

function m27createmap {
   docker run -tid --net=host -v ~/www:/var/www/html -v /home/louis/config/vhost-7map.conf:/etc/apache2/sites-enabled/vhost.conf --name php7map --link mysql56 claudioxu/php7:v3-7.0
}

function m2ncreate {
    docker run -tid --net br0 --ip 172.20.0.81 -v ~/www:/var/www -v  /home/louis/config/vhost-nginx.conf:/etc/nginx/sites-available/vhost.conf  --name php7n --restart=always --link mysql56 claudioxu/nginx-php7:v3
}

function m2createmini {
    docker run -tid --net br0 --ip 172.20.0.7  -v ~/www:/var/www/html -v  /home/louis/config/vhost-mini.conf:/etc/apache2/conf.d/vhost.conf  --name phpal56 --restart=always --link mysql56 minihttpd:v1
}



function m1restart {
     docker stop php53
     docker start php53
}

function m2restart {
     docker stop phpub56
     docker start phpub56
}

function m27restart {
     docker stop php7
     docker start php7
}

function m27restartmap {
     docker stop php7map
     docker start php7map
}


function m2nrestart {
     docker stop php7n
     docker start php7n
}

function dbrestart {
     docker stop mysql56
     docker start mysql56
}

function dockerkillall {
    docker kill $(docker ps -a -q)
    docker rm $(docker ps -a -q)
}

function myadmincreate {
   docker run --net br0 --ip 172.20.0.40 -d --name myadmin --restart=always -e  PMA_HOST=mysql56 --link mysql56 phpmyadmin/phpmyadmin
}
function myadmin {
    docker stop myadmin
    docker start myadmin
}

alias dthunder='docker run -d -e DISPLAY -v /tmp/.X11-unix:/tmp/.X11-unix:ro -u docker -v $HOME/docker-data/thunderbird:/home/docker/.thunderbird/ yantis/thunderbird thunderbird'
alias dchrome=' docker run -it --net host  --cpuset-cpus 0 --memory 512mb -v /tmp/.X11-unix:/tmp/.X11-unix -e DISPLAY=unix$DISPLAY -v $HOME/Downloads:/root/Downloads -v $HOME/.config/google-chrome/:/data --dev    ice /dev/snd --name chrome jess/chrome'
alias dokm1='docker rm -f php53'
alias dokm2='docker rm -f php56'
alias dokm27='docker rm -f php7'
alias dokm2n='docker rm -f php7n'
alias dokc='docker kill $(docker ps -a -q)'
alias docc='docker rm $(docker ps -a -q)'
alias doci='docker rmi $(docker images -q -f dangling=true)'
alias docnone='docker images|grep "<none>"|xargs docker rmi -f'
alias gom2='docker exec -it php56 /bin/bash'
alias gom27='docker exec -it php7 /bin/bash'
alias gom2n='docker exec -it php7n /bin/bash'
alias gom1='docker exec -it php53 /bin/bash'
