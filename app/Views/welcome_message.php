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
  <section class="section-block" style="padding: 34px 30px; margin-bottom: 22px; background: linear-gradient(135deg, #ffffff 0%, #f6fbfc 100%); border-color: #cfe8ec;">
    <div style="font-size: 12px; font-weight: 700; color: var(--mint); margin-bottom: 8px;">서울 강남구 역삼동 · 공공데이터 기반</div>
    <h1 style="font-size: 34px; font-weight: 800; line-height: 1.25; letter-spacing: -0.8px; color: var(--ink); margin-bottom: 12px;">
      내 주변 의료 서비스를<br>한 번에 찾아보세요
    </h1>
    <p style="font-size: 14px; color: var(--ink3); max-width: 760px; margin-bottom: 18px;">
      전국 13개 카테고리의 병원, 약국, 의료기기, 산후조리원 정보를 한 화면에서 빠르게 탐색할 수 있습니다.
    </p>

    <div style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 10px;">
      <?php foreach ([
          ['hospitals', '내 주변 병원', 'hospital'],
          ['clinics', '동네 의원', 'stethoscope'],
          ['pharmacies', '약국 찾기', 'pill'],
          ['emergency-transport', '응급 이송', 'ambulance'],
      ] as $quick): ?>
        <a href="<?= site_url($quick[0]) ?>" style="display: flex; align-items: center; justify-content: center; gap: 6px; text-align: center; min-height: 56px; border: 1px solid var(--line); border-radius: 12px; background: #fff; font-size: 13px; font-weight: 700; color: var(--ink2);">
          <span style="color: var(--mint);"><?= icon($quick[2], ['size' => 16]) ?></span>
          <?= esc($quick[1]) ?>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <div style="margin-bottom: 22px;">
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6686738239613464"
         data-ad-slot="1204098626"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
  </div>

  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px; align-items: start;">
    <section class="section-block" style="padding: 20px;">
      <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px;">
        <h2 style="font-size: 20px; font-weight: 800; letter-spacing: -0.3px; display: flex; align-items: center; gap: 6px;"><?= icon('menu', ['size' => 18]) ?>카테고리 바로가기</h2>
        <span style="font-size: 12px; color: var(--ink4);">전체 보기</span>
      </div>
      <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px;">
        <?php foreach ([
            ['hospitals', '전국 병원', 'hospital'],
            ['clinics', '전국 의원', 'stethoscope'],
            ['pharmacies', '전국 약국', 'pill'],
            ['otc-stores', '안전상비의약품', 'shield'],
            ['device-sales', '의료기기판매임대', 'building'],
            ['device-repair', '의료기기수리', 'check'],
            ['optical-shops', '안경업', 'search'],
            ['postpartum', '산후조리업', 'heart'],
        ] as $category): ?>
          <a href="<?= site_url($category[0]) ?>" style="display: flex; align-items: center; gap: 6px; padding: 12px 12px; border: 1px solid var(--line); border-radius: 12px; font-size: 13px; font-weight: 700; color: var(--ink2); background: #fff;">
            <span style="color: var(--mint);"><?= icon($category[2], ['size' => 15]) ?></span>
            <?= esc($category[1]) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section-block" style="padding: 20px;">
      <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px;">
        <h2 style="font-size: 20px; font-weight: 800; letter-spacing: -0.3px; display:flex; align-items:center; gap:6px;"><?= icon('hospital', ['size' => 18]) ?>최신 등록 병원</h2>
        <a href="<?= site_url('hospitals') ?>" style="font-size: 12px; color: var(--ink4);">전체 목록</a>
      </div>
      <div style="display: flex; flex-direction: column; gap: 10px;">
        <?php foreach ($latestHospitals as $hospital): ?>
          <a href="<?= site_url('hospitals/' . $hospital['id']) ?>" style="display: block; padding: 12px; border: 1px solid var(--line); border-radius: 12px; background: #fff;">
            <div style="font-size: 14px; font-weight: 800; color: var(--ink); margin-bottom: 4px;">
              <?= esc($hospital['business_name']) ?>
            </div>
            <div style="font-size: 12px; color: var(--ink3); margin-bottom: 4px;">
              <?= esc($hospital['lot_address'] ?: ($hospital['road_address'] ?? '-')) ?>
            </div>
            <span class="chip">상세 보기</span>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  </div>

  <div style="margin-top: 22px;">
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
  @media (max-width: 920px) {
    main > section > div[style*='repeat(4'] { grid-template-columns: repeat(2, minmax(0, 1fr)) !important; }
    main > div[style*='grid-template-columns: 1fr 1fr'] { grid-template-columns: 1fr !important; }
  }
</style>

<?= view('includes/footer') ?>
