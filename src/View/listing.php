<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="bg-dark">
        <div class="container">
            <div class="row">
                <nav class="col navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="index.html">mvc-employee</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="navbarContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Liste des salariés</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Création</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1>Bienvenue sur mvc-employee !</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Identifiant</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Date d'embauche</th>
                            <th>Salaire</th>
                            <th>Service</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        foreach ($employees as $employee) {
                            echo '<tr>
                            <td><a href="index.php?id=' . $employee->getId() . '">' . $employee->getId() . '</a></td>
                            <td>' . $employee->getLastName() . '</td>
                            <td>' . $employee->getFirstName() . '</td>
                            <td>' . $employee->getBirthDate() . '</td>
                            <td>' . $employee->getHireDate() . '</td>
                            <td>' . $employee->getSalary() . '</td>
                            <td>' . $employee->getDepartement() . '</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item"><a href="#">À propos</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item"><a href="#">Vie privée</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item"><a href="#">Conditions d'utilisations</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>