<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'تواصل معنا';
$pageDesc  = 'تواصل مع فريق AURA لأي استفسار.';

$messageSent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $messageSent = true;
}

require_once __DIR__ . '/includes/header.php';
?>

<style>
    /* تنسيقات صفحة التواصل */
    .contact-page { padding-top: 160px; padding-bottom: 100px; }
    .contact-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: 50px; }
    .contact-box { background: var(--bg-card); padding: 30px; text-align: center; margin-bottom: 20px; border: 1px solid rgba(255, 255, 255, 0.05); border-bottom: 2px solid var(--burgundy); }
    .contact-box i { font-size: 30px; color: var(--gold); margin-bottom: 15px; }
    .contact-box h4 { font-family: var(--font-heading); color: var(--gold); font-size: 1.2rem; margin-bottom: 5px; }
    .contact-box p { color: var(--text-muted); }
    
    .contact-form { background: var(--bg-card); padding: 50px; border: 1px solid rgba(255, 255, 255, 0.05); }
    .form-group { margin-bottom: 25px; }
    .form-group label { display: block; margin-bottom: 10px; color: var(--text-light); font-weight: 600; }
    .form-group input, .form-group textarea { width: 100%; padding: 15px; background: var(--bg-main); border: 1px solid rgba(255, 255, 255, 0.1); color: var(--text-light); font-family: var(--font-body); font-size: 15px; transition: var(--transition); }
    .form-group input:focus, .form-group textarea:focus { outline: none; border-color: var(--burgundy); }
    
    .alert-success { text-align: center; padding: 40px 20px; }
    .alert-success i { font-size: 60px; color: #2e7d32; margin-bottom: 20px; }
    .alert-success h3 { font-family: var(--font-heading); font-size: 1.8rem; color: var(--gold); margin-bottom: 10px; }
    .alert-success p { color: var(--text-muted); }
</style>

<section class="contact-page">
    <div class="container">
        <div class="section-header">
            <h2>تواصل معنا</h2>
            <p>فريق خدمة العملاء لدينا جاهز لمساعدتك في أي وقت.</p>
        </div>

        <div class="contact-grid">
            <div class="contact-info">
                <div class="contact-box">
                    <i class="fa-solid fa-location-dot"></i>
                    <h4>العنوان</h4>
                    <p>Mayfair, London, UK</p>
                </div>
                <div class="contact-box">
                    <i class="fa-solid fa-envelope"></i>
                    <h4>البريد الإلكتروني</h4>
                    <p><?= SITE_EMAIL ?></p>
                </div>
                <div class="contact-box">
                    <i class="fa-solid fa-phone"></i>
                    <h4>الهاتف</h4>
                    <p dir="ltr"><?= SITE_PHONE ?></p>
                </div>
            </div>

            <div class="contact-form">
                <?php if ($messageSent): ?>
                    <div class="alert-success">
                        <i class="fa-solid fa-check-circle"></i>
                        <h3>شكراً لتواصلك!</h3>
                        <p>تم استلام رسالتك بنجاح. سيتواصل معك فريقنا قريباً.</p>
                        <a href="<?= url('contact.php') ?>" class="btn-classic" style="margin-top:20px;">إرسال رسالة أخرى</a>
                    </div>
                <?php else: ?>
                    <form action="<?= url('contact.php') ?>" method="POST">
                        <div class="form-group">
                            <label>الاسم الكامل</label>
                            <input type="text" name="name" required placeholder="اسمك الكريم">
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input type="email" name="email" required placeholder="email@example.com">
                        </div>
                        <div class="form-group">
                            <label>الرسالة</label>
                            <textarea name="message" rows="5" required placeholder="كيف يمكننا مساعدتك؟"></textarea>
                        </div>
                        <button type="submit" class="btn-classic" style="width:100%;">إرسال الرسالة</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>