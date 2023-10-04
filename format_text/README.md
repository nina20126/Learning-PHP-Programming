# Documentation

### Introduction

HTML form is asking some text from user and a format mode. User has four options to format text:  
1) l o w e r c a s e  a n d  w i d e
2) C A P I T A L  L E T T E R  A N D  W I D E
3) backwards --> sdrawkcab
4) CAPITAL BACKGWARDS --> SDRAWKCAB LATIPAC  

Formatted text will be printed below the form. The purpose of this program was to practise creating PHP functions. 

### Program expained
At the top of this file there is the html part of the application. Since I am focusing to learn PHP here, I will not explain the HTML part.  

```php
$user_input = $_GET['user_input'];
$mode = $_GET['mode'];
```
Here I am reading user input from the HTML form and saving the data into variables. $user_input saves the text that user writes in the text field, and mode saves the selection how to format text.

```php
form_submitted($mode, $user_input);
```
Next I have a function call. All of the functions are impemented at the bottom of the php file. In this case, I wrote all code inside functions because the assingment was all about the functions. The form_submitted is the last function of this program so I'll return back to it soon. For now I can tell that the function takes two parameters: user_input and mode from the HTML form.  

```php
function wide_low($value) {
	$value = strtolower($value);
	$value = trim(chunk_split($value, 1, ' '));
	echo $value;
}
```
* The first function formats the user input in lowercase and wide.
* It takes one parameter, which is the text to format.
* ```$value = strtolower($value);``` this line sets the text to lowercase using ```strtolower``` function.
* ```$value = trim(chunk_split($value, 1, ' '));``` this line breaks the text in smaller chunks using ```chunk_split``` function. Function takes three parameters: 1. the string to split, 2. lenght of the chunk and 3. the seperator. In this case I am braking the string in pieces of one letter and letters are separated with space. ```trim``` function is used to trim the chunk_split so that there is no space after the last letter (or before the first one).
* ```echo $value;``` the result of formatting is printed out.

```php
function wide_cap($value) {
	$value = strtoupper($value);
	$value = trim(chunk_split($value, 1, ' '));
	echo $value;
}
```
* Second function formats the text in capital letters and wide. This functions is very similar to the previous function, except it is using ```strtoupper``` to format text to uppercase.

```php
function back_low($value) {
	$value = strtolower($value);
	$value = strrev($value);
	echo $value;
}
```
* This function formats the text to lovercase letters and backwards. Function ```strrev``` is used for backwarding the text.

```php
function back_cap($value) {
	$value = strtoupper($value);
	$value = strrev($value);
	echo $value;
}
```
* ... and then the same with capital letters.

```php
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
```
* This is the function which is called at the beginning of the program. It takes two values: $mode, that tells how the input shoul be formatted, and input that is the text to format. Based on the mode, this function calls the other function that makes the formatting. So if the user mode selection was 1, function wide_low shoul be called. If the mode was 2, then the function wide_cap shoul be called and so on. Finally, if anything weird happens, the program prints out Something went wrong.

### Future development
This program could be improved by adding few more options to format the text. For example bold text, text in color and maybe with a possibility to choose multiple formatting methods.
