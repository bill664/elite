<?php session_start(); ?>
<nav>

  <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
    <a href="admin_portal.php">Admin</a>
  <?php endif; ?>
</nav>
