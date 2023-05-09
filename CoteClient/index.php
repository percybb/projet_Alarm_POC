<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Alarm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 

        session_start();
    	$servername="localhost";
        $password = "";
        $username="root";
        $databasename = "alarm";
    
        $conn = new mysqli($servername,$username,$password,$databasename);
        
        $msg="";
        $name="";
        $psw="";

        if(isset($_POST['host']) and isset($_POST['psw']) )
        {
            echo "entro";  
            $name= $_POST["host"];
            $psw = $_POST["psw"];

            $cmd = "SELECT * from host where name='$name' and psw='$psw'";            
			$res = $conn->query($cmd); 
            
            $user = $res->fetch_assoc();
            if($res->num_rows > 0){
                $_SESSION["host"]=$user['name'];
                header('Location: accueil.php');
                $msg="Host existe";
            }
            else{
                $msg="Mot de pass o host n'existe pas";
            }
        }
    ?>

    <div class="contenedor">
        <h1 class="disTitre">LOGIN</h1>
        <br>
        <form action="index.php" method="POST">
            <table >
               
                <tr>
                    <td>
                        Nom :
                    </td>
                    <td>
                        <input type="text" name="host" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        Mot de passe :
                    </td>
                    <td>
                        <input type="password" name="psw" required >
                    </td>
                </tr>

                <tr>
                    <td class="centrar" colspan="2" >
                        <input class="btn" type="submit" value="Enviar">
                    </td>
                </tr>

                <tr>
                    <td class="centrar" colspan="2" >
                        <h3>
                            <?php
                                echo $msg;
                            ?>
                        </h3>
                    </td>
                </tr>
            </table>        
            
        </form>    
    </div>
   
</body>
</html>