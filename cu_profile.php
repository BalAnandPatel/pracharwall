<?php
include "include/header.php";
// $userId = '6';
$userId = $_SESSION["USER_ID"];
$url = $URL . "user/read_user_profile.php";
$userType = '3';
$status = '0';
$data = array("userType" => $userType, "status" => $status, "id" => $userId);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
?>

<section>
    <div class="container py-3">
        
    <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

     <div class="pt-2" id="cuEditMsg"></div>
        <?php
        $counter = '0';
        foreach ($result as $key => $value) {
            foreach ($value as $key1 => $value1) {
                ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="<?php echo $USER_PROFILE_IMGPATH . $userId . "/user_img_" . $userId . ".png"; ?>" height="50%" width="50%" alt="user image" class="rounded-circle img-fluid img-thumbnail">
                                <h5 class="my-3">
                                    <?php echo $value1->userName; ?>
                                </h5>
                                <!-- <p class="text-muted mb-1">Full Stack Developer</p> -->
                                <p class="text-muted mb-1">
                                    <?php echo $value1->userEmail; ?>
                                </p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-primary w-100" id="userEdit">Edit Proflie <i
                                            class="bi bi-pencil-square"></i></button>
                                </div>
                                <div class="container bg-light rounded-1 mt-2 p-3">
                                <form action="admin/action/upload_cu_profile_post.php" method="post" enctype="multipart/form-data">
                                <label class="text-bold p-2">Upload Profile</label>
                                <input type="hidden" name="userId" value="<?php echo $userId; ?>">   
                                <input class="form-control form-control-sm" type="file" name="userImg" required>
                                <button class="btn btn-primary btn-sm mt-2 w-100" type="submit" name="upload"><i class="bi bi-upload"></i>&nbsp;Upload</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <form method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <input type="text" class="form-control" id="cuName"
                                                    value="<?php echo $value1->userName; ?>" disabled>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $value1->userEmail; ?>" disabled>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <input type="text" class="form-control" id="cuMobile"
                                                    value="<?php echo $value1->userMobile; ?>" disabled>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <input class="form-control" type="text" id="cuAddress"
                                                    value="<?php echo $value1->userAddress; ?>" id="userAdd" disabled>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                    <div class="row">
                                        <div class="d-flex justify-content-end mb-2">
                                            <input type="hidden" value="<?php echo $value1->id; ?>" id="cuId">
                                            <button type="button" id="editCustomer" style="display:none"
                                                class="btn btn-success mt-2">Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        } ?>
</section>

<hr>
<script>
    $(document).ready(function () {

        $("#userEdit").click(function (event) {
            event.preventDefault();
            //    alert("clicked");
            //  $('#cuName').removeAttr("disabled");
            //  $('#cuMobile').removeAttr("disabled");
             $('#cuAddress').removeAttr("disabled");
             $('#editCustomer').css("display", "block");
        });

        $("#editCustomer").click(function () {
            var cuId = $('#cuId').val();
            var cuName = $('#cuName').val();
            var cuMobile = $('#cuMobile').val();
            var cuAddress = $('#cuAddress').val();
            // alert(cuId);
            $.ajax({
                url: "<?php echo $BASE_URL ?>admin/action/cu_profile_update_post.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    cuId: cuId,
                    cuName: cuName,
                    cuMobile: cuMobile,
                    cuAddress: cuAddress
                },
                success: function (response) {
                    // alert(response);
                    // alert(JSON.stringify(response));
                    if(response.message=="User profile updated successfully"){
                     
                        $("#cuEditMsg").html('<div class="alert alert-success" role="alert">Successfully Updated</div>');
                        $("#cuEditMsg").fadeTo(5000, 500).slideUp(5000, function () {
                        $("#cuEditMsg").slideUp(5000);
                        });

                        $('#cuAddress').attr("disabled", true);
                        $('#editCustomer').css("display", "none");
                    }
                   

                }

            });

        });

    });
</script>
<?php include "include/footer.php"; ?>