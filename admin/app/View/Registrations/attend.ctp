<div class="container users form">
    <h5>Registration Info</h5>
    <div class="row card-panel" style="margin: 2em auto;">
        <?php echo $this->Form->create('Registration'); ?>
        <?php echo $this->Form->input('id', ['type' => 'hidden']); ?>
        <?php echo $this->Form->input('first_name', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('last_name', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('country', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('id_number', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('email', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('occupation', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('organization', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('amount_paid', ['div' => ['class' => 'input-field col s12']]); ?>
        <?php echo $this->Form->input('attendance_count', ['div' => ['class' => 'input-field col s12', 'style' => 'display:none;']]); ?>
        <div id="attendance_date" class="input-field col s12" style="display: none;">
            Last attendance date: <?= $registration['Registration']['attendance_date'] ?>
        </div>
        <div class="input-field col s12">
            <?php echo $this->Form->button(__('Attended'), ['type' => 'submit', 'name' => 'action', 'class' => 'btn waves-effect red lighten-1 center']); ?>
        </div>
    </div>
    <script>
        $(function () {
            var $amount_paid = $('#RegistrationAmountPaid');
            var $attendance_count = $('#RegistrationAttendanceCount');
            var $attendance_date = $('#attendance_date');
            if ($amount_paid.val() == 0) {
                $amount_paid.css('background-color','#F44');
            }
            if ($attendance_count.val() > 0) {
                $attendance_count.css('background-color', '#fc2');
                $attendance_date.show();
            }
            if ($attendance_count.val() > 1) {
                $attendance_count.css('background-color', '#f44');
                $attendance_date.show();
            }
        });
    </script>
</div>
