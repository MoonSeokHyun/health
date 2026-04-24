<?php

/**
 * @var CodeIgniter\Pager\PagerRenderer $pager
 */
?>
<?php if ($pager->getPageCount() > 1): ?>
<nav style="display: flex; gap: 0.25rem; align-items: center; flex-wrap: wrap;">
    <?php if ($pager->hasPrevious()): ?>
        <a href="<?= $pager->getPrevious() ?>" style="padding: 0.5rem 0.85rem; border: 1px solid var(--line); border-radius: 0.5rem; color: var(--muted); font-size: 0.875rem;">‹</a>
    <?php endif; ?>
    
    <?php foreach ($pager->links() as $link): ?>
        <a href="<?= $link['uri'] ?>" style="padding: 0.5rem 0.85rem; border: 1px solid var(--line); border-radius: 0.5rem; font-size: 0.875rem; font-weight: <?= $link['active'] ? '800' : '400' ?>; background: <?= $link['active'] ? 'var(--primary)' : '#fff' ?>; color: <?= $link['active'] ? '#fff' : 'var(--text)' ?>;">
            <?= $link['title'] ?>
        </a>
    <?php endforeach; ?>
    
    <?php if ($pager->hasNext()): ?>
        <a href="<?= $pager->getNext() ?>" style="padding: 0.5rem 0.85rem; border: 1px solid var(--line); border-radius: 0.5rem; color: var(--muted); font-size: 0.875rem;">›</a>
    <?php endif; ?>
</nav>
<?php endif; ?>
