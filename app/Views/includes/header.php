<?php
helper('url');

$siteName = 'HealthCare';
$defaultTitle = '전국 의료 서비스 종합 정보 | HealthCare';
$defaultDescription = '전국 병원, 의원, 약국, 의료기기업, 산후조리원 등 13개 의료 서비스 정보를 한눈에 확인하세요.';
$defaultKeywords = '병원, 의원, 약국, 의료기기, 안경, 치과기공, 의료법인, 의료서비스';

$seoTitle = $seoTitle ?? $defaultTitle;
$seoDescription = $seoDescription ?? $defaultDescription;
$seoKeywords = $seoKeywords ?? $defaultKeywords;
$canonicalUrl = $canonicalUrl ?? current_url();
$seoImage = $seoImage ?? base_url('favicon.ico');

$jsonLd = $jsonLd ?? [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => $siteName,
    'url' => base_url(),
];

$searchType = $type ?? 'hospitals';
$config = $config ?? [];
$search = $search ?? '';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?= esc($seoTitle) ?></title>
  <meta name="description" content="<?= esc($seoDescription) ?>" />
  <meta name="keywords" content="<?= esc($seoKeywords) ?>" />
  <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1" />
  <link rel="canonical" href="<?= esc($canonicalUrl) ?>" />

  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= esc($seoTitle) ?>" />
  <meta property="og:description" content="<?= esc($seoDescription) ?>" />
  <meta property="og:url" content="<?= esc($canonicalUrl) ?>" />
  <meta property="og:site_name" content="<?= esc($siteName) ?>" />
  <meta property="og:image" content="<?= esc($seoImage) ?>" />
  <meta property="og:locale" content="ko_KR" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= esc($seoTitle) ?>" />
  <meta name="twitter:description" content="<?= esc($seoDescription) ?>" />
  <meta name="twitter:image" content="<?= esc($seoImage) ?>" />
  <meta name="naver-site-verification" content="e4e08393e9f171df210dd420059bd4d537f97cc6" />
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6686738239613464" crossorigin="anonymous"></script>
  <script type="application/ld+json">
