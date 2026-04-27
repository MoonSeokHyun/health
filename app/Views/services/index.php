<?php
$items = $items ?? [];
$pager = $pager ?? null;
$search = $search ?? '';
$config = $config ?? [];
$type = $type ?? 'hospitals';

echo view('includes/header', [
    'seoTitle' => $seoTitle,
    'seoDescription' => $seoDescription,
    'seoKeywords' => $seoKeywords,
    'canonicalUrl' => $canonicalUrl,
    'search' => $search,
    'type' => $type,
    'config' => $config,
]);
?>

<main class="container">
  <div style="margin-bottom: 18px;">
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6686738239613464"
         data-ad-slot="1204098626"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
  </div>

  <div class="breadcrumb">
    <a href="<?= site_url('/') ?>">홈</a>
    <span>›</span>
    <span><?= esc($config['title'] ?? '목록') ?></span>
  </div>

  <section class="section-block" style="padding: 22px;">
    <div style="display: flex; justify-content: space-between; align-items: end; gap: 12px; margin-bottom: 16px; border-bottom: 1px solid var(--line); padding-bottom: 12px;">
      <div>
        <h1 style="font-size: 28px; font-weight: 800; letter-spacing: -0.6px; color: var(--ink); margin-bottom: 5px; display:flex; align-items:center; gap:8px;">
          <span style="color: var(--mint);"><?= icon('search', ['size' => 22]) ?></span>
          <?= $search !== '' ? '"' . esc($search) . '" 검색 결과' : esc($config['title'] ?? '목록') ?>
        </h1>
        <p style="font-size: 13px; color: var(--ink3);">
          <?= esc($config['subtitle'] ?? '공공 데이터 기반 의료 정보') ?>
        </p>
      </div>
      <span class="chip">실시간 최신 데이터</span>
    </div>

    <?php if (empty($items)): ?>
      <div style="text-align: center; padding: 64px 20px;">
        <div style="color: var(--ink4); margin-bottom: 8px;"><?= icon('search', ['size' => 48]) ?></div>
        <p style="font-size: 15px; color: var(--ink3);">검색 결과가 없습니다. 다른 키워드로 검색해 보세요.</p>
      </div>
    <?php else: ?>
      <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(290px, 1fr)); gap: 12px;">
        <?php foreach ($items as $item): ?>
          <?php
            $address = $item['road_address'] ?: ($item['lot_address'] ?? '주소 정보 없음');
            $status = (string)($item['business_status_name'] ?? '상태불명');
            $isOpen = str_contains($status, '정상');
          ?>
          <a href="<?= site_url($type . '/' . $item['id']) ?>" style="display: block; border: 1px solid var(--line); border-radius: 14px; background: #fff; padding: 14px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; gap: 8px;">
              <span class="chip <?= $isOpen ? 'is-open' : '' ?>" style="<?= $isOpen ? '' : 'color:#ef4444;border-color:#ffd5d9;background:#fff;' ?>display:inline-flex;align-items:center;gap:4px;">
                <?= icon($isOpen ? 'check' : 'close', ['size' => 11]) ?>
                <?= esc($status) ?>
              </span>
              <span style="font-size: 11px; color: var(--ink4); display:inline-flex; align-items:center; gap:2px;">상세 보기 <?= icon('chevron-right', ['size' => 11]) ?></span>
            </div>

            <h2 style="font-size: 16px; font-weight: 800; color: var(--ink); line-height: 1.35; margin-bottom: 7px;">
              <?= esc($item['business_name']) ?>
            </h2>
            <div style="display:flex; gap:5px; margin-bottom: 9px;">
              <span style="color:var(--mint); margin-top:1px;"><?= icon('location', ['size' => 13]) ?></span>
              <p style="font-size: 12px; color: var(--ink3); line-height: 1.5; min-height: 36px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                <?= esc($address) ?>
              </p>
            </div>
            <div style="font-size: 12px; color: var(--ink2); font-weight: 700; border-top: 1px solid #edf4f7; padding-top: 8px; display:flex; align-items:center; gap:5px;">
              <span style="color:var(--mint);"><?= icon('phone', ['size' => 13]) ?></span>
              <?= esc($item['phone_number'] ?? '전화번호 정보 없음') ?>
            </div>
          </a>
        <?php endforeach; ?>
      </div>

      <?php if ($pager): ?>
        <div style="margin-top: 24px;">
          <?= $pager->links('default', 'custom_pager') ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </section>

  <div style="margin-top: 18px;">
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6686738239613464"
         data-ad-slot="1204098626"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
  </div>
</main>

<?= view('includes/footer') ?>
