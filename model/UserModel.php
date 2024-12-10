<?php
class UserModel extends Model
{
    public function getUserByUsername($username)
    {
        $username = $this->mysqli->real_escape_string($username);
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->mysqli->query($sql);

        return $result->fetch_assoc();
    }

    public function createUser($username, $email, $password)
    {
        $username = $this->mysqli->real_escape_string($username);
        $email = $this->mysqli->real_escape_string($email);
        $password = $this->mysqli->real_escape_string($password);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        return $this->mysqli->query($sql);
    }
}
?>
