<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $candidatesdata = $_SESSION['candidatesdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';
    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online voting system - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        #Profile{
            background-color: white;
            width: 30%;
            padding: 20px;
            float: left;
        }

        #Candidate{
            background-color: white;
            width: 60%;
            padding: 20px;
            float: right;
        }

        #votebtn{
            padding: 5px;
            font-size: 15px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
        }

        #mainpanel{
            padding: 10px;
        }

        #voted{
            padding: 5px;
            font-size: 15px;
            background-color: green;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div id="mainSection">
        <center>
        <div id="headerSection"> 
        <a href="../"><button id="backbtn">Back</button></a>
        <a href="logout.php"><button id="logoutbtn">Logout</button></a>
            <h1>Online Voting System</h1>
        </div>
        </center>
        <hr>
        <div id="mainpanel">
            <div id="Profile">
                <center>
                <img src="../uploads/<?php echo $userdata['photo'] ?>" height="80" width="80">
                </center>
                <br><br>
                <b>Name:</b><?php echo $userdata['name'] ?>
                <br><br>
                <b>Mobile:</b><?php echo $userdata['mobile'] ?>
                <br><br>
                <b>Address:</b><?php echo $userdata['address'] ?>
                <br><br>
                <b>Status:</b><?php echo $status ?>
                <br><br>
            </div>
            <div id="Candidate">
                <?php
                if($_SESSION['candidatesdata']){
                    for($i=0;$i<count($candidatesdata);$i++){
                        ?>
                        <div>
                            <img style="float: right" src="../uploads/<?php echo $candidatesdata[$i]['photo'] ?>" height="80" width="80">
                            <b>Candidate Name:</b><?php echo $candidatesdata[$i]['name'] ?>
                            <br><br>
                            <b>Votes:</b><?php echo $candidatesdata[$i]['votes'] ?>
                            <br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="cvotes" value="<?php echo $candidatesdata[$i]['votes'] ?>">
                                <input type="hidden" name="cid" value="<?php echo $candidatesdata[$i]['id'] ?>">
                                <?php
                                if($_SESSION['userdata']['status']==0){
                                    ?>
                                    <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                    <?php
                                }
                                else{
                                    ?>
                                    <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                                    <?php 
                                }
                                ?>
                            </form>
                        <div>
                        <hr>
                        <?php
                    }
                }
                else{

                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>