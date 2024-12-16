<?php
class MbtiController
{
    private $mbtiModel;

    public function __construct()
    {
        if (!isset($_SESSION['loggedin'])) {
            header('Location: ?c=Auth&m=loginForm');
            exit();
        }

        $this->mbtiModel = new MbtiModel(); // Memanggil model
    }
    // Menampilkan data pada beranda
    public function index()
    {
        $mbtis = $this->mbtiModel->getAll();
        include 'view/mbti/index.php';
    }

    public function detail($id = null)
    {
        if (!$id) {
            die("ID tidak diberikan. Pastikan URL menyertakan parameter id.");
        }
    
        $mbtis = $this->mbtiModel->getById($id);
    
        if (!$mbtis) {
            die("Data tidak ditemukan untuk ID yang diberikan.");
        }
    
        include 'view/mbti/detail.php';
    }
    

    public function uploadForm()
    {
        include 'view/mbti/insert.php'; // View untuk form upload
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $mbti = $_POST['mbti'];
            $motto = $_POST['motto'];
            $gambar = $_FILES['gambar']['name'];

            // Pastikan direktori upload ada
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Buat direktori jika belum ada
            }

            // Proses upload gambar ke folder uploads
            if ($gambar) {
                $filePath = $uploadDir . basename($gambar);
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $filePath)) {
                    $gambar = $filePath; // Simpan path lengkap untuk database
                } else {
                    die("Gagal mengunggah gambar.");
                }
            } else {
                $gambar = ''; // Kosongkan jika tidak ada file diunggah
            }

            // Insert data ke database melalui model
            if ($this->mbtiModel->insert($nama, $mbti, $gambar, $motto)) {
                header('Location: ?c=Mbti&m=index'); // Redirect ke halaman index
                exit;
            } else {
                die("Gagal menyimpan data.");
            }
        } else {
            die("Metode request tidak valid.");
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            die("ID tidak diberikan.");
        }

        $mbtis = $this->mbtiModel->getById($id);

        if (!$mbtis) {
            die("Data tidak ditemukan.");
        }

        // Muat view untuk form update
        include 'view/mbti/update.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $mbti = $_POST['mbti'];
            $gambar = $_FILES['gambar']['name'] ?: $_POST['gambar_lama']; // Gunakan gambar lama jika tidak diunggah baru
            $motto = $_POST['motto'];

            // Pastikan direktori upload ada
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Buat direktori jika belum ada
            }

            if ($_FILES['gambar']['name']) {
                $filePath = $uploadDir . basename($gambar);
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $filePath)) {
                    $gambar = $filePath; // Simpan path lengkap untuk database
                } else {
                    die("Gagal mengunggah gambar baru.");
                }
            }

            // Proses update ke database
            if ($this->mbtiModel->update($id, $nama, $mbti, $gambar, $motto)) {
                header('Location: ?c=Mbti&m=index'); // Redirect ke halaman index
                exit;
            } else {
                die("Gagal menyimpan perubahan.");
            }
        } else {
            die("Akses tidak valid.");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            // Hapus data dari database
            $mbti = $this->mbtiModel->getById($id);
            if ($mbti) {
                // Hapus file gambar jika ada
                if (!empty($mbti['gambar']) && file_exists($mbti['gambar'])) {
                    unlink($mbti['gambar']); // Hapus file dari server
                }

                if ($this->mbtiModel->delete($id)) {
                    header('Location: ?c=Mbti&m=index'); // Redirect ke halaman index
                    exit;
                } else {
                    die("Gagal menghapus data.");
                }
            } else {
                die("Data tidak ditemukan.");
            }
        } else {
            die("Metode request tidak valid.");
        }
    }
}
