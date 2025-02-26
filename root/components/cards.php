<?php
// Variabel untuk halaman home (meja)
$table_name = "Meja 1";
$table_capacity = 4;

// Variabel untuk halaman menu
$menu_name = "Nasi Goreng Spesial";
$menu_rating = 4.5;
$menu_desc = "Nasi goreng dengan topping spesial dan tambahan telur mata sapi.";
$menu_price = 25000;

// Variabel untuk halaman kasir
$cashier_table = $table_name;

// Variabel untuk halaman edit produk
$product_name = $menu_name;
$product_price = $menu_price;

// Variabel untuk halaman dapur
$order_qty = 2;
?>


<?php
// Simpan data meja reguler dan VIP
$tables_reg = [
    ["name" => "Meja 1", "capacity" => 4],
    ["name" => "Meja 2", "capacity" => 2],
    ["name" => "Meja 3", "capacity" => 2],
    ["name" => "Meja 4", "capacity" => 2],
    ["name" => "Meja 5", "capacity" => 2],
    ["name" => "Meja 6", "capacity" => 6]
];

$tables_vip = [
    ["name" => "VIP 1", "capacity" => 4],
    ["name" => "VIP 2", "capacity" => 6],
    ["name" => "VIP 3", "capacity" => 6],
    ["name" => "VIP 4", "capacity" => 6],
    ["name" => "VIP 5", "capacity" => 6],
    ["name" => "VIP 6", "capacity" => 6]
];

function generateTableCards($tables, $type) {
    $output = '';

    foreach ($tables as $table) {
        $table_name = $table['name'];
        $table_capacity = $table['capacity'];
        $card_class = ($type === 'VIP') ? 'table-card-vip' : 'table-card-reg';

        $output .= '
        <div class="card ' . $card_class . '">
            <img src="#" alt="Table Image" class="card-header">
            <div class="card-content">
                <h3 class="card-title">' . htmlspecialchars($table_name) . '</h3>
                <div class="card-capacity">
                    <p><strong>Kapasitas</strong></p>
                    <div class="capacity-content">
                        <img src="#" alt="Capacity Icon" class="capacity-icon">
                        <p class="capacity-text">' . htmlspecialchars($table_capacity) . ' Orang</p>
                    </div>
                </div>
                <button class="btn btn-primary qrcode">Dapatkan Kode QR</button>
            </div>
        </div>';
    }

    return $output; // ✅ Mengembalikan string HTML, bukan langsung mencetaknya
}
?>


<div class="cards">
    <!-- Card untuk halaman menu -->
    <div class="card menu-card">
        <img src="#" alt="Menu Image" class="card-header">
        <div class="card-content">
            <div class="title">
                <h3 class="card-title" id="menu_name"><?php echo $menu_name; ?></h3>
                <div class="rating">
                    <img src="#" alt="Rating Icon" class="icon">
                    <p id="menu_rating"><?php echo $menu_rating; ?></p>
                </div>
            </div>
            <div class="menu-description">
                <p id="menu_desc"><?php echo $menu_desc; ?></p>
            </div>
            <div class="cost-count">
                <div class="cost">
                    <h3 id="menu_price"><?php echo "Rp." . number_format($menu_price, 0, ',', '.'); ?></h3>
                </div>
                <div class="count">
                    <div class="counter" id="plus">+</div>
                    <p id="menu_qty">0</p>
                    <div class="counter" id="minus">-</div>
                </div>
            </div>
            <button class="btn btn-primary">
                Tambah Ke Daftar
            </button>
        </div>
    </div>

    <!-- Card untuk halaman kasir -->
    <div class="card cashier-card">
        <img src="#" alt="Cashier Image" class="card-header">
        <h3 class="card-title" id="cashier_table"><?php echo $table_name; ?></h3>
        <button class="btn btn-primary">
            Bayar
        </button>
    </div>

    <!-- Card untuk halaman Edit Produk -->
    <div class="card product-card">
        <img src="#" alt="Product Image" class="card-header">
        <h3 class="card-title" id="product_name"><?php echo $menu_name; ?></h3>
        <div class="cost">
            <img src="#" alt="Cost Icon" class="icon">
            <p id="product_price"><?php echo "Rp." . number_format($menu_price, 0, ',', '.'); ?></p>
        </div>
        <div class="button-card">
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Hapus</button>
        </div>
    </div>

    <!-- Card untuk item pesanan di dapur -->
    <div class="card kitchen-card">
        <img src="#" alt="Kitchen Image" class="card-header">
        <div class="content">
            <h3 id="kitchen_item"><?php echo $menu_name; ?></h3>
            <div class="detail">
                <img src="#" alt="Order Icon" class="icon">
                <p>Jumlah</p>
                <p id="kitchen_qty"><?php echo $order_qty; ?></p>
            </div>
        </div>
    </div>
</div>



