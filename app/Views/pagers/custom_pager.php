<?php
/** @var CodeIgniter\Pager\PagerRenderer $pager */
$pager->setSurroundCount(2);
?>
<?php if ($pager->getPageCount() > 1): ?>
<nav style="display: flex; gap: 6px; align-items: center; flex-wrap: wrap;">
  <?php if ($pager->hasPrevious()): ?>
    <a href="<?= $pager->getPrevious() ?>" style="padding: 7px 11px; border: 1px solid var(--line); border-radius: 9px; color: var(--ink3); font-size: 12px; background:#fff;">이전</a>
  <?php endif; ?>

  <?php foreach ($pager->links() as $link): ?>
    <a href="<?= $link['uri'] ?>" style="padding: 7px 11px; border: 1px solid <?= $link['active'] ? 'var(--mint)' : 'var(--line)' ?>; border-radius: 9px; font-size: 12px; font-weight: <?= $link['active'] ? '800' : '600' ?>; color: <?= $link['active'] ? '#fff' : 'var(--ink2)' ?>; background: <?= $link['active'] ? 'var(--mint)' : '#fff' ?>;">
      <?= $link['title'] ?>
    </a>
  <?php endforeach; ?>

  <?php if ($pager->hasNext()): ?>
    <a href="<?= $pager->getNext() ?>" style="padding: 7px 11px; border: 1px solid var(--line); border-radius: 9px; color: var(--ink3); font-size: 12px; background:#fff;">다음</a>
  <?php endif; ?>
</nav>
<?php endif; ?>
