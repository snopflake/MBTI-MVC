<?php include 'view/layout/header.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('assets/images/background2.png'); /* Background image */
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        color: #333;
    }

    .container {
        width: 80%;
        max-width: 500px;
        margin: 50px auto;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    .container h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: left; /* Rata kiri untuk teks label */
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
    }

    .form-group input,
    .form-group textarea {
        width: calc(100% - 20px); /* Panjang input disesuaikan dengan container */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        margin: auto; /* Membuat input field lebih proporsional */
    }

    .container input[type="submit"] {
        background-color: #66bb6a;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }

    .container input[type="submit"]:hover {
        background-color: #57a95b;
    }

    .back-button {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        font-size: 16px;
    }

    .back-button:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="container">
    

    <h2>Upload Data MBTI</h2>
    <button class="back-button" onclick="window.location.href='?c=Mbti&m=index';">&#8592; </button>
        <form action="?c=Mbti&m=insert" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="mbti">Tipe MBTI</label>
                <input type="text" id="mbti" name="mbti" required>
            </div>

            <div class="form-group">
                <label for="gambar">Unggah Gambar</label>
                <input type="file" id="gambar" name="gambar" required>
            </div>

            <div class="form-group">
                <label for="motto">Motto Hidup</label>
                <textarea id="motto" name="motto" rows="4"></textarea>
            </div>

            <input type="submit" value="Upload Data">
        </form>
</div>

<?php include 'view/layout/footer.php'; ?>
