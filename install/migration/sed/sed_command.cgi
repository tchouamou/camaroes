#sed -n '/^\s*[/#]/!p' conf.php|sed -n '/^\s*$/!p'|sed 's/\s*//g'|sed 's/=.*$/ /g'|sed 's/\n/ /g'
find ../../ -type f -name "*.*" | while read i;
do sed -i".bak1"  -f final_sed_good.txt  $i;
echo "$i";
done;
#fd . -type f -name "*.php"  -exec sed -i".bak1" -f input_sed_sort_good_defined_parentesi -f input_sed_sort_good.txt -f input_sed_sort_good_defined.txt $i;
