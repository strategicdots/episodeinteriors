<?php require_once('initialize.php');

class ProductCategories extends DatabaseObject {

    protected static $table_name="categories";
    public $id;
    public $name;
    public $cover_image;

    public function create() {
        global $database;

        $sql  = "INSERT INTO ";
        $sql .= self::$table_name . "( ";
        $sql .= "name, cover_image";
        $sql .= " ) VALUES ( '";
        $sql .= $database->escapeValue($this->name) . "', '";
        $sql .= $database->escapeValue($this->cover_image) . "') ";

        if($database->query($sql)) {
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
        $sql_query .= "cover_image='" . $database->escapeValue($this->cover_image) . "' ";
        $sql_query .= "WHERE id=" . $database->escapeValue($this->id);
        $database->query($sql_query);
        return ($database->affectedRows() == 1) ? true : false;
    }
    public function delete() {
        global $database;

        $sql  = "DELETE FROM " .self::$table_name;
        $sql .= " WHERE id=" . $database->escapeValue($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        if(($database->affectedRows() == 1)) {
            return true;
        } else {
            return false;
        }
    }
    public static function footerCategories() {
        global $database;

        $sql  = "SELECT * FROM " . self::$table_name;
        $sql .= " LIMIT 6";

        $object_array = self::findBySQLQuery($sql);
        if(!empty($object_array)) {
            return $object_array;
        } else {
            return false;
        }
    }

}