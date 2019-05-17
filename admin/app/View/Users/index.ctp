<div class="container">
    <h5>Users <a href="/users/add" class="btn-small blue darken-4 right"><i class="material-icons">add</i></a></h5>
    <div class="row">
        <?php if ($users) : ?>
            <table class="display compact row-border">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['User']['regdate']; ?></td>
                        <td><?php echo $user['User']['username']; ?></td>
                        <td><?php echo $user['User']['email']; ?></td>
                        <td><?php echo $user['User']['first_name']; ?></td>
                        <td><?php echo $user['User']['last_name']; ?></td>
                        <td>
                            <a href='/users/delete/<?php echo $user['User']['id']; ?>' class='btn-small blue darken-4 right'><i class='material-icons'>delete</i></a>
                            <a href='/users/edit/<?php echo $user['User']['id']; ?>' class='btn-small blue darken-4 right'><i class='material-icons'>create</i></a></td>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            No users found
        <?php endif; ?>
    </div>
</div>
