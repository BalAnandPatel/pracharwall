<?php
include "include/headerr.php"
?>
<?php
$url = $URL . "exam/read_exam_list.php";
$data = array();
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
?>

<head>
    <script src="/Scripts/dtjs/jquery.min.js"></script>

</head>

<style>
    /*td {
        font-size: 14px;
        width: 0%;
    }*/
    table#tblRecruitment td:last-child a {
        color: blue;
    }
    .modal-content {
    background-color: rgba(255, 255, 255);
    }
</style>

<section class="content">

    <div class="banner_slider banner_slider_one">

        <div class="swiper mySwiper">

            <div class="swiper-wrapper">

                <div class="swiper-slide">

                    <img alt="banner" src="assets/images/banner/breadcrumb-2.png" style="width:100%">

                </div>




            </div>

            <div class="swiper-pagination"></div>

        </div>

    </div>

</section>


<section class="ab_msec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav class="breadcrumb1" aria-label="breadcrumb">
                    <ol class="breadcrumb font_size">
                        <li class="breadcrumb-item">
                            <a href="index.php">
                                <img alt="Home" src="assets/images/social/home-icon2.png" class="homeIcon">Home
                            </a>
                        </li>


                        <li class="breadcrumb-item active" aria-current="page">Recruitments</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="footer_content">
            <h4 class="font_size pb-2">Recruitments</h4>
        </div>

        <!--Error Page Start-->
        <section class="error-page">
            <div class="container">
                <?php if(isset($_SESSION['find_reg_error'])){ 
                   echo '<div class="alert alert-danger text-center" id="success-alert" role="alert">'.$_SESSION['find_reg_error'].'</div>';
                   unset($_SESSION['find_reg_error']); 
                } ?>
  
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-sm-12 col-12">
                        <div class="error-page__inner bg-light p-2">
                            <!-- <h3 class="error-page__tagline mt-5">If your paymet is faild</h3> -->
                            <span class="section-title__tagline pb-3">If Your Paymet Is Failed</span>
                            <div class="error-page__btn-box">
                                <a href="#" class="thm-btn error-page__btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Payment Now<i class="icon-right-arrow"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-12 col-12">
                        <div class="error-page__inner bg-light p-2">
                            <!-- <h3 class="error-page__tagline mt-5">Get final print after payment</h3> -->
                            <span class="section-title__tagline pb-3">Know Your Registration No.</span>
                            <div class="error-page__btn-box">
                                <a href="#" class="thm-btn error-page__btn" data-bs-toggle="modal" data-bs-target="#findRegModal">Get Registration No.<i class="icon-right-arrow"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-12 col-12">
                        <div class="error-page__inner bg-light p-2">
                            <!-- <h3 class="error-page__tagline mt-5">Get final print after payment</h3> -->
                            <span class="section-title__tagline pb-3">Get Final Print After Payment</span>
                            <div class="error-page__btn-box">
                                <a href="#" class="thm-btn error-page__btn" data-bs-toggle="modal" data-bs-target="#printModal">Get Final Print<i class="icon-right-arrow"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- modal box start -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../user/payment_verify.php" method="post">
                        <div class="modal-header">
                            <p class="h3 m-auto">Payment Verification</p>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Registration No.</label>
                                <input type="number" class="form-control" name="registration_no" placeholder="Registration No." autocomplete="off" id="recipient-name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Mobile No.</label>
                                <input type="number" class="form-control" name="mobile" placeholder="Mobile No." id="recipient-name" autocomplete="off" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-success">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--  modal box end -->

        <!-- modal box start for know registration number -->

        <div class="modal fade" id="findRegModal" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../user/find_reg_number.php" method="post">
                        <div class="modal-header">
                            <p class="h3 m-auto">Search Your Registration No.</p>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name</label>
                                <input type="text" class="form-control" name="full_name" placeholder="Enter Your Name" autocomplete="off" id="recipient-name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Mobile No.</label>
                                <input type="number" class="form-control" name="mobile" placeholder="Mobile No." id="recipient-name" autocomplete="off" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-success">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--  modal box end for know registration number-->


        <!-- modal box start for get final print -->

        <div class="modal fade" id="printModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../user/print_verify_post.php" method="post">
                        <div class="modal-header">
                            <p class="h3 m-auto">Get Your Final Print</p>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Registration No.</label>
                                <input type="number" class="form-control" name="registration_no" placeholder="Registration No." autocomplete="off" id="recipient-name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Mobile No.</label>
                                <input type="number" class="form-control" name="mobile" placeholder="Mobile No." id="recipient-name" autocomplete="off" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--  modal box end for get final print-->


        <!-- <div class="row" style=" margin-bottom: 45px;">
            <div class="col-12">
                <div>
                    <h3 class="font_size" style="font-size: inherit; font-weight: bold; "></h3>
                </div>
                <div class="col-md-6" style="display:flex;">
                    <div class="col-md-4">
                        <select class="form-control" id="ddlVacancy_Type">
                            <option value="active">Active</option>
                            <option value="N">Archive</option>
                            <option value="">All</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-left: 10px;">
                        <button class="form-control btn-info" id="btnApply">Apply</button>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="form-control" id="divRecruitment">
            <div class="row">
                <table id="tblRecruitment" class="table table-striped table-bordered table-hover dataTable no-footer" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width:auto;">Sr. No</th>
                            <th style="width:auto;">Post Name</th>
                            <th style="width:auto;">Total Post</th>
                            <th style="width:auto;">Start Date</th>
                            <th style="width:auto;">End Date</th>
                            <th style="width:auto;">Publish Date</th>
                            <th style="width:auto;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyRecruitment">
                        <?php

                        $counter = 0;
                        foreach ($result as $key => $value) {
                            foreach ($value as $key1 => $value1) {

                        ?>
                                <tr>
                                    <td><?php echo ++$counter; ?></td>
                                    <td><?php echo $value1->exam_name; ?></td>
                                    <td><?php echo $value1->total_post; ?></td>
                                    <td>
                                        <?php $date = date("d-m-Y", strtotime($value1->exam_date_start));
                                        echo $date == "01-01-1970" ? '0' : $date; ?>
                                    </td>
                                    <td>
                                        <?php $date = date("d-m-Y", strtotime($value1->exam_date_end));
                                        echo $date == "01-01-1970" ? '0' : $date; ?>
                                    </td>
                                    <td>
                                        <?php $date = date("d-m-Y", strtotime($value1->created_on));
                                        echo $date == "01-01-1970" ? '0' : $date; ?>
                                    </td>
                                    <td>

                                        <div class="btn">
                                            <form action="../user/Instructions.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $value1->id; ?>">
                                                <input type="hidden" name="exam_name" value="<?php echo $value1->exam_name; ?>">
                                                <button type="submit" name="submit" class="btn btn-success text-white">Apply</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="Pager"></div>
        </div>
    </div>
</section>



<script type="text/javascript">
    $(document).ready(function() {
        bindData();
    });

    var bindData = function(type) {
        var type = $('#ddlVacancy_Type :selected').val();
        $("#divRecruitment").show();
        $("#tblRecruitment").DataTable({
            bLengthChange: true,
            /* lengthMenu: [[2, 5, 10, -1], [2, 5, 10, "All"]],*/
            bFilter: false,
            bSort: true,
            bPaginate: true,
            bDestroy: true,

            "ajax": {
                // "url": '/agricoop/en/getRecruitmentDetail?vacancy_type=' + type,
                //local
                "url": '/en/getRecruitmentDetail?vacancy_type=' + type,
                "type": "POST",
                "datatype": "json"
            },

            responsive: true,

            "columns": [{
                    data: null,
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    "data": "title"
                },

                {
                    "data": "StartDate"
                },
                {
                    "data": "last_date"
                },
                {
                    "data": "publish_date"
                },
                {
                    "data": "document_name",

                    "render": function(data, type, full, meta) {
                        var paths = full.document_path.split(',');
                        var downloadtext = full.downloadtext.split(',');
                        var aaa = '';
                        $.each(paths, function(i, value) {

                            if (aaa == "") {
                                aaa = ' <a href="' + value + '" target="_blank">' + full.downloadtext + '</a> '
                            } else {
                                aaa = aaa + '  <a href="' + value + '" target="_blank">' + full.downloadtext + '</a> '
                            }

                        });
                        return aaa


                        //"render": function (data, type, full, meta) {
                        //    var paths = full.document_path.split(',');
                        //    var downloadtext = full.downloadtext.split(',');
                        //    var aaa = '';
                        //    $.each(paths, function (i, value) {
                        //        if (aaa == "") {
                        //            aaa = ' <a href="' + value + '" target="_blank">' + downloadtext[i] + '</a> '
                        //        }
                        //        else {
                        //            aaa = aaa + '  <a href="' + value + '" target="_blank">' + downloadtext[i] + '</a> '
                        //        }

                        //    });
                        //    return aaa


                        //return (full.document_path==""?"":'<a class="button-link" href="' + full.document_path + '" target="_blank">' + full.downloadtext + '</a>');
                    }
                }


            ],
            drawCallback: function(settings) {
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
                var paginateInfo = $(this).closest('.dataTables_wrapper').find('.dataTables_info');
                paginateInfo.toggle(this.api().page.info().pages > 1);
            }
        });

    };


    let searchParams = new URLSearchParams(window.location.search);
    let param = searchParams.get('vacancy_type');
    if (param != null) {
        $('#ddlVacancy_Type').val(param);

    }

    $('#btnApply').click(function(e) {

        bindData();

    });


    function getsize(fileUrl) {
        var params = {
            method: "GET",
            headers: {
                Range: "bytes=0-0",
            },
        };
        var response = UrlFetchApp.fetch(fileUrl, params);
        var headers = response.getHeaders();
        var fileSizeString = headers['Content-Range']
        var fileSize = +headers['Content-Range'].split("/")[1];
        alert(fileSize);
        return fileSize;
    }
</script>











<?php
include "include/footerr.php"
?>