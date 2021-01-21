<?php
define('PAGETITLE', 'List des Dossier médical');
include './includes/head.php';

if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] <> "archive"){

    $d = $db->prepare("SELECT * FROM patient INNER JOIN dm ON patient.id_dm = dm.id_dm WHERE dm.id_dm=?");
    $d->bind_param("i", $_GET['id']);
    $d->execute();

    if ($d->get_result()->num_rows){
        if ($_GET['action'] == "remove"){
            $sup = $db->prepare("UPDATE `dm` SET `deleted` = '1' WHERE `dm`.`id_dm` = ?");
            $sup->bind_param("i", $_GET['id']);
            $sup->execute();
            $sup = $db->prepare("UPDATE `patient` SET `deleted` = '1' WHERE `patient`.`id_dm` = ?");
            $sup->bind_param("i", $_GET['id']);
            $sup->execute();
        }elseif ($_GET['action'] == "archiver"){
            $sup = $db->prepare("UPDATE `dm` SET `archivier_dm` = '1' WHERE `dm`.`id_dm` = ?");
            $sup->bind_param("i", $_GET['id']);
            $sup->execute();
            $sup = $db->prepare("UPDATE `patient` SET `archivier_patient` = '1' WHERE `patient`.`id_dm` = ?");
            $sup->bind_param("i", $_GET['id']);
            $sup->execute();
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == "archive") {
    $stmt = $db->prepare("SELECT patient.id_dm,nom_patient,prenom_patient,datenais_patient,tel_patient
                                FROM patient
                                INNER JOIN dm ON patient.id_dm = dm.id_dm
                                WHERE dm.deleted = 0 AND patient.deleted = 0 AND archivier_dm = 1 OR archivier_patient = 1
                                ORDER BY patient.id_patient DESC");
    $stmt->execute();
    $dms = $stmt->get_result();
}else{
    $stmt = $db->prepare("SELECT patient.id_dm,nom_patient,prenom_patient,division,direction
                                FROM patient
                                INNER JOIN dm ON patient.id_dm = dm.id_dm
                                WHERE archivier_dm = 0 AND dm.deleted = 0 AND patient.deleted = 0 && archivier_patient = 0
                                ORDER BY patient.id_patient DESC");
    $stmt->execute();
    $dms = $stmt->get_result();
}

?>
         <!DOCTYPE html>  
 <html>  
      <head>  
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
             
           <div class="container-fluid">
           <div class="container-fluid">
                <h3 class="text-dark mb-4">Dossier médical</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Liste dossiers médical</p>
                    </div>
                    <div class="container-fluid">
                        <div class="text-right"><a class="btn btn-info" role="button" href="dm-add.php">Ajouter un dossier médical</a></div>
                <br />  
                <div class="table-responsive container-fluid">  
                     <table id="dm_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>
                                    <th> ID-Dm</th>
                                    <th> Nom</th>
                                    <th> Prénom</th>
                                    <th> Telephone </th>
                                    <th> Pers de Conf </th>
                                    <th> Action</th>
                                </tr>
                          </thead>  
                          <tbody>
                                <?php while ($dm = mysqli_fetch_array($dms)) : ?>
                                <tr>
                                    <td>#<?php echo $dm['id_dm']; ?></td>
                                    <td class="font-weight-bold"><?php echo $dm['nom_patient']; ?></td>
                                    <td class="font-weight-bold"><?php echo  $dm['prenom_patient']; ?></td> 
                                    <td><?php echo $dm['direction']; ?></td>
                                    <td><?php echo $dm['division']; ?></td>
                                    <td>
                                        <a class="btn btn-danger m-1" role="button" href="dm.php?action=remove&id=<?php echo $dm['id_dm']; ?>"><i class="fa fa-remove"></i></a>
                                        <a class="btn btn-success m-1" role="button" href="dm-edit.php?id=<?php echo $dm['id_dm']; ?>"><i class="fa fa-eye"></i></a>
                                        <!--a class="btn btn-primary m-1" role="button" href="dm-edit.php?id=<!--?php echo $dm['id_dm']; ?>"><!--i class="fa fa-edit"--><!--/i></a-->
                                        <a class="btn btn-primary m-1" role="button" href="formFacture.php<?php echo $rdv['id_rdv'];?>"></i>Ordonance</a>
                                        <a class="btn btn-primary m-1" role="button" href="formBilan.php<?php echo $rdv['id_rdv'];?>"><em>Demand Exam</em>&nbsp;</a>
                                        <!--div class="dropdown d-inline-block">
                                                <button class="btn btn-info m-1" data-toggle="dropdown" aria-expanded="false" type="button">&nbsp;<i class="fa fa-print"></i></button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item text-success" role="presentation" href="devis.html<!?php echo $rdv['id_rdv'];?>"><i class="fa fa-hospital-o mr-1"></i><em>Dévis</em>&nbsp;</a>
                                                    <a class="dropdown-item text-gray-600" role="presentation" href="formBilan.php<!?php echo $rdv['id_rdv'];?>"><i class="fa fa-heartbeat mr-1"></i><em>Demande Examen</em>&nbsp;</a>
                                                    <a class="dropdown-item text-blue" role="presentation" href="formFacture.php<!?php echo $rdv['id_rdv'];?>"><i class="fa fa-credit-card-alt mr-1"></i>Ordonnance</a>
                                                </div>
                                            </div-->
                                        <a class="btn btn-dark m-1" role="button" data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" href="dm.php?action=archiver&id=<?php echo $dm['id_dm']; ?>" title="Archiver">
                                            <i class="fa fa-archive"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                                </tbody>
                     </table>  
                </div>  
           </div>  
      </body>  
      
 <script>  
 $(document).ready(function(){  
      $('#dm_data').DataTable();  
 });  
 </script>
 </div><a class="card-link" href="dm.php?action=archive">Afficher la list des dossier médical archivier</a></div>    
</div>
<!?php include './includes/footer.php'; ?>
 </html>  
            </div>
        </div>
