<html>
    <body>
        <h3></h3>
    </body>
    <?php
     
         $con=mysqli_connect("localhost","root","","checkform");
         
         include"checkform1.html";
         $checkin=$_POST['checkin'];
         $checkout=$_POST['checkout'];
         
    

       
    $sql="SELECT * FROM cDetails WHERE checkin>=$checkin AND checkout<=$checkout;"
     
     $sel=mysqli_query($con,$sql);      
     echo "<table>";
     while($row=mysqli_fetch_array($sel)){
     echo"<tr>";
      
     echo"<td>".$row['checkin']."</td>";
     echo"<td>".$row['checkout']."</td>";
     echo "<td>".$row['room_type']."</td>";
     
     echo"<tr>";
}
echo"</table>";


     



         
    
    
    
    ?>
</html>