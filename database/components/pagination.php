<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php if ($page > 1) : ?>
      <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo htmlspecialchars($search); ?>"><i class="bi bi-arrow-left-square-fill"></i></a></li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
      <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
        <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>"><?php echo $i; ?></a>
      </li>
    <?php endfor; ?>

    <?php if ($page < $totalPages) : ?>
      <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo htmlspecialchars($search); ?>"><i class="bi bi-arrow-right-square-fill"></i></a></li>
    <?php endif; ?>
  </ul>
</nav>