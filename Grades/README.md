# Documentation

### Introduction

This program has numbers between 1 and 5 listed in file grades.txt and and empty file for new grades (new_grades.txt). Program will read the values from grades.txt and raise the grades by one. If the grade is 5, which is the maximum, there is no upgrade (or downgrade). Meaning of this program was to practise reading and writing to files in PHP.

### Program expained

```php
$grades = 'grades.txt';
$updated_grades = 'new_grades.txt';

```
Files are saved into variables.

```php
$handle_grades = fopen($grades, 'r+') or die("File is missing!");
$lines = file($grades, FILE_IGNORE_NEW_LINES);

```
* First line opens the grades file for reading and writing. ```r+``` places the file pointer at the beginning of the file.
* If the file does not exist, the output is "File is missing!"
* The ```file``` function at the second row reads the entire grades file into an array. That array is saved into a variable called lines.
*  ```FILE_IGNORE_NEW_LINES``` is a optional flag parameter, which omits newline at the end of each array element.

```php
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
```
* First we are creating an array for new grades.
* Foreach loop takes the lines variable defined earlier and reads every value in it. Values are saved in a variable called ```value```.
* In the foreach loop there is a if-else loop that first checks if the value is 5. This is the value which is not supposed to be updated, so the value is pushed to the new_grades array as it is.
* If the value is anything else, it will be updated by increasing it by one. Then the new value is pushed to the new_grades array.
* Finally ```file_put_contents``` will place the new_grades array in the text file. ```$updated_grades``` is reference to the destination and ```$new_grades``` is the content.

```php
$filesize_grades = filesize($grades);
$old_grades = fread($handle_grades, $filesize_grades);
fclose($handle_grades);
```
* At the first line ```filesize``` function is used to save the size of the $grades file into a variable.
* Second line reads the content of grade file. Function ```fread```takes two parameters. First one is the refence of the file which we want to read, and second parameter is the file size. In this case we want to read the whole file.
* ```fclose```closes the file.

```php
$filesize_updated_grades = filesize($updated_grades);
$handle_update = fopen($updated_grades, 'r');
$grades_updated = fread($handle_update, $filesize_updated_grades);
```
This is very similar than code above. At the first line we are defining the size of updated_grades file. Then we are opening it for reading, and the last line saves the content of the file in a variable grades_updated.

```php
echo "Grades before update:" . "<br>" . $old_grades . "<br>";
echo "<br>" . "New grades are:" . "<br>" . $grades_updated;
fclose($handle_update);
```
Here we are printing the results before and after the foreach loop.

```php
$clear = fopen($updated_grades, 'w');
fclose($clear);
```
Last two lines of the code is used to clear the new_grades.txt file. I wanted that file to be empty so I can easily run the program many times.

### Future development

Even if I just finised this assignment and it passed all automation tests, I already have some thoughts to upgrade this program. In the original assignment there were a grades.txt file already existing and the task was only to create php file that updates the grades. I thought that it would be nice if this code is online so that there's also a button that generates random numbers between 1 and 5 and maybe another button to do the upgrade.

Also some notes for myself about this code: It would be better if the update functionality was in a function.
Also, when pushing the new grades into an array, the ```"\n"``` is actually unnecessary. I just learned that PHP outputs HTML code and since there is no ```"\n"``` in HTML, the code does not understad what I am trying to do. If I wanted to do a new line after every number, I should use ```. "<br>"``` instead.
