<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'سياسة الخصوصية';
$pageDesc  = 'سياسة الخصوصية الخاصة بموقع AURA.';

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
    .legal-content ul { 
        list-style: disc; 
        padding-right: 20px; 
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
            <h1>سياسة الخصوصية</h1>
            
            <p>نحن في <strong>AURA Menswear</strong> نولي أهمية كبيرة لخصوصية زوارنا وعملائنا. توضح هذه الصفحة كيفية جمعنا واستخدامنا وحمايتنا لمعلوماتك الشخصية.</p>
            
            <h3>1. المعلومات التي نجمعها</h3>
            <p>نقوم بجمع المعلومات التي تقدمها لنا طواعية عند إجراء عملية شراء أو التسجيل في نشرتنا البريدية، مثل: الاسم، رقم الهاتف، البريد الإلكتروني، والعنوان.</p>
            
            <h3>2. كيفية استخدام المعلومات</h3>
            <p>نستخدم معلوماتك فقط لمعالجة طلباتك، توصيل المنتجات، وتحسين جودة خدمتنا. لا نقوم ببيع أو مشاركة بياناتك مع أي طرف ثالث لأغراض تجارية.</p>
            
            <h3>3. حماية البيانات</h3>
            <p>نستخدم إجراءات أمنية مناسبة لحماية معلوماتك الشخصية من الوصول غير المصرح به أو التعديل أو الإفصاح.</p>
            
            <h3>4. ملفات تعريف الارتباط (Cookies)</h3>
            <p>نستخدم ملفات تعريف الارتباط لتحسين تجربة التسوق الخاصة بك، مثل تذكر محتويات سلة التسوق الخاصة بك.</p>
            
            <h3>5. التغييرات على هذه السياسة</h3>
            <p>قد نقوم بتحديث سياسة الخصوصية من وقت لآخر. ننصحك بمراجعة هذه الصفحة بشكل دوري للاطلاع على أي تغييرات.</p>
            
            <p class="legal-date">آخر تحديث: <?= date('Y-m-d') ?></p>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>