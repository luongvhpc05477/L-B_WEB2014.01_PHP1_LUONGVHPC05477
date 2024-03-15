<script src="https://www.gstatic.com/charts/loader.js"></script>
<div class="row2">
    <div class="row2 font_title">
    <center><h1>Biểu đồ</h1></center>
    </div>
    <div class="row2 form_content">
        <div id="myChart" style="width: 100%; height: 500px;"></div>
        <script>
            google.charts.load('current', {
                packages: ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                const data = google.visualization.arrayToDataTable([
                    ['Country', 'Mhl'],
                    <?php
                    foreach ($listPro as $key => $value) {
                        extract($value);
                        echo "['$NAMEDM', $COUNTSP],";
                    }
                    ?>
                ]);
                const options = {
                    title: 'Thống kê theo danh mục sản phẩm',
                    is3D: true,
                    chartArea: { width: '80%', height: '80%' },
                    legend: { position: 'right' },
                    pieSliceText: 'label',
                    pieStartAngle: 100,
                    colors: ['#3366cc', '#dc3912', '#ff9900', '#109618', '#990099', '#0099c6', '#dd4477', '#66aa00', '#b82e2e', '#316395']
                };
                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
    </div>
</div>