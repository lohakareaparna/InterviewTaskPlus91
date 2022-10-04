<?php


$x = $argv[1];
$y = $argv[2];

if(!is_numeric($x) || !is_numeric($y)){
	die("\nCo-ordinates must be Integer\n");
}

$d = $argv[3];
echo "\nD:".$d."\n";

if($d != 'NORTH' && $d != 'EAST' && $d != 'SOUTH' && $d != 'WEST'){
	 die("\nWrong Direction\n");
}

const NORTH = 1;
const WEST = 2;
const SOUTH = 3;
const EAST = 4;

$direction = [ 1 => "North", 2 => "West", 3 => "South", 4 => "East"];

const MULTIPLIER1 = 1;
const MULTIPLIER2 = 1;
const MULTIPLIER3 = -1;
const MULTIPLIER4 = -1;


$presentdirection = constant($d);

$s = $argv[4];

for($i = 0; $i < strlen($s); $i++ ){

	if($s[$i]=='R'){
		if($presentdirection == 4){
				$presentdirection = 1;
				echo "\nD:".$direction[$presentdirection]."\n";
		} 
		else {
			$presentdirection++;
			echo "\nD:".$direction[$presentdirection]."\n";
		}
	}
	elseif ($s[$i]=='L') {
		if($presentdirection == 1){
                        $presentdirection = 4;
                        echo "\nD:".$direction[$presentdirection]."\n";
                } else {
                        $presentdirection--;
                        echo "\nD:".$direction[$presentdirection]."\n";
                }
	}
	elseif ($s[$i]=='W'){
		if( !($presentdirection % 2) ){
			if(is_numeric($s[$i+1])){
				$x += ($s[$i+1] * constant("MULTIPLIER".$presentdirection) );
				echo "\nX: ".$x;
				echo "\n";
			}
			else{
				$x += 0;
			}
		} else {
			if(is_numeric($s[$i+1])){
				$y += ($s[$i+1] * constant("MULTIPLIER".$presentdirection) );
				echo "\nY: ".$y;
				echo "\n";
			}
			else{
				$y += 0;
			}
		}
			              
	}
	elseif(is_numeric($s[$i])){
		if(is_numeric($s[$i+1])){
			echo "\nNumber should be associated with 'W' ranging from 0 - 9\n";
		}

	} 
	else {
		echo "\nProvided char '".$s[$i]."' is not valid\n";
	}
}

echo "\nWalking Robo Direction X: ".$x.", Y: ".$y.", D: ".$direction[$presentdirection]."\n";

?>