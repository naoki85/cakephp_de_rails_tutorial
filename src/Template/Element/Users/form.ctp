<?= $this->Form->create($user) ?>
<fieldset>
    <?php
        echo $this->Form->control('name',
            ['class' => 'form-control', 'require' => true]);
        echo $this->Form->control('email',
            ['type' => 'email', 'class' => 'form-control', 'require' => true]);
        echo $this->Form->control('password',
            ['type' => 'password', 'class' => 'form-control', 'require' => true]);
        echo $this->Form->control('password_confirmation',
            ['type' => 'password', 'class' => 'form-control', 'require' => true]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>