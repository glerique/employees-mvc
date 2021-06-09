<div class="container">
    <p><b>Nombre total de salariés :</b> <?= $total ?></p>

</div>
<div class="container">
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
                        <th>Modifier</th>
                        <th>Supprimer</th>

                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach ($employees as $employee) {

                        echo '<tr>
                            <td><a href="/mvc-employees/employee/show/' . $employee->getId() . '"> ' . $employee->getId() . '</a></td>                            
                            <td>' . $employee->getLastName() . '</td>
                            <td>' . $employee->getFirstName() . '</td>
                            <td>' . $employee->getBirthDate()->format('d-m-Y') . '</td>
                            <td>' . $employee->getHireDate()->format('d-m-Y') . '</td>
                            <td>' . $employee->getSalary() . '</td>
                            <td>' . $employee->getDepartement() . '</td>
                            <td><a href="/mvc-employees/employee/editView/' . $employee->getId() . '">Modifier</a></td>
                            <td><a href="/mvc-employees/employee/delete/' . $employee->getId() . '">Supprimer</a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>