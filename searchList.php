<script>
    var pagesArr = [

        <?php
        $url = $URL . "admin/read_business_category.php";
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
        
        $counter = '0';
        foreach ($result as $key => $value) {
        foreach ($value as $key1 => $value1) {
        ?>
        ["", "profile_list.php?category=<?php echo base64_encode($value1->id); ?>", "<?php echo $value1->businessCategory; ?>"],
        <?php } } ?>

    <?php
    $status = '1';
    $userType = '2';
    $url = $URL . "user/read_allusers_list.php";
    $data = array("status"=>$status, "userType"=>$userType, "userId" =>"");
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
    
    $counter = '0';
    foreach ($result as $key => $value) {
    foreach ($value as $key1 => $value1) { 
    ?>

    ["", "profile_view.php?id=<?php echo base64_encode($value1->id); ?>", "<?php echo $value1->businessName; ?>"],

    <?php } } ?>
    ];



    function click_learntocode_search_btn() {
        var x = document.getElementsByClassName("search_item");
        if (x.length == 0) {
            cc = 1;
        }
        for (i = 0; i < x.length; i++) {
            if (x[i].className.indexOf("search_active") > -1) {
                n = x[i].href;
                if (n.indexOf("search_entire_pracharwall") > -1) {
                    cc = 1;
                }
                break;
            }
        }
        if (cc == 1) {
            searchFromBox = true;
            submit_search_form();
        } else {
            window.location = n;
        }
    }
    function find_search_results(inp) {
        var a, val, i, l, resultIndexes = [], resultTexts = [], html = "", classAtt = "", pos1, posNext, cc, c0, c1, c2;
        a = document.getElementById("listofsearchresults");
        a.innerHTML = "";
        a.style.display = "none";
        // document.getElementById("search2").style.borderBottomLeftRadius = "25px";
        val = inp.value.toUpperCase();
        if (val == "") return false;
        for (i = 0; i < pagesArr.length; i++) {
            if (pagesArr[i][0].toUpperCase().substr(0, val.length) == val || pagesArr[i][2].toUpperCase().substr(0, val.length) == val) {
                if (resultTexts.indexOf(pagesArr[i][2]) == -1) {
                    resultIndexes.push(i);
                    resultTexts.push(pagesArr[i][2]);
                    if (resultIndexes.length > 5) break;
                }
            }
        }
        for (i = 0; i < pagesArr.length; i++) {
            if (resultIndexes.indexOf(i) == -1 && (pagesArr[i][0].toUpperCase().indexOf(val) > -1 || pagesArr[i][2].toUpperCase().indexOf(val) > -1)) {
                if (resultTexts.indexOf(pagesArr[i][2]) == -1) {
                    resultIndexes.push(i);
                    resultTexts.push(pagesArr[i][2]);
                    if (resultIndexes.length > 5) break;
                }
            }
        }
        //if (resultIndexes.length == 0) return false;
        // document.getElementById("search2").style.borderBottomLeftRadius = "0";
        a.style.display = "block";
        for (i = 0; i < resultIndexes.length; i++) {
            cc = pagesArr[resultIndexes[i]][2];
            pos1 = cc.toUpperCase().indexOf(val);
            dd = "";
            while (pos1 > -1) {
                c0 = cc.substr(0, pos1);
                c1 = "<span class='span_search'>" + cc.substr(pos1, val.length) + "</span>";
                c2 = cc.substr(pos1 + val.length);
                dd += c0 + c1;
                posNext = c2.toUpperCase().indexOf(val);
                if (posNext > -1) {
                    cc = c2;
                    pos1 = posNext;
                } else {
                    cc = dd + c2;
                    pos1 = -1;
                }
            }
            classAtt = "";
            if (html == "") classAtt = " search_active";
            html += "<a class='search_item" + classAtt + "' href='" + pagesArr[resultIndexes[i]][1] + "'>" + cc + "</a>";
        }
        if (resultIndexes.length == 0) {
            classAtt = "";
            if (html == "") classAtt = " search_active";
            html += "<p class='search_item" + classAtt + "' onclick='click_search_w3schools_link(event)'>No results found</p>";
        }
        a.innerHTML = html;
    }
    function click_search_w3schools_link(event) {
        event.preventDefault();
        submit_search_form();
    }
    function key_pressed_in_search(event) {
        var x, n, nn, i, cc = 0;
        var keycode = event.keyCode;
        //console.log(keycode);
        if (keycode == 38 || keycode == 40) { //up || down
            x = document.getElementsByClassName("search_item");
            for (i = 0; i < x.length; i++) {
                if (x[i].className.indexOf("search_active") > -1) {
                    x[i].className = "search_item";
                    n = i;
                    break;
                }
            }
            if (keycode == 38) {
                nn = n - 1;
                if (nn < 0) nn = 0;
            }
            if (keycode == 40) {
                nn = n + 1;
                if (nn >= x.length) nn = nn - 1;
            }
            x[nn].className = "search_item search_active";
        }
        if (keycode == 13) {  //enter
            event.preventDefault();
            x = document.getElementsByClassName("search_item");
            if (x.length == 0) {
                cc = 1;
            }
            for (i = 0; i < x.length; i++) {
                if (x[i].className.indexOf("search_active") > -1) {
                    n = x[i].href;
                    if (n.indexOf("search_entire_w3schools") > -1) {
                        cc = 1;
                    }
                    break;
                }
            }
            if (cc == 1) {
                searchFromBox = true;
                submit_search_form();
            } else {
                window.location = n;
            }
        }
    }

    function submit_search_form() {
        searchFromBox = true;
        gSearch();
        var delayInMilliseconds = 100; //0.1 second
        setTimeout(execute_google_search, delayInMilliseconds);
    }

    function execute_google_search() {
        if (typeof google == 'object') {
            google.search.cse.element.getElement("standard0").execute(document.getElementById("search2").value);
        } else {
            setTimeout(execute_google_search, 100);
        }
    }

    document.body.addEventListener("click", function (event) {
        var a, x = event.srcElement;
        if (x.id == "search2" || x.id == "learntocode_searchbtn" || x.id == "learntocode_searchicon" || x.classList.contains("search_item")) {
        } else {
            a = document.getElementById("listofsearchresults");
            a.innerHTML = "";
            a.style.display = "none";
            // document.getElementById("search2").style.borderBottomLeftRadius = "25px";
            if (searchFromBox == true) {
                document.getElementById("googleSearch").style.display = "none";
                document.getElementById("googleSearch").style.visibility = "block";
            }
            searchFromBox = false;
        }
    });

</script>