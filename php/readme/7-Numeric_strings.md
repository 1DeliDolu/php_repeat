# Numeric strings

A PHP string is considered numeric if it can be interpreted as an int or a float.

## Formal Definition (PHP 8.0.0)

```
WHITESPACES      \s*
LNUM             [0-9]+
DNUM             ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
EXPONENT_DNUM    (({LNUM} | {DNUM}) [eE][+-]? {LNUM})
INT_NUM_STRING   {WHITESPACES} [+-]? {LNUM} {WHITESPACES}
FLOAT_NUM_STRING {WHITESPACES} [+-]? ({DNUM} | {EXPONENT_DNUM}) {WHITESPACES}
NUM_STRING       ({INT_NUM_STRING} | {FLOAT_NUM_STRING})
```

PHP also has a concept of **leading numeric strings**. This is simply a string which starts like a numeric string followed by any characters.

> **Note:**
> Any string that contains the letter E (case insensitive) bounded by numbers will be seen as a number expressed in scientific notation. This can produce unexpected results.

### Example: Scientific Notation Comparisons
[See code](D:/xampp/htdocs/php/2-Types/1-Introduction/7-Numeric_strings.php#L1)
```php
// Example #1 Scientific Notation Comparisons
var_dump("0D1" == "000"); // false, "0D1" is not scientific notation
var_dump("0E1" == "000"); // true, "0E1" is 0 * (10 ^ 1), or 0
var_dump("2E1" == "020"); // true, "2E1" is 2 * (10 ^ 1), or 20
```

## Strings used in numeric contexts

When a string needs to be evaluated as number (e.g. arithmetic operations, int type declaration, etc.) the following steps are taken to determine the outcome:

1. If the string is numeric, resolve to an int if the string is an integer numeric string and fits into the limits of the int type limits (as defined by PHP_INT_MAX), otherwise resolve to a float.
2. If the context allows leading numeric strings and the string is one, resolve to an int if the leading part of the string is an integer numeric string and fits into the limits of the int type limits (as defined by PHP_INT_MAX), otherwise resolve to a float. Additionally an error of level E_WARNING is raised.
3. The string is not numeric, throw a TypeError.

### Example: Numeric Strings in Arithmetic
[See code](D:/xampp/htdocs/php/2-Types/1-Introduction/7-Numeric_strings.php#L7)
```php
$foo = 1 + "10.5";                // $foo is float (11.5)
$foo = 1 + "-1.3e3";              // $foo is float (-1299)
$foo = 1 + "bob-1.3e3";           // TypeError as of PHP 8.0.0, $foo is integer (1) previously
$foo = 1 + "bob3";                // TypeError as of PHP 8.0.0, $foo is integer (1) previously
$foo = 1 + "10 Small Pigs";       // $foo is integer (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = "10.0 pigs " + 1;          // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = "10.0 pigs " + 1.0;        // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
```

### Example: No Whitespaces
[See code](D:/xampp/htdocs/php/2-Types/1-Introduction/7-Numeric_strings.php#L16)
```php
$foo = 4 + "10.2LittlePiggies";
```

## Behavior prior to PHP 8.0.0

- A string was considered numeric only if it had leading whitespaces; trailing whitespaces made it a leading numeric string.
- Using a leading numeric string raised an E_NOTICE instead of an E_WARNING.
- If the string is not numeric, an E_WARNING was raised and the value 0 would be returned.
- Prior to PHP 7.1.0, neither E_NOTICE nor E_WARNING was raised.

---

**Found A Problem?**
Learn How To Improve This Page • Submit a Pull Request • Report a Bug
