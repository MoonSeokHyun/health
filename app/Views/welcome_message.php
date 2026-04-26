<?php
echo view('includes/header', [
    'seoTitle' => $seoTitle ?? null,
    'seoDescription' => $seoDescription ?? null,
    'seoKeywords' => $seoKeywords ?? null,
    'canonicalUrl' => $canonicalUrl ?? null,
    'config' => $config ?? [],
    'type' => $type ?? 'hospitals',
]);
?>

<main class="container">
    <!-- 메인 히어로 섹션 -->
    <section style="text-align: center; padding: 4rem 1rem; background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); border-radius: var(--radius); color: #fff; margin-bottom: 3rem;">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 1.5rem; letter-spacing: -0.05em;">당신의 건강을 위한<br/>모든 의료 서비스 정보</h1>
        <p style="font-size: 1.25rem; opacity: 0.9; margin-bottom: 2.5rem; max-width: 600px; margin-left: auto; margin-right: auto;">
            전국 13개 카테고리의 병원, 약국, 의료기기, 산후조리원 등 공공데이터 기반의 정확한 정보를 실시간으로 확인하세요.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= site_url('hospitals') ?>" style="background: #fff; color: var(--primary); padding: 1rem 2rem; border-radius: 999px; font-weight: 800; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">병원 찾기</a>
            <a href="<?= site_url('pharmacies') ?>" style="background: rgba(255,255,255,0.2); color: #fff; padding: 1rem 2rem; border-radius: 999px; font-weight: 800; backdrop-filter: blur(10px);">약국 찾기</a>
        </div>
    </section>

    <!-- 메인 광고 -->
    <div style="margin-bottom: 3rem;">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6686738239613464"
             data-ad-slot="1204098626"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <!-- 카테고리 퀵 링크 -->
        <section class="section-block">
            <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem;">인기 의료 서비스</h2>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                <a href="<?= site_url('hospitals') ?>" style="padding: 1.5rem; border: 1px solid var(--line); border-radius: 1rem; text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🏥</div>
                    <div style="font-weight: 700;">병원</div>
                </a>
                <a href="<?= site_url('clinics') ?>" style="padding: 1.5rem; border: 1px solid var(--line); border-radius: 1rem; text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🩺</div>
                    <div style="font-weight: 700;">의원</div>
                </a>
                <a href="<?= site_url('pharmacies') ?>" style="padding: 1.5rem; border: 1px solid var(--line); border-radius: 1rem; text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">💊</div>
                    <div style="font-weight: 700;">약국</div>
                </a>
                <a href="<?= site_url('postpartum') ?>" style="padding: 1.5rem; border: 1px solid var(--line); border-radius: 1rem; text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">👶</div>
                    <div style="font-weight: 700;">산후조리업</div>
                </a>
            </div>
        </section>

        <!-- 최신 등록 정보 -->
        <section class="section-block">
            <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem;">최신 등록 병원</h2>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <?php foreach ($latestHospitals as $hospital): ?>
                <a href="<?= site_url('hospitals/' . $hospital['id']) ?>" style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 0.75rem; border-bottom: 1px solid #f1f5f9;">
                    <div>
                        <div style="font-weight: 700;"><?= esc($hospital['business_name']) ?></div>
                        <div style="font-size: 0.875rem; color: var(--muted);"><?= esc($hospital['lot_address'] ?: $hospital['road_address']) ?></div>
                    </div>
                    <div style="font-size: 0.75rem; color: var(--primary); font-weight: 600;">상세보기 ›</div>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <!-- 하단 광고 -->
    <div style="margin-top: 3rem;">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6686738239613464"
             data-ad-slot="1204098626"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
</main>

<style>
    @media (max-width: 768px) {
        main > div { grid-template-columns: 1fr !important; }
    }
    .section-block a:hover { border-color: var(--primary); background: #f0fdfa; }
</style>

<?= view('includes/footer') ?>
