<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Kelompok 2</title>
</head>

<body>

    <?php include_once "./include/navbar.php"; ?>
    <!-- offcanvas -->
    <?php include_once "./include/sidebar.php"; ?>
    <?php 
        require "./include/database.php";
        require "repository/member.php";

        $pdo = Database::connect();
        $member = new Member($pdo);

        if(!isset($_GET['id'])){
            header("Location: member.php");
        }else{
            $id = $_GET['id'];
            $result = $member->getMembers($id);
        }

       
    ?>
    <script type="text/javascript">
        console.log(<?php echo $result; ?>);
    </script>
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Update Member
                    </div>
                    <div class="card-body">
                        <form action="member_update_act.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama </label>
                                <input type="text" value="<?php echo $result['nama_member']; ?>" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input require type="text" value="<?php echo $result['alamat']; ?>" name="alamat" class="form-control" id="alamat" >
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input require type="text" value="<?php echo $result['telepon']; ?>" name="telepon" class="form-control" id="telepon" >
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input require type="text" value="<?php echo $result['email']; ?>" name="email" class="form-control" id="email" >
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>