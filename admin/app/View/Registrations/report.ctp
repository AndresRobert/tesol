<div class="container">
    <div class="row center">
        <div class="col s12">
            <h5 class="center-align">Amount Received</h5>
            <h5 class="center-align">$<?php echo $amount[0][0]['total']; ?></h4>
        </div>
    </div>
    <div class="row center">
        <div class="col s6">
            <h6><?php echo $total; ?> Registrations</h5>
            <canvas id="totalChart" width="300px" height="300px"></canvas>
        </div>
        <div class="col s6">
            <h6>Distribution</h5>
            <canvas id="disributionChart" width="300px" height="300px"></canvas>    
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById("totalChart").getContext('2d');
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [<?php echo $total - $attended[0][0]['total']; ?>, <?php echo $attended[0][0]['total']; ?>],
                backgroundColor: ["#ef5350", "#81c784"]
            }],
            labels: ['Register only (<?php echo round(($total - $attended[0][0]['total']) / $total * 100, 1); ?>%)', 'Attended (<?php echo round($attended[0][0]['total'] / $total * 100, 1); ?>%)']
        },
        options: {
            color: ['red','green'],
            responsive: false
        }
    });
    var cty = document.getElementById("disributionChart").getContext('2d');
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [<?php echo $presenters; ?>, <?php echo $teachers; ?>, <?php echo $students; ?>, <?php echo $piaps; ?>, <?php echo $embassies; ?>, <?php echo $keynotes; ?>, <?php echo $others; ?>]
            }],
            labels: ['Presenters', 'Teachers', 'Students', 'PIAP', 'Embassy', 'Keynote Speakers', 'Others']
        },
        options: {
            responsive: false
        }
    });
</script>
