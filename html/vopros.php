<?php
require_once('../connection.php');
require_once('../valid.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/vopros.css">
  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@1&family=PT+Serif:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../frame/bootstrap.css">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>

  <div class="alert <?php echo $class; ?> position-absolute" style="right:1%; top:100px">
    <?php echo $succesInsert = !"" ? $succesInsert : $errInsert; ?>
  </div>

  <div class="modall modal_link hide">

    <div class="modall modall-content">
      <button class="btn-close"></button>
      <div class="modall-img">
        <img src="../img/oper.png" alt="">
      </div>

      <form action="#" class="text-center">

        <h2>Здравствуйте!</h2>
        <h4>Оставьте свой номер телефона и оператор свяжется с Вами в течение нескольких минут</h4>
        <input type="text" placeholder="Ваше имя "><br>
        <input type="text" placeholder="Телефон"><br>
        <button class="btn btn-primary">ПОЛУЧИТЬ КОНСУЛЬТАЦИЮ</button>
      </form>
    </div>
  </div>


  <div class="modall modal_quest hide">

    <div class="modall modall-content-q">
      <h3>Заполните форму и задайте вопрос.</h3>
      <button class="btn-close" id="close-btn"></button>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="text" name="name" class="form-control" placeholder="Ваше имя " value="<?php echo $name; ?>"><br>
        <input type="text" name="email" class="form-control" placeholder="Ваш email" value="<?php echo $email; ?>"><br>
        <textarea class="form-control" rows="7" placeholder="Напишите ваш вопрос" name="ques" value="<?php echo $intreb; ?>"></textarea>
        <div class="justify-content-center text-center" style="margin-top:20px; padding:10px;">
          <input type="submit" class="btn-primary justify-content-center text-center" value="Задать вопрос">

        </div>
      </form>
    </div>
  </div>




  <section class="menu">
    <div class="wrap " id="wrap">
      <span></span>
    </div>

    <div class="content-menu" id="cont">
      <div class="link">
        <div class="link-ref">
          <a class="link-1" href="../index.html">Главная</a>
        </div> <br>
        <div class="link-ref">
          <a class="link-1" href="company.html">о компании</a>
        </div> <br>
        <div class="link-ref">
          <a class="link-1" href="../index.html#services">Наши услуги</a>
        </div> <br>
        <div class="link-ref">
          <a class="link-1" href="vopros.html">Вопросы</a>
        </div> <br>
        <div class="link-ref">
          <a class="link-1" href="contact.html">Контакты</a>
        </div>
      </div>
    </div>
  </section>

  <header class="navigation">
    <div class="container-fluid">
      <div class="row">

        <div class="col-xl-7 offset-xl-2 col-lg-9  offset-lg-0 col-md-10 ">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link " href="../index.html">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="company.html">о компании</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.html#services">Наши услуги</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vopros.html">Вопросы</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Контакты</a>
            </li>
          </ul>
        </div>


        <div class="col-xl-2 offset-xl-0 col-lg-3 offset-lg-0 col-md-2 offset-md-0 col-7 offset-5 text-center">
          <img src="../img/phone.png" alt="Phone" style="margin-top: 5px;">
          <p>8 (800) 765 78 98</p>
          <a class="phone-link" href="#">заказать звонок</a>
        </div>

      </div>

    </div>
  </header>

  <section class="questions">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 offset-xl-2 text-center">
          <h1>Вопросы и ответы</h1>
        </div>
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
          <?php
          $query = "SELECT intrebare,raspuns FROM intrebari where raspuns <> '0'";
          $result = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_array($result)) {
            echo '<button class="accordion"><p><strong>' . $row['intrebare'] . '</strong></p></button>
                          <div class="panel">
                              <p>' . $row['raspuns'] . '</p>
                          </div>';
          }
          ?>
          <div class="col-xl-8 offset-xl-2 text-center">
            <h2>Вашего вопроса нет в списке? Задайте его!</h2>
          </div>
          <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-6 offset-md-3 text-center">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <div class="errmsg"><?php echo $nameErr; ?></div>
              <input type="text" name="name" class="form-control" placeholder="Ваше имя " value="<?php echo $name; ?>"><br>
              <div class="errmsg"><?php echo $emailErr; ?></div>
              <input type="text" name="email" class="form-control" placeholder="Ваш email" value="<?php echo $email; ?>"><br>
              <div class="errmsg"><?php echo $intrebErr; ?></div>
              <textarea class="form-control" rows="7" placeholder="Напишите ваш вопрос" name="ques"></textarea>
              <div class="justify-content-center text-center" style="margin-top:20px; padding:10px;">
                <input type="submit" class="btn-primary justify-content-center text-center" value="Задать вопрос" name="intrebare">
              </div>
            </form>
          </div>
        </div>
  </section>





  <!-- My JS -->
  <script src="../js/JavaScript.js"></script>
  <script src="../js/vopr.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="../slick/slick.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script src="../slick/slickpick.js"></script>
</body>

</html>