<?php 

require_once("includes/init.php");

if(!$session->is_signed_in()) {
redirect("login.php");
}


$message = "";
if(isset($_POST['submit'])) {
    
$photo = new Photo();
$photo->title = $_POST['title'];
$photo->set_file($_FILES['file_upload']);  
    
    
if($photo->save()) {
    
    $message = "Photo uploaded Succesfully";
    
} else {
    
    $message = join("<br>", $photo->errors);
     
}   
    
} // end if(isset($_POST['submit']))




?>

<?php require_once("includes/header.php"); ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- Top Menu Items -->
          <?php include("includes/top_nav.php"); ?>
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include("includes/side_nav.php"); ?>
            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

         
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Upload <small>Statistics Overview</small>
                        </h1>
                      
                        
                        
                   <div class="col-md-6">       
                        
                    <?=$message?>   
                       
                       
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    
                        
                        
                     
                        
                    <div class="form-group">
                        
        <input type="text" name="title" class="form-control">
                        
                    </div>
                        
                        
                      <div class="form-group">
                        
                        <input type="file" name="file_upload" class="form-control" multiple>
                        
                    </div>
                       
                        <div class="form-group">
                        <input type="submit" name="submit" class="btn">
                        
                        </div>
                        
                    </form>
                        
                        
                      </div>  
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>              
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>