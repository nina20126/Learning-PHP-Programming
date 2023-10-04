<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add numbers:</h1>

    <form action="smallest_and_biggest_value.php" method="get">
        <label for="num1">Num1:</label>
        <input type="number" name="num1"><br>
        <label for="num2">Num2:</label>
        <input type="number" name="num2"><br>
        <label for="num3">Num3:</label>
        <input type="number" name="num3"><br><br>
        <input type="submit" value="Submit"><br><br>
        </form>
</body>
</html><?php
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$num3 = $_GET['num3'];

$biggest_num = biggest($num1, $num2, $num3);
$smallest_num = smallest($num1, $num2, $num3);

function biggest($a, $b, $c)
{
	if ($a > $b and $a > $c) {
		return $a;
	} elseif ($b > $a and $b > $c) {
		return $b;
	} else {
		return $c;
	}
	
}

function smallest($a, $b, $c) 
{
	if ($a < $b and $a < $c) {
		return $a;
	} elseif ($b < $a and $b < $c) {
		return $b;
	} else {
		return $c;
	}
	
}

echo "The biggest number is: $biggest_num" . "<br>";
echo "The smallest number is: $smallest_num";
?>