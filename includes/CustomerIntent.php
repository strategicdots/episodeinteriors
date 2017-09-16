<?php require_once('initialize.php');

class CustomerIntent extends DatabaseObject {

    protected static $table_name="cust_intent_msgs";
    public $id;
    public $customerName;
    public $email;
    public $content;
    public $productItem;

    public function create() {
        global $database;

        $sql  = "INSERT INTO ";
        $sql .= self::$table_name . " (";
        $sql .= " customerName, email, content, productItem ";
        $sql .= ") VALUES ('";
        $sql .= $database->escapeValue($this->customerName) . "', '";
        $sql .= $database->escapeValue($this->email) . "', '";
        $sql .= $database->escapeValue($this->content) . "', '";
        $sql .= $database->escapeValue($this->productItem) . "') ";

        if($database->query($sql)) {
            $this->id = $database->insertID();
            return true;
        } else {
            return false;
        }        
    }
    public function delete() {
        global $database;

        $sql  = "DELETE FROM " . self::$table_name;
        $sql .= " WHERE id=" . $database->escapeValue($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return($database->affectedRows() == 1) ? true : false;

    }



}