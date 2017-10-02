#!/bin/bash
results=(0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0)

p='/home/ubuntu/corescripts/tmpcountvotes'
readarray addr < $p/addresses.txt

for i in "${addr[@]}"
do
        dir=$p/data/$i
        if ! [ -z "$(ls $dir)" ] ; then
                #Convert from hex to raw
        cd $dir
        xxd -p -r vote.txt.enc.hex vote.txt.enc
        xxd -p -r key.bin.enc.hex key.bin.enc
        #Decrypt Random Password with Private Key
        openssl rsautl -decrypt -inkey /home/ubuntu/corescripts/votekey/private.pem -in key.bin.enc -out key.bin
        #Decrypt Vote with Random Password
        openssl enc -d -aes-256-cbc -in vote.txt.enc -out vote.txt -pass file:key.bin

        vote=$(cat vote.txt)
        (( results[$vote]++ ))
        cd ../../../../
        fi
done

#Output Results
#mkdir tmpcountvotes/results
for ((i=0; i<${#results[*]}; i++));
do
    echo ${results[i]} > /var/www/html/results/$i.txt
done

sudo rm $p/* -r