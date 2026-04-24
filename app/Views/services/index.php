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
    <div class="breadcrumb">
        <a href="<?= site_url('/') ?>">홈</a>
        <span>›</span>
        <span><?= esc($config['title'] ?? '목록') ?></span>
    </div>

    <div class="section-block">
        <h1 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 0.5rem;">
            <?= $search !== '' ? '"' . esc($search) . '" 검색 결과' : esc($config['title'] ?? '목록') ?>
        </h1>
        <?php if ($search === '' && !empty($config['subtitle'])): ?>
            <p style="color: var(--muted); font-size: 0.95rem; margin-bottom: 1.5rem;"><?= esc($config['subtitle']) ?></p>
        <?php endif; ?>

        <?php if (empty($items)): ?>
            <p style="text-align: center; padding: 3rem 0; color: var(--muted); font-size: 1.1rem;">
                검색 결과가 없습니다.<br>
                <span style="font-size: 0.9rem;">다른 검색어로 시도해보세요.</span>
            </p>
        <?php else: ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                <?php foreach ($items as $item): ?>
                    <a href="<?= site_url($type . '/' . $item['id']) ?>" style="display: block; background: #fff; border: 1px solid var(--line); border-radius: var(--radius); padding: 1.5rem; transition: transform 0.2s, box-shadow 0.2s; position: relative;" 
                       onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow)';" 
                       onmouseout="this.style.transform='none'; this.style.boxShadow='none';">
                        <div style="display: flex; justify-content: flex-start; margin-bottom: 0.75rem;">
                            <span style="background: <?= ($item['business_status_name'] ?? '') === '정상영업' ? '#dcfce7' : '#fee2e2' ?>; color: <?= ($item['business_status_name'] ?? '') === '정상영업' ? '#166534' : '#991b1b' ?>; font-size: 0.75rem; font-weight: 700; padding: 0.25rem 0.625rem; border-radius: 999px;">
                                <?= esc($item['business_status_name'] ?? '상태불명') ?>
                            </span>
                        </div>
                        <h2 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--text); line-height: 1.4;">
                            <?= esc($item['business_name']) ?>
                        </h2>
                        <p style="font-size: 0.875rem; color: var(--muted); margin-bottom: 1rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            <?= esc($item['road_address'] ?: ($item['lot_address'] ?? '주소 정보 없음')) ?>
                        </p>
                        <div style="font-size: 0.8125rem; color: var(--primary); font-weight: 600;">
                            <?= esc($item['phone_number'] ?? '전화번호 정보 없음') ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <?php if ($pager): ?>
                <div style="margin-top: 3rem; display: flex; justify-content: center;">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</main>

<?= view('includes/footer') ?>
