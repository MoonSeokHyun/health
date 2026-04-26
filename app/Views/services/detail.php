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
    <!-- 상단 광고 -->
    <div style="margin-bottom: 2rem;">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6686738239613464"
             data-ad-slot="1204098626"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 340px; gap: 2.5rem; align-items: start;">
        <div class="content-main">
            <!-- 기본 정보 섹션 -->
            <section class="section-block" style="margin-top: 0; padding: 2.5rem;">
                <div style="border-bottom: 1px solid var(--line); padding-bottom: 2rem; margin-bottom: 2rem;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
                        <div>
                            <nav style="font-size: 0.875rem; color: var(--muted); margin-bottom: 1rem; font-weight: 500;">
                                <a href="<?= site_url('/') ?>" style="color: var(--primary);">홈</a> 
                                <span style="margin: 0 0.5rem; opacity: 0.5;">/</span> 
                                <a href="<?= site_url($type) ?>" style="color: var(--primary);"><?= esc($config['title']) ?></a>
                            </nav>
                            <h1 style="font-size: 2.5rem; font-weight: 900; color: var(--text); letter-spacing: -0.02em; line-height: 1.2;">
                                <?= esc($item['business_name']) ?>
                            </h1>
                        </div>
                        <span style="background: <?= ($item['business_status_name'] ?? '') === '정상영업' ? '#dcfce7' : '#fee2e2' ?>; color: <?= ($item['business_status_name'] ?? '') === '정상영업' ? '#166534' : '#991b1b' ?>; font-size: 0.95rem; font-weight: 800; padding: 0.6rem 1.25rem; border-radius: 999px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                            <?= esc($item['business_status_name'] ?? '상태불명') ?>
                        </span>
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: 130px 1fr; gap: 1.5rem; font-size: 1.05rem; line-height: 1.8;">
                    <div style="color: var(--muted); font-weight: 700;">도로명주소</div>
                    <div style="color: var(--text); font-weight: 500;"><?= esc($item['road_address'] ?: '-') ?></div>
                    
                    <div style="color: var(--muted); font-weight: 700;">지번주소</div>
                    <div style="color: var(--text); font-weight: 500;"><?= esc($item['lot_address'] ?: '-') ?></div>
                    
                    <div style="color: var(--muted); font-weight: 700;">전화번호</div>
                    <div style="font-weight: 800; color: var(--primary); font-size: 1.25rem;"><?= esc($item['phone_number'] ?: '정보 없음') ?></div>
                    
                    <?php if (!empty($item['permit_date'])): ?>
                    <div style="color: var(--muted); font-weight: 700;">인허가일자</div>
                    <div style="color: var(--text); font-weight: 500;"><?= esc($item['permit_date']) ?></div>
                    <?php endif; ?>

                    <?php if (!empty($item['closure_date'])): ?>
                    <div style="color: var(--muted); font-weight: 700;">폐업일자</div>
                    <div style="color: #ef4444; font-weight: 600;"><?= esc($item['closure_date']) ?></div>
                    <?php endif; ?>

                    <?php if ($businessTypeName !== ''): ?>
                    <div style="color: var(--muted); font-weight: 700;">업종</div>
                    <div style="color: var(--text); font-weight: 500;"><?= esc($businessTypeName) ?></div>
                    <?php endif; ?>
                </div>
            </section>

            <section class="section-block" style="margin-top: 2rem; padding: 2rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">핵심 정보 요약</h2>
                <p style="color: var(--muted); margin-bottom: 1.5rem; line-height: 1.7;">
                    <?= esc($item['business_name']) ?>의 주소, 연락처, 상태 등 핵심 정보를 빠르게 확인할 수 있도록 요약했습니다.
                </p>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
                    <div class="info-card">
                        <div class="info-card-title">운영상태</div>
                        <div class="info-card-value"><?= esc($item['business_status_name'] ?? '정보 없음') ?></div>
                    </div>
                    <div class="info-card">
                        <div class="info-card-title">대표 연락처</div>
                        <div class="info-card-value"><?= esc($item['phone_number'] ?: '정보 없음') ?></div>
                    </div>
                    <div class="info-card">
                        <div class="info-card-title">업종</div>
                        <div class="info-card-value"><?= esc($businessTypeName !== '' ? $businessTypeName : '정보 없음') ?></div>
                    </div>
                    <div class="info-card">
                        <div class="info-card-title">주요 주소</div>
                        <div class="info-card-value"><?= esc($item['road_address'] ?: ($item['lot_address'] ?? '정보 없음')) ?></div>
                    </div>
                </div>
            </section>

            <!-- 지도 섹션 -->
            <?php if (!empty($mapData['x']) && !empty($mapData['y'])): ?>
            <section class="section-block" style="margin-top: 2rem; padding: 2rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    📍 상세 위치 지도
                </h2>
                <div id="map" style="width:100%; height:450px; border-radius: 1rem; border: 1px solid var(--line); box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);"></div>
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

            <!-- 네이버 블로그 정보 -->
            <?php if (!empty($blog['items'])): ?>
                <section class="section-block" style="margin-top: 2rem; padding: 2rem;">
                    <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                        <span style="background: #2db400; color: #fff; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 6px; font-size: 1.125rem; font-weight: 900;">N</span> 
                        관련 블로그 소식
                    </h2>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <?php foreach (array_slice($blog['items'], 0, 5) as $blog_item): ?>
                            <a href="<?= $blog_item['link'] ?>" target="_blank" rel="nofollow" class="blog-item">
                                <h3 style="font-size: 1.15rem; font-weight: 700; margin-bottom: 0.6rem; color: var(--text);"><?= $blog_item['title'] ?></h3>
                                <p style="font-size: 0.95rem; color: var(--muted); margin-bottom: 0.75rem; line-height: 1.5;"><?= strip_tags($blog_item['description']) ?></p>
                                <div style="font-size: 0.85rem; color: var(--primary); font-weight: 600;">
                                    <?= esc($blog_item['bloggername']) ?> <span style="margin: 0 0.5rem; opacity: 0.3;">|</span> <?= date('Y.m.d', strtotime($blog_item['postdate'])) ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($extraDetails)): ?>
            <section class="section-block" style="margin-top: 2rem; padding: 2rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem;">상세 데이터</h2>
                <div style="display: grid; grid-template-columns: 160px 1fr; gap: 1rem 1.25rem; align-items: center;">
                    <?php foreach ($extraDetails as $detail): ?>
                        <div style="font-weight: 700; color: var(--muted); border-bottom: 1px solid #f1f5f9; padding-bottom: 0.7rem;">
                            <?= esc($detail['label']) ?>
                        </div>
                        <div style="font-weight: 500; color: var(--text); border-bottom: 1px solid #f1f5f9; padding-bottom: 0.7rem;">
                            <?= esc($detail['value']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>

            <section class="section-block" style="margin-top: 2rem; padding: 2rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.25rem;">이용 전 체크포인트</h2>
                <ul style="display: grid; gap: 0.8rem; color: var(--text); line-height: 1.7; padding-left: 1.2rem;">
                    <li>운영시간과 휴무일은 수시로 바뀔 수 있어 방문 전 전화 확인을 권장합니다.</li>
                    <li>주소 이전, 폐업 등 상태 변경은 공공데이터 반영 시점에 따라 지연될 수 있습니다.</li>
                    <li>실제 제공 서비스는 기관마다 다를 수 있으니 공식 안내를 함께 확인해 주세요.</li>
                </ul>
            </section>
        </div>

        <!-- 사이드바 -->
        <aside class="sidebar">
            <div class="section-block" style="margin-top: 0; padding: 1.75rem;">
                <h2 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1.5rem; color: var(--text);">🏷️ 주변 <?= esc($config['title']) ?></h2>
                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <?php foreach ($relatedItems as $rel): ?>
                        <a href="<?= site_url($type . '/' . $rel['id']) ?>" class="related-link">
                            <div style="font-weight: 700; font-size: 1rem; margin-bottom: 0.4rem;"><?= esc($rel['business_name']) ?></div>
                            <div style="font-size: 0.8125rem; color: var(--muted); line-height: 1.4;"><?= esc($rel['road_address'] ?: ($rel['lot_address'] ?? '')) ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="section-block" style="margin-top: 1.5rem; padding: 1.5rem;">
                <h2 style="font-size: 1.125rem; font-weight: 800; margin-bottom: 1.25rem;">📋 추가 정보</h2>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <?php if (!empty($item['medical_staff_count'])): ?>
                    <div style="display: flex; justify-content: space-between; padding-bottom: 0.5rem; border-bottom: 1px solid var(--line);">
                        <span style="color: var(--muted); font-size: 0.875rem;">의료인 수</span>
                        <span style="font-weight: 700;"><?= number_format((int) $item['medical_staff_count']) ?>명</span>
                    </div>
                    <?php endif; ?>
                    <div style="display: flex; justify-content: space-between; padding-bottom: 0.5rem; border-bottom: 1px solid var(--line);">
                        <span style="color: var(--muted); font-size: 0.875rem;">인허가번호</span>
                        <span style="font-weight: 700; font-size: 0.8rem;"><?= esc($item['management_number'] ?? '-') ?></span>
                    </div>
                </div>
            </div>

            <!-- 사이드바 광고 -->
            <div style="margin-top: 2rem; position: sticky; top: 100px;">
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
    .info-card {
        background: #f8fafc;
        border: 1px solid var(--line);
        border-radius: 0.9rem;
        padding: 1rem;
    }
    .info-card-title {
        font-size: 0.82rem;
        color: var(--muted);
        font-weight: 700;
        margin-bottom: 0.45rem;
    }
    .info-card-value {
        font-size: 1.02rem;
        color: var(--text);
        font-weight: 800;
        line-height: 1.4;
        word-break: break-word;
    }
    .blog-item {
        display: block; padding: 1.5rem; border: 1px solid #f1f5f9; border-radius: 1rem; 
        transition: all 0.2s; background: #fff;
    }
    .blog-item:hover { background: #f0fdfa; border-color: var(--primary); transform: translateX(4px); }
    
    .related-link {
        display: block; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9; transition: all 0.2s;
    }
    .related-link:hover { color: var(--primary); transform: translateX(4px); }
    .related-link:last-child { border-bottom: 0; padding-bottom: 0; }

    @media (max-width: 1024px) {
        main > div { grid-template-columns: 1fr !important; }
        .sidebar { margin-top: 2rem; }
    }
    @media (max-width: 768px) {
        main .content-main > .section-block div[style*="grid-template-columns: 160px 1fr"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<?= view('includes/footer') ?>
