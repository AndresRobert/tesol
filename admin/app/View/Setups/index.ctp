<div class="container">
    <h5>Configurations</h5>
    <p>Here you can set some minor behaviors up</p>
    <div class="card-panel">
        <h6>Registration</h6>
        <?php foreach($setups as $setup) : ?>
            <?php if ($setup['Setup']['type'] == 'bool') : ?>
            <p>
                <label>
                    <input id="<?= $setup['Setup']['item'] ?>" type="checkbox" <?php if ($setup['Setup']['value'] == 'true') {echo 'checked="checked"';} ?>/>
                    <span><?php echo $setup['Setup']['item'] == 'show_registration_form' ? 'Show Registration Form' : $setup['Setup']['item']; ?></span>
                </label>
            </p>
            <script>
                $(function () {
                    $('#<?= $setup['Setup']['item'] ?>').change(function () {
                        var _value = 'false';
                        if ($(this).is(":checked")) {
                            _value = 'true';
                        }
                        $.post('/setups/edit',
                            {id: '<?= $setup['Setup']['id'] ?>', value: _value},
                            function (response) {
                                //console.log(response);
                            }
                        );
                    });
                })
            </script>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="card-panel" style="display:none;">
        <h6>Friends</h6>
        <div class="row">
            <form action="/setups/add_friend" method="post" enctype="multipart/form-data">
                <div class="col s12 file-field input-field">
                    <div class="btn-small blue darken-4">
                        <span>Add Friend</span>
                        <input name="image" type="file" onchange="$(this).submit()">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </form>
        </div>
        <ul class="collection">
        <?php foreach ($friends as $friend) : ?>
            <li class="collection-item">
                <div>
                    <img src="/img/<?= $friend['value'] ?>" class="responsive-img" style="max-width: 150px; max-height: 30px;">
                    <a href="#!" class="secondary-content"><i class="blue-text material-icons">delete_forever</i></a>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>