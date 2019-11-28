<?php
$time = strtotime(date("Y/m/d"));
$ip = $_SERVER['HTTP_X_CLIENT_IP'];
$ip = ip2long($ip);
$cookie_name = "seed";
$cookie_value = mt_rand();
if(!isset($_COOKIE[$cookie_name])) {
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	$rand = $cookie_value;
}else{
	$rand = $_COOKIE[$cookie_name];
}

$colours[] = "#C41F3B";
$colours[] = "#A330C9";
$colours[] = "#FF7D0A";
$colours[] = "#A9D271";
$colours[] = "#40C7EB";
$colours[] = "#00FF96";
$colours[] = "#F58CBA";
$colours[] = "#FFF569";
$colours[] = "#0070DE";
$colours[] = "#8787ED";
$colours[] = "#C79C6E";

function adjustColour($hexCode, $adjustPercent) {
    $hexCode = ltrim($hexCode, '#');
    $hexCode = array_map('hexdec', str_split($hexCode, 2));
    foreach ($hexCode as &$colour) {
        $adjustableLimit = $adjustPercent < 0 ? $colour : 255 - $colour;
        $adjustAmount = ceil($adjustableLimit * $adjustPercent);
        $colour = str_pad(dechex($colour + $adjustAmount), 2, '0', STR_PAD_LEFT);
    }
    return '#' . implode($hexCode);
}

//for($j = 0; $j < count($colours); $j++){
//	$colours[$j] = adjustColour($colours[$j], 0.5);
//}

$dabberColour = $colours[array_rand($colours, 1)];

$dabberColour = adjustColour($dabberColour, 0.5);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript">
var board = [
	[0, 0, 0, 0, 0],
	[0, 0, 0, 0, 0],
	[0, 0, 1, 0, 0],
	[0, 0, 0, 0, 0],
	[0, 0, 0, 0, 0]
];

function checkWinner(row, col){
	if(checkHorizontal(row)) return true;
	if(checkVertical(col)) return true;
	if(row == col || row + col == 4){
		if(checkDiaganol()) return true;
	}
	return false;
}

function checkHorizontal(row){
	result = 0;
	for(i = 0; i < 5; i++){
		result += board[row][i];
	}
	if(result == 5){
		return true;
	}
	return false;
}

function checkVertical(col){
	result = 0;
	for(i = 0; i < 5; i++){
		result += board[i][col];
	}
	if(result == 5){
		return true;
	}
	return false;
}

function checkDiaganol(){
	result = 0;
	for(i = 0; i < 5; i++){
		result += board[i][i];
	}
	if(result == 5){
		return true;
	}
	result = 0;
	for(i = 0; i < 5; i++){
		result += board[4 - i][0 + i];
	}
	if(result == 5){
		return true;
	}
	return false;
}




$(function() {
	$('td:not(#centre):not(#info):not(#winner)').click(function() {
		$( this ).toggleClass( "highlight" );
		var $this = $(this);
		var col   = $this.index();
		var row   = $this.closest('tr').index();
		board[row][col] = !board[row][col] + 0;
		if(checkWinner(row, col)) {
			//alert("BINGO");
			setTimeout(function (){
				$('table#card').hide();
				$('table#winner').show();
			}, 500);
			
		}
	});
	
	$('td#winner').click(function() {
		$('table#card').show();
		$('table#winner').hide();
	});
});

</script>
<style>
img {
	border: 0;
}

table {
	border: 2px solid black;
	table-layout: fixed;
	border-padding: 0px;
	border-spacing: 0px;
}

table#card {
	width: 1050px;
}
table#winner {
	width: 850px;
}

table#winner td {
	width: 845px;
	height: 845px;
	background-image: url("817783.jpg");
}

td {
	font-family: Arial, Helvetica, sans-serif;
	border: 2px solid black;
	width: 150px;
	height: 150px;
	overflow: hidden;
	text-align: center;
	vertical-align: middle;
	background: white;
	cursor: pointer;
	padding: 10px;
	spacing: 0px;
	user-select: none;
}
td#info {
	text-align: left;
	vertical-align: top;
	height: 100%;
	width: 300px;
}
td#info, td#centre {
	cursor: default;
}
td#centre {
	background: <?=$dabberColour;?>;
}
td.highlight {
	background: <?=$dabberColour;?>;
}
</style>
<title>&lt;Dark Storm&gt; / &lt;Bad Pull&gt; Bingo</title>
</head>
<body>
<?php
$seed = $time + $ip + $rand;

