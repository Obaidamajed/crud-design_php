<?php  include('inc/header.php'); ?>
<?php  
    // Read From DataBase
    $sql = "SELECT * FROM `users` ";
    $result = mysqli_query($conn,$sql); // بقلو جملة الكويري طبقها على الداتا بايس المتصل فيها 
    // $conn موجود في ملف ال db.php 


?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">All Users</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(mysqli_num_rows($result) > 0): ?> 
                <!-- mysqli_num_rows($result) هاي بتعمل تشييك اذا الريزولت راجع ببيانات او لا -->
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <!-- mysqli_fetch_assoc هذا الفنكشن من خلالو بستقبل البيانات ك أرراي -->
                <!-- while بعمل لوب على كل الأرراي اللي بداخل التابل  -->
                <?php
                echo "<pre>";
                print_r($row);
                echo "</pre>";
                // $row عبارة عن أرراي بحتوي بداخل عدة أررايز بحيث كل أرراي بداخلو بمثل رو واحد من التابل كامل
                echo "<pre>";
                print_r($row['user_id']);
                echo "</pre>";
                ?>
                    <tr>
                        <th><?php echo $row['user_id']; ?></th>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td>
                            <a class="btn btn-info" href="edit.php?id=<?php echo $row['user_id']; ?>"> <i class="fa fa-edit"></i> </a>
                            <!-- ?id=<?php echo $row['user_id']; ?> بهاي الطريقة ببعث الآي دي لخاص بالعنصر اللي ضغطت عليه على صفحة الإيديت -->
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['user_id']; ?>"> <i class="fa fa-close"></i> </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php endif; ?>


                    
                
                </tbody>
            </table>
        </div>
    </div>

<?php  include('inc/footer.php'); ?>

