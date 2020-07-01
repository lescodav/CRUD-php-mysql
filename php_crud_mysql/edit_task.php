<?php

      include("db.php");

    if (isset($_GET['id'])){
     $id = $_GET['id'];
   
     $query = "SELECT * FROM task WHERE ID = $id";
     $result = mysqli_query($conn, $query); 

        if (mysqli_num_rows($result) == 1) {
           $row = mysqli_fetch_array($result);
           $title = $row['TITLE'];
           $description = $row['DESCRIPTION'];
        }
    }
    if (isset($_POST['update']))  {

        $id = $_GET['id'];
        $title = $_POST['TITLE'];
        $description = $_POST['DESCRIPTION'];

        $query = "UPDATE task set TITLE = '$title' , DESCRIPTION = '$description' WHERE ID = $id";
        mysqli_query($conn, $query); 

        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'danger';

        header ( "Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class = "row">
        <div class = "col-md-4" >
            <div class="card card-body"> 
                <form action="edit_task.php?id=<?php echo $_GET['id'];?>" method = "POST">
                    <div class="form-group">
                      <input type="text" name="TITLE" value="<?php echo $title; ?>" class="form-control" placeholder="TITLE">
                    </div>  
                    <div class="form-group">
                      <textarea name="DESCRIPTION" rows="2" class="form-control" placeholder="Update Description"><?php echo $description;?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                      Update
                    </button>
                </form>
            </div>
        </div>     
    </div>
</div>