<?php
include "include/header.php";
?>

<script>
    function showResult(str) {
        if (str.length == 0) {
            document.getElementById("livesearch").innerHTML = "";
            document.getElementById("livesearch").style.border = "0px";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livesearch").innerHTML = this.responseText;
                document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
            }
        }
        xmlhttp.open("GET", "livesearch.php?q=" + str, true);
        xmlhttp.send();
    }
</script>
</head>

<body>


    <div class="container mt-4">
        <form>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="ser-name" class="form-control" />
                        <label class="form-label" for="ser-name">Service Name</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="ser-type" class="form-control" />
                        <label class="form-label" for="ser-type">Service Type</label>
                    </div>
                </div>
            </div>

            <!-- File input -->
            <div class="form-outline mb-4">
                <input type="file" id="ser-file" class="form-control" />
                <label class="form-label" for="ser-file">Service Demo File</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form6Example5" class="form-control" />
                <label class="form-label" for="form6Example5">Email</label>
            </div>

            <!-- Text input -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="ser-city" class="form-control" onkeyup="showResult(this.value)" />
                        <label class="form-label" for="ser-city">City</label>
                        <div id="livesearch"></div>
                    </div>
                </div>

                <!-- Number input -->
                <div class="col">
                    <div class="form-outline">
                        <input type="number" id="form6Example6" class="form-control" />
                        <label class="form-label" for="form6Example6">Mobile No.</label>
                    </div>
                </div>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                <label class="form-label" for="form6Example7">Service Description</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Register Wall</button>
        </form>
    </div>
    <br>
    <div style="background-color: #eee;">
        <br>
        <center>
            <h1>Frequently Asked Questions</h1>
        </center>
        <br>

        <div class="container">

            <div class="card mb-3" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">How does it work on Pracharwall?</h5>
                    <p class="card-text">First, we find customers who looking for help and collect information & verify
                        their requirements. Pracharwall's matchmaking platform identifies
                        relevant businesses based on the service type, location preference, and other factors. Once the
                        match is found, we send the customers information to the matched businesses.
                        The businesses can contact the customers directly and convert them to customers.
                        Pracharwall will also help you build your brand by enriching your business profile with customer
                        reviews and portfolios to help attract more customers to your business.
                    </p>
                </div>
            </div>

            <div class="card mb-3" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Why should I register my business on Pracharwall?</h5>
                    <p class="card-text">Today, the market is seeing cut-throat competition between small businesses
                        while big companies are attracting customers with their marketing resources. Pracharwall is the best
                        option for small business owners to get genuine leads and grow their business into a brand. Sign
                        up today by clicking on the link below.
                    </p>
                </div>
            </div>

            <div class="card mb-3" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">How much do leads cost?</h5>
                    <p class="card-text">The price of our service requests varies by the type of request and the
                        location of the request. Once enrolled, you can see the current price of leads for each service
                        request by downloading the Pracharwall Business app. To download the app click here.
                    </p>
                </div>
            </div>

            <div class="card mb-3" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">How much control do I have over the leads I receive?</h5>
                    <p class="card-text">Pracharwall's business app gives you full control.
                        You can define your services in-depth, locality preferences to ensure you receive leads matched
                        as you want. If you are busy you can pause the lead flow and restart anytime. Sign up today to
                        learn more!
                    </p>
                </div>
            </div>

            <div class="card mb-3" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">How can I list my business on Pracharwall?</h5>
                    <p class="card-text">To begin your sign up, just click on the sign-up button below</p>
                </div>
            </div>

            <br>

        </div>
    </div>

    <br>