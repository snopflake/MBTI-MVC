<?php

class InfoController
{
    private $infoModel;

    public function __construct()
    {

        if (!isset($_SESSION['loggedin'])) {
            header('Location: ?c=Auth&m=loginForm');
            exit();
        }

        $this->infoModel = new InfoModel();
    }

    // Menampilkan semua tipe MBTI
    public function index()
    {
        $mbtiTypes = $this->infoModel->getAllTypes();
        include 'view/info/info.php'; // File untuk menampilkan daftar tipe MBTI
    }

    // Menampilkan detail tipe MBTI
    public function detail()
    {
        $type = $_GET['type'] ?? null;

        if (!$type) {
            die("Tipe tidak diberikan.");
        }

        $mbtiDetail = $this->infoModel->getTypeDetail($type);

        if (!$mbtiDetail) {
            die("Tipe MBTI tidak ditemukan.");
        }

        include 'view/info/detail.php'; // File untuk menampilkan detail tipe MBTI
    }
}
