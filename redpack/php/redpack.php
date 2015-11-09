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
function redpack_test($money, $n, $times, $all_times)
{
    if ($times > 0) {
        echo "\t第".($all_times - $times + 1)."次:\t";

        $tmp_money = $money * 100;
        $tmp_person = $n;
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

        redpack_test($money, $n, $times-1, $all_times);
    }
}

$money = $argv[1];
$person = intval($argv[2]);
$times = intval($argv[3]);
echo "\n";
echo "money:\t{$money}\n"; 
echo "person:\t{$person}\n"; 

redpack_test($money, $person, $times, $times);

echo "\n";