$a[] = "That fear is the worst";
$a[] = "Around the outside";
$a[] = "Clockwise";
$a[] = "Tome / Time";
$a[] = "When do I taunt?";
$a[] = "Hero";
$a[] = "I need to transmog";
$a[] = "Nythendra";
$a[] = "Taunt! (In a squeaky voice)";
$a[] = "Stand on the fucking <insert mechanic here>";
$a[] = "Life grip please";
$a[] = "I raid with Pieces";
$a[] = "I don't buy boosts";
$a[] = "We're over healing this";
$a[] = "Zifius";
$a[] = "Krusse";
$a[] = "Moravian";
$a[] = "Priest legendary cloak";
$a[] = "Demon hunter - hero class";
$a[] = "Sam missing food buff";
$a[] = "Fucking stam buff";
$a[] = "Fuckk that's hot!";
$a[] = "Pull timer not long enough";
$a[] = "Warlock murder";
$a[] = "When you stun them they stop casting";
$a[] = "There is no R in it";
$a[] = "I'm in my speed gear";
$a[] = "Wiping to trash";
$a[] = "Lusting after Fengus";
$a[] = "Room is not symmetrical";
$a[] = "No, no, tank you";
$a[] = "Russian Sauna";
$a[] = "North vs South";
$a[] = "Too many <insert class here>";
$a[] = "Starting 15+ minutes late";
$a[] = "Making toast";
$a[] = "Do not release";
$a[] = "Hey guys, it's Nicole";
$a[] = "Seventythree";
$a[] = "Mol is old";
$a[] = "Bridge Four";
$a[] = "I have more health than Yenn";
$a[] = "Easy game, easy life";
$a[] = "No care your parse";
$a[] = "Out of range of healers";
$a[] = "Would rather be doing M+";
$a[] = "Two guilds, not enough raiders";
$a[] = "Slowest class in game";
$a[] = "I need defensive trinkets on my DK";
$a[] = "Forgot my bonus rolls";
$a[] = "Body pull trash";
$a[] = "Keep up DPS";
$a[] = "Gaze";
$a[] = "I've had no loot this run";
$a[] = "I'm lagging";
$a[] = "Got curve, taking a break";
$a[] = "Andy gets loot with a socket";
$a[] = "Titanforge!";
$a[] = "Fall / Roll / Jump off platform";
$a[] = "That’s racist";
$a[] = "LASERS";
$a[] = "The boss juked me";
$a[] = "Spell reflect the bleed";
$a[] = "Missing a soak";
$a[] = "I can solo that, then dies";
$a[] = "Unlimited power from the Nightwell";
$a[] = "Portal roulette";


$b = array_map("htmlspecialchars", $a);

mt_srand($seed);
$order = array_map(create_function('$val', 'return mt_rand();'), range(1, count($a)));
array_multisort($order, $a);

//shuffle($a);

$helptext = <<<EOF
\t\t\t<b>&lt;Dark Storm&gt; / &lt;Bad Pull&gt; Bingo</b><br>
\t\t\t<br>
\t\t\tWhen you visit this page you have a custom bingo card generated by picking 24 random values from all possible options.<br>
\t\t\t<br>
\t\t\tYour card will expire at midnight UTC and a new one will be generated for you when you next visit the page.<br>
\t\t\t<br>
\t\t\tTo play simply click one of the 24 boxes to mark it when one of us is daft enough to say or do something stupid during the raid that matches one of the options.<br>
\t\t\t<br>
\t\t\tThe middle square is a free space and is included in any full lines that pass through it.<br>
\t\t\t<br>
\t\t\tThe "winner" is the first to make a full line either horizontally, vertically or diagonally.<br>
\t\t\t<br>
\t\t\tAbsolutely no baiting for squares is allowed! Or is it?<br>
\t\t\t<br>
\t\t\tWhat do I win? Absolutely nothing!<br>
\t\t\t<br>
\t\t\tA full list of the current options are shown at the bottom of the page.<br>
\t\t\t<br>
\t\t\tHave you any suggestions for new options? Let me know on discord and I'll add them ASAP.<br>
\t\t\t<br>
\t\t\tWhen adding more options the random selection will change as the code uses the array size as a variable to do the calculations.<br>
EOF;

echo "<table id=\"card\">\n";
echo "\t<tr>\n";
for($i = 0; $i < 25; $i++){
	if($i % 5 == 0 && $i != 0){
		echo "\t</tr>\n\t<tr>\n";
	}

	if($i == 12){
		echo "\t\t<td id=\"centre\"><img src=\"./horde.png\" alt=\"\" /></td>\n";
	}else{
		echo "\t\t<td><b>" . htmlspecialchars($a[$i]) . "</b></td>\n";
	}
	if($i == 4) {
		echo "\t\t<td id=\"info\" rowspan=\"5\">\n$helptext\n\t\t</td>\n";
	}
}
echo "\t</tr>\n";
echo "</table>\n";

echo "<table id=\"winner\" style=\"display: none;\">\n";
echo "\t<tr>\n";
echo "\t<td id=\"winner\">X</td>\n";
echo "\t</tr>\n";
echo "</table>\n";

echo "<pre>\n";
print_r($b);
echo "</pre>\n";
?>
</body>
</html>
