<div class="center jumbotron">
  <h1>Welcome to the Sample App</h1>

  <h2>
    This is the home page for the
    <a href="https://railstutorial.jp/">Ruby on Rails Tutorial</a>
    sample application.
  </h2>

  <?= $this->Html->link("Sign up now!", '#', ["class" => "btn btn-lg btn-primary"]); ?>
</div>

<?= $this->Html->link($this->Html->image("rails.png", ["alt" => "Rails logo"]),
            'http://rubyonrails.org/', ['escape' => false]); ?>