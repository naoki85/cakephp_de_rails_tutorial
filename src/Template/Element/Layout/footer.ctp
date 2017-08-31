<footer class="footer">
  <small>
    The <a href="https://railstutorial.jp/">Ruby on Rails Tutorial</a>
    by <a href="http://www.michaelhartl.com/">Michael Hartl</a>
  </small>
  <nav>
    <ul>
      <li><?= $this->Html->link("About",   ['controller' => 'StaticPages', 'action' => 'about']); ?></li>
      <li><?= $this->Html->link("Contact", ['controller' => 'StaticPages', 'action' => 'contact']); ?></li>
      <li><a href="http://news.railstutorial.org/">News</a></li>
    </ul>
  </nav>
</footer>