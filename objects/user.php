<?php

class User {

    private $table_name = "users";
    private $conn;

    public $id;
    public $lastname;
    public $firstname;
    public $username;
    public $password;
    public $contact_number;
    public $email;
    public $role;
    public $access_code;
    public $user_type;
    public $address;
    public $reset_password_attempt;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    function credentialExists() {
        $query = "SELECT id, firstname, contact_number, address, user_type, email, password, status
                  FROM " . $this->table_name . "
                  WHERE username = ? OR contact_number = ?
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->contact_number);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id             = $row['id'];
            $this->firstname      = $row['firstname'];
            $this->contact_number  = $row['contact_number'];
            $this->address        = $row['address'];
            $this->user_type      = $row['user_type'];
            $this->email          = $row['email'];
            $this->password       = $row['password'];
            $this->status         = $row['status'];

            return true;
        }

        return false;
    }

    function emailExists() {
        $query = "SELECT id, firstname, contact_number, address, user_type,email, password, status
                  FROM " . $this->table_name . "
                  WHERE email = ?
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->email_address = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id             = $row['id'];
            $this->firstname      = $row['firstname'];
            $this->contact_number = $row['contact_number'];
            $this->address        = $row['address'];
            $this->user_type      = $row['user_type'];
            $this->email          = $row['email'];
            $this->password       = $row['password'];
            $this->status         = $row['status'];

            return true;
        }
        return false;
    }

    function isEmailExists(){
        
        $query = "SELECT id FROM " . $this->table_name . " WHERE email = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
    }

    function isContactExists(){
        
        $query = "SELECT id FROM " . $this->table_name . " WHERE contact_number = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->email_address = htmlspecialchars(strip_tags($this->contact_number));
        $stmt->bindParam(1, $this->contact_number);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
    }

    function createAccount(){

        $query = "INSERT INTO 
            " . $this->table_name . " 
            SET
            email=:email,
            contact_number=:contact_number,
            lastname=:lastname,
            password=:password,
            access_code=:access_code";

        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->contact_number = htmlspecialchars(strip_tags($this->contact_number));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->access_code = htmlspecialchars(strip_tags($this->access_code));

        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contact_number', $this->contact_number);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':access_code', $this->access_code);

        if ($stmt->execute()) {
           return true;
        }
        else{
            return false;
        }
    }

    function insertToken(){
                $query = "UPDATE 
            " . $this->table_name . " 
            SET
            access_code=:access_code
            WHERE 
            email = :email";

            $stmt = $this->conn->prepare($query);

            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->access_code = htmlspecialchars(strip_tags($this->access_code));

            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':access_code', $this->access_code);

        if ($stmt->execute()) {
           return true;
        }
        else{
            return false;
        }
    }

    function resetPasswordCount(){

        $query = "SELECT id, reset_password_attempt FROM " . $this->table_name . " WHERE email = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['reset_password_attempt'];
        } else {
            return false;
        }
    }

    function incrementResetAttempt() {
        $query = "UPDATE " . $this->table_name . " 
                SET reset_password_attempt = reset_password_attempt + 1 
                WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
    }

    function accessCodeExists() {
        $query = "SELECT id, access_code, email, firstname, lastname
                  FROM " . $this->table_name . "
                  WHERE access_code = ? AND id = ?";

        $stmt = $this->conn->prepare($query);

        $this->access_code = htmlspecialchars(strip_tags($this->access_code));
        $this->id =  htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->access_code);
        $stmt->bindParam(2, $this->id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->email  = $row['email'];
            $this->firstname  = $row['firstname'];
            $this->lastname  = $row['lastname'];
            return true;
        }
        return false;
    }

    function updatePassword() {
        $query = "UPDATE " . $this->table_name . " 
                SET 
                password=:password
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        //sanitize the inputs
        $this->password = htmlspecialchars(strip_tags($this->password));

        // hash the password before saving it
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':password', $password_hash);
        $stmt->bindParam(':id', $this->id);
        
        return $stmt->execute();
    }


}
?>
