<div class="container">
    <h5>Registrations (<?php echo $total_registrations; ?>) <a href="/registrations/register" class="btn-small blue darken-4 right" title="Add"><i class="material-icons">add</i></a></h5>
    
    <div class="row">
        <?php if ($registrations) : ?>
            <table class="display compact row-border">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Info</th>
                        <th>Registered by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registrations as $registration) : ?>
                    <?php $registration['Registration']['attendance_date'] = $registration['Registration']['attendance_date'] == null ? '-' : $registration['Registration']['attendance_date']; ?>
                    <?php $registered_by = $registration['Registration']['users_id'] == null ? 'Website' : $users[$registration['Registration']['users_id']]; ?>
                    <?php $early_bird = $registration['Registration']['regdate'] < '2018-11-10 00:00:00' ? 'background-color: #FFC;' : '' ?>
                    <?php $already_attended = $registration['Registration']['attendance_count'] > 0 ? 'font-weight: bold;' : '' ?>
                    <tr style="<?php echo $early_bird; ?> <?php echo $already_attended; ?>">
                        <td><?php echo $registration['Registration']['regdate']; ?></td>
                        <td>
                            <div style="display: none;"><?php echo $registration['Registration']['last_name']; ?> <?php echo $registration['Registration']['first_name']; ?></div>
                            <?php echo $registration['Registration']['first_name']; ?> <?php echo $registration['Registration']['last_name']; ?><br />
                            <?php echo $registration['Registration']['id_number']; ?><br />
                            <?php echo $registration['Registration']['email']; ?>
                        </td>
                        <td>
                            <small>Occupation:</small> <?php echo $registration['Registration']['occupation']; ?><br />
                            <small>Organization:</small> <?php echo $registration['Registration']['organization']; ?><br />
                            <small>Country:</small> <?php echo $registration['Registration']['country']; ?><br />
                            <small>Amount paid:</small> <?php echo $registration['Registration']['amount_paid']; ?><br />
                            <small>Last Attendance:</small> <?php echo $registration['Registration']['attendance_date']; ?><br />
                            <small>Attendances:</small> <?php echo $registration['Registration']['attendance_count']; ?>
                        </td>
                        <td><?php echo $registered_by; ?></td>
                        <td>
                            <a href='/registrations/attend/<?php echo $registration['Registration']['id']; ?>' class='btn-small blue darken-4 right' title='Attend'><i class='material-icons'>event_available</i></a>
                            <a href='/registrations/edit/<?php echo $registration['Registration']['id']; ?>' class='btn-small blue darken-4 right'  title='Edit'><i class='material-icons'>create</i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            No landings found
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <button class="btn blue darken-4 right" onclick="window.open('/registrations/export');">Export<i class="material-icons right">get_app</i></button>
        </div>
    </div>
</div>
