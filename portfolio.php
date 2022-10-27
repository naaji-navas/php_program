<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <link rel="stylesheet" href="assets/style.css?v=<?php echo time();?>">
    <title>GROWI</title>
</head>
<body>
            <div class="top_header">
                <i class="ri-menu-line"></i>
                <i class="ri-notification-3-line"></i>
            </div>


            <h3 class="port_heading"> My Portfolio </h3>

            <div class="my_inv">
                <canvas id="inv_chart"></canvas>
            </div>

           

            <div class="my_port" style="margin:20px;margin-top:5rem">
            <h5 class="port_heading"> Current League </h5>
                <canvas id="port_chart"></canvas>
            </div>

            <div class="my_port" style="margin:20px;margin-top:5rem">
            <h5 class="port_heading"> League Statistics </h5>
                <canvas id="league_growth"></canvas>
            </div>


            <div class="foot_nav">

                <div class="footer_icon">
                    <a href="index.php">
                    HOME
                    <i class="ri-home-3-line"></i>
                </a>
                 </div>
                 <div class="footer_icon">
                    <a href="portfolio.php"  class="active-foot">
                    PORTFOLIO
                     <i class="ri-briefcase-3-fill"></i>
                    </a>
                 </div>
                 <div class="footer_icon">
                    <a href="profile.php">
                    PROFILE
                    <i class="ri-profile-line"></i>
                </a>
                 </div>
                 <div class="footer_icon">
                    <a href="help.php">
                    HELP
                    <i class="ri-questionnaire-line"></i>
                </a>
                 </div>

            </div>

            <script>

                const labels = [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July'
                ];

                const data = {
                    labels: labels,
                    datasets: [{
                    label: 'Portfolio Growth',
                    backgroundColor: '#00c699',
                    borderColor: '#02062c',
                    data: [0, 10, 5, 2, 20, 30, 45],
                    }]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {}
                };
                

                const myChart = new Chart(
                document.getElementById('inv_chart'),
                config
            );



var btx = document.getElementById("port_chart").getContext('2d');
var myChart1 = new Chart(btx, {
  type: 'pie',
  data: {
    labels: ["ACC","TCS","INFOSYS","LT"],
    datasets: [{
      backgroundColor: [
        "#00b680","#0096FF","#2e3786","#00FFFF"

      ],
      data: ["497","503","100","56"]    }]
  },
});

var btx = document.getElementById("league_growth").getContext('2d');
var myChart2 = new Chart(btx, {
  type: 'bar',

  data: {
    labels: ["ACC","TCS","INFOSYS","LT"],
    datasets: [{
        label: 'Realtime Analysis',
      backgroundColor: [
        "#00FFFF","#40E0D0","#0096FF","#00FFFF"

      ],
      data: ["497","503","100","56"]    }]
  },
});



</script>

</body>
</html>