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

    .content-box {
        padding: 20px;
        background-color: rgba(240, 240, 240, 0.95); 
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15); 
        text-align: center;
    }

    .mbti-title {
        font-size: 1.8rem; 
        color: #333;
        margin-bottom: 20px;
    }

    img {
        width: 60%; 
        height: auto;
        border-radius: 20px; 
        margin-bottom: 20px;
    }

    .description {
        font-size: 1.2rem;
        line-height: 1.6;
        color: #555; 
        margin-bottom: 20px;
        text-align: justify;
    }

    .famous-characters {
        display: flex;
        justify-content: center;
        flex-wrap: wrap; 
        gap: 15px;
        margin-bottom: 20px;
    }

    .famous-character {
        font-size: 1rem;
        font-style: italic;
        color: #444;
        text-align: center;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-size: 1rem;
    }

    .btn:hover {
        background-color: #45a049; 
    }

</style>

<div class="container">
    <div class="content-box">
        <h2 class="mbti-title"><?php echo htmlspecialchars($mbtiDetail['name']); ?></h2>
        <img src="<?php echo htmlspecialchars($mbtiDetail['image']); ?>" alt="<?php echo htmlspecialchars($mbtiDetail['name']); ?>">
        <p class="description"><?php echo htmlspecialchars($mbtiDetail['description']); ?></p>

        <h3>Karakter Terkenal</h3>
        <div class="famous-characters">
            <?php 
            $famousCharacters = explode(',', $mbtiDetail['famous_characters']);
            foreach ($famousCharacters as $character): ?>
                <span class="famous-character"><?php echo htmlspecialchars(trim($character)); ?></span>
            <?php endforeach; ?>
        </div>

        <a href="?c=Info&m=index" class="btn">Kembali ke Daftar</a>
    </div>
</div>

