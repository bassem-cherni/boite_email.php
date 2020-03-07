<div class="col-md-12">
    <a href="" class="btn btn-primary">Envoyer un Message</a>
    </p>

    <div class="panel panel-primary">
        <div class="panel-heading"> Liste des Massages Réçus</div>
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>De</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $liste= getAllMessagesRecus($_SESSION["iduser"]);
                foreach ($liste as $value);
                $usersend=getUserById($value["usersend"]);
                ?>
                <tr class="bg-info">
                    <td><?= $usersend?></td>
                    <td>Ali@essat.tn</td>
                    <td>Demande de Stage</td>
                    <td>Le 14/10/2017</td>
                    <td>
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                        <button class="btn btn-success">
                            <span class="glyphicon glyphicon-cog"></span>
                        </button>
                    </td>
                </tr>
                
            </tbody>

        </table>

    </div>

</div>