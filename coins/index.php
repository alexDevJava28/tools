<?php
/**
 * Created by PhpStorm.
 * User: oleksii.khodakivskyi
 * Date: 18.03.19
 * Time: 12:28
 */

/**
 * Dynamic programming. Coins
 * Tasks's description:
 *
 * After making a purchase at a large department store, Mel’s change was 17 cents. He received 1 dime,
 * 1 nickel, and 2 pennies. Later that day, he was shopping at a convenience store. Again his change
 * was 17 cents. This time he received 2 nickels and 7 pennies. He began to wonder ’ ”How many stores
 * can I shop in and receive 17 cents change in a different configuration of coins? After a suitable mental
 * struggle, he decided the answer was 6. He then challenged you to consider the general problem.
 * Write a program which will determine the number of different combinations of US coins (penny: 1c,
 * nickel: 5c, dime: 10c, quarter: 25c, half-dollar: 50c) which may be used to produce a given amount of
 * money.
 *
 */

/**
 * Function calculated the number of possible variants to get the amount of $money, if you have
 * the $denominations set of coin denominations
 *
 * @param $money int amount you should calculated by summing available coin denominations
 * @param $denominations array the list of available coin denominations
 * @return int the amount of possible combinations
 */

function countVariants(int $money, array $denominations) : int {
    $table = array();
    $array_count = count($denominations);

    for ($i = 0; $i < $money + 1; $i++) {
        for ($j = 0; $j < $array_count; $j++) {
            $table[$i][$j] = 0;
        }
    }

    for ($i = 0; $i < $money; $i++) {
        $table[0][$i] = 1;
    }

    for ($i = 1; $i < $money + 1; $i++) {
        for ($j = 0; $j < $array_count; $j++) {
            $x = ($i - $denominations[$j]) >= 0 ? $table[$i - $denominations[$j]][$j] : 0;
            $y = ($j >= 1) ? $table[$i][$j - 1] : 0;
            $table[$i][$j] = $x + $y;
        }
    }

    return $table[$money][$array_count - 1];
}

echo 'Possible variants for array(1, 2, 3) and sum 4 - <strong>' . countVariants(4, array(1, 2, 3)) . '</strong>';
echo '<br>';
echo 'Possible variants for array(1, 5, 10, 25, 50) and sum 17 - <strong>' . countVariants(17, array(1, 5, 10, 25, 50)) . '</strong>';
echo '<br>';
echo 'Possible variants for array(1, 5, 10, 25, 50) and sum 11 - <strong>' . countVariants(11, array(1, 5, 10, 25, 50)) . '</strong>';
echo '<br>';
echo 'Possible variants for array(1, 5, 10, 25, 50) and sum 4 - <strong>' . countVariants(4, array(1, 5, 10, 25, 50)) . '</strong>';
echo '<br>';
echo 'Possible variants for array(1, 5, 10, 25, 50) and sum 0 - <strong>' . countVariants(0, array(1, 5, 10, 25, 50)) . '</strong>';
echo '<br>';
echo 'Possible variants for array(1, 5, 10, 25, 50) and sum 1 - <strong>' . countVariants(1, array(1, 5, 10, 25, 50)) . '</strong>';
