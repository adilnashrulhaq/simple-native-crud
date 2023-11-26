<?php
    include 'database.php'; 
    $id=$_GET['updateid'];

    //agar field update terisi data yg udh ada
    $sql="select * from `article` where id=$id";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
    //lalu nilai ini diambil, dan ditaruh di value tiap field yg ada di form
    $title=$row['title'];
    $author=$row['author'];
    $year=$row['year'];
    $status=$row['status'];
    //------------------
    
    if(isset($_POST['submit'])){
        $title = $_POST['inputTitle'];
        $author = $_POST['inputAuthor'];
        $year = $_POST['inputYear'];
        $status = isset($_POST['inputStatus']) ? '1' : '0';

        $sql="update `article` set id=$id, title='$title',
        author='$author', year='$year', status='$status' where id=$id";
        $result = mysqli_query($db,$sql);

        if($result) {
            header('location:article.php');
        } else {
            die(mysqli_error($db));
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Buat Artikel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <h1 class="my-5">Edit Artikelmu</h1>
            <form method="post">
            <div class="mb-3 col-3">
                <label for="inputTitle" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" id="inputTitle" name="inputTitle"
                        placeholder="masukan judul artikelmu" autocomplete="off" value=<?php echo $title?>>
            </div>
            <div class="mb-3 col-3">
                <label for="inputAuthor" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="inputAuthor" name="inputAuthor"
                        placeholder="masukan nama penulis" autocomplete="off" value=<?php echo $author?>>
            </div>
            <div class="mb-3 col-3">
                <label for="inputYear" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="inputYear" name="inputYear"
                        placeholder="masukan tahun diterbitkan" autocomplete="off" value=<?php echo $year?>>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="inputStatus" name="inputStatus"
                value="<?php echo $status; ?>" <?php echo ($status == '1') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="inputStatus">Sudah dibaca</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </div>
    </body>
</html>