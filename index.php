<?php
    include("db.php");
    include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">

        <div class="col-4">
            <?php
                    if(isset($_SESSION['message'])){
                 ?>
            <div class="alert alert-<?php echo $_SESSION['message_type'];?>" role="alert">
                <?php
                    echo $_SESSION['message'];
                ?>
            </div>
            <?php    
                    session_unset();}
                ?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input class="form-control" type="stext" name="title" placeholder="Title" required autofocus>
                        <textarea class="form-control mt-2" name="description" id="" cols="30" rows="2"
                            placeholder="Description" required></textarea>
                    </div>
                    <input type="submit" class="btn btn-success mt-3" name="save_task" value="Save task">
                </form>
            </div>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titlte</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        $query = "SELECT * FROM task";
        $result_tasks = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($result_tasks)){ ?>
                    <tr>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['description'];?></td>
                        <td><?php echo $row['created_at'];?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'];?>"><span class="material-icons">edit</span></a>
                            <a href="delete_task.php?id=<?php echo $row['id'];?>"><span class="material-icons text-danger">delete_forever</span></a>
                        </td>
                    </tr>
                    <?php
        }
      ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    include("includes/footer.php");
?>