<?php require_once('initialize.php');

class ProductItems extends DatabaseObject {

    protected static $table_name="product_items";
    public $id;
    public $category_id;
    public $name;
    public $price;
    public $image;
    public $item_desc;
    public $currency;

    public function create() {
        global $database;

        $sql  = "INSERT INTO ";
        $sql .= self::$table_name . " (";
        $sql .= " category_id, name, price, currency, image, item_desc ";
        $sql .= ") VALUES ('";
        $sql .= $database->escapeValue($this->category_id) . "', '";
        $sql .= $database->escapeValue($this->name) . "', '";
        $sql .= $database->escapeValue($this->price) . "', '";
        $sql .= $database->escapeValue($this->currency) . "', '";
        $sql .= $database->escapeValue($this->image) . "', '";
        $sql .= $database->escapeValue($this->item_desc) . "') ";

        if($database->query($sql)){ 
            $this->id = $database->insertID();
            return true;
        } else {
            return false;
        }
    }
    public function update() {
        global $database;

        $sql_query  = "UPDATE " . self::$table_name . " SET ";
        $sql_query .= "name='" . $database->escapeValue($this->name) . "', ";
        $sql_query .= "price='" . $database->escapeValue($this->price) . "', ";
        $sql_query .= "image='" . $database->escapeValue($this->image) . "', ";
        $sql_query .= "currency='" . $database->escapeValue($this->currency) . "', ";
        $sql_query .= "item_desc='" . $database->escapeValue($this->item_desc) . "' ";
        $sql_query .= "WHERE id=" . $database->escapeValue($this->id);
        $database->query($sql_query);
        return ($database->affectedRows() == 1) ? true : false;
    }
    public function delete() {
        global $database;

        $sql_query = "DELETE FROM " .self::$table_name . " ";
        $sql_query .= "WHERE id=" . $database->escapeValue($this->id);
        $sql_query .= " LIMIT 1";
        $database->query($sql_query);
        if(($database->affectedRows() == 1)) {
            return true;
        } else {
            return false;
        }


    }
    public static function SelectRandomRows($n) {
        global $database;

        $sql = "SELECT * FROM ";
        $sql .= self::$table_name;
        $sql .= " ORDER BY RAND() LIMIT ";
        $sql .= $n;

        $object_array = self::findBySQLQuery($sql);
        if(!empty($object_array)) {
            return $object_array;
        } else {
            return false;
        }

    }

}