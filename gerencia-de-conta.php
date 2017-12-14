<!DOCTYPE html>
<html lang="Pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="_css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="_css/gerencia-conta.css">
   
</head>

<body>
    <div class="container-fluid">

   
    <div class="navbar">
         <?php include('navbar-adm.html') ?>
    </div>
           
 </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-lg-5 col-sm-12">

                <div class="col-md-6 col-lg-6">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Overview
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Analytics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Export</a>
                        </li>
                    </ul>


                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nav item again</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">One more nav</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Another nav item</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-group">
                    <div>
                        <img src="http://via.placeholder.com/50x50" alt="profile photo" class="circle float-left profile-photo" width="200" height="auto">
                    </div>

                    <label for="exampleFormControlFile1">Escolha uma foto</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">

            </div>

        </div>
        <div class="row">
            <div class="col-md-5 col-lg-5 col-sm-12">

            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">

            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <button type="button" class="btn btn-outline-secondary">Submeter</button>
            </div>

        </div>

    </div>


</body>

</html>