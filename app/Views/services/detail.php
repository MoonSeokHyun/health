<?php
$item = $item ?? [];
$blog = $blog ?? [];
$relatedItems = $relatedItems ?? [];
$mapData = $mapData ?? null;
$type = $type ?? 'hospitals';
$config = $config ?? [];
$businessTypeName = $businessTypeName ?? '';

$displayFields = [
    'medical_staff_count' => '의료인 수',
    'hospital_room_count' => '입원실 수',
    'sickbed_count' => '병상 수',
    'total_employee_count' => '총 종사자 수',
    'doctor_count' => '의사 수',
    'nurse_count' => '간호사 수',
    'pharmacist_count' => '약사 수',
    'opening_date' => '개설일',
    'permit_date' => '인허가일자',
    'closure_date' => '폐업일자',
    'postal_code' => '우편번호',
    'management_number' => '인허가번호',
    'business_status_name' => '영업상태',
    'detail_status_name' => '상세상태',
    'institution_type_name' => '기관유형',
    'business_category' => '업종분류',
];

$extraDetails = [];
foreach ($displayFields as $fieldKey => $label) {
    if (!isset($item[$fieldKey]) || $item[$fieldKey] === '' || $item[$fieldKey] === null) {
        continue;
    }

    $value = (string) $item[$fieldKey];
    if (in_array($fieldKey, [
        'medical_staff_count',
        'hospital_room_count',
        'sickbed_count',
        'total_employee_count',
        'doctor_count',
        'nurse_count',
        'pharmacist_count',
    ], true)) {
        $value = number_format((int) $item[$fieldKey]) . '명';
    }

    $extraDetails[] = [
        'label' => $label,
        'value' => $value,
    ];
}

$status = (string)($item['business_status_name'] ?? '상태불명');
$isOpen = str_contains($status, '정상');
$mainAddress = $item['road_address'] ?: ($item['lot_address'] ?? '-');

