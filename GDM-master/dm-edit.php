<?php
define('PAGETITLE', 'Modifier le Dossier médical');
include './includes/head.php';

$stmt = $db->prepare("SELECT * 
                            FROM patient 
                            INNER JOIN dm ON patient.id_dm = dm.id_dm
                            WHERE dm.id_dm = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$dm = mysqli_fetch_assoc($stmt->get_result());

?>
    <div class="container-fluid">
    <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head> 
        <h3 class="text-dark mb-4">Dossier médical</h3>
        <div class="row mb-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Information de dossier médical</p>
                            </div>
                            <div class="card-body">
                                <form action="dm-edit.php?id=<?php echo $dm['id_dm']; ?>" method="post">
                                    <input type="hidden" name="id_dm" value="<?php echo $dm['id_dm']; ?>">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="prenom"><strong>Pérenom</strong></label><input class="form-control" type="text" placeholder="Prénom" id="prenom" name="prenom" value="<?php echo $dm['prenom_patient']; ?>"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="nom"><strong>Nom</strong></label><input class="form-control" type="text" placeholder="Nom" id="nom" name="nom" value="<?php echo $dm['nom_patient']; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="date"><strong>date de naissance</strong><br></label><input class="form-control" type="date" id="date" name="date" value="<?php echo $dm['datenais_patient']; ?>"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label id="lieu-de-naissance" for="lieu"><strong>lieu de naissance</strong><br></label><input class="form-control" type="text" placeholder="lieu de naissance" id="lieu" name="lieu" value="<?php echo $dm['lieunais_patient']; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="sexe"><strong>Sexe</strong><br></label>
                                                <select class="form-control" id="sexe" name="sexe">
                                                    <option value="Femme" <?php if (strtolower($dm['sexe_patient']) == "femme"){ echo "selected"; } ?>>Femme</option>
                                                    <option value="Homme" <?php if (strtolower($dm['sexe_patient']) == "homme"){ echo "selected"; } ?>>Homme</option>
                                                </select></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label id="lieu-de-naissance-1" for="tel"><strong>Num de tel</strong><br></label><input class="form-control" type="text" placeholder="Num de tel"  id="tel" name="tel" value="<?php echo $dm['tel_patient']; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label id="lieu-de-naissance-2" for="adresse"><strong>Adresse</strong><br></label><input class="form-control" type="text" id="adresse" placeholder="Adresse" value="<?php echo $dm['adresse_patient']; ?>" name="adresse"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label id="lieu-de-naissance-10" for="situation"><strong>Situation de famille</strong><br></label>
                                                <select class="form-control" id="situation" name="situation">
                                                    <option value="marie" <?php if (strtolower($dm['situation_famille']) == "marie"){ echo "selected"; } ?>>Marié</option>
                                                    <option value="celibataire" <?php if (strtolower($dm['situation_famille']) == "celibataire"){ echo "selected"; } ?>>Célibataire</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="division"><strong>Nom Complet Personne de Confiance</strong></label><br></label><input class="form-control" id="division" type="text" placeholder="Nom Complet Personne de Confiance" value="<?php echo $dm['division']; ?>" name="division"></div>
        
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="direction"><strong>Telephone Personne de Confiance</strong></label><br></label><input class="form-control" id="direction" type="text" placeholder="direction" value="<?php echo $dm['direction']; ?>" name="direction"></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="unite"><strong>Relation avec Personne de Confiance</strong><br></label><input class="form-control" id="unite" type="text" placeholder="Relation avec Personne de Confiance" value="<?php echo $dm['unite']; ?>" name="unite"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label id="lieu" for="service"><strong>Occupation Personne de Confiance</strong><br></label><input class="form-control" type="text" id="service" value="<?php echo $dm['service']; ?>" placeholder="Occupation Personne de Confiance" name="service"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="maladie_gen"><strong>Antecedants personnels médicaux</strong><br></label><textarea class="form-control" placeholder="Antecedant personne médicaux..." rows="10" id="maladie_gen" name="maladie_gen"><?php echo $dm['maladie_gen']; ?></textarea></div>                                                                                                        
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label id="lieu-de-naissance-5" for="maladie_prof"><strong>Antecedants personnels chirugicaux</strong><br></label><textarea class="form-control" placeholder="Antecedant personne chirugicaux..." rows="10" id="maladie_prof" name="maladie_prof"><?php echo $dm['maladie_prof']; ?></textarea></div>
                                                                                                                                                                                    
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="maladie_carc"><strong>Antecedants personnels Obstreticaux</strong><br></label><textarea class="form-control" placeholder="Antecedant personne Obstreticaux..." rows="10" id="maladie_carc" name="maladie_carc"><?php echo $dm['maladie_carc']; ?></textarea></div>
                                                
                                            
                                            
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label id="interventions" for="interventions"><strong>Antécédents familiaux	</strong><br></label><textarea class="form-control" placeholder="Antécédents familiaux..." rows="10" id="interventions" name="interventions"><?php echo $dm['interventions']; ?></textarea></div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="affectations"><strong>Antécédents collatéraux</strong><br></label><textarea class="form-control" placeholder="Antécédents collatéraux..." rows="10" id="affectations" name="affectations"><?php echo $dm['affectations']; ?></textarea>
                                            </div>   
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label  for="intoxications"><strong>Interogatoire</strong><br></label><textarea class="form-control" placeholder="Interogatoire..." rows="10" id="intoxications" name="intoxications"><?php echo $dm['intoxications']; ?></textarea> </div>
                                            </div>
                                            </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="accidents"><strong>Examen</strong><br></label><textarea class="form-control" placeholder="Examen..." rows="10" id="accidents" name="accidents"><?php echo $dm['accidents']; ?></textarea></div>
                                                                                        
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label id="lieu-de-naissance-8" for="collateraux"><strong>Synthèse: résumé synthése</strong><br></label><textarea class="form-control" placeholder="Synthèse: résumé synthése..." rows="10" id="collateraux" name="collateraux"><?php echo $dm['collateraux']; ?></textarea></div>
                                            </div>
                                            </div>                                          
                                        
                                    
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="conjoints"><strong>Hypothèses diagnostiques</strong><br></label><textarea class="form-control" placeholder="Hypotéses diagnostique..." rows="10" id="conjoints" name="conjoints"><?php echo $dm['conjoints']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="imagerie"><strong>Imagerie</strong><br></label>
                                            <textarea class="form-control" placeholder="Imagerie..." rows="10" id="imagerie" name="imagerie"><?php echo $dm['imagerie']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="biologie"><strong>Biologie</strong><br></label>
                                            <textarea class="form-control" placeholder="Biologie..." rows="10" id="biologie" name="biologie"><?php echo $dm['biologie']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="fonResp"><strong>Fonction Respiratoire</strong><br></label>
                                            <textarea class="form-control" placeholder="fonction Respiratoire..." rows="10" id="fonResp" name="fonResp"><?php echo $dm['fonResp']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="allergologie"><strong>Test d'Allergie</strong><br></label>
                                            <textarea class="form-control" placeholder="Test d'Allergie..." rows="10" id="allergologie" name="allergologie"><?php echo $dm['allergologie']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="bacteriologie"><strong>Bactériologie</strong><br></label>
                                            <textarea class="form-control" placeholder="bacteriologie..." rows="10" id="bacteriologie" name="bacteriologie"><?php echo $dm['bacteriologie']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="autres"><strong>Autres</strong><br></label>
                                            <textarea class="form-control" placeholder="Autres..." rows="10" id="autres" name="autres"><?php echo $dm['autres']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label id="lieu-de-naissance-1" for="observation"><strong>Projet</strong><br></label><textarea class="form-control" placeholder="Projet..." rows="10" id="observation" name="observation"><?php echo $dm['observation']; ?></textarea></div>
                                        </div>
                                    </div>
                                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="edit_dm">Modifier le dossier médical</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php include './includes/footer.php'; ?>