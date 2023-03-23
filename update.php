<?php  include('inc/header.php'); ?>
<?php  include('inc/validation.php'); ?>

<?php

    if(isset($_POST['submit'])){
        $name =     santString($_POST['name']) ; // قيمة الإنبوت اللي إلو نايم اسمو نايم بطبق عليه الفنكشن اللي اسمو سانتسترنق من صفحة الفاليدايشن
        $email =    santEmail($_POST['email']) ;

        // Start 1st condition
        if(requiredInput($name) && requiredInput($email)) {

          // Start 2nd condition
          if(minInput($name,3)) {
            // Start 3rd condition
            if(validEmail($email)) {
              // Start 4th condition
              $id = $_POST['id'];
              if ( $password ) {
                $password = santString($_POST['password']) ;
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // بتعمل على تشفير الباسوورد في الداتا بايس 
                // Update Query
                $sql = "UPDATE `users` SET `user_name`='$name', `user_email` = '$email',`passwoord`='$hashed_password' WHERE `user_id`='$id' ";
              } else {
                $sql = "UPDATE `users` SET `user_name`='$name', `user_email`='$email' WHERE `user_id`='$id' ";
              }
                
                $result = mysqli_query($conn, $sql); // حددت جملة الكويري على أي داتا بايس بدي أطبقها 
              

                if ( $result ) {
                    $success = "Updated Successfully";
                    header("refresh:3;url=index.php"); // هيك بنقلني على صفحة الإندكس بعد 3 ثواني
                }
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

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About User</h1>

    <?php if($error) : ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Go Back > > </a> 
        <!-- javascript:history.go(-1)" برجعني على الصفحة اللي كنت فيها  -->
    <?php endif; ?>

    <?php if($success) : ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif; ?>

<?php  include('inc/footer.php'); ?>