<?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
  </script>
 
  <script type="text/javascript" src="https://oapi.map.naver.com/openapi/v3/maps.js?ncpClientId=c3hsihbnx3"></script>

  <style>
    :root {
      --bg: #f0f6ff;
      --surface: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --line: #e2e8f0;
      --primary: #0d9488;
      --primary-dark: #0f766e;
      --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      --radius: 1rem;
      --max: 1200px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Pretendard', -apple-system, BlinkMacSystemFont, sans-serif; background: var(--bg); color: var(--text); line-height: 1.6; }
    a { color: inherit; text-decoration: none; transition: 0.2s; }

    .site-header { background: var(--surface); border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 100; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
    .header-inner { max-width: var(--max); margin: 0 auto; padding: 1rem 1.25rem; display: flex; align-items: center; justify-content: space-between; }
    
    .logo { font-size: 1.5rem; font-weight: 900; color: var(--primary); letter-spacing: -0.05em; }
    .logo span { font-size: 0.85rem; font-weight: 400; color: var(--muted); margin-left: 0.5rem; }

    .nav-menu { display: flex; gap: 1.5rem; align-items: center; }
    .nav-item { position: relative; padding: 0.5rem 0; font-weight: 600; cursor: pointer; color: var(--text); }
    .nav-item:hover { color: var(--primary); }
    .nav-drop { font-size: 0.6rem; margin-left: 0.4rem; opacity: 0.5; }
    
    .dropdown {
        position: absolute; top: 100%; left: 0; background: #fff; border: 1px solid var(--line); 
        border-radius: 0.75rem; box-shadow: var(--shadow); padding: 1rem; 
        display: none; grid-template-columns: repeat(2, 1fr); gap: 0.5rem; min-width: 320px;
        z-index: 200;
    }
    .nav-item:hover .dropdown { display: grid; }
    .dropdown a { padding: 0.5rem 0.75rem; border-radius: 0.5rem; font-size: 0.875rem; color: var(--muted); white-space: nowrap; }
    .dropdown a:hover { background: #f0fdfa; color: var(--primary); }

    .search-section { background: #fff; border-bottom: 1px solid var(--line); padding: 1rem 0; }
    .search-container { max-width: 700px; margin: 0 auto; padding: 0 1.25rem; }
    .search-form { display: flex; gap: 0.5rem; background: #f1f5f9; border-radius: 999px; padding: 0.4rem 0.4rem 0.4rem 1.25rem; border: 1px solid transparent; }
    .search-form:focus-within { border-color: var(--primary); background: #fff; box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1); }
    .search-form input { flex: 1; border: 0; outline: 0; background: transparent; font-size: 1rem; padding: 0.3rem 0; }
    .search-form input::placeholder { color: #94a3b8; }
    .search-form button { background: var(--primary); color: #fff; border: 0; padding: 0.6rem 1.5rem; border-radius: 999px; font-weight: 700; cursor: pointer; transition: background 0.2s; }
    .search-form button:hover { background: var(--primary-dark); }
    
    .container { max-width: var(--max); margin: 0 auto; padding: 2rem 1.25rem; }
    .section-block { background: #fff; border: 1px solid var(--line); border-radius: var(--radius); padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }

    .breadcrumb { font-size: 0.875rem; color: var(--muted); margin-bottom: 1rem; display: flex; gap: 0.5rem; align-items: center; }
    .breadcrumb a { color: var(--primary); }
    .breadcrumb a:hover { text-decoration: underline; }
    .breadcrumb span { color: var(--muted); }

    @media (max-width: 768px) {
        .nav-menu { gap: 1rem; font-size: 0.9rem; }
        .dropdown { left: -100px; grid-template-columns: 1fr; min-width: 200px; }
        .header-inner { flex-direction: column; gap: 0.75rem; }
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="header-inner">
      <a href="<?= site_url('/') ?>" class="logo">🏥 HealthCare <span>전국 의료서비스 정보</span></a>
      <nav class="nav-menu">
        <div class="nav-item">의료기관<span class="nav-drop">▼</span>
            <div class="dropdown">
                <a href="<?= site_url('hospitals') ?>">병원</a>
                <a href="<?= site_url('clinics') ?>">의원</a>
                <a href="<?= site_url('affiliated-inst') ?>">부속의료기관</a>
                <a href="<?= site_url('medical-corps') ?>">의료법인</a>
            </div>
        </div>
        <div class="nav-item">약국/의약품<span class="nav-drop">▼</span>
            <div class="dropdown">
                <a href="<?= site_url('pharmacies') ?>">약국</a>
                <a href="<?= site_url('otc-stores') ?>">안전상비의약품</a>
            </div>
        </div>
        <div class="nav-item">의료기기/안경<span class="nav-drop">▼</span>
            <div class="dropdown">
                <a href="<?= site_url('device-sales') ?>">의료기기판매임대</a>
                <a href="<?= site_url('device-repair') ?>">의료기기수리</a>
                <a href="<?= site_url('optical-shops') ?>">안경업</a>
                <a href="<?= site_url('dental-labs') ?>">치과기공소</a>
            </div>
        </div>
        <div class="nav-item">기타 의료<span class="nav-drop">▼</span>
            <div class="dropdown">
                <a href="<?= site_url('health-business') ?>">의료유사업</a>
                <a href="<?= site_url('postpartum') ?>">산후조리업</a>
                <a href="<?= site_url('emergency-transport') ?>">응급환자이송업</a>
            </div>
        </div>
      </nav>
    </div>
  </header>

  <section class="search-section">
    <div class="search-container">
        <form class="search-form" action="<?= esc(site_url($searchType)) ?>" method="get">
            <input type="text" name="search" placeholder="<?= esc($config['search_placeholder'] ?? '검색어를 입력하세요') ?>" value="<?= esc($search) ?>" />
            <button type="submit">검색</button>
        </form>
    </div>
  </section>
