<?php
require ROOT.'/bootstrap/connection.php';

// $connection = new PDO('mysql:host=localhost;dbname=myshop;charset=utf8', 'dev', 'ghbdtn');

// if ($connection){
//   $sql = 'SELECT * FROM posts';
//   $result = $connection->query($sql);
// }

// try {
//     $connection = new PDO("pgsql:host=localhost;port=5432;dbname=myshop; user=dev; password=ghbdtn");
//
//     $sql = 'SELECT * FROM posts';
//     $result = $connection->query($sql);
//
//     $dbh = null;
// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }


// try {
//   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//   $sql = 'SELECT * FROM posts';
//   $result = $connection->query($sql);
// } catch (Exception $e) {
//   echo "Ошибка: " . $e->getMessage();
// }

// try {
//   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//   $result = $connection->query('SELECT * from posts');
//   //Установка fetch mode
//   $result->setFetchMode(PDO::FETCH_ASSOC);
//
// } catch (Exception $e) {
//   echo "Ошибка: " . $e->getMessage();
// }

try {
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $result = $connection->query('SELECT * from posts');

} catch (Exception $e) {
  echo "Ошибка: " . $e->getMessage();
}
