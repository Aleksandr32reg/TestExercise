<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="text-center">
  <div class="container">

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <div class="card">
            <form action="/auth.php">
            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input type="text" class="form-control" name="firstName" placeholder="first name">
                </div> <!-- input-group.// -->
              </div> <!-- form-group// -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input type="text" class="form-control" name="lastName" placeholder="last name">
                </div> <!-- input-group.// -->
              </div> <!-- form-group// -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="email">
                </div> <!-- input-group.// -->
              </div> <!-- form-group// -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="password">
                </div> <!-- input-group.// -->
              </div> <!-- form-group// -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input type="password" class="form-control" name="password_2" placeholder="password_2">
                </div> <!-- input-group.// -->
              </div> <!-- form-group// -->
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" id="test" onclick="return false;">Sign In</button>
              </div> <!-- form-group// -->
            </form>
        </div> <!-- card.// -->
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script>
        const sendForm = () => {
            const firstName = document.querySelector("input[name='firstName']").value;
            const lastName = document.querySelector("input[name='lastName']").value;
            const email = document.querySelector("input[name='email']").value;
            const password = document.querySelector("input[name='password']").value;
            const password_2 = document.querySelector("input[name='password_2']").value;

            if (password != password_2) {
                alert("пароли не совпадают");
            }
            else {

                $.ajax("auth.php", {
                    method: "POST",
                    data: {
                        "firstName": firstName,
                        "lastName": lastName,
                        "email": email,
                        "password": password,
                        "password_2": password_2
                    }
                }).done((data) => {
                    if (data === "1") {
                        alert("Error");                    
                    }
                    if (data === "2") 
                    {
                        document.querySelector("form").style = "display:none";
                        alert("Success");
                    }
                });
            };
        }
        document.querySelector("#test").addEventListener("click", e => {
            e.preventDefault();
            sendForm();
        })
    </script>

</body>

</html>
