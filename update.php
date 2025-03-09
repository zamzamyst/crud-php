<?php  
    include 'database.php';
    
    $id = $_GET['id'];  
    $data = mysqli_fetch_assoc(mysqli_query($db_connection, "SELECT * FROM product WHERE id=$id"));  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
        $nama = $_POST['nama'];  
        $jenis = $_POST['jenis'];  
        $harga = $_POST['harga'];  
        mysqli_query($db_connection, "UPDATE product SET nama='$nama', jenis='$jenis', harga='$harga' WHERE id=$id");  
        header("Location: index.php");  
    }  
?>  

<!DOCTYPE html>  
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="icon" type="image/png" href="https://ypt.or.id/wp-content/uploads/2018/09/telu.png"> 
    <style>  
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Poppins, sans-serif;
        }
        body {  
            background-color: #f4f4f4;  
            text-align: center;  
        }  

        .container-form {  
            font-size: 16px;  
            display: flex;  
            flex-direction: column;  
            width: 400px;  
            margin: 50px auto;  
            background: white;  
            padding: 30px 30px 30px 30px;  
            border-radius: 20px;  
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);  
        }  

        h2 {  
            margin-bottom: 50px;  
        }  

        .form-group {  
            margin-bottom: 20px;  
            text-align: left;  
        }  

        label {  
            font-weight: bold;  
            display: block;  
            margin-bottom: 5px;  
        }  

        input {  
            width: 100%;  
            padding: 10px;  
            border-radius: 5px;  
            border: 1px solid #ccc;  
            box-sizing: border-box;  
        }  

        button {
            width: 100%;
            color: white;
            border: none;
            padding: 15px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin: auto;
            margin-top: 50px;
        }
        
        .btn-add {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            background-color: #28a745;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        .btn-cancel {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            background-color:rgb(184, 39, 39);
        }

        .btn-cancel:hover {
            background-color:rgb(136, 33, 33);
        }
    </style>  
</head>  

<body>  
    <div class="container-form">  
        <h2>Edit Produk</h2>  
        <form action="update.php?id=<?php echo $id ?>" method="POST">  
            <div class="form-group">  
                <label for="nama">Nama Produk:</label>  
                <input type="text" id="nama" name="nama" value="<?php echo $data['nama'] ?>" required>  
            </div>  
            <div class="form-group">  
                <label for="jenis">Jenis Produk:</label>  
                <input type="text" id="jenis" name="jenis" value="<?php echo $data['jenis'] ?>" required>  
            </div>  
            <div class="form-group">  
                <label for="harga">Harga Produk:</label>  
                <input type="number" id="harga" name="harga" value="<?php echo $data['harga'] ?>" required>  
            </div>  
            <div class="btn-group">  
                <button class="btn-add" type="submit" name="update">Simpan</button>  
                <button class="btn-cancel" type="button" onclick="window.location.href='index.php'">Cancel</button>
            </div>  
        </form>  
    </div>  
</body>  
</html>  