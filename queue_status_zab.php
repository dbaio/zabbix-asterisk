<?php

$queue =  $argv[1];

require_once('/var/lib/asterisk/agi-bin/phpagi-asmanager.php');

$myfile = '/etc/asterisk/queues_additional.conf';

$asm = new AGI_AsteriskManager();
if($asm->connect()) {

	$result = $asm->Command("queue show $queue");

	if(!strpos($result['data'], ':'))
		echo $peer['data'];
	else {

      $data = array();

      foreach(explode("\n", $result['data']) as $line)
      {
         if (preg_match("/talktime/i", $line)) {
          $pieces = explode(" ", $line);

          $queue_number = $pieces[0];
          $queue_calls_in = $pieces[2];
          $queue_answered_calls = trim($pieces[14], "C:,");
          $queue_abandoned_calls = trim($pieces[15], "A:,");
          $queue_average_holdtime = trim($pieces[9], "(s");
          $queue_average_talk_time = trim($pieces[11], "s");
         }
      }
    }

    $asm->disconnect();
  }


print "Queue number: $queue_number \n";
print "Calls in queue: $queue_calls_in \n";
print "Answered calls: $queue_answered_calls \n";
print "Abandoned calls: $queue_abandoned_calls \n";
print "Average hold time: $queue_average_holdtime \n";
print "Average talk time: $queue_average_talk_time \n";

?>
