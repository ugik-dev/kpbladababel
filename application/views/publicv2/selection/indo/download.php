<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->

<!-- download section begin -->
<section class="download-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="download-text">
                    <h5 class="download-title">Belajar, Rencanakan, Investasikan Lada</h5>
                    <h2 class="download-subtitle">Our Smart</h2>

                </div>
                <div class="app-features">
                    <div style="width:75%;">
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <!-- <div class="right-area"> -->
                <img class="center" src="<?= base_url('assets/img/') ?>bg-lada2.jpg" style="background-size: cover;margin-top: 100px;" alt="#" />
                <!-- <img class="ellipse-01" src="<?= base_url('assets/assets_v2/') ?>img/download-bg-ellipse-01.png" alt="#" />
                    <img class="ellipse-03" src="<?= base_url('assets/assets_v2/') ?>img/download-bg-ellipse-03.png" alt="#" />
                    <img class="ellipse-04" src="<?= base_url('assets/assets_v2/') ?>img/download-bg-ellipse-04.png" alt="#" />
                    <img class="smart-phone" src="<?= base_url('assets/assets_v2/') ?>img/download-smart-phone.png" alt="#" /> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

<script>

</script>
<!-- <script>
    var lineChartData = {
        labels: ['1 Februari', '2 February', ' 3 February', ' 4 February', 'May'],
        datasets: [{
            label: 'Mixed Quality',
            borderColor: window.chartColors.red,
            backgroundColor: window.chartColors.red,
            fill: false,
            data: [
                60300,
                61300,
                66300,
                62300,
                60500,
              
            ],
            yAxisID: 'y-axis-1',
        }, {
            label: 'SNI 2',
            borderColor: window.chartColors.blue,
            backgroundColor: window.chartColors.blue,
            fill: false,
            data: [
                62300,
                62300,
                67300,
                69600,
                63500,
               
            ],
            yAxisID: 'y-axis-2'
        }, {
            label: 'SNI 1',
            borderColor: window.chartColors.green,
            backgroundColor: window.chartColors.green,
            fill: false,
            data: [
                65300,
                64300,
                62300,
                63600,
                64500,
               
            ],
            yAxisID: 'y-axis-2'
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = Chart.Line(ctx, {
            data: lineChartData,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                title: {
                    display: true,
                    text: 'Chart.js Line Chart - Multi Axis'
                },
                scales: {
                    yAxes: [{
                        type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: 'left',
                        id: 'y-axis-1',
                    }, {
                        type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: 'right',
                        id: 'y-axis-2',

                        // grid line settings
                        gridLines: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    }],
                }
            }
        });
    };

</script> -->
<!-- <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script> -->
<!-- download section end -->