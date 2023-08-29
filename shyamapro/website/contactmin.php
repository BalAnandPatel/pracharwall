<?php 
include 'include/headerr.php'; 
?>
  






<style>
    .ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {
        display: inline;
    }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

            ul.pagination li a.active {
                background-color: #4CAF50;
                color: white;
            }

            ul.pagination li a:hover:not(.active) {
                background-color: #ddd;
            }

    .views-exposed-form {
        background: #eee none repeat scroll 0 0;
        border: 1px solid #ddd;
        box-sizing: border-box;
        margin-bottom: 20px;
        padding: 0 14px;
        padding-bottom: 10px;
        width: auto;
    }

    .views-exposed-widgets {
        margin-bottom: 0.5em;
    }

    .views-exposed-form #edit-title-wrapper, .views-exposed-form #edit-field-designation-type-tid-wrapper, .views-exposed-form #edit-field-division-type-tid-wrapper, .views-exposed-form #edit-field-whos-who-department-tid-wrapper, .views-exposed-form #edit-field-room-no-value-wrapper {
        width: 20%;
        padding: 0.5em 1em 0 0;
    }

    .views-exposed-form .views-exposed-widget {
        float: left;
        padding: 0.5em 1em 0 0;
    }

    input[type="text"], select, .form-text, .form-textarea {
        border: 1px solid #d8d8d8;
        padding: 6px;
    }

    .views-exposed-form .views-submit-button, .views-exposed-form .views-reset-button {
        padding-top: 0px;
    }

    .views-exposed-form .views-exposed-widget {
        float: left;
        padding: 0.5em 1em 0 0;
    }

    .views-exposed-form .views-submit-button, .views-exposed-form .views-reset-button {
        padding-top: 0px;
    }

    .views-exposed-form .views-exposed-widget {
        float: left;
        padding: 0.5em 1em 0 0;
    }

    .views-exposed-form .views-submit-button .form-submit, .views-exposed-form .views-reset-button .form-submit {
        margin-top: 30px;
    }

    .views-exposed-form .views-exposed-widget .form-submit {
        margin-top: 1.6em;
    }

    .views-exposed-form .form-item, .views-exposed-form .form-submit {
        margin-top: 0;
        margin-bottom: 0;
    }

    form input[type="submit"] {
        background: #4d5d08 none repeat scroll 0 0;
        border: medium none;
        color: #fff;
        cursor: pointer;
        font-size: 1.1em;
        padding: 7px 10px;
        margin-bottom: 10px;
    }

    .views-exposed-form input, .views-exposed-form select {
        width: 100%;
    }
    /* .view-grouping-header {
        font-weight: 900;
        font-size: 16px;
        padding: 0.05em 0;
        background-color: #e0d081;
        text-align: center;
    }*/
</style>
<br>
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


                        <li class="breadcrumb-item active" aria-current="page">Who&#39;s who</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="footer_content">
                <h4 class="font_size pb-2">Who&#39;s who</h4>
                <p>Shyamavsvss Krishi Limited is a public incorporated company. It is classified as Non-govt company and is registered at Registrar of Companies. There are some contact directory of Department of Organization </p>
                
                <!-- <div class="view-filters">
                    <form action="/en/who" method="get" id="views-exposed-form-whos-who-page-3" accept-charset="UTF-8">
                        <div>
                            <div class="views-exposed-form">
                                <div class="views-exposed-widgets clearfix">
                                    <div id="edit-title-wrapper" class="views-exposed-widget views-widget-filter-title">
                                        <label for="edit-title">Name</label>
                                        <div class="views-widget">
                                            <div class="form-item form-type-textfield form-item-title">
                                                <input type="text" id="title" name="title" value="" size="30" maxlength="128" class="form-text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="views-exposed-widget views-submit-button">
                                        <input type="submit" id="edit-submit-whos-who" name="" value="Show" class="form-submit">
                                    </div>           <div class="views-exposed-widget views-reset-button">
                                        <input type="submit" id="edit-reset" name="" value="Reset" class="form-submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> -->

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card wh_cat">
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="page-qw">
                                    <div class="page-left">
                                    </div>
                                    <div class="page-right font_size"></div>
                                </div>
                   
                                <form action="/en/who" method="post">                     
                                    
                                <div class="view-grouping-header font_size" style="font-weight:bold">OFFICE OF HON&#39;BLE MINISTER OF AGRICULTURE &amp; FARMERS WELFARE</div>
                                        
                                <table class="table table-bordered table-striped testdatatable">
                                            <tr>
                                                <th class="font_size"> <label for="Name">Name</label></th>
                                                <th class="font_size"><label for="Designation">Designation</label>
                                                <th class="font_size"><label for="Email">Email</label></th>
                                                <th style="min-width:100px" class="font_size"><label for="Mob">Mobile No.</label></th>
                                                <th class="font_size"><label for="Website">Website</label></th>
                                                <th class="font_size"><label for="Residence">Address</label></th>
                                                <!-- <th class="font_size"><label for="Office">Office</label></th> -->
                                                <!-- <th class="font_size"><label for="EPABX">EPABX</label></th> -->
                                                <!-- <th style="min-width:100px" class="font_size"><label for="Room_No">Room No</label></th> -->
                                                
                                            </tr>

                                            <tr>
                                                <td class="font_size">Shri Vikash Nishad</td>
                                                <td class="font_size">Director</td>
                                                <td class="font_size">vikasnishad7863@gmail.com krishilimitedindia@gmail.com</td>
                                                <td class="font_size">7307145971</td>
                                                <td class="font_size"><a href="http://krishilimited.com/">krishilimited.com</a></td>
                                                <td class="font_size">C/O DASRATH PAUL, OM NAGAR COLONY ARATEE NO. 86/320, SARNATH VARANASI Varanasi UP 221007 IN .</td>
                                                <!-- <td class="font_size"></td> -->
                                                <!-- <td class="font_size"></td> -->
                                                <!-- <td class="font_size"></td> -->
                                            </tr>
                                            </table>
                                            
                                    <div id="container" style="margin-left: 20px">
                                        <p></p>
                                        <p></p>
                                        <!-- <div class="pagination" style="margin-left: 400px">
                                            
                                            <div class="pagination-container"><ul class="pagination"><li class="active"><a>1</a></li><li><a href="/en/who?page=2">2</a></li><li><a href="/en/who?page=3">3</a></li><li><a href="/en/who?page=4">4</a></li><li><a href="/en/who?page=5">5</a></li><li class="PagedList-skipToNext"><a href="/en/who?page=2" rel="next">»</a></li></ul></div>
                                        </div> -->
                                    </div>

                                </form>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="alert-con alert-primary" role="alert">
    <center>
    For any query, please contact - 7307145971
    </center>
</div>






<?php 
include 'include/footerr.php'; 
?>
  