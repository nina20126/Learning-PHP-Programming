# Documentation

### Introduction
![image](https://github.com/nina20126/Learning-PHP-Programming/assets/77397102/07f1c67d-b9db-4860-b369-43dcc2174245)

The purpose of this assignment was practise to work with PHP loops. Here I have actually combined two different assignments (arrange numbers and calculation). Functions wasn't introduced at this point of the couse, but after completing the course I just modified my code a little becouse I think it is more clear when different functionality is separated in their own functions.

### Program expained
```php
$random_numbers = array();

for ($k = 0; $k < 25; $k++) 
{
    $number = rand(0, 100);
    array_push($random_numbers, $number);
}

$copy1 = $random_numbers;
$copy2 = $random_numbers;
```
At first I am generating a random list of numbers, so the numbers change everytime the page is reloaded. I am creating an empty list for the numbers and in the for loop I am generating 25 numbers between 0 and 100. Numbers are pushed into random_numbers list. After for loop I am creating two copies of that list, so I can re-arrange the numbers. (Maybe I should rename the copied list to be more descriptive)

```php
for($x = 0; $x < count($copy1)-1; $x++) 
{
	for($y = 0; $y < count($copy1)-1; $y++)
	{
		if ($copy1[$y] < $copy1[$y+1]) 
		{
			$temp = $copy1[$y+1];
			$copy1[$y+1] = $copy1[$y];
			$copy1[$y] = $temp;
		}
	}
}
```
* Here I am re-arranging the numbers from biggest to smallest, and for that I use for loop indide for loop. I also use the first copy of the random_numbers list.
* I am going to explain this functionality from the inner for loop and the if statement.
  *   So we have a variable $y, which we can think of a reference to list index. We are compairing a value in current list index to the value next to it. If that current value is smaller, the if statement executes.
  *   In the if statment we have a temporary variable called $temp, and in that variable we are savig the bigger value which we just compared.
  *   Then we are saving the smaller value into that list index where the bigger value was.
  *   Then we are taking the bigger value from the $temp variable, and saving it tho that smaller values index
  *   So in other words, we just compared two numbers that are neighbours, and switched their places so that the bigger one goes first.
  *   We are doing the same operation for all of the list items (every list index), and that is what the inner for loop is for.
* Then there is the outer foor loop.
  *   The outer foor loop is needed to re-arrange the whole list. Not just the numbers that are neighbours.
  *   So we are doing the comparision and switching check as many times as the list lenght is defined. That is defined in the for loop, ```count(copy1)-1``` is the lenght of the list (array).
 
```php
for($i = 0; $i < count($copy2)-1; $i++) 
{
    for($j = 0; $j < count($copy2)-1; $j++) 
    {
            if ($copy2[$j] > $copy2[$j+1]) 
            {
                $temp = $copy2[$j+1];
                $copy2[$j+1]= $copy2[$j];
                $copy2[$j]= $temp;
            }
        }
}
```
The second nested for loop is almost same, but it arranges the numbers from smallest to biggest. The logic behind it is exactly the same than above.

```php
function calculate_sum($arr)
{
    $sum = 0;
    foreach($arr as $num)
    {
        $sum += $num;
    }
    return $sum;
}

// average
function calculate_average($arr, $num)
{
    $average = $num / count($arr);
    return $average;
}
```
At the bottom of the file there are two functions. Fist one calculates the sum and the second one calculates the average of the numbers in random_numbers list. The fist function takes an array for a parameter and uses foreach loop to sum up every number that appears in the list. Finally, the function returns the $sum variable.  
Then the second function takes an array and a number as a parameter. Function does the calculation with given information and returns the $average variable.

```
$sum = calculate_sum($random_numbers);
$average = calculate_average($random_numbers, $sum);
```
Here we are calling these two functions and saving the results in variables. First we are calling calculate_sum function with $random_numbers array, so it is calculating the sum of numbers that appears in that array.
Second we are calling the average function with $random_numbers array and the result of the sum calculation which we just saved in the $sum variable.

```php
$numbers_at_first = implode(', ', $random_numbers);
echo "Numbers at the beginning: $numbers_at_first <br>";

$smallest_to_biggest = implode(', ', $copy2);
echo "Numbers from smallest to biggest: $smallest_to_biggest <br>";

$biggest_to_smallest = implode(', ', $copy1);
echo "Numbers from biggest to smallest: $biggest_to_smallest <br>";

echo "Sum of the numbers: $sum <br>";

echo "Average: $average";
```
And here we are printing out the results. PHP ```implode``` function is used to read an array and save the content in a string variable. ```implode``` takes two parameters. The first one tells how to seperate list items from each other. In this case I am using comma and space, so after every number PHP prints a comma and space and after that the second number. The second paramenter in ```implode``` function defines the array we are reading.
