<?php 

include ("config.php");

$results = mysqli_query($conn, "SELECT * FROM pet");

$hiddenname=$_POST['hidden_petname'];
	$hiddenimage=$_POST['hidden_image'];
    $hiddenspecie=$_POST['hidden_specie'];
  $hiddencost=$_POST['hidden_cost'];

  $sql = "INSERT INTO cart (petname,photo,specie,price)  VALUES ('$hiddenname','$hiddenimage','$hiddenspecie','$hiddencost')";

  $result = mysqli_query($conn,$sql);
  echo "inserted successfully..!";

?>




  <div class="container mt-4">
    <div class="row">
    <?php while($row=mysqli_fetch_array($results)){ ?>
        <div class="col-auto mb-3"  style="width: 380px;">
            <div class="card">
                <form action="" method="post">
                <div class="card-body">
                    <h5 class="card-title"> <b><?php echo $row['petname']; ?></b></h5>
                    <img class="img_size" style="height:220px;" src="<?php echo $row['image']; ?>" alt="pet image" width="308px">
                    <p></p>
                    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $row['specie']; ?></h6>
                    <p class="card-text"><?php echo $row['paragraph']; ?></p>
                    <input type="hidden" name="hidden_petname" value="<?php echo $row["petname"]; ?>" />
                    <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
                    <input type="hidden" name="hidden_specie" value="<?php echo $row["specie"]; ?>" />
                    <input type="hidden" name="hidden_cost" value="<?php echo $row["cost"]; ?>" />
                    <input  type="submit" class="btn btn-primary">Add to cart</input>
                </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
  </div>


