
<?php

 require_once '../Models/groupcreation.php';
 require_once '../controllers/createController.php';
 require_once '../controllers/DBController.php';

 $db = new DBController();
 $db->openconc();
 
 $errMsg="";

   if(isset($_POST['submit'])){

      echo"s";
   $user = new create_group;
   $Auth = new createController;
   echo"s";
     $user->setName($_POST['name']);
     $user->setnum_mambers($_POST['num_members']);
     $user->setlocation($_POST['location']);



                $Auth->create($user);
   }
   $db->closeConc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Create new group form </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    background:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
    </style>
</head>
<body>
<div class="container-fluid">
<div class="container">

<div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
<h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a> Create new group</h2>
<div class="hstack gap-3">
<button class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></button>

</div>
</div>
<form action=""method='POST'>
<div class="row">

<div class="col-lg-8">

<div class="card mb-4">
<div class="card-body">
<h3 class="h6 mb-4">Basic information</h3>
<div class="row">
<div class="col-lg-6">
<div class="mb-3">
<label class="form-label">name</label>
<input type="text" class="form-control"name="name">
</div>

</div>
<div class="col-lg-6">
<div class="mb-3">
<label class="form-label">num_members</label>
<input type="text" class="form-control"name="num_members">
</div>
</div>
</div>
</div>
</div>

<div class="card mb-4">
<div class="card-body">
<h3 class="h6 mb-4">location</h3>
<div class="mb-3">
<label class="form-label">location</label>
<input type="text" class="form-control"name="location">
</div>
<input type="submit" name='submit' value='save'>
</form>
</li>

</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
