<?php  include('inc/header.php'); ?>
<?php  include('inc/validation.php'); ?>

<?php

    if(isset($_POST['submit'])){ // كأني بقلو اذا ضغطت على كبسة السبمت, بمثابة الأون كليك بالجافا سكريبت
        $name =     santString($_POST['name']) ; // قيمة الإنبوت اللي إلو نايم اسمو نايم بطبق عليه الفنكشن اللي اسمو سانتسترنق من صفحة الفاليدايشن
        $email =    santEmail($_POST['email']) ;
        $password = santString($_POST['password']) ;

        

        // Start 1st condition
        if(requiredInput($name) && requiredInput($email) && requiredInput($password)) {

            // Start 2nd condition
            if(minInput($name,3) && maxInput($password,20)) {
                // Start 3rd condition
                if(validEmail($email)) {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // بتعمل على تشفير الباسوورد في الداتا بايس 
                    
                    // save photo in products folder
                        $main_pic= $_FILES['pic'];
                        // echo "<pre>";
                        // print_r($main_pic);
                        // echo "</pre>";
                        $filename = $_FILES["pic"]["name"];
                        $filename=trim($filename);
                        // echo "<pre>";
                        // print_r($filename);
                        // echo "</pre>";
                        $tempname = $_FILES["pic"]["tmp_name"];
                        // echo "<pre>";
                        // print_r($tempname);
                        // echo "</pre>";
                        $folder = "./images/" . $filename;
                        if (move_uploaded_file($tempname, $folder)) {
                            echo "<h3>  Image uploaded successfully!</h3>";
                        } else {
                            echo "<h3>  Failed to upload image!</h3>";
                        }
                    
                    // Start Create In DataBase
                    $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `photo`) VALUES('$name' , '$email', '$hashed_password', '$filename' ) "; // جملة الكويري 
                    $result = mysqli_query($conn, $sql); // حددت جملة الكويري على أي داتا بايس بدي أطبقها 
                    // End Create In DataBase

                    // Start Note Added Successfully
                    if ( $result ) {
                        $success = "Added Successfully";
                    }
                    // End Note Added Successfully
                }
                else {
                    $error = "Please Type Valid Email";
                }
                // End 3rd condition
            }
            else {
                $error = "Name Must Be Greate Than 3 Characters & Password Must Be Less Than 20 Characters";
            }
            // End 2nd condition
            
        }
        else {
            $error = "Please Fill All Fields"; // هذا الفاريابل موجود بصفحة الفاليديشن
        }
        // End 1st condition
    }

?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
    <!-- Start For Error  -->
    <?php if($error) : ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
    <?php endif; ?>
    <!-- End For Error  -->
        
    <!-- Start For Correct Insert in DataBase  -->
    <?php if($success) : ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif; ?>
    <!-- End For Correct Insert in DataBase  -->

    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
            <!-- $_SERVER['PHP_SELF'] بتوديني على نفس الصفحة اللي انا فيها  -->
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div>
            
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="form-group">
                <label for="exampleInputImage1">Image</label>
                <input type="file" name="pic" class="form-control" id="exampleInputImage1">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
        <!-- Form to add Photo  -->
    <!-- <div class="col-md-6 offset-md-3">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputImage1">Image</label>
                <input type="file" name="pic" class="form-control" id="exampleInputImage1">
                <button type="submit" class="btn btn-primary">Add Photo</button>
            </div>
        </form>
    </div> -->
    
    <?php 
        
    ?>

<?php  include('inc/footer.php'); ?>

