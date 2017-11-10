<meta charset="utf-8" />

<?php
    echo "Hello World!";
    print "Hello Print!";
$foo = TRUE; // присвоить $foo значение TRUE

$action = "show_version";

$a = 1.234;
$b = 1.2e3;
$c = 7E-10;

// == это оператор, который проверяет эквивалентность и возвращает boolean

if ($action == "show_version") {
    echo "The version is 1.23";
  }
if ($a > $b) echo "a больше b";
//
if ($a > $b) {
  echo "a больше, чем b";
} else {
  echo "a НЕ больше, чем b";
}
//
if ($a > $b) {
    echo "a больше, чем b";
} else if ($a == $b) {
    echo "a равен b";
} else {
    echo "a меньше, чем b";
}

if($a > $b):
    echo $a." больше, чем ".$b;

elseif($a == $b): // Заметьте, тут одно слово.
    echo $a." равно ".$b;

else:
    echo $a." не больше и не равно ".$b;

endif;

$large_number = 2147483647;
var_dump($large_number); // int(2147483647)

$large_number = 2147483648;
var_dump($large_number);  // float(2147483648)

$million = 1000000;
$large_number =  50000 * $million;
var_dump($large_number); // float(50000000000)

var_dump(25/7);         // float(3.5714285714286)
var_dump((int) (25/7)); // int(3)
var_dump(round(25/7));  // float(4)

 if (is_nan($action)){
    var_dump($action);
 }


echo("\nновая строка (LF или 0x0A (10) в ASCII)");

echo("\n\rвозврат каретки (CR или 0x0D (13) в ASCII)");

echo("\n\tгоризонтальная табуляция (HT или 0x09 (9) в ASCII)");

echo("\n\v вертикальная табуляция (VT или 0x0B (11) в ASCII) (с версии PHP 5.2.5)");

echo("\n\$ знак доллара");

$bar = <<<EOT
Heredoc
I eat my dinner in my bathtub
Then I go to sex clubs
Watching freaky people gettin' it on
It doesn't make me nervous
If anything I'm restless
Yeah, I've been around and I've seen it all

I get home, I got the munchies
Binge on all my Twinkies
Throw up in the tub
Then I go to sleep
And I drank up all my money
Dazed and kinda lonely

You're gone and I gotta stay
High all the time
To keep you off my mind
Ooh-ooh, ooh-ooh
High all the time
To keep you off my mind
Ooh-ooh, ooh-ooh
Spend my days locked in a haze
Trying to forget you babe
I fall back down
Gotta stay high all my life
To forget I'm missing you
Ooh-ooh, ooh-ooh
EOT;
echo $bar;
$str = <<<'EOD'
Пример текста,
занимающего несколько строк,
с помощью синтаксиса nowdoc.
You're gone and I gotta stay
High all the time
To keep you off my mind
Ooh-ooh, ooh-ooh
High all the time
To keep you off my mind
Ooh-ooh, ooh-ooh
Spend my days locked in a haze
Trying to forget you babe
I fall back down
Gotta stay high all my life
To forget I'm missing you
Ooh-ooh, ooh-ooh
EOD;
echo $str;

$juice = "apple";
echo "He drank some $juice juice.".PHP_EOL;

$great = 'COOL';
echo "Это { $great}";// Не работает, выводит: Это { COOL}

echo "Это {$great}"; // выводит: Это COOL

$rest = substr("abcdef", -1);    // возвращает "f"
$rest = substr("abcdef", -2);    // возвращает "ef"
$rest = substr("abcdef", -3, 1); // возвращает "d"

$rest = substr("abcdef", 0, -1);  // возвращает "abcde"
$rest = substr("abcdef", 2, -1);  // возвращает "cde"
$rest = substr("abcdef", 4, -4);  // возвращает false
$rest = substr("abcdef", -3, -1); // возвращает "de"

echo substr('abcdef', 1);     // bcdef
echo substr('abcdef', 1, 3);  // bcd
echo substr('abcdef', 0, 4);  // abcd
echo substr('abcdef', 0, 8);  // abcdef
echo substr('abcdef', -1, 1); // f

$string = 'abcdef';
echo $string[0];                 // a
echo $string[3];                 // d
echo $string[strlen($string)-1]; // f

$var = 'ABCDEFGH:/MNRPQR/';
echo "Оригинал: $var<hr />\n";
/* Обе следующих строки заменяют всю строку $var на 'bob'. */
echo substr_replace($var, 'bob', 0) . "<br />\n";
echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n";
/* Вставляет 'bob' в начало $var. */
echo substr_replace($var, 'bob', 0, 0) . "<br />\n";
/* Обе следующих строки заменяют 'MNRPQR' в $var на 'bob'. */
echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
echo substr_replace($var, 'bob', -7, -1) . "<br />\n";

$str = 'abcdef';
echo strlen($str); // 6
$str = ' ab cd ';
echo strlen($str); // 7

define("CONSTANT", "Здравствуй, мир.");
echo CONSTANT; // выводит "Здравствуй, мир."
echo Constant; // выводит "Constant" и предупреждение.

class A {
// const definition must be inside the scope of one class.
const CONSTA = "Здравствуй, мир.";
const CONSTANTA = "A custom variable";
const CONSTANT = 2547;
}

// switch ($_SERVER['REQUEST_URI']) {
//     case '/':
//         # code...
//         require_once realpath(__DIR__).'/../views/index.php';
//         break;
//     case '/about':
//         # code...
//         require_once realpath(__DIR__).'/../views/about.php';
//         break;
//     case '/blog':
//         # code...
//         require_once realpath(__DIR__).'/../views/blog.php';
//         break;
//     default:
//         # code...
//         $url = $_SERVER['REQUEST_URI'];
//                  echo $url;
// }
