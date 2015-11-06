<?php

/**
 * @auther: dingzhihao
 * @update: 2015-11-06
 *
 */


// 幸运指数。值越小，越先抢到的金额可能越多；反之。
define('THE_LUCK_FACTOR', 2);

// $money 最小单位: 1分。整数。
function luck_money($money, $n)
{
    if ($n > 1) {
        return luck_money($money - rand(1, max(1, ceil($money/$n * THE_LUCK_FACTOR))), --$n);
    } else {
        return max(1, $money);
    }
}



// the test
$times = 10;
$total_money = $argv[1];
$total_person = intval($argv[2]);
echo "\n";
echo "money:\t{$total_money}\n"; 
echo "person:\t{$total_person}\n"; 

while($times-- > 0) {
    echo "\t第".(10 - $times)."次:\t";

    $tmp_money = $total_money * 100;
    $tmp_person = $total_person;
    while($tmp_person > 0) {
        if ($tmp_money > 0) {
            $the_money = luck_money($tmp_money, $tmp_person);
            echo "\t".($the_money/100);
    
            $tmp_money -= $the_money;
            $tmp_person--;
        } else {
            break;
        }
    }

    echo "\n";
}

echo "\n";



