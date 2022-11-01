<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
          class="logo-name">Saifur's SV</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="<?= ($activePage == 'dashboard') ? 'active':''; ?>">
        <a href="index.php" class="nav-link">
          <i data-feather="home"></i><span>Dashboard</span>
        </a>
      </li>
      <?php 
        if ($_SESSION['role']==5) {?>
        <li class="<?= ($activePage == 'users') ? 'active':''; ?>">
          <a href="users.php" class="nav-link">
            <i data-feather="user-check"></i><span>All User List</span>
          </a>
        </li>
        <?php }
      ?>
      <li class="<?= ($activePage == 'student') ? 'active':''; ?>">
        <a href="words.php" class="nav-link">
          <i data-feather="book-open"></i><span>All Vocabulary</span>
        </a>
      </li>
    </ul>
  </aside>
</div>