<html>
<head></head>
<body>

<style>
    html, body{background-color: black;  color: white;}

    html, body {
        height: 100%;
    }

    html {
        display: table;
        margin: auto;
    }

    body {
        display: table-cell;
        vertical-align: middle;
    }

    .rozmer{width: 50px; height: 50px; margin-right: 20px; margin-left: 20px;  }
    .name{font-weight: bold; padding: 10px; text-align: center;}
    .border{border: 1px solid blue;margin: 3px;}
    .border-black{border: 1px solid black;}
</style>

<script type="text/javascript">
    var i = 0;
    var local_time,year,month,day,hod,min,sec;

    var amounth = [1,2,3,4,5,6,7,8,9,10,11,12];
    var anumDay = ["Neděle","Pondělí","Úterý","Středa","Čtvrtek","Pátek","Sobota"];

    window.setInterval(function () {
        local_time = new Date();

        year    = local_time.getFullYear();
        month   = local_time.getMonth();
        day     = local_time.getDate();
        numDay  = local_time.getDay();
        hod     = local_time.getHours();
        min     = local_time.getMinutes();
        sec     = local_time.getSeconds();
    }, 100);

    window.setInterval(function () {

        document.getElementById('local-year').innerHTML =  year;
        document.getElementById('local-month').innerHTML = (amounth[month] < 10 ? '0' : '') + amounth[month];
        document.getElementById('local-day').innerHTML = (day < 10 ? '0' : '') + day;
        //document.getElementById('local-numDay').innerHTML = anumDay[numDay];
        document.getElementById('local-hod').innerHTML = (hod < 10 ? '0' : '') + hod;
        document.getElementById('local-min').innerHTML = (min < 10 ? '0' : '') + min;
        document.getElementById('local-sec').innerHTML = (sec < 10 ? '0' : '') + sec;

        addNull("year",year.toString().substr(2,2));
        addNull("month",amounth[month]);
        addNull("day",day);
        addNull("hod",hod);
        addNull("min",min);
        addNull("sec",sec);

        function addNull(name,num){
            num = ((num >>> 0).toString(2));
            if (num.length == 5) {num = '0' + num;}
            if (num.length == 4) {num = '00' + num;}
            if (num.length == 3) {num = '000' + num;}
            if (num.length == 2) {num = '0000' + num;}
            if (num.length == 1) {num = '00000' + num;}

            var arr = [];
            for(i=0; i<6; i++){
                arr[i] = num.substr(i,1);

                if(arr[i] == 1){
                    //document.getElementById(name + i).innerHTML = "red";
                    document.getElementById(name + i).style = "background-color:blue";
                }else{
                    document.getElementById(name + i).style = "background-color:black";
                    //document.getElementById(name + i).innerHTML = "black";
                }

            }
            return arr;
        }



    }, 100);

    window.setInterval(function () {location.reload(true);}, 4800000);

</script>


<?php
function divs($name){
    $n=["year"=>"Y","month"=>"M","day"=>"D","hod"=>"H","min"=>"M","sec"=>"S"];

    echo '<div class="name">'.$n[$name].'</div>';
    for ($i=0;$i<6;$i++){echo '<div class="rozmer border" id="'.$name.$i.'"></div>';}
    echo '<div class=" name" id="local-'.$name.'"></div>';
}

function name(){
    $arr=[32,16,8,4,2,1,"&nbsp;","&nbsp;"];

    echo '<div class="name">&nbsp</div>';
    for ($i=0;$i<6;$i++){echo '<div class="rozmer" style="border: 1px solid black;margin: 3px;"><br>'.$arr[$i].'</div>';}
    echo '<div class="name">&nbsp</div>';

}
?>
<p>
<div style="display: inline-block"><?php echo divs("year"); ?></div>
<div style="display: inline-block"><?php echo divs("month"); ?></div>
<div style="display: inline-block"><?php echo divs("day"); ?></div>

<div style="display: inline-block"><?php echo divs("hod"); ?></div>
<div style="display: inline-block"><?php echo divs("min"); ?></div>
<div style="display: inline-block"><?php echo divs("sec"); ?></div>

<div style="display: inline-block"><?php echo name(); ?></div>
</p>








</body>
</html>