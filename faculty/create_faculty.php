<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACULTY REGISTRATION</title>
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</head>
<body>
    <form action="../faculty/add_faculty.php" method="post">

        <label for="firstname">Enter Your First Name</label>
        <input type="text" name="firstname" placeholder="First Name Here!" required>

        <label for="middlename">Enter Your Middle Name</label>
        <input type="text" name="middlename" placeholder="Middle Name Here!">

        <label for="lastname">Enter Your Last Name</label>
        <input type="text" name="lastname" placeholder="Last Name Here!" required>

        <select name="colleges" id="college_select" class="select2">
            <option value="Select Your College" disabled selected>Select Your College</option>
            <?php include '../colleges/get_colleges.php' ?>
        </select>

        <label for="email">Enter Your Email</label>
        <input type="email" placeholder="ex. JuanDelaCruz@gmail.com">

        <label for="create_password">Create Your Password</label>
        <input type="password" name="create_password" id="">


        <button type="submit">Confirm</button>
    </form>
    <script>
    $(document).ready(function(){
        $('.select2').select2();

        $('#college_select').on('change', function(){  
            var collegeId = $(this).val();
        });
    });
</script>
</body>
</html>