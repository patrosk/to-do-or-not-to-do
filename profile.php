<?php require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>


<div>
    <img src="<? ?>" alt="">
</div>
<?php
// display image if user is logged in. if there is no avatar, display example pic.
// if () {

// }
?>

<form action="/app/users/avatar/upload.php" method="post" enctype="multipart/form-data">
    <label for="upload-avatar">Upload your avatar image in PNG/JPG format</label>
    <input type="file" name="upload-avatar" id="upload-avatar" accept=".png, .jpg, .jpeg">
    <button type="submit">Upload image</button>
</form>

<?php require __DIR__ . '/views/footer.php';
