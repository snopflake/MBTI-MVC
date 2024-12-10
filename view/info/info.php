<?php include 'view/layout/header.php'; ?>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('assets/images/background2.png');
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
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.7); /* Lebih redup */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Menjadi 2 kolom */
            gap: 20px;
        }

        .grid-item {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .grid-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .grid-item span {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        footer {
            margin-top: 20px;
        }

        footer p {
            color: #777;
        }
</style>

<div class="container">
    <h2>Macam Tipe Kepribadian MBTI</h2>
    <div class="grid-container">
        <?php foreach ($mbtiTypes as $type): ?>
            <div class="grid-item">
                <a href="?c=Info&m=detail&type=<?php echo htmlspecialchars($type['type']); ?>">
                    <img src="<?php echo htmlspecialchars($type['image']); ?>" alt="<?php echo htmlspecialchars($type['name']); ?>">
                    <span><?php echo htmlspecialchars($type['name']); ?></span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'view/layout/footer.php'; ?>
