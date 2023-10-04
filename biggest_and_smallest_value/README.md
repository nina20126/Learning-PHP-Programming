# Documentation

### Introduction

There is a web form that is asking three numbers from user. After submitting the form, programs prints the biggest and the smallest of the given numbers. Meaning of this assignment was to practise how to create and call functions. This program could be implemented so that form does not accept same values, and there could be few more fields in it.

### Program expained

At the top of this file there is the html part of the application. Since I am focusing to learn PHP here, I will not explain the HTML part.  

```php
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$num3 = $_GET['num3'];
```
Here I am saving the numbers given in HTML form into variables num1, num2 and num3.

```php
$biggest_num = biggest($num1, $num2, $num3);
$smallest_num = smallest($num1, $num2, $num3);
```
These are function calls. At first I am calling function named biggest and saving the result in a variable called biggest_num. I am calling the function with parameters defined above (The user input from a html form). After that I am calling the function named smallest with the same parameters and saving the result in a variable called smallest_num.  

```php
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
```
This function takes three parameters and it's purpose is to find biggest of the three. Function uses if-else statement to find the biggest number. First it checks if a is bigger than b and a is bigger than c, then a must be the biggest number. If that is not true, then the function checks if b is bigger than a and b is bigger than c, and if that is true then b must be the biggest number. If that is not true, then only possible solution is that c is the biggest number.  

```php
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
```
This function is very similar than the one above, but it seaches for the smallest value. Regardless the logic is same.

```php
echo "The biggest number is: $biggest_num" . "<br>";
echo "The smallest number is: $smallest_num";
```
Finally I am printing the results to the page. The biggest number is saved in the variable biggest_num (the function call) and the smalles value is saved to the variable smallest_num.

### Future development
This program could be developed by adding more input fields to the html form. In that case the functions will become a bit more complex. Another idea for implementing this program is to prevent user to add same number twice.
