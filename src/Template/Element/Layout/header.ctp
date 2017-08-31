<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <?= $this->Html->link("sample app", '#',['id' => "logo"]); ?>
    <nav>
      <ul class="nav navbar-nav navbar-right">
        <li><?= $this->Html->link("Home",   '#'); ?></li>
        <li><?= $this->Html->link("Help",   '#'); ?></li>
        <li><?= $this->Html->link("Log in", '#'); ?></li>
      </ul>
    </nav>
  </div>
</header>