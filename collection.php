<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'The Collection';
$pageDesc  = 'اكتشف مجموعتنا الحصرية من الملابس الرجالية الكلاسيكية.';

$products = getProducts();
$currentCat = $_GET['cat'] ?? '';
if ($currentCat) {
    $products = array_filter($products, fn($p) => $p['category'] === $currentCat);
}

require_once __DIR__ . '/includes/header.php';
?>

<style>
    /* تنسيقات خاصة بصفحة المتجر (عشان التصميم يظبط) */
    .page-header { padding: 160px 0 60px; text-align: center; background: linear-gradient(rgba(18, 18, 18, 0.9), rgba(94, 26, 36, 0.3)), url('https://images.unsplash.com/photo-1593030761757-71fae45fa0e7?q=80&w=2000&auto=format&fit=crop') center/cover; }
    .page-header h1 { font-family: var(--font-heading); font-size: 3.5rem; color: var(--gold); margin-bottom: 15px; }
    .page-header p { color: var(--text-muted); font-size: 1.1rem; }
    
    .filters-wrapper { display: flex; justify-content: center; gap: 15px; margin-bottom: 50px; flex-wrap: wrap; }
    .filter-btn { padding: 10px 25px; border: 1px solid rgba(197, 160, 89, 0.3); color: var(--text-light); font-size: 14px; transition: var(--transition); }
    .filter-btn:hover, .filter-btn.active { background: var(--burgundy); color: var(--text-light); border-color: var(--burgundy); }

    .empty-state { text-align: center; padding: 80px 20px; background: var(--bg-card); border-radius: 8px; border: 1px solid var(--burgundy); }
    .empty-state i { font-size: 50px; color: var(--burgundy); margin-bottom: 20px; }
    .empty-state h3 { margin-bottom: 10px; font-family: var(--font-heading); font-size: 1.8rem; }
    .empty-state p { color: var(--text-muted); margin-bottom: 25px; }
</style>

<section class="page-header">
    <div class="container">
        <h1>The Collection</h1>
        <p>قطع أساسية خالدة لكل رجل يقدّر التفاصيل</p>
    </div>
</section>

<section class="collection section-padding">
    <div class="container">
        <div class="filters-wrapper">
            <a href="<?= url('collection.php') ?>" class="filter-btn <?= empty($currentCat) ? 'active' : '' ?>">الكل</a>
            <a href="<?= url('collection.php?cat=suits') ?>" class="filter-btn <?= $currentCat === 'suits' ? 'active' : '' ?>">بدلات</a>
            <a href="<?= url('collection.php?cat=shirts') ?>" class="filter-btn <?= $currentCat === 'shirts' ? 'active' : '' ?>">قمصان</a>
            <a href="<?= url('collection.php?cat=accessories') ?>" class="filter-btn <?= $currentCat === 'accessories' ? 'active' : '' ?>">إكسسوارات</a>
            <a href="<?= url('collection.php?cat=shoes') ?>" class="filter-btn <?= $currentCat === 'shoes' ? 'active' : '' ?>">أحذية</a>
        </div>

        <?php if (empty($products)): ?>
            <div class="empty-state">
                <i class="fa-solid fa-box-open"></i>
                <h3>لا توجد منتجات حالياً</h3>
                <p>لم نعثر على أي منتجات في هذا التصنيف.</p>
                <a href="<?= url('collection.php') ?>" class="btn-classic">عرض كل المنتجات</a>
            </div>
        <?php else: ?>
            <div class="grid-container">
                <?php foreach ($products as $product): ?>
                    <div class="product-card fade-in">
                        <div class="img-wrapper">
                            <a href="<?= url('product.php?id=' . $product['id']) ?>">
                                <img src="<?= $product['image'] ?>" alt="<?= clean($product['name']) ?>" loading="lazy">
                            </a>
                        </div>
                        <div class="product-info">
                            <span class="product-cat"><?= clean($product['category_name']) ?></span>
                            <h3><?= clean($product['name']) ?></h3>
                            <div class="price-box">
                                <span class="price"><?= formatPrice($product['price']) ?></span>
                                <?php if (!empty($product['old_price'])): ?>
                                    <span class="old-price"><?= formatPrice($product['old_price']) ?></span>
                                <?php endif; ?>
                            </div>
                            <a href="<?= url('product.php?id=' . $product['id']) ?>" class="btn-add" style="display:block; text-align:center;">عرض التفاصيل</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>