<?php
    $grades = 'grades.txt';
    $updated_grades = 'new_grades.txt';

    $handle_grades = fopen($grades, 'r+') or die("File is missing!");
    $lines = file($grades, FILE_IGNORE_NEW_LINES);

        $new_grades = array();
        foreach($lines as $value) {
            if ($value == 5) {
                array_push($new_grades, $value);
                array_push($new_grades, "\n");
            } else {
                $value = $value + 1;
                array_push($new_grades, $value);
                array_push($new_grades, "\n");
            }
            file_put_contents($updated_grades, $new_grades);
        }

    $filesize_grades = filesize($grades);
    $old_grades = fread($handle_grades, $filesize_grades);
    fclose($handle_grades);

    $filesize_updated_grades = filesize($updated_grades);
    $handle_update = fopen($updated_grades, 'r');
    $grades_updated = fread($handle_update, $filesize_updated_grades);

    echo "Grades before update:" . "<br>" . $old_grades . "<br>";
    echo "<br>" . "New grades are:" . "<br>" . $grades_updated;
    fclose($handle_update);
	
	$clear = fopen($updated_grades, 'w');
    fclose($clear);
?>