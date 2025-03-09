
<?php
    include 'database.php';
    $result = mysqli_query($db_connection, "SELECT * FROM product");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <head>
    <link rel="icon" type="image/png" href="https://ypt.or.id/wp-content/uploads/2018/09/telu.png">
</head>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Poppins, sans-serif;
        }

        body {
            background-color: #f4f4f4;
        }

        .container-main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            row-gap: 20px;
            width: 80%;
            height: 90vh;
            margin: 30px auto;
            border-radius: 30px;
            background-color: rgb(231, 231, 231);;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.24);
            padding: 30px 30px;
        }

        .container-table {
            position: relative;
            width: 100%;
            height: 70%;
            background-color: rgb(255, 255, 255);;
            padding: 3px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: scroll;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            overflow: hidden;
        }

        table, th, td {
            border: 2px solid rgb(225, 225, 225);
        }
        
        th {
            background-color:rgb(207, 166, 18);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 16px;
        }
        
        td {
            background-color:rgb(255, 255, 255);
            padding: 10px;
            text-align: center;
            
        }
        
        a {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 15px 40px;
            color: white;
            text-decoration: none;
        }
        
        .container-btn {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 30px;
        }
        
        .btn-create {
            border-top-left-radius: 15px;
            background-color:#28a745;
        }
        
        .btn-delete {
            border-top-right-radius: 15px;
            background-color:rgb(199, 72, 72);
        }
        
        .btn-edit {
            background-color:#28a745;
            color: white;
            width: 70%;
            border-radius: 5px;
            margin: 10px auto;
            padding: 10px 5px;
        }
        
        .btn-create:hover {
            background-color:rgb(72, 118, 64);
        }
        
        .btn-edit:hover {
            background-color:rgb(69, 116, 61);
        }
        
        .btn-delete:hover {
            background-color:rgb(170, 52, 52);
        }
        
    </style>
</head>

<body>
    <div class="container-main">
        <h1>Daftar Produk Toko X</h1>
        <div class="container-btn">
            <a class="btn-create"  href="create.php">Tambah Produk</a>
            <a class="btn-delete" href="delete.php">Hapus Produk</a>
        </div>
        <div class="container-table">
            <table>
                <tr>
                    <th width="5%">ID</th>
                    <th width="30%">Nama Produk</th>
                    <th width="25%">Jenis Produk</th>
                    <th width="25%">Harga Produk</th>
                    <th width="25%">Aksi</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['jenis'] ?></td>
                    <td><?php echo "Rp" . number_format($row['harga'], 2, ',', '.') ?></td>
                    <td>
                        <a class="btn-edit" href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>