<div class="container users form">
    <div class="row card-panel" style="margin: 2em auto;">
        <h5>Welcome</h5>
        <?php echo $this->Flash->render('auth'); ?>
        <?php echo $this->Form->create('User'); ?>
        <?php echo $this->Form->input('username', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('password', ['div' => ['class' => 'input-field col s12']]); ?>
        <div class="input-field col s12">
            <?php echo $this->Form->button(__('Login'), ['type' => 'submit', 'name' => 'action', 'class' => 'btn waves-effect blue darken-4 center']); ?>
        </div>
    </div>
</div>