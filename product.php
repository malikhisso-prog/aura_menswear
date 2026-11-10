<?php
require_once __DIR__ . '/includes/config.php';

$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = getProductById($productId);

if (!$product) {
    header('Location: ' . url('collection.php'));
    exit;
}

$pageTitle = $product['name'];
$pageDesc  = $product['description'];

require_once __DIR__ . '/includes/header.php';
?>

<style>
    .breadcrumb { margin-bottom: 40px; font-size: 14px; color: var(--text-muted); }
    .breadcrumb a { color: var(--text-light); }
    .breadcrumb a:hover { color: var(--gold); }
    .breadcrumb span { margin: 0 10px; }
    .breadcrumb .current { color: var(--gold); }

    .product-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start; }
    .main-image { width: 100%; height: 600px; background: var(--bg-card); border: 1px solid rgba(255, 255, 255, 0.05); border-bottom: 3px solid var(--burgundy); }
    .main-image img { width: 100%; height: 100%; object-fit: cover; }
    .product-info-box { padding-top: 20px; }
    .product-title { font-family: var(--font-heading); font-size: 2.8rem; color: var(--gold); margin: 10px 0 20px; }
    .price-large { font-size: 2rem; color: var(--text-light); font-weight: 600; margin-left: 15px; }
    .product-desc { color: var(--text-light); font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px; }
    .product-details-text { color: var(--text-muted); font-size: 1rem; margin-bottom: 30px; }

    .product-actions { display: flex; gap: 20px; margin-bottom: 30px; }
    .quantity-box { display: flex; border: 1px solid var(--burgundy); height: 50px; }
    .qty-btn { width: 40px; background: transparent; color: var(--text-light); font-size: 20px; cursor: pointer; transition: var(--transition); }
    .qty-btn:hover { background: var(--burgundy); }
    .quantity-box input { width: 50px; text-align: center; background: transparent; border: none; color: var(--text-light); font-family: var(--font-body); font-size: 16px; }
    .add-to-cart-btn { flex: 1; height: 50px; display: flex; align-items: center; justify-content: center; gap: 10px; }

    .product-meta p { display: flex; align-items: center; gap: 10px; color: var(--text-muted); margin-bottom: 10px; font-size: 14px; }
    .product-meta i { color: var(--burgundy); }
</style>

<section class="product-details section-padding" style="padding-top: 160px;">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?= url('index.php') ?>">الرئيسية</a>
            <span>/</span>
            <a href="<?= url('collection.php') ?>">المجموعة</a>
            <span>/</span>
            <span class="current"><?= clean($product['name']) ?></span>
        </div>

        <div class="product-grid">
            <div class="product-gallery">
                <div class="main-image">
                    <img src="<?= $product['image'] ?>" alt="<?= clean($product['name']) ?>">
                </div>
            </div>

            <div class="product-info-box">
                <span class="product-cat"><?= clean($product['category_name']) ?></span>
                <h1 class="product-title"><?= clean($product['name']) ?></h1>
                
                <div class="price-box">
                    <span class="price-large"><?= formatPrice($product['price']) ?></span>
                    <?php if (!empty($product['old_price'])): ?>
                        <span class="old-price"><?= formatPrice($product['old_price']) ?></span>
                    <?php endif; ?>
                </div>

                <p class="product-desc"><?= clean($product['description']) ?></p>
                <p class="product-details-text"><?= clean($product['details']) ?></p>

                <div class="divider" style="margin: 30px 0; width: 100%;"></div>

                <div class="product-actions">
                    <div class="quantity-box">
                        <button type="button" class="qty-btn" onclick="changeQty(-1)">-</button>
                        <!-- ضفنا id عشان نقدر نتحكم بالكمية -->
                        <input type="number" id="qty-input" value="1" min="1" readonly>
                        <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                    </div>
                    <button class="btn-classic add-to-cart-btn" onclick="addToCart(<?= $product['id'] ?>)">
                        أضف إلى السلة <i class="fa-solid fa-bag-shopping"></i>
                    </button>
                </div>

                <div class="product-meta">
                    <p><i class="fa-solid fa-check"></i> صناعة يدوية فاخرة</p>
                    <p><i class="fa-solid fa-truck-fast"></i> توصيل سريع</p>
                    <p><i class="fa-solid fa-rotate-left"></i> استبدال خلال 14 يوم</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // 1. دالة تغيير الكمية
    function changeQty(change) {
        const input = document.getElementById('qty-input');
        let currentVal = parseInt(input.value);
        let newVal = currentVal + change;
        
        if (newVal < 1) newVal = 1; // ما ينزل عن 1
        input.value = newVal;
    }

    // 2. دالة الإضافة للسلة (مع الكمية الجديدة)
    function addToCart(id) {
        const qty = document.getElementById('qty-input').value; // جلب الكمية المختارة
        
        fetch('<?= url('cart_action.php') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=add&id=' + id + '&qty=' + qty
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                alert('تمت إضافة ' + qty + ' إلى السلة بنجاح!');
                location.reload(); // تحديث الصفحة عشان العداد يتحدث
            } else {
                alert(data.message);
            }
        });
    }
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>