echo view('includes/header', [
    'seoTitle' => $seoTitle,
    'seoDescription' => $seoDescription,
    'seoKeywords' => $seoKeywords,
    'canonicalUrl' => $canonicalUrl,
    'jsonLd' => $jsonLd,
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

  <div class="detail-layout" style="display: grid; grid-template-columns: minmax(0, 1fr) 320px; gap: 18px; align-items: start;">
    <div class="detail-main" style="display: grid; gap: 14px;">
      <section class="section-block" style="padding: 22px;">
        <div class="breadcrumb" style="margin-bottom: 12px;">
          <a href="<?= site_url('/') ?>">홈</a>
          <span>›</span>
          <a href="<?= site_url($type) ?>"><?= esc($config['title'] ?? '목록') ?></a>
          <span>›</span>
          <span>상세</span>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 10px; margin-bottom: 12px;">
          <div>
            <h1 class="detail-title" style="font-size: 28px; font-weight: 800; letter-spacing: -0.6px; color: var(--ink); line-height: 1.25; margin-bottom: 7px; display:flex; align-items:center; gap:8px;">
              <span style="color:var(--mint);"><?= icon('hospital', ['size' => 22]) ?></span>
              <?= esc($item['business_name'] ?? '-') ?>
            </h1>
            <div style="font-size: 13px; color: var(--ink3); line-height: 1.5;">
              <?= esc($businessTypeName !== '' ? $businessTypeName : ($item['institution_type_name'] ?? '의료서비스')) ?>
            </div>
          </div>
          <span class="chip <?= $isOpen ? 'is-open' : '' ?>" style="<?= $isOpen ? '' : 'color:#ef4444;border-color:#ffd5d9;background:#fff;' ?>display:inline-flex;align-items:center;gap:4px;">
            <?= icon($isOpen ? 'check' : 'close', ['size' => 11]) ?>
            <?= esc($status) ?>
          </span>
        </div>

        <div style="display: grid; gap: 10px; border-top: 1px solid var(--line); padding-top: 12px;">
          <div style="display: grid; grid-template-columns: 90px 1fr; gap: 10px;">
            <div style="font-size: 12px; color: var(--ink4); font-weight: 700; display:flex; align-items:center; gap:4px;"><?= icon('location', ['size' => 13]) ?>주소</div>
            <div style="font-size: 14px; color: var(--ink2); font-weight: 600;"><?= esc($mainAddress) ?></div>
          </div>
          <div style="display: grid; grid-template-columns: 90px 1fr; gap: 10px;">
            <div style="font-size: 12px; color: var(--ink4); font-weight: 700; display:flex; align-items:center; gap:4px;"><?= icon('phone', ['size' => 13]) ?>전화번호</div>
            <div style="font-size: 15px; color: var(--mint); font-weight: 800;"><?= esc($item['phone_number'] ?? '정보 없음') ?></div>
          </div>
          <?php if (!empty($item['permit_date'])): ?>
            <div style="display: grid; grid-template-columns: 90px 1fr; gap: 10px;">
              <div style="font-size: 12px; color: var(--ink4); font-weight: 700;">인허가일자</div>
              <div style="font-size: 13px; color: var(--ink2);"><?= esc($item['permit_date']) ?></div>
            </div>
          <?php endif; ?>
        </div>
      </section>

      <?php if (!empty($mapData['x']) && !empty($mapData['y'])): ?>
        <section class="section-block" style="padding: 20px;">
          <h2 style="font-size: 19px; font-weight: 800; letter-spacing: -0.3px; margin-bottom: 10px; display:flex; align-items:center; gap:6px;"><?= icon('location', ['size' => 18]) ?>상세 위치 지도</h2>
          <div id="map" style="width: 100%; height: 420px; border-radius: 14px; border: 1px solid var(--line);"></div>
          <script>
            var mapOptions = {
              center: new naver.maps.LatLng(<?= $mapData['y'] ?>, <?= $mapData['x'] ?>),
              zoom: 16,
              zoomControl: true,
              mapTypeControl: true
            };
            var map = new naver.maps.Map('map', mapOptions);
            var marker = new naver.maps.Marker({
              position: new naver.maps.LatLng(<?= $mapData['y'] ?>, <?= $mapData['x'] ?>),
              map: map,
              animation: naver.maps.Animation.DROP
            });
          </script>
        </section>
      <?php endif; ?>

      <?php if (!empty($blog['items'])): ?>
        <section class="section-block" style="padding: 20px;">
          <h2 style="font-size: 19px; font-weight: 800; letter-spacing: -0.3px; margin-bottom: 10px; display:flex; align-items:center; gap:6px;"><?= icon('search', ['size' => 18]) ?>관련 블로그 소식</h2>
          <div style="display: grid; gap: 10px;">
            <?php foreach (array_slice($blog['items'], 0, 5) as $blog_item): ?>
              <a href="<?= $blog_item['link'] ?>" target="_blank" rel="nofollow" style="display: block; border: 1px solid var(--line); border-radius: 12px; padding: 12px; background: #fff;">
                <h3 style="font-size: 15px; font-weight: 700; color: var(--ink); margin-bottom: 6px;"><?= $blog_item['title'] ?></h3>
                <p style="font-size: 12px; color: var(--ink3); line-height: 1.55; margin-bottom: 6px;"><?= strip_tags($blog_item['description']) ?></p>
                <div style="font-size: 11px; color: var(--ink4);">
                  <?= esc($blog_item['bloggername']) ?> · <?= date('Y.m.d', strtotime($blog_item['postdate'])) ?>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>

      <?php if (!empty($extraDetails)): ?>
        <section class="section-block" style="padding: 20px;">
          <h2 style="font-size: 19px; font-weight: 800; letter-spacing: -0.3px; margin-bottom: 10px; display:flex; align-items:center; gap:6px;"><?= icon('menu', ['size' => 18]) ?>상세 데이터</h2>
          <div style="display: grid; grid-template-columns: 140px 1fr; gap: 8px 12px;">
            <?php foreach ($extraDetails as $detail): ?>
              <div style="font-size: 12px; color: var(--ink4); font-weight: 700; border-bottom: 1px solid #edf4f7; padding-bottom: 8px;">
                <?= esc($detail['label']) ?>
              </div>
              <div class="detail-value-cell" style="font-size: 13px; color: var(--ink2); font-weight: 600; border-bottom: 1px solid #edf4f7; padding-bottom: 8px;">
                <?= esc($detail['value']) ?>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>

      <section class="section-block" style="padding: 20px;">
        <h2 style="font-size: 19px; font-weight: 800; letter-spacing: -0.3px; margin-bottom: 10px; display:flex; align-items:center; gap:6px;"><?= icon('shield', ['size' => 18]) ?>이용 전 체크포인트</h2>
        <ul style="display: grid; gap: 6px; padding-left: 18px; color: var(--ink2); font-size: 13px;">
          <li>운영시간과 휴무일은 수시로 바뀔 수 있어 방문 전 전화 확인을 권장합니다.</li>
          <li>주소 이전, 폐업 등 상태 변경은 공공데이터 반영 시점에 따라 지연될 수 있습니다.</li>
          <li>실제 제공 서비스는 기관마다 다를 수 있으니 공식 안내를 함께 확인해 주세요.</li>
        </ul>
      </section>
    </div>

    <aside class="detail-sidebar" style="display: grid; gap: 14px;">
      <section class="section-block sidebar-card" style="padding: 16px;">
        <h2 style="font-size: 16px; font-weight: 800; margin-bottom: 10px; display:flex; align-items:center; gap:6px;"><?= icon('location', ['size' => 16]) ?>주변 <?= esc($config['title'] ?? '의료기관') ?></h2>
        <div style="display: grid; gap: 8px;">
          <?php foreach ($relatedItems as $rel): ?>
            <a class="related-item-link" href="<?= site_url($type . '/' . $rel['id']) ?>" style="display: block; border: 1px solid var(--line); border-radius: 10px; padding: 10px;">
              <div class="related-item-name" style="font-size: 13px; font-weight: 800; color: var(--ink); margin-bottom: 3px;"><?= esc($rel['business_name']) ?></div>
              <div class="related-item-address" style="font-size: 11px; color: var(--ink3); line-height: 1.45;"><?= esc($rel['road_address'] ?: ($rel['lot_address'] ?? '')) ?></div>
            </a>
          <?php endforeach; ?>
          <?php if (empty($relatedItems)): ?>
            <p style="font-size: 12px; color: var(--ink4);">주변 연관 데이터가 없습니다.</p>
          <?php endif; ?>
        </div>
      </section>

      <section class="section-block sidebar-card" style="padding: 16px;">
        <h2 style="font-size: 16px; font-weight: 800; margin-bottom: 10px; display:flex; align-items:center; gap:6px;"><?= icon('check', ['size' => 16]) ?>빠른 정보</h2>
        <div style="display: grid; gap: 8px;">
          <?php if (!empty($item['medical_staff_count'])): ?>
            <div style="display: flex; justify-content: space-between; font-size: 12px; border-bottom: 1px solid var(--line); padding-bottom: 6px;">
              <span style="color: var(--ink4);">의료인 수</span>
              <strong style="color: var(--ink);"><?= number_format((int) $item['medical_staff_count']) ?>명</strong>
            </div>
          <?php endif; ?>
          <div class="quick-info-row" style="display: flex; justify-content: space-between; font-size: 12px; border-bottom: 1px solid var(--line); padding-bottom: 6px;">
            <span class="quick-info-label" style="color: var(--ink4);">인허가번호</span>
            <strong class="quick-info-value" style="color: var(--ink);"><?= esc($item['management_number'] ?? '-') ?></strong>
          </div>
        </div>
      </section>

      <div>
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6686738239613464"
             data-ad-slot="1204098626"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
      </div>
    </aside>
  </div>
</main>

<style>
  #map {
    position: relative;
    z-index: 1;
  }

  .detail-title {
    flex-wrap: wrap;
    overflow-wrap: anywhere;
    word-break: keep-all;
  }

  .detail-layout > * {
    min-width: 0;
  }

  .detail-sidebar {
    position: relative;
    z-index: 1;
  }

  .sidebar-card {
    position: relative;
    z-index: 1;
  }

  .related-item-link,
  .related-item-name,
  .related-item-address {
    overflow-wrap: anywhere;
    word-break: break-word;
  }

  .detail-value-cell,
  .quick-info-value {
    overflow-wrap: anywhere;
    word-break: break-word;
  }

  .quick-info-row {
    align-items: flex-start;
    gap: 8px;
  }

  .quick-info-value {
    text-align: right;
  }

  @media (max-width: 980px) {
    .detail-layout { grid-template-columns: 1fr !important; }
  }

  @media (max-width: 640px) {
    section div[style*='grid-template-columns: 140px 1fr'] { grid-template-columns: 1fr !important; }
    section div[style*='grid-template-columns: 90px 1fr'] { grid-template-columns: 1fr !important; }

    .detail-title {
      font-size: 22px !important;
    }

    .quick-info-row {
      flex-direction: column;
      align-items: stretch;
      gap: 2px;
    }

    .quick-info-value {
      text-align: left;
    }
  }
</style>

<?= view('includes/footer') ?>
