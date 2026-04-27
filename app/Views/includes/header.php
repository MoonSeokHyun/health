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
      --mint: #15c1b9;
      --mint-soft: #e7f9f7;
      --ink: #17313a;
      --ink2: #39535b;
      --ink3: #667f86;
      --ink4: #8ca2a8;
      --bg: #f2f7f8;
      --surface: #ffffff;
      --line: #dce8ec;
      --danger: #f8323e;
      --shadow: 0 8px 24px rgba(30, 58, 68, 0.08);
      --max: 1180px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Pretendard', -apple-system, BlinkMacSystemFont, sans-serif;
      background: radial-gradient(circle at top right, #ecfffc 0%, #f2f7f8 38%, #f2f7f8 100%);
      color: var(--ink);
      line-height: 1.6;
    }
    a { color: inherit; text-decoration: none; }

    .site-header {
      position: sticky;
      top: 0;
      z-index: 100;
      backdrop-filter: blur(8px);
      background: rgba(255, 255, 255, 0.93);
      border-bottom: 1px solid var(--line);
    }
    .header-inner {
      max-width: var(--max);
      margin: 0 auto;
      padding: 14px 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
    }

    .logo {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 20px;
      font-weight: 800;
      letter-spacing: -0.4px;
      color: var(--ink);
      white-space: nowrap;
    }
    .logo-mark {
      width: 28px;
      height: 28px;
      border-radius: 8px;
      background: var(--mint);
      color: #fff;
      display: grid;
      place-items: center;
      font-size: 0;
    }
    .logo small {
      font-size: 11px;
      color: var(--ink4);
      font-weight: 600;
      margin-left: 2px;
    }

    .nav-menu {
      display: flex;
      align-items: center;
      gap: 16px;
      flex-wrap: wrap;
      justify-content: flex-end;
    }
    .nav-item {
      position: relative;
      color: var(--ink2);
      font-size: 14px;
      font-weight: 700;
      padding: 8px 0;
    }
    .nav-item:hover { color: var(--ink); }
    .nav-label {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      cursor: pointer;
      user-select: none;
    }
    .nav-drop { font-size: 10px; margin-left: 4px; color: var(--ink4); }

    .dropdown {
      position: absolute;
      left: 0;
      top: 100%;
      min-width: 290px;
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 14px;
      box-shadow: var(--shadow);
      padding: 12px;
      display: none;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 6px;
      z-index: 220;
    }
    .nav-item:hover .dropdown { display: grid; }
    .nav-item.is-open .dropdown { display: grid; }
    .dropdown a {
      padding: 9px 10px;
      border-radius: 9px;
      font-size: 13px;
      color: var(--ink3);
      font-weight: 600;
    }
    .dropdown a:hover {
      background: var(--mint-soft);
      color: var(--ink);
    }

    .search-section {
      border-bottom: 1px solid var(--line);
      background: #fff;
    }
    .search-container {
      max-width: 780px;
      margin: 0 auto;
      padding: 12px 18px 14px;
    }
    .search-form {
      display: flex;
      align-items: center;
      gap: 8px;
      border: 1px solid var(--line);
      background: #f8fcfd;
      border-radius: 999px;
      padding: 5px 7px 5px 15px;
    }
    .search-form:focus-within {
      border-color: var(--mint);
      box-shadow: 0 0 0 3px rgba(21, 193, 185, 0.14);
      background: #fff;
    }
    .search-form input {
      flex: 1;
      border: 0;
      outline: 0;
      background: transparent;
      font-size: 14px;
      color: var(--ink);
      min-width: 0;
    }
    .search-form input::placeholder { color: var(--ink4); }
    .search-form button {
      border: 0;
      border-radius: 999px;
      background: var(--mint);
      color: #fff;
      padding: 10px 16px;
      font-size: 13px;
      font-weight: 700;
      cursor: pointer;
    }

    .container {
      max-width: var(--max);
      margin: 0 auto;
      padding: 26px 18px 8px;
    }
    .section-block {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 16px;
      box-shadow: 0 1px 2px rgba(18, 42, 50, 0.04);
    }
    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 7px;
      font-size: 12px;
      color: var(--ink4);
      margin-bottom: 14px;
    }
    .breadcrumb a { color: var(--ink3); }

    .chip {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 4px 9px;
      border-radius: 999px;
      font-size: 11px;
      font-weight: 700;
      border: 1px solid var(--line);
      color: var(--ink3);
      background: #fff;
    }
    .chip.is-open {
      color: var(--mint);
      border-color: #bcece8;
      background: var(--mint-soft);
    }

    @media (max-width: 900px) {
      .header-inner { flex-direction: column; align-items: stretch; }
      .nav-menu { justify-content: flex-start; gap: 12px; }
      .dropdown {
        position: static;
        display: grid;
        margin-top: 8px;
        min-width: 0;
      }
      .nav-item .dropdown { display: none; }
      .nav-item:hover .dropdown { display: none; }
      .nav-item.is-open .dropdown { display: grid; }
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="header-inner">
      <a href="<?= site_url('/') ?>" class="logo">
        <span class="logo-mark"><?= icon('shield', ['size' => 14, 'fill' => 'none']) ?></span>
        HealthCare
        <small>공공데이터 기반</small>
      </a>

      <nav class="nav-menu">
        <div class="nav-item">
          <span class="nav-label">의료기관<span class="nav-drop">▼</span></span>
          <div class="dropdown">
            <a href="<?= site_url('hospitals') ?>">병원</a>
            <a href="<?= site_url('clinics') ?>">의원</a>
            <a href="<?= site_url('affiliated-inst') ?>">부속의료기관</a>
            <a href="<?= site_url('medical-corps') ?>">의료법인</a>
          </div>
        </div>
        <div class="nav-item">
          <span class="nav-label">약국/의약품<span class="nav-drop">▼</span></span>
          <div class="dropdown">
            <a href="<?= site_url('pharmacies') ?>">약국</a>
            <a href="<?= site_url('otc-stores') ?>">안전상비의약품</a>
          </div>
        </div>
        <div class="nav-item">
          <span class="nav-label">의료기기/안경<span class="nav-drop">▼</span></span>
          <div class="dropdown">
            <a href="<?= site_url('device-sales') ?>">의료기기판매임대</a>
            <a href="<?= site_url('device-repair') ?>">의료기기수리</a>
            <a href="<?= site_url('optical-shops') ?>">안경업</a>
            <a href="<?= site_url('dental-labs') ?>">치과기공소</a>
          </div>
        </div>
        <div class="nav-item">
          <span class="nav-label">기타 의료<span class="nav-drop">▼</span></span>
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
        <button type="submit" style="display:inline-flex; align-items:center; gap:4px;"><?= icon('search', ['size' => 14]) ?>검색</button>
      </form>
    </div>
  </section>
  <script>
    (function () {
      var navItems = Array.prototype.slice.call(document.querySelectorAll('.nav-menu .nav-item'));
      if (!navItems.length) return;

      function closeAll(except) {
        navItems.forEach(function (item) {
          if (item !== except) item.classList.remove('is-open');
        });
      }

      navItems.forEach(function (item) {
        var trigger = item.querySelector('.nav-label');
        if (!trigger) return;

        trigger.addEventListener('click', function (e) {
          e.stopPropagation();
          var opened = item.classList.contains('is-open');
          closeAll(item);
          item.classList.toggle('is-open', !opened);
        });
      });

      document.addEventListener('click', function () {
        closeAll(null);
      });
    })();
  </script>
