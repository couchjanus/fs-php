 <?php

// $connection = new PDO('mysql:host=localhost;dbname=myshop;charset=utf8', 'dev', 'ghbdtn');

// try {
//
//   $connection = new PDO('mysql:host=localhost;dbname=myshop;charset=utf8', 'dev', 'ghbdtn');
//
// } catch (Exception $e) {
//   die("Не удалось подключиться: " . $e->getMessage());
// }


// $connection = new PDO("pgsql:host=localhost;port=5432;dbname=myshop; user=dev; password=ghbdtn");

try {
  $connection = new PDO("pgsql:host=localhost;port=5432;dbname=myshop; user=dev; password=ghbdtn");

} catch (Exception $e) {
  die("Не удалось подключиться: " . $e->getMessage());
}
