
    
        
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
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        foreach ($employees as $employee) {
                            echo '<tr>
                            <td><a href="index.php?action=show&id='.$employee->getId().'"> ' . $employee->getId() . '</a></td>                            
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
    