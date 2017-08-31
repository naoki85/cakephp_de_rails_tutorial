<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <?= $this->Html->link("sample app",
        ['controller' => 'StaticPages', 'action' => 'home'],
        ['id' => "logo"]); ?>
    <nav>
      <ul class="nav navbar-nav navbar-right">
        <li><?= $this->Html->link("Home",
            ['controller' => 'StaticPages', 'action' => 'home']); ?></li>
        <li><?= $this->Html->link("Help",
            ['controller' => 'StaticPages', 'action' => 'help']); ?></li>
        <li><?= $this->Html->link("Log in", '#'); ?></li>
      </ul>
    </nav>
  </div>
</header>