<html>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Mes courses</h2>
                <div class="list-group">
                <?php
                    $driver = $driverManager->getDriver($user->getUsr_id());
                    var_dump($driver);
                    $aCourses = $driverManager->selectCoursesByDriver(1);
                    for ($i=0; $i < sizeof($aCourses) ; $i++) { 
                        echo '<a href="#" class="list-group-item list-group-item-action">';
                        foreach ($aCourses[$i] as $key => $value) {
                            echo $key.' : '.$value.'<br/>';
                        }
                        echo '</a>';
                    }
                    
                ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Mes clients</h2>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Mon vehicule</h2>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="jumbotron">
                <h2>Mes informations</h2>
            </div>
        </div>
    </div>
</div>
</html>