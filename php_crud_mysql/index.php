<?php include("db.php")?>

<?php include("includes/header.php")?>

<div class="container p-4">

  <div class="row">

     <div class="col-md-4">


     <?php if (isset($_SESSION['message'])) { ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
         <?= $_SESSION ['message'] ?>
         <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
     <?php session_unset(); }   ?>

         <div class="card card-body">
             <form action="save_task.php" method="POST">
                 <div class="form-group">
                     <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus><imput>
                 </div>
                 <div class="form-group">
                     <textarea name="description" class= "form-control" placeholder="Task Description" ></textarea>
                 </div>
                 <input type="submit" class="btn btn-secondary btn-block" name="save_task" value="Save Task"> 
             </form>
     
         </div>
  
     </div>


     <div class="col-md-8 ">
     <table class="table table-bordered ">
          <thead class= "thead-dark">
             <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Actions</th>
             </tr>  
          </thead>
          <tbody>
             <?php
             $query = "SELECT  * FROM task";
             $result_tasks = mysqli_query($conn, $query);

             while ($row = mysqli_fetch_array($result_tasks)){?> 
                 <tr>
                     <td> <?php echo  $row['TITLE']?>  </td>
                     <td> <?php echo  $row['DESCRIPTION']?></td>
                     <td> <?php echo  $row['CREATED_AT']?>  </td>
                     <td >
                         <a href="edit_task.php?id=<?php echo $row['ID']?>" class = "btn btn-secondary ">
                              <i class="fas fa-user-edit "></i>
                         </a>

                      

                         <a href="delete_task.php?id=<?php echo $row['ID']?>" class = "btn btn-danger ">
                              <i class="fas fa-trash-alt"></i>
                         </a>



                     </td>
                 </tr>
             <?php } ?>
          </tbody>
     </table>
     </div>

  </div>

</div>
<?php include("includes/footer.php")?>    