<?php require_once('initialize.php');

class Admin extends DatabaseObject {

    protected static $table_name="admin";
    public $name;
    public $email;
    public $password;
    public $id;

    public function name() {
        if(isset($this->name)) {
            return $this->name;
        } else {
            return "";
        }
    }
    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }
    public function create() {
        global $database;
        $hashed_password = password_encrypt($this->password);

        $sql_query = "INSERT INTO " . self::$table_name . " ( ";
        $sql_query .= "name, email, password ";
        $sql_query .= ") VALUES ('";
        $sql_query .= $database->escapeValue($this->name) . "', '";
        $sql_query .= $database->escapeValue($this->email) . "', '";
        $sql_query .= $hashed_password . "')";

        if($database->query($sql_query)) {
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
        $sql_query .= "email='" . $database->escapeValue($this->email) . "', ";
        $sql_query .= "WHERE id=" . $database->escapeValue($this->id);
        $database->query($sql_query);
        return ($database->affectedRows() == 1) ? true : false;
    }
    public function delete() {
        global $database;
        $database->startTransaction();

        $sql_query = "DELETE FROM" .self::$table_name . " ";
        $sql_query .= "WHERE id=" . $database->escapeValue($this->id);
        $sql_query .= " LIMIT 1";
        $database->query($sql_query);
        if(($database->affectedRows() == 1)) {
            return true;
        } else {
            return false;
        }

        $database->endTransaction();

    }
    public static function findDetails($id) {
        global $database;
        $sql = "SELECT * FROM " . self::$table_name . " WHERE id = '{$database->escapeValue($id)}' LIMIT 1";
        $result_array = $database->fetchArray($database->query($sql));
        $object_array = self::instantiate($result_array);
        return $object_array;
    }
    public static function findByEmail($email) {
        global $database;
        $sql = "SELECT * FROM " . self::$table_name . " WHERE email = '{$database->escapeValue($email)}' LIMIT 1";
        $result_array = $database->fetchArray($database->query($sql));
        $object_array = self::instantiate($result_array);
        return $object_array;
    }
    public static function findAllAccounts() {
        global $database;
        $sql = "SELECT * FROM " . self::$table_name;
        return $database->numRows($database->query($sql));
    }

}