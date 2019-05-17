<div class="container users form">
    <h5>Add User</h5>
    <div class="row card-panel" style="margin: 2em auto;">
        <?php echo $this->Form->create('User'); ?>
        <?php echo $this->Form->input('email', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('first_name', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('last_name', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('username', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('password', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('regdate', ['type' => 'hidden', 'value' => date('Y-m-d H:i:s')]); ?>
        <div class="input-field col s12">
            <?php echo $this->Form->button(__('Submit'), ['type' => 'submit', 'name' => 'action', 'class' => 'btn waves-effect red lighten-1 center']); ?>
        </div>
    </div>
</div>