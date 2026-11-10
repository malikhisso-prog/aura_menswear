<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'فلسفتنا';
$pageDesc  = 'فلسفة الـ Old Money في AURA.';

require_once __DIR__ . '/includes/header.php';
?>

<style>
    .philosophy-full { padding: 160px 8% 100px; }
    .lead-text { font-size: 1.4rem; line-height: 1.8; color: var(--text-light); text-align: center; margin-bottom: 60px; font-family: var(--font-heading); }
    .philosophy-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
    .philosophy-item { background: var(--bg-card); padding: 40px 30px; border: 1px solid rgba(255, 255, 255, 0.05); border-top: 2px solid var(--burgundy); transition: var(--transition); }
    .philosophy-item:hover { transform: translateY(-5px); border-color: rgba(255, 255, 255, 0.1); border-top-color: var(--gold); }
    .philosophy-item h3 { font-family: var(--font-heading); color: var(--gold); font-size: 1.5rem; margin-bottom: 15px; }
    .philosophy-item p { color: var(--text-muted); line-height: 1.7; }
    @media (max-width: 768px) { .philosophy-grid { grid-template-columns: 1fr; } }
</style>

<section class="philosophy-full">
    <div class="container">
        <div class="section-header">
            <h2>فلسفة الـ Old Money</h2>
            <div class="divider" style="background: var(--burgundy); width: 80px; height: 1px; margin: 20px auto;"></div>
        </div>

        <div class="philosophy-content-large">
            <p class="lead-text">
                نحن لا نتبع صيحات الموضة العابرة. في AURA، نؤمن بأن الأناقة الحقيقية تكمن في البساطة، جودة الخامات، ودقة القصّات.
            </p>
            
            <div class="philosophy-grid">
                <div class="philosophy-item">
                    <h3>الجودة قبل كل شيء</h3>
                    <p>نختار أقمشتنا من أفضل المصانع في إيطاليا وإنجلترا، ونصنع كل قطعة يدوياً لتبقى معك لعقود.</p>
                </div>
                <div class="philosophy-item">
                    <h3>التفاصيل هي الفخامة</h3>
                    <p>كل زر، كل خيط، وكل تطريز هو نتيجة عمل دقيق وحرفية عالية. التفاصيل الصغيرة هي ما تصنع الفرق الكبير.</p>
                </div>
                <div class="philosophy-item">
                    <h3>إرث ينتقل عبر الأجيال</h3>
                    <p>نصنع قطعاً كلاسيكية خالدة، لا ترتبط بزمن أو صيحة. كل قطعة هي استثمار في إرثك الشخصي.</p>
                </div>
                <div class="philosophy-item">
                    <h3>الأناقة الهادئة</h3>
                    <p>الأناقة الحقيقية لا تصرخ. نحن نصمم إطلالات هادئة، راقية، وواثقة، تعكس شخصية الرجل العصري.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>