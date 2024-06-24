<h1>Advertisements</h1>
<ul>
    <?php foreach ($advertisements as $advertisement): ?>
        <li><?= htmlspecialchars($advertisement['username']) ?>: <?= htmlspecialchars($advertisement['title']) ?></li>
    <?php endforeach; ?>
</ul>