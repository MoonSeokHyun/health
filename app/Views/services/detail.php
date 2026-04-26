<?php
$item = $item ?? [];
$blog = $blog ?? [];
$relatedItems = $relatedItems ?? [];
$mapData = $mapData ?? null;
$type = $type ?? 'hospitals';
$config = $config ?? [];
$businessTypeName = $businessTypeName ?? '';

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
</style>

<?= view('includes/footer') ?>
