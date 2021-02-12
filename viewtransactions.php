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
            .customercontainer{
                border-radius:2%;
                width:650px;
                height:250px;
                margin-left:40%;
                margin-top:7%;
                margin-right:5%;
                padding-left:5%;
                padding-top:5%;
                padding-bottom:5%;
                padding-right:5%;
                overflow-x:hidden;
                overflow-y:auto;
                background-color:rgba(197, 197, 180, 0.795);
                color:white;
            }
            .sbtn{
                color:white;
                text-decoration:none;
            }
            table{
                border-collapse:collapse;
                width:100%;
                font-size:16px;
                text-align:left;
            }
            th{
                background-color:rgb(98,98,98);
                background-size:cover;
            }
            th,td{
                padding:6px;
            }
            tr:nth-child(odd){
                background-color:rgb(125,125,125);
            }
            tr:nth-child(even){
                background-color:rgb(145,145,145);
            }
            .slink{
                
                text-align:center;
            }
            .slink:hover{
                
                background-color:black;
            }
           
            
        </style>
    </head>
    <body>
        <header>
            <div class="homebtn"><button class="hbtn" onclick="window.location.href='bankhome.html'">HOME</button></div>
            <h2 style="text-align: center;">WELCOME TO BANKING SYSTEM</h2>
        </header>
        <div class="customercontainer">
            <table>
                <tr>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Date and Time</th>
                </tr> 
                <?php
            $conn=new mysqli("localhost","root","","grip_online_banking");
            if($conn->connect_error)
            {
                die("Connection failed: ". $conn->connect_error);
            }
            $sql="SELECT * FROM transactions";
            $result=$conn->query($sql);
            if($result && $result->num_rows)
            {
                while($row=$result->fetch_assoc())
                {
                    echo "<tr><td>".$row["Sender"]."</td><td>".$row["Receiver"]."</td><td>".$row["Amount"]."</td><td>".$row["Date and Time"]."</td></tr>";
             }
             echo "</table>";
            }
             else
            {
                echo '<script>alert("No transactions found")</script>';
            } 
            $conn->close();
            ?>
            </table>
            
        </div>
    </body>
</html>