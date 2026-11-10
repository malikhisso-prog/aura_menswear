<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'الشروط والأحكام';
$pageDesc  = 'شروط وأحكام استخدام موقع AURA.';

require_once __DIR__ . '/includes/header.php';
?>

<style>
    /* تنسيقات خاصة بالصفحات القانونية */
    .legal-page { padding: 160px 0 100px; }
    .legal-content { 
        max-width: 800px; 
        margin: 0 auto; 
        background: var(--bg-card); 
        padding: 50px; 
        border: 1px solid rgba(255, 255, 255, 0.05); 
        border-top: 2px solid var(--burgundy); 
    }
    .legal-content h1 { 
        font-family: var(--font-heading); 
        font-size: 2.5rem; 
        color: var(--gold); 
        margin-bottom: 30px; 
        text-align: center; 
    }
    .legal-content h3 { 
        font-family: var(--font-heading); 
        font-size: 1.4rem; 
        color: var(--gold); 
        margin-top: 30px; 
        margin-bottom: 15px; 
    }
    .legal-content p { 
        color: var(--text-muted); 
        line-height: 1.8; 
        margin-bottom: 15px; 
    }
    .legal-date { 
        margin-top: 40px; 
        font-size: 14px; 
        color: var(--gold); 
        text-align: left; 
        border-top: 1px solid rgba(255, 255, 255, 0.1); 
        padding-top: 20px; 
    }
</style>

<section class="legal-page">
    <div class="container">
        <div class="legal-content">
            <h1>الشروط والأحكام</h1>
            
            <p>مرحباً بك في <strong>AURA Menswear</strong>. باستخدامك لهذا الموقع، فإنك توافق على الشروط والأحكام التالية. يرجى قراءتها بعناية.</p>
            
            <h3>1. الطلبات والدفع</h3>
            <p>يتم تأكيد الطلبات بعد التحقق من توفر المنتجات. نحتفظ بالحق في رفض أو إلغاء أي طلب لأي سبب. حالياً، نعتمد طريقة الدفع عند الاستلام.</p>
            
            <h3>2. الأسعار</h3>
            <p>جميع الأسعار المعروضة هي بالدولار الأمريكي (USD) وتشمل الضرائب المطبقة. نحتفظ بالحق في تغيير الأسعار في أي وقت دون إشعار مسبق.</p>
            
            <h3>3. الشحن والتوصيل</h3>
            <p>نسعى لتوصيل الطلبات في الوقت المحدد. أوقات التوصيل قد تتأثر بالظروف الجوية أو أي ظروف خارجة عن إرادتنا.</p>
            
            <h3>4. الاستبدال والإرجاع</h3>
            <p>يمكنك استبدال المنتج أو إرجاعه خلال 14 يوماً من الاستلام، بشرط أن يكون المنتج بحالته الأصلية مع الغلاف والتغليف.</p>
            
            <h3>5. الملكية الفكرية</h3>
            <p>جميع محتويات الموقع (نصوص، صور، تصاميم) هي ملكية حصرية لـ AURA Menswear، ولا يجوز استخدامها دون إذن كتابي مسبق.</p>
            
            <p class="legal-date">آخر تحديث: <?= date('Y-m-d') ?></p>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>