<?php
require_once('connection.php');
require_once('valid.php');
$cale = 'http://localhost/';
session_start();
if(!$_SESSION['user']) { 
	header('Location: '.$cale);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="alert <?php echo $class ; ?> position-absolute" style = "right:1%" role="alert">
<?php echo $selectQuesErr . '</br>' . $raspunsErr;  ?>
</div>
<div class="alert <?php echo $class ; ?> position-absolute" style = "right:1%" role="alert">
<?php echo $succesUpdate == "" ? $errUpdate : $succesUpdate;  ?>
</div>
<div class="alert <?php echo $class ; ?> position-absolute" style = "right:1%" role="alert">
<?php echo "$loginErr <br> $passErr <br> $roleErr"?>
</div>
<div class="alert <?php echo $class ; ?> position-absolute" style = "right:1%" role="alert">
<?php echo $succesAddAdmin;  ?>
</div>

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php">Principala</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="delog.php">Delogare</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link disabled"><?php echo $_SESSION['user']?></a>
  </li>
</ul>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xxl-10">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Lista întrebărilor</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="answer-tab" data-bs-toggle="tab" data-bs-target="#answer" type="button" role="tab" aria-controls="answer" aria-selected="false">Raspunde la intrebare</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="row justify-content-center mt-4">
      <div class="col-xxl-6">
        <table class="table table-success table-striped">
              <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Întrebare</th>
              </tr>
      
                <?php 
                $query = "select * from intrebari";
                $res = mysqli_query($connection, $query);
                while($rows = mysqli_fetch_array($res)){
                  echo '<tr>
                  <td>'.$rows['id_intrebare'].'</td>
                  <td>'.$rows['email'].'</td>
                  <td>'.$rows['intrebare'].'</td>
                  </tr>';
                }
              ?>
          </table>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="answer" role="tabpanel" aria-labelledby="answer-tab">
    <div class="row justify-content-center mt-4">
      <div class="col-xxl-6">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
             <select name="selectIntrebare" class="form-select">
               <option selected value="0">Alege intrebarea</option>
               <?php 
                 $query = "select * from intrebari where raspuns = '0'";
                 $res = mysqli_query($connection, $query);
                 while($rows = mysqli_fetch_array($res)){
                   echo '<option value="'.$rows['id_intrebare'].'">'.$rows['id_intrebare'].' '.$rows['intrebare'].'</option>';
                 }
               ?>
             </select>
             <textarea class="form-control mt-3" name="raspunsIntreb" cols="30" rows="7" placeholder="Scrie răspunsul aici . . . "></textarea>
             <input type="submit" value="Raspunde" class="btn-primary mt-5" name = "raspunde">
             
       </form>

      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>