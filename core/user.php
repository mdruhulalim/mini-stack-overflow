<?php
require_once 'core/database.php';
class Users extends Database {
    // users insert SQL query
    public function insert($username, $email, $password){
        // Escape special characters to prevent SQL injection
        $username = $this->conn->real_escape_string($username);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);

        // Hash the password
        $hashed_password = md5($password);

        // Prepare SQL statement
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // Execute SQL statement
        if ($stmt->execute()) {
        return true;
        } else {
        echo "Error: " . $stmt->error;
        return false;
        }
    }

    // check previous userExists
    public function userExists($username,$email){
        $query = "SELECT email FROM users WHERE username = ? or email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        $numRows = $stmt->num_rows;
        $stmt->close();
        return $numRows > 0;
    }

    // check username and password for create login system
    public function login($username, $password){
        $password = md5($password);
        $query = "SELECT * FROM `users` WHERE username = '$username' and password = '$password'";
        $rejult = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($rejult)>0);
        return mysqli_fetch_assoc($rejult);
    }
}
?>
