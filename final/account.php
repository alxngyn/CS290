<?php include("static/header.php"); ?>

<div class="container">
    <div class="account col-md-4 col-center">
        <h1>Account Deletion</h1>
        <form method="post" action="deleteAccount.php">
            <h3>To do delete your account, input your username and password.</h3>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <br>
            <h3>Are you sure?</h3>
            <div class="radio">
                <label><input type="radio" name="confirm" value="Yes">Yes</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="confirm" value="No">No</label>
            </div>
            <br>
            <button class="btn btn-primary btn-block btn-danger" name="submit" type="submit" value="true">DELETE ACCOUNT</button>
        </form>
    </div>
</div>
<?php include("static/footer.php"); ?>
