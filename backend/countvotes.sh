#!/bin/bash
results=(0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0)

p='/home/ubuntu/corescripts/tmpcountvotes'
readarray addr < $p/addresses.txt

for i in "${addr[@]}"
do
	dir=$p/data/$i
	if ! [ -z "$(ls $dir)" ] ; then
		#Convert from hex to raw
        xxd -p -r $dir/vote.txt.enc.hex $dir/vote.txt.enc
        xxd -p -r $dir/key.bin.enc.hex $dir/key.bin.enc
        #Decrypt Random Password with Private Key
        openssl rsautl -decrypt -inkey /home/ubuntu/corescripts/votekey/private.pem -in $dir/key.bin.enc -out $dir/key.bin
        #Decrypt Vote with Random Password
        openssl enc -d -aes-256-cbc -in $dir/vote.txt.enc -out $dir/vote.txt -pass file:$dir/key.bin

        vote=$(cat $dir/vote.txt)
        (( results[vote]++ ))
	fi
done

#Output Results
for i in "${results[@]}"
do
    echo $i > /var/www/html/results/$@.txt
done

#rm $p/* -r