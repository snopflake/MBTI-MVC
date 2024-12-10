<?php
class MbtiModel extends Model
{
    // Ambil semua data dari tabel mbti_uploads
    public function getAll()
    {
        $sql = "SELECT * FROM mbti_uploads";
        $result = $this->mysqli->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getById($id)
    {
        $id = $this->mysqli->real_escape_string($id);
        $sql = "SELECT * FROM mbti_uploads WHERE id = '$id'";
        $result = $this->mysqli->query($sql);
    
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; // Jika data tidak ditemukan
        }
    }
    
     // Mengupdate data
     public function update($id, $nama, $mbti, $gambar, $motto)
     {
         $id = $this->mysqli->real_escape_string($id);
         $nama = $this->mysqli->real_escape_string($nama);
         $mbti = $this->mysqli->real_escape_string($mbti);
         $gambar = $this->mysqli->real_escape_string($gambar);
         $motto = $this->mysqli->real_escape_string($motto);
     
         $sql = "UPDATE mbti_uploads SET nama='$nama', mbti='$mbti', gambar='$gambar', motto='$motto' WHERE id='$id'";
         return $this->mysqli->query($sql);
     }

     public function insert($nama, $mbti, $gambar, $motto)
    {
        $nama = $this->mysqli->real_escape_string($nama);
        $mbti = $this->mysqli->real_escape_string($mbti);
        $gambar = $this->mysqli->real_escape_string($gambar);
        $motto = $this->mysqli->real_escape_string($motto);

        $sql = "INSERT INTO mbti_uploads (nama, mbti, gambar, motto) 
                VALUES ('$nama', '$mbti', '$gambar', '$motto')";
        return $this->mysqli->query($sql);
    }

    // Fungsi untuk menghapus data berdasarkan ID
    public function delete($id)
    {
        $id = $this->mysqli->real_escape_string($id);
        $sql = "DELETE FROM mbti_uploads WHERE id = '$id'";
        return $this->mysqli->query($sql);
    }
     

    
}
?>
