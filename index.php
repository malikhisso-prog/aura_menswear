<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Timeless Elegance';
$pageDesc  = 'أناقة لا تصرخ، بل تُروى.';

$featuredProducts = getFeaturedProducts(3);

require_once __DIR__ . '/includes/header.php';
?>

<!-- 🚀 كود التصميم كامل ومباشر جوّا الصفحة عشان نكسر أي كاش -->
<style>
    :root {
        --bg-main: #121212; --bg-card: #1e1e1e; --bg-darker: #050505;
        --gold: #c5a059; --gold-light: #d4b47a;
        --burgundy: #5e1a24; --burgundy-light: #7a2330;
        --text-light: #f0f0f0; --text-muted: #a0a0a0;
        --font-heading: 'Playfair Display', serif; --font-body: 'Cairo', sans-serif;
        --transition: all 0.4s ease;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background-color: var(--bg-main); color: var(--text-light); font-family: var(--font-body); line-height: 1.6; overflow-x: hidden; }
    a { text-decoration: none; color: inherit; transition: var(--transition); }
    ul { list-style: none; }
    img { max-width: 100%; display: block; }
    button { font-family: inherit; cursor: pointer; border: none; background: none; }
    .container { width: 100%; max-width: 1280px; margin: 0 auto; padding: 0 24px; }

    header { position: fixed; top: 0; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 25px 8%; border-bottom: 1px solid rgba(255, 255, 255, 0.05); z-index: 1000; transition: var(--transition); background: transparent; }
    header.scrolled { background-color: var(--bg-main); padding: 15px 8%; backdrop-filter: blur(10px); border-bottom: 1px solid var(--burgundy); }
    .logo { font-family: var(--font-heading); font-size: 28px; color: var(--gold); letter-spacing: 3px; font-weight: 700; }
    nav ul { display: flex; gap: 40px; }
    nav a { font-size: 15px; position: relative; color: var(--text-light); }
    nav a::after { content: ''; position: absolute; width: 0; height: 1px; bottom: -5px; right: 0; background-color: var(--burgundy); transition: width 0.3s ease; }
    nav a:hover::after, nav a.active::after { width: 100%; }
    nav a:hover, nav a.active { color: var(--gold); }
    .header-actions { display: flex; align-items: center; gap: 25px; }
    .cart-icon, .search-icon { font-size: 18px; position: relative; cursor: pointer; color: var(--text-light); transition: var(--transition); }
    .cart-icon:hover, .search-icon:hover { color: var(--gold); transform: translateY(-2px); }
    .cart-count { position: absolute; top: -8px; right: -10px; background: var(--burgundy); color: var(--text-light); font-size: 10px; font-weight: bold; width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
    .menu-toggle { display: none; font-size: 22px; cursor: pointer; color: var(--text-light); }

    .hero { height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 0 20px; background: linear-gradient(rgba(18, 18, 18, 0.85), rgba(94, 26, 36, 0.2)), url('https://images.unsplash.com/photo-1593030761757-71fae45fa0e7?q=80&w=2000&auto=format&fit=crop') center/cover no-repeat fixed; }
    .hero-content { max-width: 800px; }
    .subtitle { font-size: 12px; letter-spacing: 5px; color: var(--gold); margin-bottom: 20px; text-transform: uppercase; }
    .hero h1 { font-family: var(--font-heading); font-size: 5rem; font-weight: 400; margin-bottom: 20px; color: var(--text-light); opacity: 0; transform: translateY(20px); animation: fadeInUp 1.2s ease forwards; animation-delay: 0.5s; }
    @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
    .hero .description { font-size: 1.1rem; color: var(--text-muted); max-width: 600px; margin: 0 auto 40px; font-weight: 300; }
    .divider { width: 60px; height: 1px; background-color: var(--burgundy); margin: 20px auto; }

    .btn-classic { display: inline-block; padding: 15px 40px; background-color: transparent; color: var(--gold); border: 1px solid var(--gold); font-size: 15px; letter-spacing: 2px; transition: var(--transition); }
    .btn-classic:hover { background-color: var(--burgundy); color: var(--text-light); border-color: var(--burgundy); font-weight: 700; }

    .section-header { text-align: center; margin-bottom: 60px; }
    .section-header h2 { font-family: var(--font-heading); font-size: 3rem; color: var(--gold); margin-bottom: 10px; }
    .section-header p { color: var(--text-muted); letter-spacing: 1px; }

    .collection { padding: 120px 8%; background-color: var(--bg-main); }
    .grid-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; }
    .product-card { background-color: var(--bg-card); border: 1px solid rgba(255, 255, 255, 0.03); border-bottom: 2px solid transparent; transition: var(--transition); }
    .product-card:hover { transform: translateY(-10px); border-color: rgba(255, 255, 255, 0.1); border-bottom: 2px solid var(--burgundy); box-shadow: 0 15px 35px rgba(0,0,0,0.5); }
    .img-wrapper { overflow: hidden; height: 400px; background: #000; }
    .img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease, filter 0.8s ease; filter: grayscale(30%); }
    .product-card:hover img { transform: scale(1.08); filter: grayscale(0%); }
    .product-info { padding: 30px 25px; text-align: center; }
    .product-cat { font-size: 11px; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); display: block; margin-bottom: 8px; }
    .product-info h3 { font-family: var(--font-heading); font-size: 1.6rem; margin-bottom: 10px; color: var(--text-light); }
    .product-info p { color: var(--text-muted); font-size: 0.95rem; margin-bottom: 15px; }
    .price { color: var(--gold); font-weight: 600; font-size: 1.3rem; letter-spacing: 1px; }
    .price-box { display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 15px; }
    .old-price { color: var(--text-muted); text-decoration: line-through; font-size: 0.9rem; }
    .btn-add { background: transparent; border: 1px solid var(--gold); color: var(--gold); padding: 12px 20px; font-size: 15px; font-weight: 600; transition: var(--transition); width: 100%; }
    .btn-add:hover { background: var(--burgundy); color: var(--text-light); border-color: var(--burgundy); }

    .philosophy { padding: 140px 8%; background: linear-gradient(rgba(18, 18, 18, 0.9), rgba(94, 26, 36, 0.3)), url('https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=2000&auto=format&fit=crop') center/cover fixed; text-align: center; }
    .philosophy-content { max-width: 700px; margin: 0 auto; }
    .philosophy h2 { font-family: var(--font-heading); font-size: 3rem; color: var(--gold); margin-bottom: 20px; }
    .philosophy p { font-size: 1.1rem; line-height: 1.8; color: var(--text-light); margin-bottom: 40px; }

    footer { text-align: center; padding: 60px 20px 30px; background-color: var(--bg-darker); border-top: 1px solid var(--burgundy); }
    footer .logo { margin-bottom: 15px; color: var(--gold); }
    .footer-desc { color: var(--text-muted); margin-bottom: 20px; }
    .social-links { margin-bottom: 30px; display: flex; justify-content: center; gap: 20px; }
    .social-links a { color: var(--text-muted); font-size: 20px; }
    .social-links a:hover { color: var(--gold); transform: translateY(-3px); }
    .footer-divider { width: 50px; height: 1px; background: var(--burgundy); margin: 0 auto 20px; opacity: 0.8; }
    footer p { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 5px; }

    .fade-in { opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease, transform 0.8s ease; }
    .fade-in.visible { opacity: 1; transform: translateY(0); }

    @media (max-width: 768px) {
        .hero h1 { font-size: 3rem; }
        .hero, .philosophy { background-attachment: scroll; }
        .menu-toggle { display: block; }
        nav ul { display: none; position: absolute; top: 100%; right: 0; width: 100%; background: var(--bg-main); flex-direction: column; text-align: center; padding: 20px 0; border-bottom: 1px solid var(--burgundy); }
        nav ul.active { display: flex; }
        nav ul li { margin: 10px 0; }
    }
