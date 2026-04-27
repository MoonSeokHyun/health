<?php
/**
 * helth — 공용 SVG 아이콘 헬퍼
 * 사용: helpers/icons_helper 로드 후 icon('search', ['size' => 20])
 */

if (! function_exists('icon')) {
    /**
     * @param string $name  아이콘 이름
     * @param array  $opts  ['size' => 20, 'class' => '', 'fill' => 'none', 'style' => '...']
     */
    function icon(string $name, array $opts = []): string
    {
        $size  = $opts['size']  ?? 20;
        $class = $opts['class'] ?? '';
        $fill  = $opts['fill']  ?? 'none';
        $style = $opts['style'] ?? '';

        $paths = _icon_paths($name, $opts);
        if ($paths === '') return '';

        // star 아이콘은 채워진 폴리곤이라 별도 viewBox/스타일 사용
        if ($name === 'star') {
            return sprintf(
                '<svg width="%d" height="%d" viewBox="0 0 24 24" fill="%s" class="%s" style="flex-shrink:0;%s">%s</svg>',
                $size, $size,
                esc($opts['fill'] ?? 'currentColor', 'attr'),
                esc($class, 'attr'),
                esc($style, 'attr'),
                $paths
            );
        }

        return sprintf(
            '<svg width="%d" height="%d" viewBox="0 0 24 24" fill="%s" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="%s" style="flex-shrink:0;%s">%s</svg>',
            $size, $size,
            esc($fill, 'attr'),
            esc($class, 'attr'),
            esc($style, 'attr'),
            $paths
        );
    }
}

if (! function_exists('_icon_paths')) {
    function _icon_paths(string $name, array $opts = []): string
    {
        $filled = $opts['filled'] ?? false;

        switch ($name) {
            case 'search':       return '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>';
            case 'location':     return '<path d="M12 22s7-7 7-12a7 7 0 1 0-14 0c0 5 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/>';
            case 'phone':        return '<path d="M5 4h3.5l1.5 4-2 1.5a12 12 0 0 0 5 5L14.5 12.5l4 1.5V18a2 2 0 0 1-2 2A14 14 0 0 1 3 6a2 2 0 0 1 2-2Z"/>';
            case 'clock':        return '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>';
            case 'star':         return '<path d="M12 2.5l2.9 6.2 6.6.6-5 4.6 1.5 6.6L12 17l-6 3.5 1.5-6.6-5-4.6 6.6-.6L12 2.5z"/>';
            case 'heart':        return '<path d="M12 21s-8-5-8-11a5 5 0 0 1 8.5-3.5L12 7l-.5-.5A5 5 0 0 1 20 10c0 6-8 11-8 11Z"/>';
            case 'chevron-right':return '<path d="m9 6 6 6-6 6"/>';
            case 'chevron-down': return '<path d="m6 9 6 6 6-6"/>';
            case 'close':        return '<path d="M6 6l12 12M18 6 6 18"/>';
            case 'menu':         return '<path d="M4 6h16M4 12h16M4 18h16"/>';
            case 'home':         return '<path d="M3 11 12 3l9 8"/><path d="M5 9.5V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5"/>';
            case 'user':         return '<circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/>';
            case 'bookmark':     return '<path d="M6 4h12v17l-6-4-6 4Z"/>';
            case 'sparkle':      return '<path d="M12 3v4M12 17v4M3 12h4M17 12h4M5.5 5.5l2.5 2.5M16 16l2.5 2.5M5.5 18.5 8 16M16 8l2.5-2.5"/>';
            case 'calendar':     return '<rect x="3.5" y="5" width="17" height="16" rx="2"/><path d="M3.5 10h17M8 3v4M16 3v4"/>';
            case 'hospital':     return '<path d="M5 21V8a2 2 0 0 1 2-2h3V3h4v3h3a2 2 0 0 1 2 2v13"/><path d="M3 21h18M12 10v6M9 13h6"/>';
            case 'pill':         return '<rect x="3" y="9" width="18" height="6" rx="3" transform="rotate(-30 12 12)"/><path d="m8 6 8 14"/>';
            case 'ambulance':    return '<path d="M3 16V8h11v8"/><path d="M14 11h4l3 3v2h-7"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/><path d="M8 11h2M9 10v2"/>';
            case 'stethoscope':  return '<path d="M5 3v6a4 4 0 0 0 8 0V3"/><path d="M9 13v3a5 5 0 0 0 10 0v-1"/><circle cx="19" cy="13" r="2"/>';
            case 'building':     return '<rect x="5" y="3" width="14" height="18" rx="1.5"/><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2M10 21v-3h4v3"/>';
            case 'mic':          return '<rect x="9" y="3" width="6" height="11" rx="3"/><path d="M5 11a7 7 0 0 0 14 0M12 18v3"/>';
            case 'filter':       return '<path d="M3 5h18l-7 9v6l-4-2v-4Z"/>';
            case 'arrow-left':   return '<path d="m14 6-6 6 6 6M8 12h13"/>';
            case 'share':        return '<circle cx="6" cy="12" r="2.5"/><circle cx="18" cy="6" r="2.5"/><circle cx="18" cy="18" r="2.5"/><path d="m8.5 11 7-3.5M8.5 13l7 3.5"/>';
            case 'check':        return '<path d="m5 12 5 5L20 7"/>';
            case 'navigate':     return '<path d="M21 3 3 10l8 3 3 8Z"/>';
            case 'shield':       return '<path d="M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6Z"/><path d="m9 12 2 2 4-4"/>';
        }
        return '';
    }
}

if (! function_exists('status_bar')) {
    function status_bar(bool $dark = false, string $time = '9:41'): string
    {
        $cls = $dark ? 'status-bar dark' : 'status-bar';
        $color = $dark ? '#fff' : '#191D28';
        return <<<HTML
<div class="$cls">
  <span>$time</span>
  <div class="status-icons" style="color:$color">
    <svg width="17" height="11" viewBox="0 0 17 11" fill="currentColor">
      <rect x="0" y="7" width="3" height="4" rx="0.5"/>
      <rect x="4.5" y="5" width="3" height="6" rx="0.5"/>
      <rect x="9" y="3" width="3" height="8" rx="0.5"/>
      <rect x="13.5" y="0" width="3" height="11" rx="0.5"/>
    </svg>
    <svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor">
      <path d="M7.5 1C4.5 1 1.9 2.2 0 4.1l1.4 1.4A8 8 0 0 1 7.5 3c2.3 0 4.4.9 6 2.5L15 4.1A10.5 10.5 0 0 0 7.5 1Zm0 3.5C5.5 4.5 3.7 5.3 2.4 6.6l1.5 1.5a5.4 5.4 0 0 1 7.2 0l1.5-1.5A7.4 7.4 0 0 0 7.5 4.5Zm0 3.5a2 2 0 0 0-1.5.6L7.5 10l1.5-1.4A2 2 0 0 0 7.5 8Z"/>
    </svg>
    <svg width="24" height="11" viewBox="0 0 24 11" fill="none">
      <rect x="0.5" y="0.5" width="20" height="10" rx="2.5" stroke="currentColor" opacity="0.4"/>
      <rect x="2" y="2" width="17" height="7" rx="1.2" fill="currentColor"/>
      <rect x="21.5" y="3.5" width="1.5" height="4" rx="0.5" fill="currentColor" opacity="0.5"/>
    </svg>
  </div>
</div>
HTML;
    }
}
