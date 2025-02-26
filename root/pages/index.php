<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <?php include('../components/notification.php'); ?>
    <style>
        .cards{
            display:none;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <?php include('../components/navbar.php'); ?>

    <!-- hero section -->
    <section class="hero-section">
        <div class="content">
            <h1>Selamat Datang Di Restoran Kami</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero recusandae eum voluptate delectus tempora voluptatum sapiente accusantium hic rem fuga eveniet repellendus, maiores nobis neque quas aliquid doloremque odio ratione.</p>
            <div class="hero-button">
                <button class="btn btn-primary" id="pesan-meja-biasa">Pesan Meja Biasa</button>
                <button class="btn btn-secondary" id="pesan-meja-vip">Pesan Meja VIP</button>
            </div>
        </div>
        <img src="#" alt="hero-image">
    </section>




    <section class="order-table-section">
        <h2>Pesan Meja Sekarang</h2>

        <!-- Cards (dipindahkan ke dalam section) -->
        <?php include_once('../components/cards.php'); ?>

        <!-- Kategori Biasa -->
        <div class="container" id="meja-biasa">
            <div class="text-item">
                <p><strong>Kategori Biasa</strong></p>
                <a href="#">Lihat Lebih Banyak</a>
            </div>
            <div class="carousel">
                <div class="button-prev"><</div>
                <?php echo generateTableCards($tables_reg, 'Reguler'); ?>
                <div class="button-next">></div>            
            </div>
        </div>

        <!-- Kategori VIP -->
        <div class="container" id="meja-vip">
            <div class="text-item" >
                <p><strong>Kategori VIP</strong></p>
                <a href="#">Lihat Lebih Banyak</a>
            </div>
            <div class="carousel">
                <div class="button-prev"><</div>
                <?php echo generateTableCards($tables_vip, 'VIP'); ?>
                <div class="button-next">></div>            
            </div>
        </div>
    </section>





    <!-- footer -->
    <?php include('../components/footer.php'); ?>




    <script src="../assets/js/scripts.js"></script>
    
</body>
</html>