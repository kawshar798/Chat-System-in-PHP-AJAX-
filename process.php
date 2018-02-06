<?php
include 'database.php';

$query = "SELECT * FROM tbl_user ORDER BY id DESC";
$query_run = mysqli_query($db_conn, $query);
while ($rows = mysqli_fetch_assoc($query_run)) {
    ?>
    <div class="chatbody">
        <div class="header">
            <strong class="text-primary"><?php echo $rows['user_name']; ?></strong>
            <small class="pull-right text-muted text-primary">
                <span class="glyphicon glyphicon-time"></span><?php echo formateDate($rows['time']); ?></small>
        </div>
        <p>
            <?php echo  $rows['user_message']; ?>
        </p>
    </div>

<?php }
?>