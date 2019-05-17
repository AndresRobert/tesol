<div class="container users form">
    <h5>New Registration</h5>
    <div class="row card-panel" style="margin: 2em auto;">
        <?php echo $this->Form->create('Registration'); ?>
        <?php echo $this->Form->input('first_name', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('last_name', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('country', ['div' => ['class' => 'input-field col s12'], 'class' => 'autoCountry']); ?>
        <?php echo $this->Form->input('id_number', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('email', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('occupation', ['div' => ['class' => 'input-field col s12'], 'class' => 'autoOccupation']); ?>
        <?php echo $this->Form->input('organization', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('amount_paid', ['div' => ['class' => 'input-field col s12']]); ?>
        <div class="input-field col s12">
            <?php echo $this->Form->button(__('Register'), ['type' => 'submit', 'name' => 'action', 'class' => 'btn waves-effect red lighten-1 center']); ?>
        </div>
    </div>
</div>
<script>
    $(function(){
        
    });
</script>
