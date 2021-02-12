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
            }
            .hbtn:active{
                background-color:rgba(0,0,0,0.65);
                color: white;
            }
            .formcontainer{
                border-radius:2%;
                width:400px;
                height:180px;
                margin-left:50%;
                margin-top:7%;
                margin-right:5%;
                padding-left:10%;
                padding-top:5%;
                padding-bottom:5%;
                padding-right:5%;
                background-color:rgba(197, 197, 180, 0.795);
                color:white;
            }
           
            .transferform{
                font-size:20px;
            }
            label{
                color:black;
            }
            .trbtn{
                font-size:15px;
                border-radius:10%;
                border:hidden;
                padding:3%;
            }
            .trbtn:hover{
                background-color:rgba(0,0,0,0.65);
                color: white;
                border: hidden;
                -ms-transform: scale(1.2);
                -webkit-transform: scale(1.2);
                transform: scale(1.2);
            }
            .brbtn{
                font-size:15px;
                border-radius:10%;
                border:hidden;
                padding:3%;
            }
            .brbtn:hover{
                background-color:rgba(0,0,0,0.65);
                color: white;
                border: hidden;
                -ms-transform: scale(1.2);
                -webkit-transform: scale(1.2);
                transform: scale(1.2);
            }
            
            
        </style>
    </head>
    <body>
        <header>
            <div class="homebtn"><button class="hbtn" onclick="window.location.href='bankhome.html'">HOME</button></div>
            <h2 style="text-align: center;">WELCOME TO BANKING SYSTEM</h2>
        </header>
        <div class="formcontainer">
        <?php
            $conn=new mysqli("localhost","root","","grip_online_banking");
            if($conn->connect_error)
            {
                die("Connection failed: ". $conn->connect_error);
            }
            $mail=$_GET["id"];
            $sql="SELECT * FROM customers";
            $result=mysqli_query($conn,$sql);   
            $options="";  
            while($row2=mysqli_fetch_array($result))
            {
                $options=$options."<option>$row2[1]</option>";
            }
            ?>
                <form class="transferform" action="transaction.php" method="POST">
                    <label><b>Sender:</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    <input type="email" name="smail" value="<?php echo $mail; ?>" readonly> <br><br>
                    <label><b>Receiver:</b></label> &nbsp;
				    <select name="rmail" required>
                        <?php
                        echo $options;
                        ?>
                    </select><br><br>
                    <label><b>Amount:</b></label>&nbsp;&nbsp;&nbsp;
				    <input type="number" name="amt" value="0.0" required> <br><br>
                    &nbsp;&nbsp;&nbsp;<button class="trbtn" type="submit">Transfer</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="brbtn" type="button" onclick="window.location.href='onetransaction.php'">Back to customers</button>
                </form>
        </div>
        <?php $conn->close(); ?>
    </body>
</html>