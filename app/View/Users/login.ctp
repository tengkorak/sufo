<div class="users form">
    <?php //echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php //echo __('Please enter your username and password'); ?>
        </legend>
        <?php
        echo $this->Form->input('uid');
        echo $this->Form->input('pswd');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>