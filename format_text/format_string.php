<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Format string</title>
</head>
<body>
    <h1>Format text</h1>

    <form action="format_string.php" method="get">
        Write here: <input TYPE="text" NAME="user_input">
        <br>
        Choose your output: 
        <select name="mode">
            <option value=1 selected>wide, lower case</option>
            <option value=2>wide, capital</option>
            <option value=3>backwards, lowercase</option>
            <option value=4>backwards, capital </option>
        </select>
        <br>
        <input type="submit" value="Submit">     
    </form>
</body>
</html>
<?php
	$user_input = $_GET['user_input'];
	$mode = $_GET['mode'];

    form_submitted($mode, $user_input);

    // Functions
	
	function wide_low($value) {
		$value = strtolower($value);
		$value = trim(chunk_split($value, 1, ' '));
		echo $value;
	}

	function wide_cap($value) {
		$value = strtoupper($value);
		$value = trim(chunk_split($value, 1, ' '));
		echo $value;
	}

	function back_low($value) {
		$value = strtolower($value);
		$value = strrev($value);
		echo $value;
	}

	function back_cap($value) {
		$value = strtoupper($value);
		$value = strrev($value);
		echo $value;
	}

    function form_submitted($mode, $input) {
        if ($mode == 1) {
            wide_low($input);
        } elseif ($mode == 2) {
            wide_cap($input);
        } elseif ($mode == 3) {
            back_low($input);
        } elseif ($mode == 4) {
            back_cap($input);
        } else {
            echo "Something went wrong.";
        }
    }
?>