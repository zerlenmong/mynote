#!/usr/bin/expect -f
# Use this scrpit you need install expect
# Ubuntu install expect, sudo apt-get install expect


# set timeout
set timeout 60

# Set input value
# get first arg and set sN value
# if you want to set second value, you need do like this
# set paramName [lindex $argv 1]
# set paramName [lindex $argv 2]
set s1 [lindex $argv 0 ]
set s2 [lindex $argv 1 ]
set s3 [lindex $argv 2 ]

# set ssh default port
set port 22

# switch
# if $sN is silk34 use this info
# set param

#bridge server
set ip 24.250.92.35
set user louis.zeng
#set pass "sIlk4dev"
set pass "silk4dev"

set rip ""

switch -- $s1 {
    "pantonedev" {
        #set rip    207.97.215.166
        set ip 192.168.171.40
        set user claudio.xu
        set pass UE7Hcvdx
    }
    "pantonelive" {
        set ip 192.168.171.103
        set user  claudio.xu
        set pass  UE7Hcvdx
   }
    "pantonelivedb" {
        set ip 192.168.171.199
        set user  claudio.xu
        set pass  UE7Hcvdx
    }
    "benqdev" {
        set rip   52.11.41.235
        set ruser silkdev
        set rpass ben9s1lk7O
     }
    "lunatikdev" {
        set rip   52.11.77.16
        set ruser magento
        set rpass dev4silk0311
     }
    "ottodev" {
        set rip 52.11.174.205
        set ruser claudio.xu
        set rpass Silk4dev
    }
    "lunatiklive" {
        set rip  sipsjc4-20.nexcess.net
        set ruser lunatikc
        set rpass kFKAnt4NAFi32t9FNA
     }
     "powerskinlive" {
        set rip  104.207.236.215
        set ruser lunatikc
        set rpass kFKAnt4NAFi32t9FNA
     }
    "benqlive" {
        set ip  66.155.1.242
        set user root
        set pass fruBaRA9h8
    }
    "filmtoolslive" {
        set rip  www01.filmtools.ml.zerolag.com
        #142.54.227.86
        set ruser www.filmtools.com
        set rpass "!v+Qk2dtq6BDO"
    }
   "cdsilk" {
        set ip 192.168.1.34
        set user claudio_xu
        set pass 12345abc
    }
    "filmtoolsdev" {
        set rip 52.11.55.243
        set ruser silkdev
        set rpass 5ilk920GHkl
    }
    "rhinolive" {
        set rip sipsjc4-03.nexcess.net
        set ruser silk
        set rpass "SBRlkR#12&T"
    }
    "rhinodev" {
        set rip 24.250.92.34
        set ruser louis.zeng
        set rpass "12345abc"
    }
    "wwadev" {
        set rip 52.27.221.152
        set ruser magento
        set rpass Y9dQvDnGOyDneWb5
    }
    "wwalive" {
        set rip 104.37.133.32
        set ruser cxu
        set rpass "ElSJr!fX-u575"
    }
    "moshidev" {
        set rip 52.33.77.56
        set ruser claudio.xu
        set rpass silk4dev
    }
    "cdsilk" {
        set ip 192.168.1.34
        set user claudio_xu
        set pass "!hello123"
    }
    "ottodev" {
        set rip 52.11.174.205
        set ruser claudio.xu
        set rpass dev4Silk
    }
    "agdev" {
        set rip 52.39.0.4
        set ruser claudio.xu
        set rpass Wy2hBY7i
    }
    "aglive" {
        set rip 52.40.170.65
        set ruser claudio.xu
        set rpass Wy2hBY7i
    }
}

# Importent
# form now we start connect ssh and listening to the terminal
if {$s1 == "rscp"} {
    spawn scp $s2 $user@$ip:~$s3
} else {
    spawn ssh -p $port $user@$ip
}

# listening ssh response
expect {
    # if response contain password:
    "*password:" {
        # use send auto input password
        send "$pass\r"
        if {$rip != ""} {
        # if is mcc live, continue listening and use new info
            # when login successful, we can get a string contain Last login
            # when we get Last login, auto input command, login the other server
            expect "Last login*" {
                # start login the other server
                send "ssh $ruser@$rip\r"
                # listening response
                expect "*password:" {
                    # if get passowrd auto input password
                    send "$rpass\r"
                }
            }
     }

    }
}
interact

