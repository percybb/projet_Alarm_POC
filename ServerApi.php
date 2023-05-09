
<?php

    $z1="0";
	$z2="0";
	$z3="0";
	$z4="0";
	
	$servername="localhost";
          $password = "";
          $username="root";
          $databasename = "alarm";
      
	$conn = new mysqli($servername,$username,$password,$databasename);
          

	if(isset($_POST))
	{
		$st = $_POST['s'];
		if ($st!="12" && $st!="22" && $st!="32")
		{
			$id = $_POST['h'];
			

			$z1 = $_POST['z1'];
			$z2 = $_POST['z2'];
			$z3 = $_POST['z3'];
			$z4 = $_POST['z4'];

			$pos = $_POST['pos'];
			//$st1 = $_POST['st1'];
			//$st2 = $_POST['st2'];
			//$st3 = $_POST['st3'];
			//$st4 = $_POST['st4'];
			$st1=0;
			$st2=0;
			$st3=0;
			$st4=0;
			if ($pos==1)
			{
				$st1=1;
			}
			elseif($pos==2)
			{
				$st2=1;
			}
			elseif($pos==3)
			{
				$st3=1;
			}
			elseif($pos==4)
			{
				$st4=1;
			}
			

			if($st=="0")
			{
				$hora= date("Y-m-d H:i:s");
				//INSERT INTO alarm(host,state,fecha) values("0001","0",now())
				$cmd = "INSERT INTO alarm(host,status,fecha) values('$id','$st','$hora')";
				$res = $conn->query($cmd); 
				echo "host Arme : ".$id."\n";			
			}

			if($st=="3")
			{
				$hora= date("Y-m-d H:i:s");
				//INSERT INTO alarm(host,state,fecha) values("0001","0",now())
				$cmd = "INSERT INTO alarm(host,status,fecha) values('$id','$st','$hora')";
				$res = $conn->query($cmd); 
				echo "host desarme : ".$id."\n";			
			}

			if($st=="1")
			{
				$hora= date("Y-m-d H:i:s");
				//INSERT INTO alarm(host,state,fecha) values("0001","0",now())
				$cmd = "INSERT INTO alarm(host,z1,st1,z2,st2,z3,st3,z4,st4,status,fecha) values('$id','$z1','$st1','$z2','$st2','$z3','$st3','$z4','$st4','$st','$hora')";			
				$res = $conn->query($cmd);			
				echo "Alarm : Z1=$z1 ,z2=$z2 ,z3=$z3 ,z4=$z4"."\n";		
			}		

		}
        //echo "host= ".$id." - z1= ".$z1." - z2= ".$z2." - z2= ".$z3." - z2= ".$z4." - Status= ".$st;     

		if($st=="12")
		{
			$host =  $_POST['host'];
			$cmd = "SELECT * from alarm where host='".$host ."' and status='1' ORDER BY fecha DESC";
            $res= $conn->query($cmd);
			$dat = $res->fetch_all();
            if($res->num_rows>0)                    
            {                         
            	$dat1=$dat[0];
				echo json_encode($dat1);	
			}
			
		}

		if($st=="22")
		{
			$host =  $_POST['host'];
			$cmd = "SELECT * from alarm where host='".$host ."' and status='1' ORDER BY fecha DESC";
            $res= $conn->query($cmd);
			$dat = $res->fetch_all();
            if($res->num_rows>0)                    
            {      
				echo json_encode($dat);	
			}
			
		}

		if($st=="32")
		{
			$host =  $_POST['host'];
			$cmd = "SELECT * from alarm where host='".$host ."' and (status='0' or status='3')  ORDER BY fecha DESC";
            $res= $conn->query($cmd);
			$dat = $res->fetch_all();
            if($res->num_rows>0)                   
            {      
				$dat1 = $dat[0];
				if($dat1[13] =='0')
				{
					echo 'T';
				}					
				else
				{
					echo 'F';
				}
			}
			
		}

		


	}



?>