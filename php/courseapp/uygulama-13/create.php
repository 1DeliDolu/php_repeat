<?php
    require "libs/variables.php";
    require "libs/functions.php";
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<div class="container my-3">

    <div class="row">
        <div class="col-12">
           <form action="index.php" method="post">
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control">
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="text" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="dateAdded">Date Added</label>
                <input type="text" name="dateAdded" id="dateAdded" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
           </form>
        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>
