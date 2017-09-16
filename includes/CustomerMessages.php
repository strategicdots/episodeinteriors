<?php require_once('initialize.php');

class CustomerMessages extends DatabaseObject {

    protected static $table_name="cust_intent_msgs";
    public $id;
    public $customerName;
    public $email;
    public $content;
    public $productItem;
    public $attend;
    public $timeSent;
    public $phoneNumber;


    public function create() {
        global $database;

        $sql  = "INSERT INTO ";
        $sql .= self::$table_name . " ( ";
        $sql .= " customerName, email, content, productItem, timeSent, phoneNumber";
        $sql .= " ) VALUES (' ";
        $sql .= $database->escapeValue($this->customerName) . "', '";
        $sql .= $database->escapeValue($this->email) . "', '";
        $sql .= $database->escapeValue($this->content) . "', '";
        $sql .= $database->escapeValue($this->productItem) . "', '";
        $sql .= $database->escapeValue($this->timeSent) . "', '";
        $sql .= $database->escapeValue($this->phoneNumber) . "') ";
        if($database->query($sql)) {
            $this->id = $database->insertID();
            return true;
        } else {
            return false;
        }   
    }
    public function delete($id) {
        global $database;
        $database->startTransaction();

        $sql_query = "DELETE FROM" .self::$table_name . " ";
        $sql_query .= "WHERE id=" . $id;
        $sql_query .= " LIMIT 1";
        $database->query($sql_query);
        if(($database->affectedRows() == 1)) {
            return true;
        } else {
            return false;
        }

        $database->endTransaction();

    }
    public function findAllRead() {
        global $database;

        $sql  = "SELECT * FROM " . self::$table_name . " WHERE attend = 1 ";

        $allRead = self::findBySQLQuery($sql);
        if(!empty($allRead)) {
            return $allRead;
        } else {
            return false;
        }
    }
    public function findAllUnread() {
        global $database;

        $sql  = "SELECT * FROM " . self::$table_name . " WHERE attend = 0";

        $allReadObjects = self::findBySQLQuery($sql);
        if(!empty($allReadObjects)) {
            return $allReadObjects;
        } else {
            return false;
        }
    }
    public function countAllUnread() {
        global $database;

        $sql  = "SELECT * FROM " . self::$table_name . " WHERE attend = 0";
        $count = $database->numRows($database->query($sql));
        if(!empty($count)) {
            return $count;
        } else {
            return false;
        }
    }
    public function markMessageRead($id) {
        global $database;

        $sql  = "UPDATE " . self::$table_name . " SET attend=1 WHERE id=";  
        $sql .= $database->escapeValue($id);
        $sql .= " LIMIT 1";
        $database->query($sql) ? true : false;
    }
    public function deleteAllReadMessages() {
        global $database;
        $database->startTransaction();

        $sql_query = "DELETE FROM " .self::$table_name . " ";
        $sql_query .= "WHERE attend = 1";

        $database->query($sql_query) ? true : false;
        $database->endTransaction();

    }



}