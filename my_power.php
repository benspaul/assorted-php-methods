<?php

/**
* Recursive function that calculates x ^ y
*
* @param float   $base inputted base, a positive or negative number
* @param integer $exp  inputted exponent, a positive or negative integer
* @return integer result of base ^ exponent, or string describing an error
*/
function my_power($base, $exp) {

  if (($base == 0) && ($exp < 0)) {
      return 'Cannot divide by 0';
  }

  if ($exp == 0) {         // if power of 0, answer is 1
    return 1;

  } else if ($exp > 0) {   // if > 1, multiply base by itself and decrease exp
    return power($base, $exp - 1) * $base;

  } else if ($exp == -1) { // if power is -1, answer is 1 / base
    return 1 / $base;     

  } else if ($exp < -1) {   // if < -1, divide by base and increase exponent
    return power($base, $exp + 1) / $base;

  } else {
    return 'Exponent must be an integer';
  }

}

// Test cases to ensure the my_power method works correctly
// In each array, my_power(num1, num2) should = num3.
$tests = array(
  array(2, 2, 4),
  array(-2, 3, -8),
  array(0, 1, 0),
  array(12, 0, 1),
  array(1, 9, 1),
  array(5, -1, 0.2),
  array(5, -2, 0.04),
  array(0, -1, 'Cannot divide by 0'),
  array(-0, -1, 'Cannot divide by 0'),
  array(-5, -0, 1),
  array(-.2, -0, 1),
  array(.5, 2, .25),
  array(1, .9, 'Exponent must be an integer')
);

// Output test results
echo '<b>Test results</b><br/>';
foreach ($tests as $test) {
  if ( my_power($test[0], $test[1]) == $test[2] ) {
    $result = 'passed';
  } else {
    $result = 'failed';
  }
  echo "Test $result: $test[0] ^ $test[1] = $test[2]<br/>";
}



?>