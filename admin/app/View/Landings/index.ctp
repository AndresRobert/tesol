<div class="container">
    <h5>Contacts from landing page</h5>
    <div class="row">
        <?php if ($landings) : ?>
            <table class="display compact row-border">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Contacted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($landings as $landing) : ?>
                    <tr>
                        <td><?php echo $landing['Landing']['regdate']; ?></td>
                        <td><?php echo $landing['Landing']['name']; ?></td>
                        <td><?php echo $landing['Landing']['email']; ?></td>
                        <td><?php echo $landing['Landing']['phone']; ?></td>
                        <td><?php echo $landing['Landing']['message']; ?></td>
                        <?php if ($landing['Landing']['contacted'] == 0) : ?>
                            <td><a href='/landings/contact/<?php echo $landing['Landing']['id']; ?>' class='btn-small blue darken-4 right' title='Contact'>Done</a></td>
                        <?php else : ?>
                            <td>Contacted</td>
                        <?php endif; ?>
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
            <button class="btn blue darken-4 right" onclick="window.open('/landings/export');">Export<i class="material-icons right">get_app</i></button>
        </div>
    </div>
</div>
