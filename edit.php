<?php
    include("db.php");
    
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task where id = $id";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];

        }
        
    }
    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        $_SESSION['message'] = 'Task updated successfully';
        $_SESSION['message_type'] = 'info';

        header('Location: index.php');

    }
?>
<?php include("includes/header.php"); ?>

    <div class="container">
        <div class="row mt-4">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update the title"/>
                    </div>
                    <div class="form-group mt-2">
                        <textarea name="description" cols="30" rows="2" class="form-control" placeholder="Update the description"><?php echo $description ?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-success mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>

