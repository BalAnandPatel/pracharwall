<?php
include "include/header.php";
?>
<?php
if(isset($_POST['update'])){
$userId = $_POST['userId'];
$url = $URL."user/read_user_profile.php";
$userType='2'; 
$data = array("userType" =>$userType, "id"=>$userId);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$profile_result = json_decode($response);
//print_r($profile_result);    
}else{
echo '<script>window.location="profile.php"</script>';
}
?>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <!-- <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4"> -->
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="assets/img/avatar1.png" alt="">
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form action="admin/action/user_profile_update_post.php" method="post">
                        <?php 
                                       $counter='0';
                                       foreach($profile_result as $key => $profile_value){
                                       foreach($profile_value as $key1 => $profile_value1)
                                       {
                                    ?> 
                          <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Select Business Category</label>
                                <select class="form-select" name="businessCategory" aria-label="Default select example">
                                    <option selected disabled>Select Category</option>
                                    <?php 
                                       $counter='0';
                                       foreach($result as $key => $value){
                                       foreach($value as $key1 => $value1)
                                       {
                                    ?> 
                                        <option value="<?php echo $value1->businessCategory; ?>"><?php echo $value1->businessCategory; ?></option>
                                    <?php
                                      }
                                      }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Select Business Sub-Category</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select Sub-Category</option>
                                
                                        <option value="<?php echo $value1->subCategory; ?>"><?php echo $value1->subCategory; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Business Name (How your name will appear to
                                other users on the site)</label>
                            <input class="form-control" name="businessName" value="<?php echo $profile_value1->businessName; ?>" type="text"
                                placeholder="Enter your business name">
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-12">
                                <label class="small mb-1" for="inputFirstName">Full Name</label>
                                <input class="form-control" value="<?php echo $profile_value1->userName; ?>" type="text"
                                    placeholder="Enter your full name" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputLocation">Address</label>
                            <input class="form-control"  name="userAddress" value="<?php echo $profile_value1->userAddress; ?>" type="text"
                                placeholder="Enter your location">
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" value="<?php echo $profile_value1->userEmail; ?>" type="email" placeholder="Enter your email address" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" value="<?php echo $profile_value1->userMobile; ?>" type="tel" placeholder="Enter your phone number" disabled>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Alternative Phone number</label>
                                <input class="form-control"  name="alterMobile" type="tel"
                                    placeholder="Enter your phone number">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Year of Establishment</label>
                                <input class="form-control" name="establishmentYear" value="<?php echo $profile_value1->establishmentYear; ?>" type="text"
                                    placeholder="Enter the year of establishment">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col">
                                <label class="small mb-1" for="inputPhone">Timing</label>
                                <input class="form-control" name="businessTiming" value="<?php echo $profile_value1->businessTiming; ?>" type="text" placeholder="@10:00am - 8:00pm">
                            </div>
                            <div class="col">
                                <label class="small mb-1" for="fromDay">From</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="1">Sunday</option>
                                    <option value="2">Monday</option>
                                    <option value="3">Tuesday</option>
                                    <option value="4">Wednesday</option>
                                    <option value="5">Thursday</option>
                                    <option value="6">Friday</option>
                                    <option value="7">Saturday</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="small mb-1" for="toDay">To</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="1">Sunday</option>
                                    <option value="2">Monday</option>
                                    <option value="3">Tuesday</option>
                                    <option value="4">Wednesday</option>
                                    <option value="5">Thursday</option>
                                    <option value="6">Friday</option>
                                    <option value="7">Saturday</option>
                                </select>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <label for="paymentmethod mb-1 small gx-3">Payment Method</label>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="Cash" name="paymentMode[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Cash
                                </label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="Master Card" name="paymentMode[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Master Card
                                </label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="Visa Card" name="paymentMode[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Visa Card
                                </label>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="Debit Cards" name="paymentMode[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Debit Cards
                                </label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="Credit Cards" name="paymentMode[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Credit Cards
                                </label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="Cheques" name="paymentMode[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Cheques
                                </label>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="userWebsite">Your Website</label>
                                <input class="form-control" name="userWebsite" value="<?php echo $profile_value1->userWebsite; ?>" type="url"
                                    placeholder="https://www.website.com">
                            </div>
                            <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Year of Establishment</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter the year of establishment">
                            </div> -->
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputBirthday">About Your Business</label>
                            <textarea class="form-control" name="aboutUser" value="<?php echo $profile_value1->aboutUser; ?>" rows="4"
                                ></textarea>
                        </div>
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                        <button class="btn btn-primary" name="update_profile" type="submit">Save changes</button>
                      <?php } } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-xl px-4 mt-4 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-8">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Upload Post To Your Profile</div>
                <div class="card-body">

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="post1">Post 1</label>
                        <input type="file" class="form-control" id="post1">
                    </div>
                    <button class="btn btn-primary" type="button">Upload Posts</button>

                </div>
            </div>
        </div>
    </div>
</div>