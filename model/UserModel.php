<?php
class UserModel extends Model
{
    // Mengambil semua pengguna
    public function getAllUsers()
    {
        $sql = 'SELECT * FROM users ORDER BY id DESC';
        return $this->mysqli->query($sql);
    }

    // Menambahkan pengguna baru
    public function insertUser($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        $this->mysqli->query($sql);
    }

    // Mengambil pengguna berdasarkan ID
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        return $this->mysqli->query($sql);
    }

    // Memperbarui informasi pengguna
    public function updateUser($id, $username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET username = '$username', password = '$hashedPassword' WHERE id = $id";
        $this->mysqli->query($sql);
    }

    // Menghapus pengguna berdasarkan ID
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = $id";
        $this->mysqli->query($sql);
    }
}
?>
