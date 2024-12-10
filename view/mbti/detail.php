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

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-bottom: 5px solid transparent;
            border-image: linear-gradient(to right, #ff7f50, #ffb74d, #ffd54f, #aed581, #64b5f6, #ba68c8, #ef5350) 1;
        }

        .navbar-logo img {
            width: 50px;
            height: auto;
        }

        .navbar-menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-menu li {
            margin-left: 20px;
        }

        .navbar-menu li a {
            color: black;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        .navbar-menu li a:hover {
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
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
            font-size: 20px;
        }

        .back-button:hover {
            background-color: #f0f0f0;
        }

        .result-card img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .result-card h3, .result-card p {
            margin: 10px 0;
        }

        .motto {
            font-style: italic;
            margin-top: 15px;
        }

        .motto::before, .motto::after {
            content: '"';
        }

</style>

<div class="container">
    <button class="back-button" onclick="window.location.href='?c=Mbti&m=index';">&#8592; </button>

    <h2>Detail MBTI</h2>
    <div class="result-card">
        <img src="<?php echo htmlspecialchars($mbtis['gambar']); ?>" alt="Gambar MBTI">
        <h3><?php echo htmlspecialchars($mbtis['nama']); ?></h3>
        <p>MBTI: <?php echo htmlspecialchars($mbtis['mbti']); ?></p>
        <p class="motto"><?php echo htmlspecialchars($mbtis['motto']); ?></p>
    </div>
</div>

<?php include 'view/layout/footer.php'; ?>
