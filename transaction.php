<!DOCTYPE html>
<html>
    <head>
        <title>Banking System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <style>
            body{
                background-image: url("bank1.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
            }
            header{
                padding: 6px;
                margin-top: -15px;
                margin-right: -7px;
                margin-left: -7px;
                background-color: rgba(197, 197, 180, 0.795);
            }
            
            .hbtn{
                padding-top: 23px;
                padding-left: 15px;
                padding-right: 10px;
                padding-bottom: 23px;
                margin-right: -6px;
                margin-bottom: auto;
                float: right;
                font-size:24px;
                background: transparent;
                border: hidden;
            }
            .hbtn:hover{
                background-color:rgba(0,0,0,0.65);
                color: white;
                border: hidden;
            }
            .hbtn:active{
                background-color:rgba(0,0,0,0.65);
                color: white;
                border: hidden;
            }
            .viewcontainer{
                margin-top: 18%;
                margin-bottom: 18%;
                margin-right: 18%;
                margin-left: 44%;
                border: transparent;
            }
            .vbtn{
                padding: 5%;
                border-radius: 50%;
                font-size: 18px;
                border: hidden;
                background-color:rgba(236, 231, 231, 0.774);
            }
            .vbtn:hover{
                background-color:black;
                color:white;
                -ms-transform: scale(1.1);
                -webkit-transform: scale(1.1);
                transform: scale(1.1);
                border: transparent;
            }
            .tbtn{
                margin-left: 5%;
                padding: 5%;
                border-radius: 50%;
                font-size: 18px;
                border: hidden;
                background-color:rgba(236, 231, 231, 0.774);
            }
            .tbtn:hover{
                background-color:black;
                color:white;
                -ms-transform: scale(1.1);
                -webkit-transform: scale(1.1);
                transform: scale(1.1);
                border: transparent;
            }
            .php{
                color:white;
            }
            
        </style>
    </head>
    <body>
        <header>
            <div class="homebtn"><button class="hbtn" onclick="window.location.href='bankhome.html'">HOME</button></div>
            <h2 style="text-align: center;">WELCOME TO BANKING SYSTEM</h2>
        </header>
        <div class="viewcontainer">
            <button class="vbtn" onclick="window.location.href='onetransaction.php'">VIEW ALL CUSTOMERS</button>
            <button class="tbtn" onclick="window.location.href='viewtransactions.php'">ALL TRANSACTIONS</button>
        </div>
        
        <footer style="margin-left: 45%;color: white;font-size: 18px;">
            <marquee>*This site for Online Banking is developed as task of The Sparks Foundation GRIP internship function Web Development.</marquee>
        </footer>
        <div class="php">
        <?php
    $smail=$_POST['smail'];
    $rmail=$_POST['rmail'];
    $amt=$_POST['amt'];
    if (!empty($smail) || !empty($rmail) || !empty($amt))
    {
     $host="localhost";
     $dbusername="root";
     $dbpassword="";
     $dbname="grip_online_banking";
     $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
     if(mysqli_connect_error()){
         die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
     }
     else{
        $result1=mysqli_query($conn,"SELECT * FROM customers WHERE Email_id='$smail'");
        if($result1 === FALSE) { 
            die($conn->error); // TODO: better error handling
        }
        
        while($row = mysqli_fetch_array($result1))
        {
            $sobal= $row['Balance_Amount'];
        }
        $result2=mysqli_query($conn,"SELECT * FROM customers WHERE Email_id='$rmail'");
        if($result2 === FALSE) { 
            die($conn->error); // TODO: better error handling
        }
        
        while($row = mysqli_fetch_array($result2))
        {
            $robal= $row['Balance_Amount'];
        }
        if($amt>=$sobal)
        {
            echo '<script>alert("Insufficient Balance")</script>'; 
        }
        else{
            $snbal=$sobal-$amt;
            $rnbal=$robal+$amt;
            mysqli_query($conn,"INSERT INTO transactions (Sender,Receiver,Amount)  VALUES ('$smail','$rmail','$amt')");
				
          if(mysqli_affected_rows($conn) > 0){
            echo '<script>alert("Transaction Successfull")</script>'; 
        
         } else {
            echo '<script>alert("Transaction failed")</script>'; 
        
            echo mysqli_error ($conn);
         }
        $sql3 = "UPDATE customers SET Balance_Amount='$snbal' WHERE Email_id='$smail'";

     if ($conn->query($sql3) === TRUE) {
     echo "";
    } else {
     echo "Error updating record: " . $conn->error;
    }
     $sql4 = "UPDATE customers SET Balance_Amount='$rnbal' WHERE Email_id='$rmail'";

     if ($conn->query($sql4) === TRUE) {
    echo "";
   } else {
     echo "Error updating record: " . $conn->error;
    }
        }
    }
    }
 ?>
        </div>
    </body>
</html>
