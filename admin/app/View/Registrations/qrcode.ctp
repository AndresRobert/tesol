<div class="card-panel center-align">
    <h5>Hello <?= $registration['Registration']['first_name'] ?> <?= $registration['Registration']['last_name'] ?>, show this code at the conference entrance</h5>
    <img src="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl=<?= $destination ?>&amp;choe=UTF-8" alt="My QR ID">
    <p><strong class="green-text">Be green</strong>, try not to print it! If you don't have mobile connection you can save a screenshot.</p>
</div>
