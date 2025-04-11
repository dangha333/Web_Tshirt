<ul class="page-numbers">
    <?php if (isset($current_page) && isset($totalPages) && isset($item_per_page)): ?>
        <?php if ($current_page > 1): ?>
            <li><a class="prev page-numbers" href="?act=danhsachsanpham&per_page=<?= $item_per_page ?>&page=<?= $current_page - 1 ?>">Previous</a></li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li>
                <?php if ($i === $current_page): ?>
                    <span aria-current="page" class="page-numbers current"><?= $i ?></span>
                <?php else: ?>
                    <a class="page-numbers" href="?act=danhsachsanpham&per_page=<?= $item_per_page ?>&page=<?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
            </li>
        <?php endfor; ?>

        <?php if ($current_page < $totalPages): ?>
            <li><a class="next page-numbers" href="?act=danhsachsanpham&per_page=<?= $item_per_page ?>&page=<?= $current_page + 1 ?>">Next</a></li>
        <?php endif; ?>
    <?php else: ?>
        <p>Không có trang nào để hiển thị.</p>
    <?php endif; ?>
</ul>