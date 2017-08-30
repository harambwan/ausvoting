#!/bin/bash
for ((r=0;r<=22;i++)) do
    ${results[$r]}=0
done

p='/home/ubuntu/corescripts/tmpcountvotes'
#Grab all addresses from blockchain
echo $(multichain-cli ausvoting getaddresses) > $p/addresses
#Parse addresses into array
tr --delete '[ ' < $p/addresses > $p/a2
tr --delete ' ]' < $p/a2 > $p/a3
tr --delete ' ' < $p/a3 > $p/a4
tr --delete '"' < $p/a4 > $p/a5
tr ',' '\n' < $p/a5 > $p/addresses
readarray addr < $p/addresses

#Grab results from blockchain using addresses
multichain-cli ausvoting subscribe '["voting"]'
mkdir $p/data/
for i in "${addr[@]}"
do
	#Set up temp dir's and retrieve data
	i=${i::-1}
	mkdir $p/data/$i
	dir=$p/data/$i
	echo $(multichain-cli ausvoting liststreampublisheritems voting $i) > $dir/raw
	#Get data length and delete if no voting data for address
	data=$(cat $dir/raw)
	leng=${#data}
	if [ $leng -lt 10 ] ; then
		rm $dir/ \-\r
	#Process addresses that have valid data
	else
		#Parse 'data' portion into usable files
		echo ${data:91:64} > $dir/vote.txt.enc.hex
		echo ${data:373:256} > $dir/key.bin.enc.hex
		#Convert from hex to raw
		xxd -p -r $dir/vote.txt.enc.hex $dir/vote.txt.enc
		xxd -p -r $dir/key.bin.enc.hex $dir/key.bin.enc
		#Decrypt Random Password with Private Key
		openssl rsautl -decrypt -inkey /home/ubuntu/corescripts/votekey/private.pem -in $dir/key.bin.enc -out $dir/key.bin
		#Decrypt Vote with Random Password
		openssl enc -d -aes-256-cbc -in $dir/vote.txt.enc -out $dir/vote.txt -pass file:$dir/key.bin

#		Count em up
#		if grep -q "hillary" $dir/"vote.txt";
#		then
#			hillary=$((hillary+1))
#		else
#			donald=$((donald+1))
#		fi
        vote = $(cat $dir/"vote.txt")
        ${results[$vote]}=$((results[$vote]+1))

		#Cleanup temp directory to have mercy on storage
		rm $dir -r
	fi
done

#Output Results
for ((r=0;r<=22;i++)) do
    echo ${results[$r]}= > /var/www/html/results/$r.txt
done

#echo $hillary > /home/ubuntu/hillary.txt
#echo $donald > /home/ubuntu/donald.txt

#Cleanup Temporary Files
rm $p/* -r