</style>

<!-- ═══════ HERO SECTION ═══════ -->
<section class="hero" id="home">
    <div class="hero-content">
        <p class="subtitle">EST. 1924 — LONDON</p>
        <h1>Timeless Elegance</h1>
        <div class="divider"></div>
        <p class="description">أناقة لا تصرخ، بل تُروى. مجموعات حصرية من الملابس الرجالية الكلاسيكية المصنوعة من أرقى الأقمشة، لتعكس هدوء الثراء العريق.</p>
        <a href="<?= url('collection.php') ?>" class="btn-classic">اكتشف المجموعة</a>
    </div>
</section>

<!-- ═══════ COLLECTION SECTION ═══════ -->
<section class="collection" id="collection">
    <div class="section-header">
        <h2>The Collection</h2>
        <p>قطع أساسية خالدة لكل رجل يقدّر التفاصيل</p>
    </div>
    
    <div class="grid-container">
        <?php foreach ($featuredProducts as $product): ?>
            <div class="product-card fade-in">
                <div class="img-wrapper">
                    <a href="<?= url('product.php?id=' . $product['id']) ?>">
                        <img src="<?= $product['image'] ?>" alt="<?= clean($product['name']) ?>" loading="lazy">
                    </a>
                </div>
                <div class="product-info">
                    <h3><?= clean($product['name']) ?></h3>
                    <p><?= clean($product['description']) ?></p>
                    <span class="price"><?= formatPrice($product['price']) ?></span>
                    <a href="<?= url('product.php?id=' . $product['id']) ?>" class="btn-add" style="display:block; text-align:center;">عرض التفاصيل</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ═══════ PHILOSOPHY SNIPPET ═══════ -->
<section class="philosophy" id="philosophy">
    <div class="philosophy-content fade-in">
        <h2>فلسفة الـ Old Money</h2>
        <div class="divider"></div>
        <p>نحن لا نتبع صيحات الموضة العابرة. في AURA، نؤمن بأن الأناقة الحقيقية تكمن في البساطة، جودة الخامات، ودقة القصّات. كل قطعة نصنعها مصممة لتبقى معك لعقود، لتكون إرثاً تنتقل به من جيل إلى جيل.</p>
        <a href="<?= url('philosophy.php') ?>" class="btn-classic">قصة العلامة</a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>