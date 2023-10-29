<?php
include_once "../includes/header.php";
include_once "../config/database.php";
include_once "../classes/team.php";

$db = new Database();
$dbase = $db->getConnection();

$team = new Team($dbase);
$statement = $team->read();

?>
<p class="fs-1 text-center p-2 bg-warning text-white">Teams List</p>
<div class="d-flex justify-content-end gap-2">
    <a href="../index.php" class="btn btn-danger">Back</a>
</div>
<div class="row d-flex justify-content-center p-2">
    <div class="col-8">
        <table class="table p-2 text-white">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                foreach ($statement as $row) {
                    echo "<tr>
                        <td>" . $row['team_name'] . "</td>
                        <td>" . $row['team_description'] . "</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include_once "../includes/footer.php";
?>
