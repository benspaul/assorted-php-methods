<?php

// Note: The testing is my own work. The algorithm is a PHP adaptation of
// a Python solution available at http://bit.ly/H0qO8Y


/**
 * Quickly finds index position of a number in an ascending
 * sorted array of numbers. Uses a non-recursive binary search method.
 * Runs at O(log(n)) speed. If no match, returns -1.
 * 
 * @param  integer $needle  number to find
 * @param  array   $hay     array to search
 *
 * @return integer
 */
function bin_search($needle, $hay) {

  if (count($hay) < 1) {
    return 'Must enter an array with numbers';
  }

  $low = 0;
  $high = count($hay) - 1;

  // Repeatedly search for value, each time restricting the search space,
  // until there is no search space left.

  while ($low <= $high) {

    $mid = round($low + (($high - $low) / 2));

    if ($hay[$mid] == $needle) {        // match found, return its index
      return $mid;

    } else if ($hay[$mid] > $needle) {  // if tested value too high, 
      $high = $mid - 1;                 //   move upper bound down halfway

    } else if ($hay[$mid] < $needle) {  // if tested value too low,
      $low = $mid + 1;                  //   move lower bound up halfway
    }
  }
  return -1; // no match was found

}

// Test cases to ensure that bin_search works correctly
// In each array, bin_search(arg1, arg2) should = arg3.
$tests = array(
  array( 4, array(4, 9), 0 ),
  array( 9, array(4, 9), 1 ),
  array( 10, array(4, 9), -1 ),
  array( 4, array(4, 9, 10), 0 ),
  array( 9, array(4, 9, 10), 1 ),
  array( 9.32, array(4, 9, 10), -1 ),
  array( 10, array(4, 9, 10), 2 ),
  array( 2, array(4, 9, 10, 11), -1 ),
  array( 12, array(4, 9, 10, 11), -1 ),
  array( 42, array(4, 9, 10, 11, 19, 20, 24, 39), -1 ),
  array( 42, array(4), -1 ),
  array( 4, array(4), 0 ),
  array( 4.3, array(4), -1 ),
  array( 4.3, array(), 'Must enter an array with numbers' )
);

// Output test results
echo '<b>Test results</b><br/>';
foreach ($tests as $test) {
  if ( bin_search($test[0], $test[1]) == $test[2] ) {
    $result = 'passed';
  } else {
    $result = 'failed';
  }
  echo "Test $result: " .
       "binsearch($test[0], ".print_r($test[1],true).") = $test[2]<br/>";
}


?>