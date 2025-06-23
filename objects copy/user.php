<?php

class User{

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


    public function __construct($db) {
		$this->conn = $db;
	}

 function credentialExists() {
    // SQL query to check for existing username
    $query = "SELECT id, firstname, mobile_number, address, user_type, email_address, password, status
              FROM " . $this->table_name . "
              WHERE username = ?
              LIMIT 1";

    // Prepare the query
    $stmt = $this->conn->prepare($query);

    // Sanitize the input
    $this->username = htmlspecialchars(strip_tags($this->username));

    // Bind the username parameter
    $stmt->bindParam(1, $this->username);

    // Execute the query
    $stmt->execute();

    // Check if a record was found
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Assign values to object properties
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->mobile_number = $row['mobile_number'];
        $this->address = $row['address'];
        $this->user_type = $row['user_type'];
        $this->email_address = $row['email_address'];
        $this->password = $row['password'];
        $this->status = $row['status'];

        return true;
    }

    return false;
}
 

}

?>
