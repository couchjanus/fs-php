<?php

/**
 * Модель для работы с товарами
 */
class Product {

    //Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 2;

    /**
     * Выводит списко всех товраов
     *
     * @return array
     */

    public static function index() {

        $con = Connection::make();
        // $con->exec("set names utf8");

        $sql = "
                SELECT * FROM products
                ORDER BY id ASC
                ";

        $res = $con->query($sql);

        $products = $res->fetchAll(PDO::FETCH_ASSOC);
        return $products;

    }

    /**
     * Добавление продукта
     *
     * @param $options - характеристики товара
     * @return int|string
     */
    public static function addProduct ($options) {

        $con = Connection::make();

        // "SELECT fields FROM products ORDER BY id DESC LIMIT 1";
        
        // $res = $con->query("SELECT id FROM products ORDER BY id DESC LIMIT 1");
        
        $res = $con->prepare("SELECT id FROM products ORDER BY id DESC LIMIT 1");
        $res->execute();
        $pic = $res->fetch(PDO::FETCH_ASSOC)['id']+1;
        // $pic = $con->query("SELECT id FROM products ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC)+1;
        
        $sql = "
                INSERT INTO products(name, category_id, code, price, brand, description, is_new, status, picture)
                VALUES (:name, :category_id, :code, :price, :brand, :description, :is_new, :status, :picture)
                ";


        $res = $con->prepare($sql);
        $pic = $pic.'.jpg';
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':category_id', $options['category'], PDO::PARAM_INT);
        $res->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $res->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $res->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $res->bindParam(':picture', $pic, PDO::PARAM_STR);
        //Если запрос выполнен успешно
        if ($res->execute()) {
            //Возвращаем id последней записи, позже, в контроллере переходим на страницу этого товара, если все успешно
            return $con->lastInsertId();
        } else {
            return NULL;
        }
    }

    /**
     * Получаем последние товары
     *
     * @param int $page
     * @return array
     */
    public static function getLatestProducts ($page = 1) {

        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $con = Connection::make();

        $sql = "
                SELECT *
                  FROM products
                    WHERE status = 1
                      ORDER BY id DESC
                        LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $res = $con->prepare($sql);
        $res->bindParam(':limit', $limit, PDO::PARAM_INT);
        $res->bindParam(':offset', $offset, PDO::PARAM_INT);

        //Выполняем запрос
        $res->execute();

        //Получаем и возвращаем результат
        $products = $res->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

     /**
     * Выбираем товар по идентификатору
     *
     * @param $productId
     * @return mixed
     */
    public static function getProductById ($productId) {

        $con = Connection::make();

        $sql = "
               SELECT * FROM products
                    WHERE id = :id
               ";

        $res = $con->prepare($sql);
        $res->bindParam(':id', $productId, PDO::PARAM_INT);
        $res->execute();

        $product = $res->fetch(PDO::FETCH_ASSOC);

        return $product;
    }

    /**
     * Выборка товаров по массиву id
     *
     * @param $arrayIds
     * @return array
     */
    public static function getProductsByIds ($arrayIds) {

        $con = Connection::make();

        //Разбиваем пришедший массив в строку

        $stringIds = implode(',', $arrayIds);

        $sth = $con->prepare("SELECT * FROM products WHERE status = 1 AND id IN ($stringIds)");
        
        $sth->execute();

        $products = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    
     /**
     * Изменение товара
     *
     * @param $id
     * @param $options
     * @return bool
     */
    public static function update ($id, $options) {

        $con = Connection::make();

        $sql = "
                UPDATE products
                SET
                    name = :name,
                    category_id = :category,
                    code = :code,
                    price = :price,
                    brand = :brand,
                    description = :description,
                    is_new = :is_new,
                    status = :status,
                    picture = :picture
                WHERE id = :id
                ";

        $res = $con->prepare($sql);

        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':category', $options['category'], PDO::PARAM_INT);
        $res->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $res->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $res->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':picture', $id.'.jpg', PDO::PARAM_STR);

        return $res->execute();
    }

    /**
     * Удаление товара(админка)
     *
     * @param $id
     * @return bool
     */

    public static function delete ($id) {
        $con = Connection::make();

        $sql = "
                DELETE FROM products WHERE id = :id
                ";

        $res = $con->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

     /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage ($id) {

        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = "/media/products/";

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '/' . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    /**
     * Общее кол-во товаров в магазине
     *
     * @return mixed
     */
    public static function getTotalProducts () {

        // Соединение с БД
        $db = Connection::make();

        // Текст запроса к БД
        $sql = "SELECT count(id) AS count FROM products WHERE status=1 ";

        // Выполнение коменды
        $res = $db->query($sql);

        // Возвращаем значение count - количество
        $row = $res->fetch();
        return $row['count'];
    }

}
