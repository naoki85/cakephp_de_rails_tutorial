<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <nav class="col-lg-3 col-md-4" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $user->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
                )
            ?></li>
            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        </ul>
    </nav>
    <div class="users form col-lg-9 col-md-8 columns content">
        <legend><?= __('Edit User') ?></legend>
        <?= $this->element('Users/form'); ?>
    </div>
</div>
