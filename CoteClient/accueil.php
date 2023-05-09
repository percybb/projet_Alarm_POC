<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script></script>
</head>
<body>
    <?php
        session_start();
        $servername="localhost";
        $password = "";
        $username="root";
        $databasename = "alarm";
    
        $conn = new mysqli($servername,$username,$password,$databasename);
        $Arme=false;
        $cmd = "SELECT * from alarm where host='".$_SESSION['host']."' and (status='0' or status='3')  ORDER BY fecha DESC";
                        $res= $conn->query($cmd);
                        $dat = $res->fetch_all();
                    // foreach($res as $item){
                        //    var_dump($dat[0]);                    
                    //      echo "<br>";
                        //}
                        if($res->num_rows>0){
                            $dat1=$dat[0];
                        //    print_r($dat1);
                            if($dat1[13]==0){
                                $Arme = true;
                            }
                            else{
                                $Arme = false;
                            }
                        }

        function leer($nb,$res)
        {
                        $v=[];
                        $v["zone"]=$nb;
                        $v["state"]="0";
                        $v["fecha"]="";
                        foreach($res as $item){
                            if($item["zone"]==$nb){
                                $v["zone"]=$item["zone"];
                                $v["state"]=$item["state"];
                                $v["fecha"]=$item["fecha"];
                            }                            
                        }
                        return $v;

        }
        
    ?>

    <div class="contenedor">
        <?php
            if($Arme==true){
                echo "<div class='disTitre1' id='divT'> <h1 id='titreM'>Surveillance d'alarme est arme</h1> </div>";
            }
            else{
                echo "<div class='disTitre2' id='divT'> <h1 id='titreM'>Surveillance d'alarme est désarmée</h1> </div>";
            }
        ?>
        
        
        <br>
        <div class="display">  
                 
            <table border="1">
                <tr>
                    <td colspan="2">
                        <?php
                            echo "<h1 id='host'>". $_SESSION["host"] ."</h1>";
                        ?>
                    </td>
                </tr>
                <tr>                
                    <td>Zone</td>
                    <td>Status</td>      
                    </tr>         
                    <?php

                        $cmd = "SELECT * from alarm where host='".$_SESSION['host']."' and status='1' ORDER BY fecha DESC";
                        $res= $conn->query($cmd);
                        $dat = $res->fetch_all();
                    // foreach($res as $item){
                        //    var_dump($dat[0]);                    
                    //      echo "<br>";
                        //}
                        if($res->num_rows>0)
                        //foreach($res as $item)
                            //for($i=1; $i<5; $i++)
                        {  
                        
                            $dat1=$dat[0];
                            
                                //$zones = leer($i,$res);
                            $classCol1 = ($dat1[2]=='1')? 'classAlarm1' : 'classAlarm2';
                            $classCol2 = ($dat1[7]=='1')? 'classAlarm1' : 'classAlarm2';
                            $classCol3 = ($dat1[9]=='1')? 'classAlarm1' : 'classAlarm2';
                            $classCol4 = ($dat1[11]=='1')? 'classAlarm1' : 'classAlarm2';
                            echo "<tr>";                        
                            echo "    <td> Z1 </td>";
                            echo "    <td class=$classCol1 id='z1'>".$dat1[2]."</td>";                                         
                            echo "</tr>";

                            echo "<tr>";                        
                            echo "    <td> Z2 </td>";
                            echo "    <td class=$classCol2 id='z2'>".$dat1[7]."</td>";                                         
                            echo "</tr>";

                            echo "<tr>";                        
                            echo "    <td> Z3 </td>";
                            echo "    <td class=$classCol3 id='z3'>".$dat1[9]."</td>";                                         
                            echo "</tr>";

                            echo "<tr>";                        
                            echo "    <td> Z4 </td>";
                            echo "    <td class=$classCol4 id='z4'>".$dat1[11]."</td>";                                         
                            echo "</tr>";
                        }

                        
                    
                    ?>
            
            </table>
        </div>

        <br>

        <div class="scroll">

            <table border="1" id="tabHistorique">
                <tr>
                    <td colspan="3">
                        <?php
                            echo "<h1> Historique ". $_SESSION["host"] ."</h1>";
                        ?>
                    </td>
                </tr>
                <tr>                
                    <td>Zone</td>
                    <td>Status</td> 
                    <td>Date</td>  

                </tr>   

                    <?php

                        $cmd = "1";
                        $cmd = "SELECT * from alarm where host='".$_SESSION['host']."' and status='1' ORDER BY fecha DESC";
                        $res= $conn->query($cmd);
                        //$dat = $res->fetch_all();
                    // foreach($res as $item){
                        //    var_dump($dat[0]);                    
                    //      echo "<br>";
                        //}
                        //if($res->num_rows>0)
                        //foreach($res as $item)
                            //for($i=1; $i<5; $i++)
                        foreach($res as $item)
                        {   
                            //$zones = leer($i,$res);
                            $classCol1 = ($item['z1']=='1')? 'classAlarm1' : 'classAlarm2';
                            $classCol2 = ($item['z2']=='1')? 'classAlarm1' : 'classAlarm2';
                            $classCol3 = ($item['z3']=='1')? 'classAlarm1' : 'classAlarm2';
                            $classCol4 = ($item['z4']=='1')? 'classAlarm1' : 'classAlarm2';
                        
                            if($item['st1']=="1"){
                                echo "<tr class=$classCol1 >";                        
                                echo "    <td> Z1 </td>";
                                echo "    <td>".$item['z1']."</td>";
                                echo "    <td>".$item['fecha']."</td>";                                          
                                echo "</tr>";
                            }
                            if($item['st2']=="1"){
                                echo "<tr class=$classCol2 >";                        
                                echo "    <td> Z2 </td>";
                                echo "    <td>".$item['z2']."</td>";
                                echo "    <td>".$item['fecha']."</td>";                                          
                                echo "</tr>";
                            }
                            if($item['st3']=="1"){
                                echo "<tr class=$classCol3 >";                        
                                echo "    <td> Z3 </td>";
                                echo "    <td>".$item['z3']."</td>";
                                echo "    <td>".$item['fecha']."</td>";                                          
                                echo "</tr>";
                            }
                            if($item['st4']=="1"){
                                echo "<tr class=$classCol4 >";                        
                                echo "    <td> Z4 </td>";
                                echo "    <td>".$item['z4']."</td>";
                                echo "    <td>".$item['fecha']."</td>";                                          
                                echo "</tr>";
                            }

                            
                        }

                        
                    
                    ?>
                
            </table>
        </div>
        
    </div>

    <script src="./jquery-3.6.4.min.js"></script>
    <script>
        var timeout=1000;
        var z1t = "0";
        var z2t = "0";
        var z3t = "0";
        var z4t = "0";
        setInterval(() => {          
        
            afficher();
        }, timeout);

        function afficher()
        {
            let host1 = $("#host").text();
            
            console.log(host1);
            //location.reload(true);
            $.post('http://localhost/AndroidToMysql/test.php', {s:'32',host:host1}, function(resp5){
                console.log("respT");
                console.log(resp5);
                let res51 = resp5.substr(2,1)
                console.log()
                if(res51=='T')
                {
                   $("#titreM").text("Surveillance d'alarme est arme");
                   $("#divT").removeClass("disTitre2");
                   $("#divT").addClass("disTitre1");
                   console.log("es verdad");
                }
                else{
                    $("#titreM").text("Surveillance d'alarme est désarmée");
                    $("#divT").removeClass("disTitre1");
                    $("#divT").addClass("disTitre2");
                    console.log("es falso");
                }
            }); 

            $.post('http://localhost/AndroidToMysql/test.php', {s:'12',host:host1}, function(respuesta){ 
              

                var z1 = respuesta[2];
                var z2 = respuesta[7];
                var z3 = respuesta[9];
                var z4 = respuesta[11];
                var list = [z1,z2,z3,z4];
                var listNom = ['#z1','#z2','#z3','#z4']
                
                for (let i = 0; i < list.length; i++) {
                    if(list[i]==='1')
                    {                        
                        $(listNom[i]).removeClass("classAlarm2")
                        $(listNom[i]).addClass("classAlarm1")
                    }
                    else{
                        $(listNom[i]).removeClass("classAlarm1")
                        $(listNom[i]).addClass("classAlarm2")
                    }
                    $(listNom[i]).text(list[i]);
                }

            
                if ((z1t != z1) || (z2t != z2) || (z3t != z3) || (z4t != z4) )
                {
                    $.post('http://localhost/AndroidToMysql/test.php', {s:'22',host:host1}, function(respuesta){ 
                        console.log("resp")
                        const resp = JSON.parse(respuesta)
                        
                        var tabla = document.getElementById("tabHistorique");
                        // Limpiar tabla existente
                        tabla.innerHTML = "";

                        var fila = document.createElement("tr");
                        
                        var celTitre = document.createElement("td");
                        
                        celTitre.innerHTML ="<h1>Historique "+host1+"</h1>";
                        celTitre.colSpan=3;
                        fila.appendChild(celTitre);
                        tabla.appendChild(fila);

                        var fila = document.createElement("tr");

                        var celZone = document.createElement("td");
                        var celStatus = document.createElement("td");
                        var celDate = document.createElement("td");

                        

                        celZone.textContent ="Zone";
                        celStatus.textContent = "Status";
                        celDate.textContent = "Date"

                        fila.appendChild(celZone);
                        fila.appendChild(celStatus);
                        fila.appendChild(celDate);

                        tabla.appendChild(fila);

                        resp.forEach(function(elemento) {
                            var fila = document.createElement("tr");
                            var celZone = document.createElement("td");
                            var celStatus = document.createElement("td");
                            var celDate = document.createElement("td");
                            console.log("z1="+elemento[3]);
                            console.log("z2="+elemento[8]);
                            console.log("z3="+elemento[10]);
                            console.log("z4="+elemento[12]);
                            if (elemento[3]=='1'){
                                celZone.textContent ="Z1";
                                celStatus.textContent = elemento[2];
                                if(elemento[2]=='1')
                                {
                                    fila.className = "classAlarm1";
                                }
                                else{
                                    fila.className = "classAlarm2";
                                }
                                
                                celDate.textContent = elemento[4];
                                
                                console.log("z1");
                                fila.appendChild(celZone);
                                fila.appendChild(celStatus);
                                fila.appendChild(celDate);

                                tabla.appendChild(fila);
                            }

                            if (elemento[8]=='1'){
                                celZone.textContent ="Z2";
                                celStatus.textContent = elemento[7];
                                if(elemento[7]=='1')
                                {
                                    fila.className = "classAlarm1";
                                }
                                else{
                                    fila.className = "classAlarm2";
                                }
                                celDate.textContent = elemento[4];
                                console.log("z2");
                                fila.appendChild(celZone);
                                fila.appendChild(celStatus);
                                fila.appendChild(celDate);

                                tabla.appendChild(fila);
                            }

                            if (elemento[10]=='1'){
                                celZone.textContent ="Z3";
                                celStatus.textContent = elemento[9];
                                if(elemento[9]=='1')
                                {
                                    fila.className = "classAlarm1";
                                }
                                else{
                                    fila.className = "classAlarm2";
                                }
                                celDate.textContent = elemento[4];
                                console.log("z4");
                                fila.appendChild(celZone);
                                fila.appendChild(celStatus);
                                fila.appendChild(celDate);

                                tabla.appendChild(fila);
                            }

                            if (elemento[12]=='1'){
                                celZone.textContent ="Z4";
                                celStatus.textContent = elemento[11];
                                if(elemento[11]=='1')
                                {
                                    fila.className = "classAlarm1";
                                }
                                else{
                                    fila.className = "classAlarm2";
                                }
                                celDate.textContent = elemento[4];
                                console.log("z4");
                                fila.appendChild(celZone);
                                fila.appendChild(celStatus);
                                fila.appendChild(celDate);

                                tabla.appendChild(fila);
                            }
                            
                            
                        });

                    });
                }

                

                z1t = z1;
                z2t = z2;
                z3t = z3;
                z4t = z4;

            },'json');
        }


    </script>

</body>
</html>