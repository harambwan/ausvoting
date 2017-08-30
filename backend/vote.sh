#!/bin/bash
#Public Key file myst be located at ~/votekey/

#Generate wallet ID
address=$(multichain-cli ausvoting getnewaddress)

#Make Vote
mkdir /tmp/$address

#if [ "$1" = "D" ] ; then
#    echo "donald" > /tmp/$address/vote.txt
#else
#    echo "hillary" > /tmp/$address/vote.txt
#fi
echo $1 > /tmp/$address/vote.txt

#Encrypt Vote
#Generate Random Password
openssl rand -base64 64 -out /tmp/$address/key.bin
#Encrypt File with Random Password
openssl enc -aes-256-cbc -salt -in /tmp/$address/vote.txt -out /tmp/$address/vote.txt.enc -pass file:/tmp/$address/key.bin
#Encrypt Random Password with Public Key
openssl rsautl -encrypt -inkey /home/ubuntu/corescripts/votekey/public.pem -pubin -in /tmp/$address/key.bin -out /tmp/$address/key.bin.enc

#Convert files to Hex > Shell Variable
vote=$(xxd -p -c 99999 /tmp/$address/vote.txt.enc)
key=$(xxd -p -c 99999 /tmp/$address/key.bin.enc)

#Grant write access
multichain-cli ausvoting grant $address send

#Write To Blockchain
#multichain-cli ausvoting subscribe voting
multichain-cli ausvoting publishfrom $address voting vote $vote
multichain-cli ausvoting publishfrom $address voting key $key

#Revoke write access
multichain-cli ausvoting revoke $address send

#Cleanup Temp Directory
rm /tmp/$address -r