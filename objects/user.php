<?php

class User {

    private $table_name = "users";
    private $conn;

    public $id;
    public $lastname;
    public $firstname;
    public $username;
    public $password;
    public $mobile_number;
    public $email_address;
    public $role;
    public $user_type;
    public $address;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    function credentialExists() {
        $query = "SELECT id, firstname, mobile_number, address, user_type, email_address, password, status
                  FROM " . $this->table_name . "
                  WHERE username = ?
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $stmt->bindParam(1, $this->username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id             = $row['id'];
            $this->firstname      = $row['firstname'];
            $this->mobile_number  = $row['mobile_number'];
            $this->address        = $row['address'];
            $this->user_type      = $row['user_type'];
            $this->email_address  = $row['email_address'];
            $this->password       = $row['password'];
            $this->status         = $row['status'];

            return true;
        }

        return false;
    }

    function emailExists() {
        $query = "SELECT id, firstname, mobile_number, address, user_type, email_address, password, status
                  FROM " . $this->table_name . "
                  WHERE email_address = ?
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->email_address = htmlspecialchars(strip_tags($this->email_address));
        $stmt->bindParam(1, $this->email_address);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id             = $row['id'];
            $this->firstname      = $row['firstname'];
            $this->mobile_number  = $row['mobile_number'];
            $this->address        = $row['address'];
            $this->user_type      = $row['user_type'];
            $this->email_address  = $row['email_address'];
            $this->password       = $row['password'];
            $this->status         = $row['status'];

            return true;
        }

        return false;
    }
}
?>
