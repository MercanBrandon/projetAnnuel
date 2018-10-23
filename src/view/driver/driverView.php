<html>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Mes courses</h2>
                <div class="list-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Nom client</th>
                            <th scope="col">Prenom client</th>
                            <th scope="col">Ville départ</th>
                            <th scope="col">Ville arrivée</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $driver = $driverManager->getDriver($user->getUsr_id());
                    // var_dump($driver);
                    $aCourses = $driverManager->getCourses(1);
                    for ($i=0; $i < sizeof($aCourses) ; $i++) {
                        echo '<tr scope="row">';
                        foreach ($aCourses[$i] as $key => $value) {
                            echo '<td>'.$value.'</td>';
                        }
                        echo '</tr>';
                    }
                ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Mes Derniers clients</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Derniere course</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $aUsers = $driverManager->getClients(1);
                    for ($i=0; $i < sizeof($aUsers) ; $i++) {
                        echo '<tr scope="row">';
                        foreach ($aUsers[$i] as $key => $value) {
                            echo '<td>'.$value.'</td>';
                        }
                        echo '</tr>';
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Mon vehicule</h2>
                <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">ID vehicule</th>
                          <th scope="col">Immatriculation</th>
                          <th scope="col">Marque</th>
                          <th scope="col">Modele</th>
                          <th scope="col">Debut assignement</th>
                          <th scope="col">Fin assignement</th>
                      </tr>

                <?php
                    $aVehicules = $driverManager->getVehicules(1);
                    for ($i=0; $i < sizeof($aVehicules) ; $i++) {
                      echo '<tr scope="row">';
                      foreach ($aVehicules[$i] as $key => $value) {
                        echo "<td>".$value."</td>";
                      }
                      echo "</tr>";
                    }

                 ?>
                 </table>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Mes informations</h2>
                <?php
                    echo 'Nom : '.$driver->getUsr_name().'<br>';
                    echo 'Prenom : '.$driver->getUsr_firstname().'<br>';
                    echo 'Date de naissance : '.$driver->getUsr_birthdate().'<br>';
                    echo 'Telephone : '.$driver->getUsr_phone().'<br>';
                    echo 'E-mail : '.$driver->getUsr_email().'<br>';
                    echo 'Date d\'embauche : '.$driver->getDrv_hiring_date().'<br>';
                    echo 'Date permis : '.$driver->getDrv_licence_date().'<br>';
                    echo 'ID Chauffeur : '.$driver->getDrv_id().'<br>';

                    // echo $driver->getDrv_id();
                    var_dump($driver);
                ?>
            </div>
        </div>
    </div>
</div>
</html>
<script type="text/javascript">
var driver_id = '<?php echo $driver->getUsr_name(); ?>';
console.log(driver_id);
</script>
