<?php
// Data pesanan contoh (biasanya diambil dari database)
$pesanan = [
    ["nama_menu" => "Nasi Goreng"],
    ["nama_menu" => "Mie Ayam"],
    ["nama_menu" => "Es Teh Manis"]
];

// Menghitung total harga contoh (biasanya diambil dari database)
$subtotal = 50000;
$pajak = $subtotal * 0.1; // 10% pajak
$server_fee = 2000;
$total_harga = $subtotal + $pajak + $server_fee;
?>



<footer id="footer">
    <!-- Footer Basic -->
    <div class="foot-basic">
        <img src="../assets/images/logo.png" alt="Logo" class="logo-foot">
    </div>

    <!-- Footer Order -->
    <div class="foot-order">
        <div class="left-side">
            <img src="#" alt="Icon Order" class="foot-icon">
            <div class="left-content">
                <h3 class="menu-qty"><?php echo count($pesanan); ?> Menu</h3> <!-- Diisi dari database -->
                <p class="menu-name truncate">
                    <?php echo implode(", ", array_column($pesanan, 'nama_menu')); ?>
                </p> <!-- Diisi dari database -->
            </div>
        </div>

        <div class="right-side">
            <div class="left-content">
                <h3 class="cost">Rp. <?php echo number_format($total_harga, 0, ',', '.'); ?></h3> <!-- Diisi dari database -->
                <div class="detail">
                    <p class="text-detail">Lihat lebih detail</p>
                    <a href="#"></a> <!-- Disini taruh icon chevron -->
                </div>
                <div class="cost-detail">
                    <p class="text-detail">Sub Total</p>
                    <span><p>Rp. <?php echo number_format($subtotal, 0, ',', '.'); ?></p></span> <!-- Diisi dari database -->

                    <p class="text-detail">Pajak</p>
                    <span><p>Rp. <?php echo number_format($pajak, 0, ',', '.'); ?></p></span> <!-- Diisi dari database -->

                    <p class="text-detail">Server Fee</p>
                    <span><p>Rp. <?php echo number_format($server_fee, 0, ',', '.'); ?></p></span> <!-- Diisi dari database -->
                </div>
            </div>
            <button class="btn btn-checkout">Checkout</button>
        </div>
    </div>
</footer>
