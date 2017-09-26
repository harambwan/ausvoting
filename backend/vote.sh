#!/bin/bash
if [[ $2 ]] ; then
    #Make Vote
    mkdir /tmp/$2
    echo $1 > /tmp/$2/vote.txt

    #Encrypt Vote
    #Generate Random Password
    openssl rand -base64 64 -out /tmp/$2/key.bin
    #Encrypt File with Random Password
    openssl enc -aes-256-cbc -salt -in /tmp/$2/vote.txt -out /tmp/$2/vote.txt.enc -pass file:/tmp/$2/key.bin
    #Encrypt Random Password with Public Key
    openssl rsautl -encrypt -inkey /home/ubuntu/corescripts/votekey/public.pem -pubin -in /tmp/$2/key.bin -out /tmp/$2/key.bin.enc

    #Convert files to Hex > Shell Variable
    vote=$(xxd -p -c 99999 /tmp/$2/vote.txt.enc)
    key=$(xxd -p -c 99999 /tmp/$2/key.bin.enc)
    echo $vote > /tmp/$2/vote.txt.enc.hex
    echo $key > /tmp/$2/key.bin.enc.hex
    
    #Cleanup Temp Directory
    rm /tmp/$2/ -r
fi 