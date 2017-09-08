<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <nav class="col-lg-3 col-md-4" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        </ul>
    </nav>
    <div class="users form col-lg-9 col-md-8 columns content">
        <legend><?= __('Add User') ?></legend>
        <?= $this->element('Users/form'); ?>
    </div>
</div>
