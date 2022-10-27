<?php
$capital = 50000;

include_once "../dbh.inc.php";
$sql = "SELECT * FROM stock_data";
$result = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/choose.css?v=<?php echo time();?>">
    <title>GROWI</title>
</head>
<body>
    <p class="bal_info">
       
    
    Your Investable Balance: 
        
        <span class="bal">       
        <span class="rs">Rs.</span><span id="bal"><?php echo $capital ?></span>
</span>


       <form id="choose_form" method="POST" action="getstocks.php">

       <?php
            $i =0 ;
            if (mysqli_num_rows($result) > 0) 
            {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {?>


        <div class="stock_card">
            <div class="stock_si"><?php echo $row["SID"] ?></div>
            <span class="stock_name"><?php echo $row["Symbol"] ?></span>

            <span class="stock_rate">
                    <span>₹</span>
                    <span class="stoke_rate_value"><?php echo $row["old_price"] ?></span>
            </span>

            <input type="number" inputmode="numeric" value="0" name="<?php echo $row["SID"] ?>" id="<?php echo $row["SID"] ?>" min="0" max="100">
        </div>

        


        <?php

             $prices[$i] = $row["old_price"];   
             $i++;
            }
            
        }
                ?>
    </p>

    <div class="wrap">
    <input type="button" class="save_btn" value="SAVE" onclick="sum();" >
    <input  type="button" class="submit_btn" value="CHECK" onclick="check_bal();">
    </div>
    </form>

</body>
<script>

// var jprices = <?php echo json_encode($prices) ?>;

// var jnames = new Array();

// for(var i = 0;i <15;i++)
// {
//    var j = i+1;
//      jnames.push(document.getElementById(j).value);
// }
// console.log(jprices);
// console.log(jnames);




function check_bal()
{


    var jprices = <?php echo json_encode($prices) ?>;

var jnames = new Array();

for(var i = 0;i <15;i++)
{
   var j = i+1;
     jnames.push(document.getElementById(j).value);
}
   
    var sum = 0;
for(var i = 0; i < 15; i++)
{
    var temp = parseInt(jprices[i])*parseInt(jnames[i]);
    sum+=temp;
}
console.log(sum);

    document.getElementById("bal").innerHTML= <?php echo $capital; ?> - sum;
    
}

function sum()
{

    var jprices = <?php echo json_encode($prices) ?>;

var jnames = new Array();

for(var i = 0;i <15;i++)
{
   var j = i+1;
     jnames.push(document.getElementById(j).value);
}



    var sum = 0;
    for(var i = 0; i < 15; i++)
{
    var temp = parseInt(jprices[i])*parseInt(jnames[i]);
    console.log(temp);
    sum+=temp;
}
    if(sum > 50000)
    {
        console.log(sum)
        alert("You exceeded the capital")
    }
    else
    {
        document.getElementById("choose_form").submit();
    }
}


</script>

</html>