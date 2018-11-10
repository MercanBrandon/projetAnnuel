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

                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Recherche courses</h2>
                <button type="button" id="btn_search_course">Rechercher une course</button>
            </div>
        </div>
    </div>
</div>
</html>
<script type="text/javascript">
var init_position = {};
// Try HTML5 geolocation.
setInterval(if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    init_position = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    };
    var driver_id = '<?php echo $driver->getDrv_ID(); ?>';
    var driver_lat = init_position.lat;
    var driver_lng = init_position.lng;


    var Ajax = new getXMLHttpRequest();
    var url = "api/setDriverPosition.php?lat="+driver_lat+"&lng="+driver_lng+"&id="+driver_id ;
    console.log(url);
    Ajax.open("GET", url , true);
    Ajax.send();
    console.log(init_position);
  })
},600000);




function getXMLHttpRequest() {
var xhr = null;
if (window.XMLHttpRequest || window.ActiveXObject) {
  if (window.ActiveXObject) {
    try {
      xhr = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(e) {
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
  } else {
    xhr = new XMLHttpRequest();
  }
} else {
  alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
  return null;
}
return xhr;
}


</script>
