<?php include 'view/layout/header.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('assets/images/background2.png'); /* Background image */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
    }

    .result-card {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
        text-align: center;
        cursor: pointer; /* Kursor menjadi pointer */
        transition: transform 0.2s ease; /* Efek animasi saat hover */
    }

    .result-card:hover {
        transform: scale(1.05); /* Memperbesar sedikit saat hover */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Efek bayangan saat hover */
    }

    .result-card img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .result-card h3, .result-card p {
        margin: 10px 0;
    }

    .btn {
        margin-top: 10px;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    .btn-danger {
        background-color: #f44336;
    }

    .button-group {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .button-group form {
        margin-right: 10px;
    }

    .logout-button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        display: inline-block;
    }
</style>


<div class="container">
    <h2>Data MBTI</h2>

    <div class="grid-container">
        <?php if (!empty($mbtis)): ?>
            <?php foreach ($mbtis as $row): ?>
                <div class="result-card" onclick="window.location.href='?c=Mbti&m=detail&id=<?php echo htmlspecialchars($row['id']); ?>'">
                    <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar MBTI">
                    <h3><?php echo htmlspecialchars($row['nama']); ?></h3>
                    <p>MBTI: <?php echo htmlspecialchars($row['mbti']); ?></p>
                    <div class="button-group">

                    <form action="?c=Mbti&m=edit&id=<?php echo htmlspecialchars($row['id']); ?>" method="post">
                         <button type="submit" class="btn">Update</button>
                    </form>


                        <form action="?c=Mbti&m=delete" method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</button>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada data MBTI yang tersimpan.</p>
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <a href="?c=Auth&m=logout" class="logout-button">Logout</a>
</div>

<?php include 'view/layout/footer.php'; ?>
