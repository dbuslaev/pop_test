<?php
/*
Take a second to imagine that you are in a room with 100 chairs arranged in a circle. These chairs are numbered sequentially from One to One Hundred.

At some point in time, the person in chair #1 will be told to leave the room. The person in chair #2 will be skipped, and the person in chair #3 will be told to leave. Next to go is person in chair #6. In other words, 1 person will be skipped initially, and then 2, 3, 4.. and so on. This pattern of skipping will keep going around the circle until there is only one person remaining.. the survivor. Note that the chair is removed when the person leaves the room.
*/

// changable parameters
$chairs_total = 100;
$chairs_skip_increment = 1;

$chairs_circle = range(1, $chairs_total);
$chairs_current = 0;
$chairs_to_skip = 0;
$chairs_sequence = array();

// the last chair removed will be the number we want
while($chairs_total > 0){
  // find the next person to leave the room
  $chairs_current += $chairs_to_skip;
  if($chairs_current >= $chairs_total) $chairs_current = $chairs_current % $chairs_total;

  // track removed chairs
  $chairs_sequence[] = $chairs_circle[$chairs_current];
  
  // chair is removed
  unset($chairs_circle[$chairs_current]);
  $chairs_circle = array_values($chairs_circle);
  $chairs_total --;

  // next time skip more chairs
  $chairs_to_skip += $chairs_skip_increment;
}

echo "The Survivor is: " . $chairs_sequence[count($chairs_sequence) - 1] . "\r\n\r\n";

echo "The Order of who left the room is:\r\n";
foreach($chairs_sequence as $key => $chair_number){
  echo "#" . ($key + 1) . ": $chair_number\r\n";
}
