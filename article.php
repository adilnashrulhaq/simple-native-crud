<?php include 'database.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articleshelf App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="create.php" style="text-decoration: none; color:white;">Tambah Artikel</a></button>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql="select * from `article`";
                $result=mysqli_query($db,$sql);
                if($result) {
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$row['id'];
                        $title=$row['title'];
                        $author=$row['author'];
                        $year=$row['year'];
                        $status=$row['status'];
                        echo '<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$title.'</td>
                        <td>'.$author.'</td>
                        <td>'.$year.'</td>
                        <td>' . ($status == 1 ? 'Sudah dibaca' : 'Belum dibaca') . '</td>
                        <td colspan="4">
                            <button class="btn btn-primary">
                                <a href="update.php?updateid='.$id.'" class="text-light" style="text-decoration: none;">Edit</a>
                            </button>
                            <button class="btn btn-danger">
                                <a href="delete.php?deletedid='.$id.'" class="text-light" style="text-decoration: none;">Hapus</a>
                            </button>
                        </td>    
                        </tr>';
                    };
                }
            ?>
        </tbody>
        </table>
    </div>
</body>
</html>