#!/bin/bash
# 需要sudo来执行
dir=`pwd`

#1，脚本需要sudo来执行，所以需要判断是否具有root权限：
function rootness {
if [[ $EUID -ne 0 ]]
then
echo "Error:This script must be run as root!" 1>&2
exit 1
fi
}

#2，sudo apt-get
function apt_conf {
sudo apt-get clean
sudo apt-get autoclean
sudo apt-get update
sudo apt-get -y upgrade
sudo apt-get -y dist-upgrade
}

#3，Git的配置:
function git_conf {
  sudo apt-get -y install git
  cp $dir/gitconfig ~/.gitconfig
}
#这里简单地把我自己的gitconfig文件作为了.gitconfig
#[user]
#name = Xiong Jun
#email = adairjun@gmail.com
#[color]
#ui = true
#[alias]
#lg = log --color --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit
#[core]
#editor = vim

#4，ubuntu写代码必备之terminator的配置：
#除了下载terminator之外，还有terminator的配色方案以及ls的配色方案就是.dircolors
function term_conf {
  sudo apt-get -y install terminator
  git clone https://github.com/ghuntley/terminator-solarized.git $dir
  mkdir -p ~/.config/terminator/
  cp $dir/terminator-solarized/config ~/.config/terminator
  #把默认的配色方案设置为solarized-dark
  sed -i "{/^\s*#/d; /solarized-dark/d; /solarized-light/,+5d}" ~/.config/terminator/config
  git clone https://github.com/seebi/dircolors-solarized.git
  cp $dir/dircolors-solarized/dircolors.256dark ~/.dircolors
  rm -rf $dir/terminator-solarized/
  rm -rf $dir/dircolors-solarized/
}

#5，写代码的杀手级编辑器vim怎么能忘记配置呢？
function vim_conf {
  cp $dir/vimrc ~/.vimrc
  mkdir ~/.vim
  cp -R $dir/doc/ ~/.vim/
}

#6，多终端的tmux神器也不能忘了：
function tmux_conf {
sudo apt-get -y install tmux
cp $dir/tmux.conf ~/.tmux.conf
}

#7，等下可是要安装chrome的，如果不改hosts翻墙的话，GFW可是不会让我下载chrome的deb：
function hosts_conf {
  git clone https://github.com/racaljk/hosts.git
  cat ./hosts/hosts >> /etc/hosts
  rm -rf ./hosts/
}

#8，sublime_text也是一个杀手级别的编辑器：
function sublime_conf {
  dpkg -i $dir/sublime-text_build-3083_amd64.deb
}

#9，用Java编程JDK是必备的：
#不过首先要做的是移除自带的openjdk
function jdk_conf {
sudo apt-get -y autoremove openjdk
cd /usr/local/lib
tar -zxvf $dir/jdk-8u45-linux-x64.tar.gz
cat > /etc/profile <<EOF
export JAVA_HOME=/usr/local/lib/jdk1.8.0_45
export JRE_HOME=\$JAVA_HOME/jre
export CLASSPATH=/usr/local/lib/jdk1.8.0_45/lib
export PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:.
export PATH=\$JAVA_HOME/bin:\$PATH
EOF
source /etc/profile
cd $dir
}
#这里下载的只是jdk的1.8.0_45版本，请配合自己下载的版本修改这个函数

#10，有了jdk，不能忘了eclipse：
function eclipse_conf {
cd /opt
tar -zxvf $dir/eclipse-java-luna-SR2-linux-gtk-x86_64.tar.gz
cd $dir
}
#linux的/opt目录是 Optional application software packages，就是安装第三方软件的目录啦，以后用tarball安装第三方软件最好解压到这个目录下，方便管理

#11，chrome安装：
function chrome_conf {
wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
dpkg -i google-chrome-stable_current_amd64.deb
}
#如果先前没有改hosts文件wget可是不会成功的

#12，浏览器的flash安装：
function flash_conf {
sudo apt-get -y install flashplugin-nonfree
update-flashplugin-nonfree --install
}

#13，搜狗拼音输入法：
function sogou_conf {
dpkg -i $dir/sogoupinyin_1.2.0.0056_amd64.deb
}
#下载搜狗拼音的安装包前往：http://pinyin.sogou.com/linux/?r=pinyin

#14，接下来的这个配置可厉害，让你的ubuntu更加漂亮：
#infinality提供了freetype的patches, 目的是提供最好的字体渲染效果。
function infinality_conf {
add-apt-repository ppa:no1wantdthisname/ppa
sudo apt-get update
sudo apt-get -y upgrade
sudo apt-get -y install fontconfig-infinality
bash /etc/fonts/infinality/infctl.sh setstyle osx2
}
#我参考了这篇文章：http://askubuntu.com/questions/527349/font-rendering-problem-in-ubuntu

#15，接来下隆重登场的是替代bash的终极Shell: zsh
#以及必不可少的oh-my-zsh和autojump
function zsh_conf {
sudo apt-get -y install zsh
chsh -s /bin/zsh
sh -c "$(curl -fsSL https://raw.github.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"
source ~/.zshrc
}

#16，介绍一下我使用的小工具：
function other_conf {
sudo apt-get -y install tree pstree ack-grep colordiff
sudo apt-get -y install unrar unzip
# 安装几个我常用的小工具，秒杀top的htop，两款流量监控工具iftop和nethogs，很好用的下载工具aria2：
sudo apt-get -y install htop iftop nethogs aria2
# Python类工具需要：
sudo apt-get -y install python-dev python-greenlet python-gevent python-vte python-openssl python-crypto python-appindicator python-bs4 libnss3-tools
}

#17，如果你的网卡和我一样是bcm43225，那么可能会出现上网很慢的情况，这估计是网卡驱动问题，这样解决：
#如果用的是bcm网卡,用这个来解决网络慢的问题
#如果单独执行这个函数，最后需要重启
function bcm_conf {
sudo apt-get -y install bcmwl-kernel-source
cat >> /etc/modprobe.d/blacklist.conf <<EOF
blacklist b43
blacklist ssb
blacklist brcmsmac
EOF
}
#我参考了这篇文章：http://blog.sina.com.cn/s/blog_73b6331101016haq.html
