#!/bin/bash

#Generate wallet ID
#address=$(multichain-cli ausvoting  getnewaddress)

if [[ $2 ]] ; then

    #Make Vote
    mkdir /tmp/$2

    #if [ "$1" = "D" ] ; then
    #    echo "donald" > /tmp/$address/vote.txt
    #else
    #    echo "hillary" > /tmp/$address/vote.txt
    #fi
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

    #Grant write access
    #multichain-cli ausvoting grant $address send

    #Write To Blockchain
    #multichain-cli ausvoting subscribe voting
    #multichain-cli ausvoting publishfrom $address voting vote $vote
    #multichain-cli ausvoting publishfrom $address voting key $key

    #Revoke write access
    #multichain-cli ausvoting revoke $address send

    #Cleanup Temp Directory
    #rm /tmp/$2/ -r
fi 

#./vote.sh <candidate> <address>