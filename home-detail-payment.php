<html>
 <body>

 <?php 

 
 $adultprice = $_POST["hoprice"];
 $kidprice = $adultprice/2;

 $totadultprice = $_POST["cadult"]*$adultprice;
 $totchildprice = $_POST["ckids"]*$kidprice;


 $totpersons = $totadultprice+$totchildprice;

 $tot = $totpersons*$_POST["cnight"];

 ?>

 

<?php echo $_POST["hoid"]; ?><br>
<?php echo $_POST["honame"]; ?><br>
<?php echo $tot; ?><br>
<?php echo $_POST["sdate"]; ?><br>
<?php echo $_POST["edate"]; ?><br>
<?php echo $_POST["cnight"]; ?><br>
<?php echo $_POST["cadult"]; ?><br>
<?php echo $_POST["ckids"]; ?><br>

 </body>
 </html> 