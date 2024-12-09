<?php

class UserModel extends Model {

    // Fungsi untuk mengambil data user berdasarkan ID
    public function getUserById($id) {
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param('i', $id); // 'i' untuk integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Fungsi untuk menambahkan user baru
    public function addUser($username, $password) {
        $stmt = $this->mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param('ss', $username, $hashedPassword); // 'ss' untuk dua string
        $stmt->execute();
    }
}

?>
