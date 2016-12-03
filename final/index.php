<?php include("static/header.php"); ?>

        <div class="jumbotron">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="black-outline">Flavor pairing food databases</h1>
                    <form method="get" action="search.php">
                         <div class="input-group">
                           <input type="text" class="form-control" name="query" placeholder="What goes well with...">
                           <span class="input-group-btn">
                             <button class="btn btn-default" type="submit" name="submit" value="true">Go!</button>
                           </span>
                         </div><!-- /input-group -->
                    </form>
                    <p class="black-outline">Currently only "apple" data has been ingested into our databse.</p>
                </div>
            </div>
        </div>

<?php include("static/footer.php"); ?>
