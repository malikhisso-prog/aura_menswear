<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'الصفحة غير موجودة';
$pageDesc  = 'عذراً، الصفحة التي تبحث عنها غير موجودة.';

require_once __DIR__ . '/includes/header.php';
?>

<style>
    /* تنسيقات خاصة بصفحة الخطأ 404 */
    .error-page { 
        height: 100vh; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        text-align: center; 
        background: linear-gradient(rgba(18, 18, 18, 0.9), rgba(18, 18, 18, 0.95)), 
                    url('https://images.unsplash.com/photo-1593030761757-71fae45fa0e7?q=80&w=2000&auto=format&fit=crop') center/cover; 
    }
    .error-content { max-width: 600px; padding: 0 20px; }
    .error-code { 
        font-family: var(--font-heading); 
        font-size: 8rem; 
        color: var(--burgundy); 
        line-height: 1; 
        margin-bottom: 20px; 
        text-shadow: 0 5px 15px rgba(94, 26, 36, 0.3);
    }
    .error-content h2 { 
        font-family: var(--font-heading); 
        font-size: 2.5rem; 
        color: var(--gold); 
        margin-bottom: 15px; 
    }
    .error-content p { 
        color: var(--text-muted); 
        font-size: 1.1rem; 
        margin-bottom: 30px; 
        line-height: 1.8;
    }
</style>

<section class="error-page">
    <div class="error-content">
        <div class="error-code">404</div>
        <h2>عذراً، الصفحة غير موجودة</h2>
        <p>يبدو أنك وصلت إلى صفحة غير متوفرة أو تم نقلها. لا تقلق، يمكنك العودة إلى الرئيسية واكتشاف مجموعتنا الحصرية.</p>
        <a href="<?= url('index.php') ?>" class="btn-classic">العودة إلى الرئيسية</a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>