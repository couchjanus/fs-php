<?php
require MODELS.'Post.php';

// $connection = new PDO('mysql:host=localhost;dbname=myshop;charset=utf8', 'dev', 'ghbdtn');
//
// if ($connection){
//   $sql = 'SELECT * FROM posts';
//   $result = $connection->query($sql);
// }
// var_dump($result);

// $connection = new PDO("pgsql:host=localhost;port=5432;dbname=myshop; user=dev; password=ghbdtn");
// //
// try{
// $sql = $connection->prepare("INSERT INTO posts(title,content) VALUES (:title,:content)");
// $sql->bindParam(':title',$s1);
// $sql->bindParam(':content',$s2);

// назначение значений и вставка новой строки

// $s1='The following example uses prepared statements.';

// $s1=$connection->quote('Заключает строку в кавычки для использования в запросе');

// $s2 = $connection->quote("PDO::quote() заключает строку в кавычки (если требуется) и экранирует специальные символы внутри строки подходящим для драйвера способом. Если вы используете эту функцию для построения SQL запросов, настоятельно рекомендуется пользоваться методом PDO::prepare() для подготовки запроса с псевдопеременными вместо использования PDO::quote() для вставки данных введенных пользователем в SQL запрос. Подготавливаемые запросы с параметрами не только компактней, удобней, устойчивей к SQL инъекциям, но и работают быстрее, нежели вручную построенные запросы, так как и клиент и сервер могут кэшировать такие запросы в уже скомпилированном виде. Не все PDO драйверы реализуют этот метод (особенно PDO_ODBC). Предполагается, что вместо него будут использоваться подготавливаемые запросы.");

// $s2='The following example uses prepared statements.';

// $sql->execute();
//
// $s1='пример использования метода bindParam';
// $s2='пример использования метода bindParam';
// $sql->execute();
// }
// catch(PDOException $e) {
// $connection->rollBack();
// echo 'Error : '.$e->getMessage();
// }

// $connection->exec("INSERT INTO posts(title,content) VALUES ('The following example uses prepared statements.', 'The following example uses prepared statements.'");


view('home/index', ['title'=>'HOME PAGE 1', 'posts' =>  $result]);
