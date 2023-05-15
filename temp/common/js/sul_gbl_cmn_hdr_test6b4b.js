document.domain = "sulekha.com";
var gProtocol = (("http:" == document.location.protocol) ? "http://" : "https://");
var oldsearchval = "";
var mytempurl = "";
var titlesrch = "";
var mytemptext = "";
$SUL = jQuery.noConflict();
var errordialog = function (c, b, a) { };
window.onerror = function (c, b, a) {
    return errordialog("Error message: " + c + "\nURL: " + b + "\nLine Number: " + a)
};
SulHeader = {
    Common: {
        getCookie: function (c) {
            var b = document.cookie;
            var e = c + "=";
            var d = b.indexOf("; " + e);
            if (d == -1) {
                d = b.indexOf(e);
                if (d != 0) {
                    return null
                }
            } else {
                d += 2
            }
            var a = document.cookie.indexOf(";", d);
            if (a == -1) {
                a = b.length
            }
            return unescape(b.substring(d + e.length, a))
        },
        resizeIframe: function (a, b) {
            SulHeader.Auth.isReg = 1;
            if (a != "") {
                $SUL("#signin_india").dialog("option", "height", a)
            }
            if (b != "") {
                $SUL("#signin_india").dialog("option", "width", b)
            }
        },
        isEmptyParam: function (a) {
            if (a == undefined || a == "" || a == null) {
                return true
            } else {
                return false
            }
        },
        sul_ga_track_User: function (d, a) {
            try {
                var e = "FirstTimeUser";
                var c = getCookie("tp_ud");
                if (c != undefined && c != "") {
                    e = usr_value
                } else {
                    e = parent.window.location.href
                }
                _gaq.push(["_trackEvent", "User", d, e, 1, a])
            } catch (b) { }
        },
        bookmark: function (a, c) {
            if (SulHeader.Common.isEmptyParam(a)) {
                a = document.URL
            }
            if (SulHeader.Common.isEmptyParam(c)) {
                c = "Sulekha.Com"
            }
            if (window.sidebar) {
                window.sidebar.addPanel(c, a, "")
            } else {
                if (window.opera && window.print) {
                    var b = document.createElement("a");
                    b.setAttribute("href", a);
                    b.setAttribute("title", c);
                    b.setAttribute("rel", "sidebar");
                    b.click()
                } else {
                    if (document.all) {
                        window.external.AddFavorite(a, c)
                    } else {
                        alert("This Browser doesn't support manual bookmark press ctrl+D to bookmark")
                    }
                }
            }
        },
        bookmarkPage: function (b, a, c) {
            if (!SulHeader.Common.isEmptyParam(b)) {
                $SUL("#" + b).ready(function () {
                    $SUL("#" + b).bind("click", function (d) {
                        SulHeader.Common.bookmark(a, c)
                    });
                    if ($SUL("#" + b + "_close").length > 0) {
                        $SUL("#" + b + "_close").bind("click", function (d) {
                            $SUL("#" + b + "_panel").hide()
                        })
                    }
                })
            } else {
                SulHeader.Common.bookmark(a, c)
            }
        },
        enter: function (holder, method, param) {
            $SUL(holder).bind("keyup", function (event) {
                if (event.keyCode == 13) {
                    eval(method)(param)
                }
            })
        },
        PageEventTrack: function (a) {
            if (SulHeader.Common.isEmptyParam(a)) {
                a = "EVTTrack"
            }
            $SUL("." + a).each(function (g, e) {
                var n = $SUL(this).attr("class");
                var c = n.split(" ");
                for (clsID = 0; clsID < c.length; clsID++) {
                    if (c[clsID].substring(0, 4) == "GAQ_") {
                        try {
                            var h = c[clsID].split("_");
                            var m = h[1].substring(0, 1);
                            var f = h[2] + "";
                            var b = h[3] + "";
                            var l = "";
                            var d = SulHeader.Common.getEventName(m);
                            if (h[4] != undefined) {
                                l = h[4]
                            }
                            if (!SulHeader.Common.isEmptyParam(d) && !SulHeader.Common.isEmptyParam(f) && !SulHeader.Common.isEmptyParam(b)) {
                                $SUL(this).bind(d, function (o) {
                                    _gaq.push(["_trackEvent", "UX", "MenuClick", b, 1, false])
                                })
                            }
                        } catch (k) { }
                    }
                }
            })
        },
        getEventName: function (b) {
            var a = "";
            switch (b) {
                case "C":
                    a = "click";
                    break;
                case "B":
                    a = "blur";
                    break;
                case "F":
                    a = "focus";
                    break;
                case "M":
                    a = "mouseover";
                    break;
                case "K":
                    a = "keypress";
                    break;
                default:
                    a = "click";
                    break
            }
            return a
        }
    },
    ServiceHeader: {
        Init: function (a, b) {
            SulHeader.Common.bookmarkPage("sul_mpbookmark", "", "Welcome to Sulekha.Com");
            $SUL("#sul_mptabul li").each(function () {
                $SUL(this).hover(function () {
                    var d = $SUL(this);
                    var e = d.offset();
                    var c = this.id;
                    timer = setTimeout(function () {
                        $SUL("#" + c + "dd").css("left", e.left - 5);
                        $SUL("#" + c + "dd").css("top", e.top + 32);
                        $SUL("#" + c + "dd").show()
                    }, 500)
                }, function () {
                    clearTimeout(timer);
                    $SUL("#" + this.id + "dd").hide()
                });
                $SUL("#" + this.id + "dd").hover(function () {
                    $SUL("#" + this.id).show();
                    $SUL("#" + this.id.replace("dd", "") + " a.gSMListLnk").addClass("gActive")
                }, function () {
                    $SUL("#" + this.id).hide();
                    $SUL("#" + this.id.replace("dd", "") + " a.gSMListLnk").removeClass("gActive")
                })
            })
        }
    },
    Init: function (Srchholder, Srchdef) {
        $SUL("#signin_india").overlay({
            mask: {
                color: "#000000",
                loadSpeed: 200,
                opacity: 0.8
            },
            closeOnClick: true,
            load: false
        });
        $SUL("#signin_india").find("a.close").bind("click", function () {
            $SUL("#signin_india").css("display", "none");
            SulHeader.Common.sul_ga_track_User("UserLogIn Close", false);
            if (eval("window.CallBack_LoginClose") && eval("typeof CallBack_LoginClose") == "function") {
                eval("CallBack_LoginClose")()
            }
        });
        SulHeader.Auth.setLoginBar();
        $SUL(document).keyup(function (e) {
            if (e.keyCode == 27) {
                $SUL("#signin_india").css("display", "none")
            }
        });
        $SUL(window).scroll(function () {
            if ($SUL(this).scrollTop() > 100) {
                $SUL("#sul_gblmarketplace").show();
                $SUL("#sul_gblmarketplace").addClass("gNScroll")
            } else {
                if ($SUL(window).width() < 780) {
                    $SUL("#sul_gblmarketplace").hide()
                }
                $SUL("#sul_gblmarketplace").removeClass("gNScroll")
            }
			                                                if($SUL(this).scrollTop()>40){
                                                                $SUL("body").addClass("sticky-header");
                                                } else{
                                                                $SUL("body").removeClass("sticky-header");
                                                }

        });
        $SUL(window).load(function () {
            CommonHeader.dropdownSearch("cityDropdownHeader", "sulCommonheader_cb", {
                hasLink: false,
                ajaxEnabled: true
            });
            CommonHeader.megamenu();
            CommonSearch.Init();
	    setTimeout(CommonHeader.secondaryMenuPositioning, 1000);
        });
        SulHeader.Common.PageEventTrack()
    },
    CurrentUser: {
        name: "",
        url: "",
        id: "",
        photo: "",
        firstName: "",
        lastName: "",
        loggedsite: "sulekha",
        loggedsiteid: 1,
        gatherDetail: function () {
            if (SulHeader.Common.getCookie("sulekha_screenname") != null && SulHeader.Common.getCookie("tp_ud") == null) {
                this.name = SulHeader.Common.getCookie("sulekha_screenname");
                this.url = SulHeader.Common.getCookie("sulekha_baseaddress");
                this.id = "";
                var b = this.url;
                if (SulHeader.Common.isEmptyParam(this.name)) {
                    this.name = "Member"
                }
                if (SulHeader.Common.isEmptyParam(this.url.replace("http://", ""))) {
                    this.url = "http://www.sulekha.com/myhome.aspx?t=[timestamp]"
                }
                if (b != null && b != "http://www.sulekha.com/myhome.aspx" && b != "") {
                    b = b.replace(".sulekha.com", "").replace("http://", "");
                    if (!SulHeader.Common.isEmptyParam(b)) {
                        this.photo = "http://www1.sulekha.com/mstore/" + b + "/profile/photo/thumbnail/default-42x42.jpg"
                    } else {
                        this.photo = "http://www.sulekha.com/mstore/unknown-42x42.jpg"
                    }
                } else {
                    this.photo = "http://www.sulekha.com/mstore/unknown-42x42.jpg"
                }
                this.loggedsite = "sulekha";
                this.loggedsiteid = 1
            } else {
                if (SulHeader.Common.getCookie("tp_ud") != null) {
                    var a = SulHeader.Common.getCookie("tp_ud");
                    this.name = a.split("::")[2];
                    this.url = a.split("::")[4];
                    this.id = a.split("::")[1];
                    this.photo = a.split("::")[5];
                    if (this.photo.indexOf("/mstore//profile/photo") > 0) {
                        this.photo = "http://www.sulekha.com/mstore/unknown-42x42.jpg"
                    }
                    if (a.split("::").length > 6) {
                        this.firstName = a.split("::")[6]
                    }
                    if (a.split("::").length > 7) {
                        this.lastName = a.split("::")[7]
                    }
                    this.loggedsite = a.split("::")[0];
                    if (SulHeader.Common.isEmptyParam(this.name)) {
                        this.name = "Member"
                    }
                    if (SulHeader.Common.isEmptyParam(this.url.replace("http://", ""))) {
                        this.url = "http://www.sulekha.com/myhome.aspx?t=[timestamp]"
                    }
                    if (this.loggedsite == "local" || this.loggedsite == "sulekha") {
                        this.loggedsiteid = 1
                    } else {
                        if (this.loggedsite == "facebook") {
                            this.loggedsiteid = 2
                        } else {
                            if (this.loggedsite == "google") {
                                this.loggedsiteid = 3
                            } else {
                                if (this.loggedsite == "twitter") {
                                    this.loggedsiteid = 4
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    Auth: {
        CallBack_Success: "",
        CallBack_Failure: "",
        isReg: 0,
        Version: "2",
        RegPath: "http://myaccount.sulekha.com/network/register.aspx",
        Path: "http://myaccount.sulekha.com/network/signin.aspx",
        isLoggedin: function (c) {
            var d = 0;
            var b = "";
            var a = "";
            if (SulHeader.Common.getCookie("tp_ud") != null) {
                b = SulHeader.Common.getCookie("tp_ud");
                a = b.split("::")[0]
            }
            if (c == "" || c == "all" || c == undefined || c == "popup") {
                if (SulHeader.Common.getCookie("sulekha_screenname") != null) {
                    d = 1
                } else {
                    if (SulHeader.Common.getCookie("tp_ud") != null) {
                        d = 1
                    }
                }
            } else {
                if (c == "sulekha") {
                    if (SulHeader.Common.getCookie("sulekha_screenname") != null) {
                        d = 1
                    } else {
                        if (a == "sulekha" || a == "local") {
                            d = 1
                        }
                    }
                } else {
                    if (c == "facebook" && a == "facebook") {
                        d = 1
                    } else {
                        if (c == "google" && a == "google") {
                            d = 1
                        } else {
                            if (c == "twitter" && a == "twitter") {
                                d = 1
                            }
                        }
                    }
                }
            }
            if (d == 1) {
                SulHeader.CurrentUser.gatherDetail()
            }
            return d
        },
        ensureLoggedIn: function (loginservice, callback, version) {
            if (!SulHeader.Common.isEmptyParam(version)) {
                if (version > 0) {
                    this.Version = version
                }
            }
            this.CallBack_Success = callback;
            if (this.isLoggedin(loginservice) == 1) {
                eval(callback)()
            } else {
                this.popupLoginCtrl(loginservice)
            }
        },
        popupRegisterCtrl: function (b, a) {
            var c = $SUL("#frMyAccount").attr("src") + "";
            if (c == "undefined" || c == "" || c == "http://api.sulekhalive.com/html/dummy.html") {
                $SUL("#frMyAccount").attr("src", this.Path)
            }
            if ($SUL("#signin_india").length > 0) {
                $SUL("#signin_india").data("overlay").load().show()
            } else {
                $SUL("#signin").data("overlay").load()
            }
        },
        popupLoginCtrl: function (c, a, b) {
            if (!SulHeader.Common.isEmptyParam(a)) {
                if (a > 0) {
                    this.Version = a
                }
            }
            if (!SulHeader.Common.isEmptyParam(this.Version)) {
                if (!SulHeader.Common.isEmptyParam(b)) {
                    a = "?atuotriggfb=true&ver=" + this.Version
                } else {
                    a = "?ver=" + this.Version
                }
            } else {
                a = ""
            }
            var d = $SUL("#frMyAccount").attr("src") + "";
            if (d == "undefined" || d == "" || d == "http://api.sulekhalive.com/html/dummy.html") {
                $SUL("#frMyAccount").attr("src", this.Path + a)
            }
            if ($SUL("#signin_india").length > 0) {
                $SUL("#signin_india").data("overlay").load()
            } else {
                $SUL("#signin").data("overlay").load()
            }
        },
        popupLoginClose: function (status) {
            $SUL("#divSignin_Dialog").dialog("close");
            if (status == 1) {
                eval(this.CallBack_Success)()
            } else {
                if (status == 0 && this.isLoggedin("") == 1) {
                    eval(this.CallBack_Success)()
                } else {
                    eval(this.CallBack_Failure)()
                }
            }
        },
        popupLoginCallBack: function (aIPCountry) {
            this.setLoginBar();
            $SUL("#signin").css("display", "none");
            if (Sulekha != undefined) {
                if (Sulekha.Auth != undefined) {
                    this.CallBack_Success = Sulekha.Auth.CallBack_Success
                }
            }
            if (this.CallBack_Success != "") {
                eval(this.CallBack_Success)()
            }
            SulHeader.Common.sul_ga_track_User("UserLoggedIn", false)
        },
        setLoginBar: function (a) {
            var c = "";
            var b = "";
            if (!SulHeader.Common.isEmptyParam(a)) {
                if (a > 0) {
                    this.Version = a
                }
            }
            if (SulHeader.Auth.isLoggedin()) {

$SUL('#dLabel').bind("contextmenu",function(e){
     return false;
});
                if (!SulHeader.Common.isEmptyParam(SulHeader.CurrentUser.firstName)) {
                    c = SulHeader.CurrentUser.firstName
                } else {
                    if (!SulHeader.Common.isEmptyParam(SulHeader.CurrentUser.lastName)) {
                        c = SulHeader.CurrentUser.lastName
                    } else {
                        c = SulHeader.CurrentUser.name
                    }
                }
                b = SulHeader.CurrentUser.id;
                if (c.length > 20) {
                    c = c.substring(0, 18) + "..."
                }
                if (b != null && b != "" && b != undefined) {
                    $SUL("#sul_loggedinul").html('<li><a href="http://myaccount.sulekha.com/" title="Edit Profile">Edit Profile</a></li><li><a href="http://myaccount.sulekha.com/classifiedads" title="My Classifieds Ads">My Classifieds Ads</a></li><li><a href="http://myaccount.sulekha.com/reviews" title="My Reviews">My Reviews</a></li><li><a href="http://myaccount.sulekha.com/rewards" title="My Rewards">My Rewards</a></li><li><a href="http://myaccount.sulekha.com/deals" title="My Deals">My Deals</a></li><li class="gLast"><a href="http://rivr.sulekha.com/myrivr.aspx" title="My Public Profile">My Public Profile</a></li><li class="divider"></li><li><a tabindex="-1" href="#" class="btn margin20l margin20r" id="sul_logouttxt">Logout</a></li>');
                    $SUL("#sul_logouttxt").attr("href", gProtocol + "myaccount.sulekha.com/network/signout.aspx");
                    if (c == null || c == "" || c == undefined) {
                        c = "Member"
                    }
                    $SUL("#sul_loginname").html(c);
                    $SUL("#exposeMask").css("display", "none");
                    $SUL("#signin_india").css("display", "none");
                    $SUL("#sul_loggedout").css("display", "none");
                    $SUL("#sul_loggedin").css("display", "");
                    $SUL("#sul_loggedindd").css("display", "");
                    $SUL("#sul_myaccount").click(function (d) {
                        d.stopPropagation();
                        if ($SUL("#sul_loggedindd").css("display") == "" || $SUL("#sul_loggedindd").css("display") == "block") {
                            $SUL("#sul_loggedindd").hide()
                        } else {
                            $SUL("#sul_loggedindd").show()
                        }
                        $SUL("#sul_logouttxt").click(function () {
                            $SUL("#sul_loggedindd").hide()
                        })
                    })
                } else {
                    $SUL("#sul_loggedinul").children("li").remove();
                    $SUL("#sul_loggedout").css("display", "");
                    $SUL("#sul_loggedin").css("display", "none");
                    $SUL("#sul_loggedindd").css("display", "none")
                }
            } else {
                $SUL("#sul_loggedinul").children("li").remove();
                $SUL("#sul_loggedinul").children("li").remove();
                $SUL("#sul_loggedout").css("display", "");
                $SUL("#sul_loggedin").css("display", "none");
                $SUL("#sul_loggedindd").css("display", "none")
            }
            $SUL("#sul_logintxt").click(function (d) {
                SulHeader.Auth.popupLoginCtrl()
            });
            $SUL("#sul_regtxt").click(function (d) {
                SulHeader.Auth.popupLoginCtrl()
            })
        }
    },
    ToggleDrowpdown: {
        Init: function () {
            $SUL(document).ready(function () {
                $SUL("body").on("click", ".dropdown-toggle", SulHeader.ToggleDrowpdown.setDropdown);
                $SUL("ul .dropdown-menu").bind("mouseout", SulHeader.ToggleDrowpdown.setDropdown);
                $SUL("ul .dropdown-menu li a").bind("click", SulHeader.ToggleDrowpdown.ClearMenus)
            })
        },
        setDropdown: function () {
            var c = $SUL(this),
                b, a;
            if (c.is(".disabled, :disabled")) {
                return
            }
            b = SulHeader.ToggleDrowpdown.getParentElement(c);
            a = b.hasClass("open");
            SulHeader.ToggleDrowpdown.ClearMenus(b);
            if (!a) {
                $SUL(b).toggleClass("open");
                c.focus()
            }
            return false
        },
        getParentElement: function (c) {
            var a = $SUL(c).attr("data-target"),
                b;
            if (!a) {
                a = $SUL(c).attr("href");
                a = a && /#/.test(a) && a.replace(/.*(?=#[^\s]*$)/, "")
            }
            b = $SUL(a);
            b.length || (b = $SUL(c).parent());
            return b
        },
        ClearMenus: function () {
            var a = "[data-toggle=dropdown]";
            SulHeader.ToggleDrowpdown.getParentElement($SUL(a)).removeClass("open")
        }
    }
}, Sulekha = {
    Init: function (a) {
        var b = $SUL("<div id='divError_Dialog' name='divError_Dialog' title='Error!...'></div><div id='div_Dialog' name='div_Dialog' title='Alert!...'></div><div id='div_Dialogphoto' name='div_Dialogphoto' title='Alert!...'></div><div id='div_Process' name='div_Process' title='Process...'></div><div id='divSignin_Dialog' name='divSignin_Dialog' title='Signin control!..'></div><div id='divShare_Dialog' name='divShare_Dialog' title=''></div>");
        $SUL("body").append(b);
        $SUL("head").append("<link>");
        var c = $SUL("head").children(":last");
        $SUL(document).ready(function () {
            $SUL("#divError_Dialog").dialog({
                modal: true,
                zIndex: 3999,
                autoOpen: false,
                draggable: false,
                title: "Sulekha Alert!..",
                resizable: false,
                buttons: {
                    Ok: function () {
                        $SUL(this).dialog("close")
                    }
                }
            });
            $SUL("#divSignin_Dialog").dialog({
                modal: true,
                zIndex: 3999,
                autoOpen: false,
                draggable: true,
                title: "Welcome to sulekha.com. Kindly authenticate your identity",
                resizable: false
            });
            $SUL("#divShare_Dialog").dialog({
                modal: true,
                zIndex: 3999,
                height: 140,
                width: 270,
                autoOpen: false,
                draggable: false,
                title: "Share this page with",
                resizable: false
            });
            $SUL("#div_Dialog").dialog({
                modal: true,
                zIndex: 3999,
                autoOpen: false,
                draggable: true,
                title: "Sulekha Alert!...",
                resizable: false
            });
            $SUL("#div_Dialogphoto").dialog({
                modal: true,
                zIndex: 3999,
                autoOpen: false,
                draggable: true,
                title: "Sulekha Alert!...",
                resizable: false
            });
            $SUL("#div_Process").dialog({
                modal: true,
                zIndex: 3999,
                autoOpen: false,
                draggable: false,
                title: "Sulekha Process...",
                resizable: false
            })
        });
        if (window.location.href.indexOf("classifieds.sulekha.com") > 0) {
            Sulekha.Auth.JSONGetData("http://classifieds.sulekha.com/network/sullogoutcl.aspx?freq=" + Math.random())
        }
    },
    Validate: {
        defaultTxt: function (a, b) {
            if (Sulekha.Common.isEmptyParam(b) == false && Sulekha.Common.isEmptyParam(a) == false) {
                a = "#" + a;
                if ($SUL(a).is("div")) {
                    $SUL(a).html(b);
                    $SUL(a).bind("focusin", function (c) {
                        if ($SUL(a).html() == b) {
                            $SUL(a).html("")
                        }
                    });
                    $SUL(a).bind("focusout", function (c) {
                        if ($SUL(a).html() == "") {
                            $SUL(a).html(b)
                        }
                    })
                } else {
                    $SUL(a).val(b);
                    $SUL(a).bind("focusin", function (c) {
                        if ($SUL(a).val() == b) {
                            $SUL(a).val("")
                        }
                    });
                    $SUL(a).bind("focusout", function (c) {
                        if ($SUL(a).val() == "") {
                            $SUL(a).val(b)
                        }
                    })
                }
            }
        },
        isValidData: function (a) {
            var c = true;
            if (Sulekha.Validate.bindedFields != null) {
                for (i = 0; i < Sulekha.Validate.bindedFields.length; i++) {
                    var b = Sulekha.Validate.bindedFields[i];
                    for (j = 0; j < a.length; j++) {
                        if ("#" + a[j].name == b.holder) {
                            if (b.def != undefined) {
                                if (b.sRegEx == "") {
                                    Sulekha.Validate.required_chk(b.holder, b.def, b.resultholder, $SUL(b.holder).attr("title") + " field is required.")
                                } else {
                                    if (Sulekha.Validate.required_chk(b.holder, b.def, "", "status")) {
                                        Sulekha.Validate.gbl_chk(b.holder, b.resultholder, b.msg, b.error, b.success, b.sRegEx)
                                    } else {
                                        Sulekha.Validate.required_chk(b.holder, b.def, b.resultholder, $SUL(b.holder).attr("title") + " field is required.")
                                    }
                                }
                            } else {
                                if ($SUL(b.holder).val() != "") {
                                    Sulekha.Validate.gbl_chk(b.holder, b.resultholder, b.msg, b.error, b.success, b.sRegEx)
                                }
                            }
                            if (Sulekha.Validate.valid == false) {
                                c = false
                            }
                        }
                    }
                }
            }
            return c
        }
    },
    sGSClBkParam: "",
    CurrentUser: {
        name: "",
        url: "",
        id: "",
        photo: "",
        firstName: "",
        lastName: "",
        loggedsite: "sulekha",
        loggedsiteid: 1,
        gatherDetail: function () {
            if (Sulekha.Common.getCookie("sulekha_screenname") != null && Sulekha.Common.getCookie("tp_ud") == null) {
                this.name = Sulekha.Common.getCookie("sulekha_screenname");
                this.url = Sulekha.Common.getCookie("sulekha_baseaddress");
                this.id = "";
                var b = this.url;
                if (Sulekha.Common.isEmptyParam(this.name)) {
                    this.name = "Member"
                }
                if (Sulekha.Common.isEmptyParam(this.url.replace("http://", ""))) {
                    this.url = "http://www.sulekha.com/myhome.aspx?t=[timestamp]"
                }
                if (b != null && b != "http://www.sulekha.com/myhome.aspx" && b != "") {
                    b = b.replace(".sulekha.com", "").replace("http://", "");
                    if (!Sulekha.Common.isEmptyParam(b)) {
                        this.photo = "http://www1.sulekha.com/mstore/" + b + "/profile/photo/thumbnail/default-42x42.jpg"
                    } else {
                        this.photo = "http://www.sulekha.com/mstore/unknown-42x42.jpg"
                    }
                } else {
                    this.photo = "http://www.sulekha.com/mstore/unknown-42x42.jpg"
                }
                this.loggedsite = "sulekha";
                this.loggedsiteid = 1
            } else {
                if (Sulekha.Common.getCookie("tp_ud") != null) {
                    var a = Sulekha.Common.getCookie("tp_ud");
                    this.name = a.split("::")[2];
                    this.url = a.split("::")[4];
                    this.id = a.split("::")[1];
                    this.photo = a.split("::")[5];
                    if (this.photo.indexOf("/mstore//profile/photo") > 0) {
                        this.photo = "http://www.sulekha.com/mstore/unknown-42x42.jpg"
                    }
                    if (a.split("::").length > 6) {
                        this.firstName = a.split("::")[6]
                    }
                    if (a.split("::").length > 7) {
                        this.lastName = a.split("::")[7]
                    }
                    this.loggedsite = a.split("::")[0];
                    if (Sulekha.Common.isEmptyParam(this.name)) {
                        this.name = "Member"
                    }
                    if (Sulekha.Common.isEmptyParam(this.url.replace("http://", ""))) {
                        this.url = "http://www.sulekha.com/myhome.aspx?t=[timestamp]"
                    }
                    if (this.loggedsite == "local" || this.loggedsite == "sulekha") {
                        this.loggedsiteid = 1
                    } else {
                        if (this.loggedsite == "facebook") {
                            this.loggedsiteid = 2
                        } else {
                            if (this.loggedsite == "google") {
                                this.loggedsiteid = 3
                            } else {
                                if (this.loggedsite == "twitter") {
                                    this.loggedsiteid = 4
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    Auth: {
        CallBack_Success: "",
        CallBack_Failure: "",
        isReg: 0,
        Version: "",
        RegPath: "http://myaccount.sulekha.com/network/register.aspx",
        Path: "http://myaccount.sulekha.com/network/signin.aspx",
        isLoggedin: function (c) {
            var d = 0;
            var b = "";
            var a = "";
            if (Sulekha.Common.getCookie("tp_ud") != null) {
                b = Sulekha.Common.getCookie("tp_ud");
                a = b.split("::")[0]
            }
            if (c == "" || c == "all" || c == undefined || c == "popup") {
                if (Sulekha.Common.getCookie("sulekha_screenname") != null) {
                    d = 1
                } else {
                    if (Sulekha.Common.getCookie("tp_ud") != null) {
                        d = 1
                    }
                }
            } else {
                if (c == "sulekha") {
                    if (Sulekha.Common.getCookie("sulekha_screenname") != null) {
                        d = 1
                    } else {
                        if (a == "sulekha" || a == "local") {
                            d = 1
                        }
                    }
                } else {
                    if (c == "facebook" && a == "facebook") {
                        d = 1
                    } else {
                        if (c == "google" && a == "google") {
                            d = 1
                        } else {
                            if (c == "twitter" && a == "twitter") {
                                d = 1
                            }
                        }
                    }
                }
            }
            if (d == 1) {
                Sulekha.CurrentUser.gatherDetail()
            }
            return d
        },
        ensureLoggedIn: function (loginservice, callback) {
            this.CallBack_Success = callback;
            this.CallBack_Failure = "Sulekha.MP.ajaxError";
            if (this.isLoggedin(loginservice) == 1) {
                eval(callback)()
            } else {
                this.popupLoginCtrl(loginservice, 2)
            }
        },
        popupRegisterCtrl: function (b, a) {
            if ($SUL("#frMyAccount").attr("src") == "") {
                $SUL("#frMyAccount").attr("src", this.Path)
            }
            if ($SUL("#signin_india").length > 0) {
                $SUL("#signin_india").data("overlay").load()
            } else {
                $SUL("#signin").data("overlay").load()
            }
        },
        popupLoginCtrl: function (c, a, b) {
            if (!Sulekha.Common.isEmptyParam(a)) {
                if (b != "" && b != undefined) {
                    a = "?atuotriggfb=true&ver=" + a
                } else {
                    a = "?atuotriggfb=false&ver=" + a
                }
            } else {
                a = ""
            }
            var d = $SUL("#frMyAccount").attr("src") + "";
            if (d == "undefined" || d == "" || d == "http://api.sulekhalive.com/html/dummy.html") {
                $SUL("#frMyAccount").attr("src", this.Path + a)
            }
            if ($SUL("#signin_india").length > 0) {
                $SUL("#signin_india").data("overlay").load()
            } else {
                $SUL("#signin").data("overlay").load()
            }
        },
        popupLoginClose: function (status) {
            $SUL("#divSignin_Dialog").dialog("close");
            if (status == 1) {
                eval(this.CallBack_Success)()
            } else {
                if (status == 0 && this.isLoggedin("") == 1) {
                    eval(this.CallBack_Success)()
                } else {
                    eval(this.CallBack_Failure)()
                }
            }
        },
        popupLoginCallBack: function (aIPCountry) {
            if ($SUL("#signin_india").length > 0) {
                this.setLoginBarV2()
            } else {
                Sulekha.Auth.setLoginBar();
                $SUL("#divSignin_Dialog").dialog("close")
            }
            if (this.CallBack_Success != "") {
                $SUL("#signin").css("display", "none");
                eval(this.CallBack_Success)()
            }
        },
        setLoginBar: function () {
            if (Sulekha.Auth.isLoggedin()) {
$SUL('#dLabel').bind("contextmenu",function(e){
     return false;
});
                if (!Sulekha.Common.isEmptyParam(Sulekha.CurrentUser.firstName)) {
                    sName = Sulekha.CurrentUser.firstName
                } else {
                    if (!Sulekha.Common.isEmptyParam(Sulekha.CurrentUser.lastName)) {
                        sName = Sulekha.CurrentUser.lastName
                    } else {
                        sName = Sulekha.CurrentUser.name
                    }
                }
                if (sName.length > 40) {
                    sName = sName.substring(0, 40) + "..."
                }
                var c = Sulekha.CurrentUser.url;
                var b = "";
                var a = document.getElementById("s_username");
                sLogin = Sulekha.CurrentUser.loggedsite;
                if (sLogin == "sulekha") {
                    if (c == null || c == "" || c.indexOf(".sulekha.com") <= 0) {
                        b = "Welcome " + sName
                    } else {
                        if (c != "" && c != null) {
                            b = '<a href="' + c + '" class="userimg"><img src="' + Sulekha.CurrentUser.photo + '" onerror="this.src=\'http://www.sulekha.com/common/img07/sulfavicon.gif\'"/></a><a class="username" target="_blank" href="' + c + '">' + sName + '</a><div class="clr"></div>'
                        }
                    }
                } else {
                    if (sLogin == "facebook") {
                        if (sName.indexOf("-FB") > 0) {
                            b = '<a target="_blank" href="' + c + '" class="userimg"><img src="' + Sulekha.CurrentUser.photo + '" onerror="this.src=\'http://www.sulekha.com/common/img07/facefavicon.gif\'"/></a><a class="username" target="_blank" href="' + c + '">' + sName.substring(0, sName.indexOf("-FB")) + '</a><div class="clr"></div>'
                        } else {
                            b = '<a target="_blank" href="' + c + '" class="userimg"><img src="' + Sulekha.CurrentUser.photo + '" onerror="this.src=\'http://www.sulekha.com/common/img07/facefavicon.gif\'"/></a><a class="username" target="_blank" href="' + c + '">' + sName + '</a><div class="clr"></div>'
                        }
                    } else {
                        if (sLogin == "google") {
                            b = '<a target="_blank" href="' + c + '" class="userimg"><img src="' + Sulekha.CurrentUser.photo + '" onerror="this.src=\'http://www.sulekha.com/common/img07/googsocial.gif\'"/></a><a class="username" target="_blank" href="' + c + '">' + sName + '</a><div class="clr"></div>'
                        } else {
                            if (sLogin == "twitter") {
                                b = '<a target="_blank" href="' + c + '" class="userimg"><img src="' + Sulekha.CurrentUser.photo + '" onerror="this.src=\'http://www.sulekha.com/common/img07/twtsocial.gif\'"/></a><a class="username" target="_blank" href="' + c + '">' + sName + '</a><div class="clr"></div>'
                            }
                        }
                    }
                }
                if (b != "") {
                    if (a != null) {
                        a.innerHTML = b;
                        a.style.display = "";
                        document.getElementById("s_logged").style.display = "";
                        document.getElementById("s_login").style.display = "none"
                    }
                }
            }
        },
        setLoginBarV2: function () {
            var b = "";
            var a = "";
            if (Sulekha.Auth.isLoggedin()) {
                if (!Sulekha.Common.isEmptyParam(Sulekha.CurrentUser.firstName)) {
                    b = Sulekha.CurrentUser.firstName
                } else {
                    if (!Sulekha.Common.isEmptyParam(Sulekha.CurrentUser.lastName)) {
                        b = Sulekha.CurrentUser.lastName
                    } else {
                        b = Sulekha.CurrentUser.name
                    }
                }
                a = Sulekha.CurrentUser.id;
                if (b.length > 40) {
                    b = b.substring(0, 40) + "..."
                }
                if (a != null && a != "" && a != undefined) {
                    $SUL("#s_LoggedUL").html('<span id="sLogName" style="color: #000"> </span><li style="position: relative"><a onmouseout="EleOut();" onmouseover="EleOver();"><span class="SUL_linktxt">My Account</span> <span class="SUL_downarrow"></span></a><div id="myaccopen" onmouseout="DivOut()" onmouseover="DivOver()" class="select_myacc"><div><a href="http://rivr.sulekha.com/myrivr.aspx">My Rivr</a></div><div><a href="http://myaccount.sulekha.com/classifiedads">My Classifieds Ads</a></div><div><a href="http://myaccount.sulekha.com/rewards">My Rewards</a></div><div><a href="http://myaccount.sulekha.com/deals">My Deals</a></div></div></li><li>| </li><li><a href="http://myaccount.sulekha.com/classifiedads"><span class="SUL_linktxt">My Classifieds Ads</span></a></li><li> | </li><li><a href="http://myaccount.sulekha.com/network/signout.aspx"><span class="SUL_linktxt">Logout</span></a></li>');
                    $SUL("#s_unLoggedUL").children("li").remove();
                    if (b == null || b == "" || b == undefined) {
                        b = "Member"
                    }
                    $SUL("#sLogName").html("<li>Hi <strong >" + b + ":</strong></li> ");
                    $SUL("#signin_india").css("display", "none");
                    $SUL("#exposeMask").css("display", "none")
                } else {
                    $SUL("#s_unLoggedUL").html('<li class="nact"><a id="gblmenu4" onclick="globalMenu(event,2);" rel="#signin" title="Account">Login</a></li><li>| </li><li><a title="Register in Sulekha" onclick="globalMenu(event,2);" id="gblmenu5">Register</a></li><li> | </li><li style="padding-top: 0;"><div class="SUL_social"><ul><li style="padding-top: 10px; color: #444444;">Login using</li><li><a class="SUL_facebook" id="FBImgPlu" href="javascript:Sulekha.Auth.popupLoginCtrl(\'\',2,\'true\');"></a></li><li><a class="SUL_twitter" id="TwtImgPlug" href="javascript:Sulekha.Auth.popupLoginCtrl(\'\', \'2\');"></a></li><li style="margin-right: 0;"><a class="SUL_googleplus" id="GooImgPlug" href="javascript:Sulekha.Auth.popupLoginCtrl(\'\', \'2\');"></a></li></ul></div></li>');
                    $SUL("#s_LoggedUL").children("li").remove()
                }
            } else {
                $SUL("#s_unLoggedUL").html('<li class="nact"><a id="gblmenu4" onclick="globalMenu(event,2);" rel="#signin" title="Account">Login</a></li><li>| </li><li><a title="Register in Sulekha" onclick="globalMenu(event,2);" id="gblmenu5">Register</a></li><li> | </li><li style="padding-top: 0;"><div class="SUL_social"><ul><li style="padding-top: 10px; color: #444444;">Login using</li><li><a class="SUL_facebook" id="FBImgPlu" href="javascript:Sulekha.Auth.popupLoginCtrl(\'\',2,\'true\');"></a></li><li><a class="SUL_twitter" id="TwtImgPlug" href="javascript:Sulekha.Auth.popupLoginCtrl(\'\', \'2\');"></a></li><li style="margin-right: 0;"><a class="SUL_googleplus" id="GooImgPlug" href="javascript:Sulekha.Auth.popupLoginCtrl(\'\', \'2\');"></a></li></ul></div></li>');
                $SUL("#s_LoggedUL").children("li").remove()
            }
        },
        validEmail: function (b, a, e, f) {
            var d = document.getElementById("process_email");
            if ($SUL("#" + b).val() != "") {
                if (Sulekha.Validate.email(b, "", "")) {
                    var c = "http://api.sulekha.com/network/validation.aspx?sulcallbackjson=" + f + "&inputtype=email&errdivid=" + a + "&inputvalue=" + $SUL("#" + b).val() + "&processdiv=" + e;
                    $SUL("#" + e).html('<img align="absmiddle" width="16px" src="http://www.sulekha.com/common/img07/ajaxload.gif" />');
                    this.JSONGetData(c)
                } else {
                    $SUL("#" + a).html("Enter a Valid Email");
                    $SUL("#" + a).css("display", "");
                    $SUL("#" + e).html('<img align="absmiddle" width="16px" src="http://www.sulekha.com/common/img07/error.gif" />');
                    return false
                }
            } else {
                $SUL("#" + a).html("Enter Login Email");
                $SUL("#" + a).css("display", "");
                $SUL("#" + e).html('<img align="absmiddle" width="16px" src="http://www.sulekha.com/common/img07/error.gif" />');
                return false
            }
        },
        signIn: function (e, b, a, d) {
            var c = "http://api.sulekha.com/network/validation.aspx?sulcallbackjson=" + d + "&inputtype=signin&errdivid=" + a + "&logid=" + $SUL("#" + e).val() + "&logpass=" + $SUL("#" + b).val();
            this.JSONGetData(c)
        },
        register: function (h, b, c, d, f, a, g) {
            var e = "http://api.sulekha.com/network/validation.aspx?sulcallbackjson=" + g + "&inputtype=register&errdivid=" + a + "&logid=" + $SUL("#" + h).val() + "&logpass=" + $SUL("#" + b).val();
            if (!Sulekha.Common.isEmptyParam(c)) {
                e += "&logadd=" + $SUL("#" + c).val()
            }
            if (!Sulekha.Common.isEmptyParam(d)) {
                e += "&logname=" + $SUL("#" + d).val()
            }
            if (!Sulekha.Common.isEmptyParam(f)) {
                e += "&logidentity=" + $SUL("#" + f).val()
            }
            this.JSONGetData(e)
        },
        JSONGetData: function (a) {
            var b = document.createElement("script");
            b.src = a;
            b.type = "text/javascript";
            var c = document.getElementsByTagName("head").item(0);
            c.appendChild(b);
            return false
        }
    },
    Common: {
        getCookie: function (c) {
            var b = document.cookie;
            var e = c + "=";
            var d = b.indexOf("; " + e);
            if (d == -1) {
                d = b.indexOf(e);
                if (d != 0) {
                    return null
                }
            } else {
                d += 2
            }
            var a = document.cookie.indexOf(";", d);
            if (a == -1) {
                a = b.length
            }
            return unescape(b.substring(d + e.length, a))
        },
        setCookie: function (b, d, a, c) {
            var e = new Date();
            e.setDate(e.getDate() + a);
            document.cookie = b + "=" + escape(d) + ";path=/" + ((Sulekha.Common.isEmptyParam(a)) ? "" : ";expires=" + e.toUTCString()) + ((Sulekha.Common.isEmptyParam(c)) ? ";domain=.sulekha.com" : ";domain=" + c)
        },
        deleteCookie: function (a) {
            if (Sulekha.Common.getCookie(a)) {
                Sulekha.Common.setCookie(a, "", -1, ".sulekha.com")
            }
        },
        isEmptyParam: function (a) {
            if (a == undefined || a == "") {
                return true
            } else {
                return false
            }
        },
        trim: function (a) {
            if (a == undefined) {
                return false
            }
            return a.replace(/^\s+|\s+$/g, "")
        },
        dialog: function (f, b, a, d, c, e) {
            if (b.indexOf("#") == 0) {
                holder = b;
                $SUL(holder).dialog({
                    modal: true,
                    zIndex: 3999,
                    autoOpen: false,
                    draggable: true,
                    title: "Sulekha Alert!...",
                    resizable: false
                })
            } else {
                holder = "#div_Dialog";
                $SUL(holder).html(b)
            }
            $SUL(holder).dialog("close");
            if (Sulekha.Common.isEmptyParam(a)) {
                a = 300
            }
            if (Sulekha.Common.isEmptyParam(d)) {
                d = 100
            }
            if (!Sulekha.Common.isEmptyParam(c)) {
                $SUL(holder).dialog("option", "buttons", {
                    Ok: function () {
                        $SUL(holder).dialog("close")
                    }
                })
            }
            $SUL(holder).dialog("option", "height", a);
            $SUL(holder).dialog("option", "width", d);
            $SUL(holder).dialog("option", "title", f);
            if (Sulekha.Common.isEmptyParam(e)) {
                $SUL(holder).dialog("option", "modal", false)
            } else {
                $SUL(holder).dialog("option", "modal", e)
            }
            $SUL(holder).dialog("option", "closeOnEscape", true);
            $SUL(holder).dialog("option", "position", "center");
            $SUL(holder).dialog("open")
        },
        process: function (b, d, a, c) {
            if (b) {
                $SUL("#div_Process").dialog("close");
                if (Sulekha.Common.isEmptyParam(a)) {
                    a = 100
                }
                if (Sulekha.Common.isEmptyParam(c)) {
                    c = 250
                }
                if (Sulekha.Common.isEmptyParam(d)) {
                    d = "Loading please wait..."
                }
                $SUL("#div_Process").html("<br/><center><img src='http://rivr.sulekha.com/common/images/processing.gif'/></center>");
                $SUL("#div_Process").dialog("option", "height", a);
                $SUL("#div_Process").dialog("option", "width", c);
                $SUL("#div_Process").dialog("option", "title", d);
                $SUL("#div_Process").dialog("option", "modal", true);
                $SUL("#div_Process").dialog("option", "closeOnEscape", false);
                $SUL("#div_Process").dialog("option", "position", "center");
                $SUL("#div_Process").dialog("option", "closeText", "hide");
                $SUL("#div_Process").dialog("open");
                $SUL("#ui-id-8").next("a").hide()
            } else {
                $SUL("#div_Process").dialog("close")
            }
        },
        autocomplete: function (holder, def, url, callback, params) {
            if (!Sulekha.Common.isEmptyParam(holder)) {
                if (!Sulekha.Common.isEmptyParam(def)) {
                    Sulekha.Validate.defaultTxt(holder, def)
                } else {
                    Sulekha.Validate.defaultTxt(holder, "Enter text")
                }
                holder = "#" + holder;
                if (Sulekha.Common.isEmptyParam(url)) {
                    url = "/search.aspx"
                }
                if (!Sulekha.Common.isEmptyParam(params)) {
                    if (params.indexOf(",") > 0) {
                        var aparams = params.split(",");
                        params = "";
                        for (i = 0; i < aparams.length; i++) {
                            if (aparams[i].indexOf("=") > 0) {
                                params += "&" + aparams[i]
                            } else {
                                if ($SUL("#" + aparams[i]).length > 0) {
                                    params += "&" + aparams[i] + "=" + $SUL("#" + aparams[i]).val()
                                }
                            }
                        }
                    } else {
                        if (params.indexOf("=") > 0) {
                            params = "&" + params
                        } else {
                            if ($SUL("#" + params).length > 0) {
                                params = "&" + params + "=" + $SUL("#" + params).val()
                            }
                        }
                    }
                }
                url = url + "?" + params;
                $SUL(holder).autocomplete({
                    source: url,
                    processData: false,
                    minLength: 2,
                    cacheLength: 10,
                    select: function (event, ui) {
                        if (!Sulekha.Common.isEmptyParam(callback)) {
                            eval(callback)(holder.replace("#", ""), ui.item)
                        }
                    },
                    autoFill: true
                })
            }
        },
        alert: function (a) {
            $SUL("#divError_Dialog").html(a);
            $SUL("#divError_Dialog").dialog("open")
        }
    },
    Form: {
        output: "alert",
        error: "alert",
        jsonData: null,
        url: "/common/processform.aspx",
        method: "POST",
        onSuccess: "",
        showprocess: "1",
        ajaxBegin: function (a, b) {
            $SUL("#" + a).bind("ajaxSend", b)
        },
        ajaxEnd: function (a, b) {
            $SUL("#" + a).bind("ajaxComplete", b)
        },
        ajaxError: function (a) {
            Sulekha.Common.alert(a)
        },
        post: function (b, g, a, h, f, d, e, c) {
            if (Sulekha.Common.isEmptyParam(b)) {
                Sulekha.Form.process(g, a, h, f, d, e, c)
            } else {
                $SUL("#" + b).bind("click", function (k) {
                    Sulekha.Form.process(g, a, h, f, d, e, c)
                })
            }
        },
        process: function (f, b, a, h, e, k, d) {
            jsonData = null;
            if (!Sulekha.Common.isEmptyParam(k)) {
                Sulekha.Form.onSuccess = k
            }
            if (!Sulekha.Common.isEmptyParam(a)) {
                Sulekha.Form.method = a
            }
            if (!Sulekha.Common.isEmptyParam(b)) {
                Sulekha.Form.url = b
            }
            if (!Sulekha.Common.isEmptyParam(h)) {
                Sulekha.Form.output = h
            }
            if (!Sulekha.Common.isEmptyParam(e)) {
                Sulekha.Form.error = e
            }
            if (Sulekha.Common.isEmptyParam(f)) {
                jsonData = [{
                    name: "Empty",
                    value: ""
                }]
            } else {
                if (f.indexOf(",") > 0) {
                    var c = f.split(",");
                    for (i = 0; i < c.length; i++) {
                        param = "#" + c[i];
                        if ($SUL(param).is("form")) {
                            if (jsonData == null) {
                                jsonData = $SUL(param).serializeArray()
                            } else {
                                jsonData.push($SUL(param).serializeArray())
                            }
                        } else {
                            if (jsonData == null) {
                                jsonData = [{
                                    name: c[i].replace("#", ""),
                                    value: $SUL(param).val()
                                }]
                            } else {
                                jsonData.push({
                                    name: c[i].replace("#", ""),
                                    value: $SUL(param).val()
                                })
                            }
                        }
                    }
                } else {
                    if ($SUL("#" + f).is("form")) {
                        jsonData = $SUL("#" + f).serializeArray()
                    } else {
                        jsonData = [{
                            name: f,
                            value: $SUL("#" + f).val()
                        }]
                    }
                }
            }
            if (typeof (tinyMCE) != "undefined") {
                if (tinyMCE.activeEditor != null) {
                    var g = tinyMCE.activeEditor.getContent();
                    jsonData.push({
                        name: "iTinyEditorData",
                        value: g
                    })
                }
            }
            Sulekha.Form.jsonData = jsonData;
            if (Sulekha.Validate.isValidData(jsonData)) {
                if (Sulekha.Common.isEmptyParam(d)) {
                    Sulekha.Auth.ensureLoggedIn("", "Sulekha.Form.ajaxCall")
                } else {
                    if (d == 0) {
                        Sulekha.Form.ajaxCall()
                    } else {
                        Sulekha.Auth.ensureLoggedIn("", "Sulekha.Form.ajaxCall")
                    }
                }
            } else {
                if (Sulekha.Form.error == "alert") {
                    Sulekha.Common.alert("Check all values")
                } else {
                    $SUL("#" + Sulekha.Form.error).html("Check all values")
                }
            }
        },
        ajaxCall: function () {
            if (Sulekha.Form.jsonData != null) {
                if (typeof (Sulekha.Context) != "undefined") {
                    for (i = 0; i < Sulekha.Context.length; i++) {
                        Sulekha.Form.jsonData.push({
                            name: Sulekha.Context[i].name,
                            value: Sulekha.Context[i].value
                        })
                    }
                }
            }
            if (Sulekha.Form.showprocess == "1") {
                Sulekha.Common.process(true, "Processing, Please wait...", "", 250)
            }
            $SUL.ajax({
                type: Sulekha.Form.method,
                url: Sulekha.Form.url,
                dataType: "json",
                data: Sulekha.Form.jsonData,
                success: Sulekha.Form.success,
                failure: Sulekha.Form.failure
            })
        },
        failure: function (a) {
            Sulekha.Common.process(false);
            if (Sulekha.Form.error == "alert") {
                Sulekha.Common.alert("Error in form posting : " + a.responseText)
            } else {
                $SUL("#" + Sulekha.Form.error).html("Error in form posting : " + a.responseText)
            }
            Sulekha.Form.reset
        },
        success: function (o) {
            Sulekha.Common.process(false);
            if (!Sulekha.Common.isEmptyParam(Sulekha.Form.onSuccess)) {
                eval(Sulekha.Form.onSuccess)(o)
            } else {
                var sResult = "";
                if (o[1] == undefined) {
                    if (o.responseText != undefined) {
                        sResult = o.responseText
                    } else {
                        sResult = "Error in form post"
                    }
                    if (Sulekha.Form.output == "alert") {
                        Sulekha.Common.alert(sResult)
                    } else {
                        $SUL("#" + Sulekha.Form.output).html(sResult)
                    }
                } else {
                    if (Sulekha.Form.output == "alert") {
                        Sulekha.Common.alert(o[1].value)
                    } else {
                        $SUL("#" + Sulekha.Form.output).html(o[1].value)
                    }
                }
            }
            Sulekha.Form.reset()
        },
        reset: function () {
            Sulekha.Form.output = "alert";
            Sulekha.Form.error = "alert";
            Sulekha.Form.jsonData = null;
            Sulekha.Form.url = "/common/processform.aspx";
            Sulekha.Form.method = "POST";
            Sulekha.Form.onSuccess = ""
        }
    }
}, SulCommonHeader = {
    Common: {
        getCookie: function (c) {
            var b = document.cookie;
            var e = c + "=";
            var d = b.indexOf("; " + e);
            if (d == -1) {
                d = b.indexOf(e);
                if (d != 0) {
                    return null
                }
            } else {
                d += 2
            }
            var a = document.cookie.indexOf(";", d);
            if (a == -1) {
                a = b.length
            }
            return unescape(b.substring(d + e.length, a))
        },
        setCookie: function (b, d, a, c) {
            var e = new Date();
            e.setDate(e.getDate() + a);
            document.cookie = b + "=" + escape(d) + ";path=/" + ((SulCommonHeader.Common.isEmptyParam(a)) ? "" : ";expires=" + e.toUTCString()) + ((SulCommonHeader.Common.isEmptyParam(c)) ? ";domain=.Sulekha.com" : ";domain=" + c)
        },
        deleteCookie: function (a) {
            if (SulCommonHeader.Common.getCookie(a)) {
                SulCommonHeader.Common.setCookie(a, "", -1, ".Sulekha.com")
            }
        },
        isEmptyParam: function (a) {
            if (a == undefined || a == "") {
                return true
            } else {
                return false
            }
        }
    }
}, CommonHeader = {
    megamenu: function () {
        var hos = window.location;
        var b = $SUL("#hidsearchCity").val();
        var a = Math.floor((Math.random() * 100000) + 1);
        var headurl = "http://www.Sulekha.com/getheader.aspx?city=" + b + "&callback=jsonpCallback&rnd=" + a;
        $SUL.ajax({
            url: headurl,
            dataType: "jsonp",
            jsonpCallback: "jsonpCallback",
            cache: false,
            jsonp: false,
            error: function (d, e, c) { },
            success: function (c) {
                $SUL("#divheader").html(c.contents);
                var curl = window.location.host;
                $SUL(".main-menu li a.jsnav").each(function () {
                    var myHref = $SUL(this).attr("href");
					if(myHref !="http://www.sulekha.com/")
					{
                    if (window.location.toString().indexOf(myHref) != -1) {
                        $SUL(this).parent("li").addClass("active")
                    }
					}
                })
            }
        });
        $SUL.ajax({
            url: "http://www.sulekha.com/common/visithistory.aspx?l=" + hos + "&rnd=" + Math.floor(Math.random() * 109751) + "&callback=jsonpCallback3",
            type: "GET",
            dataType: "jsonp",
            jsonpCallback: "jsonpCallback3",
            jsonp: false,
            cache: false,
            success: function (e) {
                $SUL("#visitsdiv").html(e.contents)
            }
        });
        $SUL(".mobile-menu").click(function () {
            $SUL(".primary-nav").toggleClass("show")
        });
        $SUL(".mobile-sub-menu").click(function () {
            $SUL(".secondary-nav").toggleClass("show")
        });
    },
    secondaryMenuPositioning: function() {
        $SUL('.secondary-nav>.main-menu>li>a').each(function(index, elem) {
            elem = $SUL(elem)
            dropdownDiv = elem.next('.nav-container');
            if (dropdownDiv.size() != 0) {
                mainMenuWidth = elem.closest('.main-menu').width();
                elemPosition = elem.position().left;

                dropdownDiv.css('left', '0');
                dropdownDivWidth = dropdownDiv.width();

                if (dropdownDivWidth > (mainMenuWidth - elemPosition)) {
                    dropdownDiv.css('left', 'auto');
                    dropdownDiv.css('right', '0');
                } else {
                    dropdownDiv.css('left', 'auto');
                }
            }

            newLabel = elem.prev('.new-label');
            if (newLabel.size() != 0) {
                newLabel.css('left', elem.position().left + elem.width() - newLabel.width() + 10);
                newLabel.show();
            }
        });
    },
    dropdownSearch: function (holder, callback, options) {
        var obj = $SUL("#" + holder);
        var elem = obj[0];
        var mycitylist;
        var dropdowncb;
        init = function () {
            dropdowncb = callback, elem.selectedElem, elem.currentNum, elem.focusedIn = false;
            elem.dropdownLabelCont = obj.find(".dropdownSearch-choice"), elem.dropdownLabel = obj.find(".dropdownSearch-chosen"), elem.citiesUL = obj.find(".dropdownSearch-results"), elem.cityLisDefault = elem.citiesUL.find("li"), elem.cityLis = elem.citiesUL.find("li"), elem.visibleList = elem.citiesUL.find("li"), elem.searchInputBox = obj.find(".dropdownSearch-input"), elem.dropdownValue = obj.find(".dropdownSearch-value"), elem.cityLisDefaultCont = $SUL("<div class='original-city-list hide'></div>"), elem.citiesUL.parent().append(elem.cityLisDefaultCont), elem.cityLisDefault = elem.cityLisDefaultCont.append(elem.citiesUL.html()), elem.noResults = obj.find(".no-results");
            if (options) {
                elem.hasLink = options.hasLink;
                elem.ajaxEnabled = options.ajaxEnabled
            } else {
                elem.hasLink = false;
                elem.ajaxEnabled = false
            }
            elem.citiesUL.attr("tabindex", "-1");
            elem.cityLis.children("a").attr("tabindex", "-1");
            setEvents()
        }, updateListEvents = function () {
            elem.cityLis.click(setValueOnClick);
            elem.cityLis.mouseover(setHighlight)
        }, setEvents = function () {
            elem.dropdownLabelCont.click(function (e) {            
                e.preventDefault();
                if ($SUL(e.currentTarget).parent().hasClass("dropdownSearch-dropdown-open")) {
                    hideDropdown(e)
                } else {
                    showDropdown(e)
                }
            });
            elem.cityLis.click(setValueOnClick);
            elem.cityLis.mouseover(setHighlight);
            elem.dropdownLabelCont.keydown(function (e) {
                if (e.keyCode == 38 || e.keyCode == 40) {
                    showDropdown(e)
                }
            });
            elem.searchInputBox.keydown(traverseList);
            elem.searchInputBox.bind("input propertychange", autoComplete);
            obj.children(".dropdownSearch-drop").focusout(function (e) {
                obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
                elem = obj[0];
                elem.focusedIn = false;
                setTimeout(function () {
                    obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
                    elem = obj[0];
                    if (elem.focusedIn != true) {                    
                        hideDropdown(e)
                    }
                }, 100)
            });
            obj.children(".dropdownSearch-drop").focusin(function (e) {
                obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
                elem = obj[0];
                elem.focusedIn = true
                 setTimeout(function () {
		                    obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
		                    elem = obj[0];
		                    elem.focusedIn = true;
                }, 100)
            })
        }, setHighlight = function (e) {
            obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
            elem = obj[0];
            if (!$SUL(e.currentTarget).hasClass("optGroup")) {
                elem.cityLis.removeClass("dropdownSearch-highlighted");
                $SUL(e.currentTarget).addClass("dropdownSearch-highlighted")
            }
        };
        setValueOnClick = function (e) {        
            obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
            elem = obj[0];
            if (!$SUL(e.currentTarget).hasClass("optGroup")) {
                SulCommonHeader.Common.setCookie("mycity", $SUL(this).text(), 1826, ".Sulekha.com");
                elem.dropdownLabel.text($SUL(this).text());
                elem.dropdownValue.val($SUL(this).text());
                hideDropdown(e);
                if (typeof (dropdowncb) != undefined) {
                    eval(dropdowncb)()
                }
                elem.dropdownLabelCont.focus();
 setTimeout(function() {
                   $SUL('#cityDropdownHeader').removeClass("dropdownSearch-dropdown-open");
               }, 100);
            }
        }, showDropdown = function (e) {
            obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
            elem = obj[0];
            obj.addClass("dropdownSearch-dropdown-open");
            elem.searchInputBox.focus()
        }, hideDropdown = function (e) {
            obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
            elem = obj[0];
            resetSearch(obj);
            obj.removeClass("dropdownSearch-dropdown-open");
// setTimeout(function() {
      //          $SUL('#cityDropdownHeader').removeClass("dropdownSearch-dropdown-open");
    //        }, 100);
            return;
        }, autoComplete = function (e) {
            obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
            elem = obj[0];
            elem.visibleList = [];
            elem.selectedElem = null;
            elem.cityLis.removeClass("dropdownSearch-highlighted");
            elem.cityLis.show();
            searchString = elem.searchInputBox.val();
            if (searchString == "") {
                elem.citiesUL.html(elem.cityLisDefault[0].innerHTML);
                elem.visibleList = elem.cityLis = elem.citiesUL.find("li");
                updateListEvents();
                elem.noResults.hide();
                elem.citiesUL.show();
                return
            }
            if (elem.ajaxEnabled) {
                $SUL.ajax({
                    url: "http://Sulekha.com/common/cityload.aspx?refurl=" + window.location.host + "&term=" + searchString,
                    type: "GET",
                    dataType: "jsonp",
                    jsonpCallback: "jsonpCallback2",
                    cache: true,
                    jsonp: false,
                    success: function (data) {
                        elem.citiesUL.html("");
                        $SUL.each(data, function (index, obj) {
                            if (obj.label.toLowerCase().indexOf(searchString.toLowerCase()) == 0) {
                                elem.citiesUL.append("<li><a tabindex='-1' title='Sulekha " + obj.label + "'>" + obj.label + "</a></li>");
                                elem.visibleList = elem.cityLis = elem.citiesUL.find("li");
                                var firstPart = $SUL(elem.cityLis[index]).text().substring(0, searchString.length);
                                var lastPart = $SUL(elem.cityLis[index]).text().substring(searchString.length);
                                if (elem.hasLink == true) {
                                    $SUL(elem.cityLis[index]).children().html("<span>" + firstPart + "</span>" + lastPart)
                                } else {
                                    $SUL(elem.cityLis[index]).html("<span>" + firstPart + "</span>" + lastPart)
                                }
                            }
                        });
                        if (elem.visibleList.length > 0) {
                            elem.noResults.hide();
                            elem.citiesUL.show()
                        } else {
                            elem.noResults.show();
                            elem.citiesUL.hide()
                        }
                        elem.selectedElem = elem.visibleList[0];
                        $SUL(elem.visibleList[0]).addClass("dropdownSearch-highlighted");
                        updateListEvents()
                    }
                })
            } else {
                for (i = 0; i < elem.cityLis.size(); i++) {
                    if (($SUL(elem.cityLis[i]).text().toLowerCase().indexOf(this.value.toLowerCase()) == 0) && (!$SUL(elem.cityLis[i]).hasClass("optGroup"))) {
                        var firstPart = $SUL(elem.cityLis[i]).text().substring(0, this.value.length);
                        var lastPart = $SUL(elem.cityLis[i]).text().substring(this.value.length);
                        if (elem.hasLink == true) {
                            $SUL(elem.cityLis[i]).children().html("<span>" + firstPart + '</span><span class="result-last">' + lastPart + "</span>")
                        } else {
                            $SUL(elem.cityLis[i]).html("<span>" + firstPart + '</span><span class="result-last">' + lastPart + "</span>")
                        }
                        elem.visibleList.push(elem.cityLis[i])
                    } else {
                        $SUL(elem.cityLis[i]).hide()
                    }
                }
                if (elem.visibleList.length > 0) {
                    elem.noResults.hide();
                    elem.citiesUL.show()
                } else {
                    elem.noResults.show();
                    elem.citiesUL.hide()
                }
                elem.selectedElem = elem.visibleList[0];
                $SUL(elem.visibleList[0]).addClass("dropdownSearch-highlighted")
            }
        }, traverseList = function (e) {
            obj = $SUL(e.currentTarget).parents(".dropdownSearch-container");
            elem = obj[0];
            if (e.keyCode == 13) {
                if (elem.selectedElem) {
                    elem.dropdownLabel.text($SUL(elem.selectedElem).text());
                    elem.dropdownValue.val($SUL(elem.selectedElem).text());
                    elem.dropdownLabelCont.focus();
		SulCommonHeader.Common.setCookie("mycity", $SUL(elem.selectedElem).text(), 1826, ".Sulekha.com");
		hideDropdown(e);
		if (typeof(dropdowncb) != undefined) {
                    eval(dropdowncb)()
                }
                }
            }
            if (e.keyCode == 27) {
                hideDropdown(e);
                elem.dropdownLabelCont.focus()
            }
            if (e.keyCode == 38 || e.keyCode == 40) {
                e.preventDefault();
                obj.addClass("dropdownSearch-dropdown-open");
                elem.cityLis.removeClass("dropdownSearch-highlighted");
                if (!elem.selectedElem && e.keyCode == 40) {
                    newNum = 0;
                    if ($SUL(elem.visibleList[newNum]).hasClass("optGroup")) {
                        newNum++
                    }
                } else {
                    if (!elem.selectedElem && e.keyCode == 38) {
                        return
                    } else {
                        elem.currentNum = $SUL(elem.visibleList).index(elem.selectedElem);
                        if (e.keyCode == 38) {
                            if (elem.currentNum >= 1) {
                                newNum = elem.currentNum - 1;
                                if ($SUL(elem.visibleList[newNum]).hasClass("optGroup")) {
                                    if (newNum <= 0) {
                                        newNum++
                                    } else {
                                        newNum--
                                    }
                                }
                            }
                        }
                        if (e.keyCode == 40) {
                            if (elem.currentNum < $SUL(elem.visibleList).size() - 1) {
                                newNum = elem.currentNum + 1;
                                while ($SUL(elem.visibleList[newNum]).hasClass("optGroup")) {
                                    if (newNum == $SUL(elem.visibleList).size() - 1) {
                                        return
                                    } else {
                                        newNum++
                                    }
                                }
                            }
                        }
                    }
                }
                $SUL(elem.visibleList[newNum]).addClass("dropdownSearch-highlighted");
                elem.selectedElem = elem.visibleList[newNum];
                elem.citiesUL.scrollTop(((((newNum / $SUL(elem.visibleList).size()) * 100) / 100) * elem.citiesUL[0].scrollHeight) - 100)
            }
        }, resetSearch = function (obj) {
            for (i = 0; i < obj.size(); i++) {
                obj[i].searchInputBox.val("");
		obj[i].searchInputBox.blur();
                obj[i].citiesUL.html(obj[i].cityLisDefault[0].innerHTML);
                obj[i].visibleList = obj[i].cityLis = obj[i].citiesUL.find("li");
                obj[i].citiesUL.scrollTop(0);
                obj[i].noResults.hide();
                obj[i].citiesUL.show();
                updateListEvents();
                obj[i].cityLis.removeClass("dropdownSearch-highlighted");
                obj[i].selectedElem = null
            }
        };
        return init()
    }
}, CommonSearch = {
    Init: function () {
        isLoggedinStatus = SulHeader.Auth.isLoggedin("");
        if (isLoggedinStatus == 1) {
            var isUserid = SulHeader.CurrentUser.id;
            Userid = isUserid
        }
        if (isLoggedinStatus == 0) {
            var trackid = SulHeader.Common.getCookie("sulusrtrack");
            Userid = trackid
        }
        $SUL("#sul_gblsearchiv1").keypress(function (a) {
            if (a.keyCode == 13) {
                if (mytempurl == "") {
                    mytempurl = "";
                    SearchRedirect()
                }
            } else {
                if ($SUL("#sul_gblsearchiv1").val().length == 0 && a.keyCode != 8) {
                    oldsearchval = "";
                    try {
                        _gaq.push(["_trackEvent", "NHP-SEARCH", "Search_Started"])
                    } catch (e) { }
                }
            }
        });
        $SUL(window).scroll(function () {
            $SUL("#sul_gblsearchiv1").autocomplete("close")
        });
        
        $SUL("#sul_gblsearchiv1").blur(function () {
            $SUL(this).val(oldsearchval)
        });
        $SUL("#sul_gblsearchiv1").keypress(function (e) {
            if (!e) {
                e = window.event
            }
            if (e.keyCode == "13") {
                if ($SUL("#sul_gblsearchiv1").val() == oldsearchval) {
                    mytempurl = "";
                    SearchRedirect()
                }
                return false
            }
        });
        $SUL("#sul_gblsearchiv1").autocomplete({
            delay: 0,
            minLength: 2,
            autoFocus: false,
            source: function (request, response) {
                    var mp = "0";
                    var query = $SUL("#sul_gblsearchiv1").val();
                    var city = $SUL(".dropdownSearch-value").val();
                    var direct = true;
                    var endpoint = endpoint = "http://175.41.139.188/solr/sulekha/";
                    var dtype = direct ? "jsonp" : "json";
                    var ajax_data = {};
                    typeseq = [];
                    var qdata = {};
                    var mpId = 0;
                    var mpname = "";
                    try {
                        mpId = parseInt($SUL("#hmpid").val());
                        mpname = $SUL("#hmpname").val();
                    } catch (e) { }
                    if (mpname != undefined && mpname != "") {
                        endpoint = endpoint + mpname + "/"
                    }
                    var durl = direct ? endpoint : "proxy";
                    if (direct) {
                        if (mpId != 0) {
                            durl += "suggest";
                            qdata.mp = mpId
                        } else {
                            durl += "main"
                        }
                    }
                    qdata.c = city;
                    qdata.s = query;
                    qdata.r = "~" + $SUL.trim(query).split(" ").join(" ~");
                    qdata.s1 = "*";
                    qdata.s2 = query + "~0.7";
                    var xi = query.lastIndexOf(" ");
                    if (xi != -1) {
                        qdata.s1 = query.substring(0, xi).replace(/\s/g, "~0.7 ") + "~0.7";
                        qdata.s2 = (xi == query.length - 1) ? "*" : query.substring(xi + 1) + "~0.7";
                        if (qdata.s2.length == 1) {
                            qdata.s2 = "*"
                        }
                    }
                    ajax_data.url = durl;
                    ajax_data.type = dtype;
                    ajax_data.data = qdata;
                $SUL.ajax({
                    type: "GET",
                    url: ajax_data.url,
                    dataType: ajax_data.type,
                    headers: {
                        "Accept-Encoding": "gzip"
                    },
                    jsonp: "json.wrf",
                    data: ajax_data.data,
                    success: function (data) {
                        try {
                            if (typeof (data.response.docs) !== "undefined") {
                                var _docs = [];
                                var rvr = [];
                                var deals = [];
                                var dd = data.response1 ? data.response2 ? $SUL.merge(data.response1.docs, data.response2.docs) : data.response1.docs : data.response.docs;
                                var dlen = dd.length;
                                for (var i = 0; i < dlen; i++) {
                                    var dv = dd[i];
                                    dv.t = dv.title;
                                    dv.title = dv.title;
                                    var arr = (dv.typeId == 2000) ? rvr : (dv.typeId == 3000) ? deals : _docs;
                                    arr.push(dv)
                                }
                                if (rvr.length > 0) {
                                    rvr[0].title = rvr[0].title
                                }
                                response($SUL.merge($SUL.merge(_docs, rvr.length > 0 ? [rvr[0]] : []), deals.length > 0 ? [deals[0]] : []))
                            }
                        } catch (err) {
                            oldsearchval = $SUL("#sul_gblsearchiv1").val()
                        }
                    },
                    error: function () { }
                })
            },
            open: function (event, ui) {
                $SUL(".ui-menu").css({
                    "z-index": 9999
                })
            },
            focus: function (event, ul) {
                event.preventDefault();
                if (event.keyCode === undefined) {
                    var maxlength = -1;
                    var query = oldsearchval.toLowerCase() + " ";
                    var queryList = query.split(" ");
                    var count = queryList.length;
                    var matchingindex = 0;
                    var prevmaxlength = 0;
                    for (var i = 0; i < ul.item.title.length; i++) {
                        var test = ul.item.title[i].toLowerCase();
                        var datalist = test.split(" ");
                        maxlength = 0;
                        var templenght = 0;
                        for (var kk = 0; kk < queryList.length; kk++) {
                            var pattern = new RegExp("(" + queryList[kk] + ")".toLowerCase(), "gi");
                            if (test.match(pattern)) {
                                maxlength++
                            }
                        }
                        if (maxlength > prevmaxlength) {
                            matchingindex = i
                        }
                        prevmaxlength = maxlength;
                        if (count == maxlength) {
                            break
                        }
                    }
                    var valueset = ul.item.title[matchingindex];
                    if (valueset == undefined || valueset == "" || valueset == null) {
                        titlesrch = ul.item.title[0]
                    } else {
                        titlesrch = valueset
                    }
                    $SUL("#sul_gblsearchiv1").val(oldsearchval);
                    return false
                } else {
                    var maxlength = -1;
                    var query = oldsearchval.toLowerCase() + " ";
                    var queryList = query.split(" ");
                    var count = queryList.length;
                    var matchingindex = 0;
                    var prevmaxlength = 0;
                    for (var i = 0; i < ul.item.title.length; i++) {
                        var test = ul.item.title[i].toLowerCase();
                        var datalist = test.split(" ");
                        maxlength = 0;
                        var templenght = 0;
                        for (var kk = 0; kk < queryList.length; kk++) {
                            var pattern = new RegExp("(" + queryList[kk] + ")".toLowerCase(), "gi");
                            if (test.match(pattern)) {
                                maxlength++
                            }
                        }
                        if (maxlength > prevmaxlength) {
                            matchingindex = i
                        }
                        prevmaxlength = maxlength;
                        if (count == maxlength) {
                            break
                        }
                    }
                    var valueset = ul.item.title[matchingindex];
                    if (valueset == undefined || valueset == "" || valueset == null) {
                        valueset = ul.item.title[0]
                    }
                    $SUL("#sul_gblsearchiv1").val(valueset).focus();
                    String(valueset + "");
                    mytempurl = ul.item.url;
                    mytemptext = valueset;
                    $SUL("#sul_gblsearchiv1").val(valueset);
                    titlesrch = $SUL("#sul_gblsearchiv1").val()
                }
            },
            select: function (event, ui) {
                var hos = window.location.host;
                $SUL(this).bind("keyup", function (event) {
                    if (event.keyCode == 13) {
                        var tempURL = ui.item.url + "";
                        tempURL = tempURL.replace("http://www.sulekha.com/", "");
                        tempURL = tempURL.replace("http//", "http://");
                        if (tempURL.indexOf("http://") == -1) {
                            tempURL = "http://" + tempURL
                        }
                        var city = $SUL("#citydropdown :selected").text();
                        try {
                            _gaq.push(["_trackEvent", "NHP-SEARCH", "Search_Selected_Title", oldsearchval + "^" + tempURL + "^" + city]);
                            _gaq.push(["_trackEvent", "NHP-SEARCH", "Search_Returns", Userid + "^" + oldsearchval + "^" + tempURL + "^" + city])
                        } catch (e) { }
                        $SUL(location).attr("href", tempURL + "?utm_source=" + hos + "&utm_medium=Search_suggest&utm_term=" + oldsearchval + "&utm_campaign=Search");
                        return false
                    }
                });
                var tempURL = ui.item.url + "";
                tempURL = tempURL.replace("http://www.sulekha.com/", "");
                tempURL = tempURL.replace("http//", "http://");
                if (tempURL.indexOf("http://") == -1) {
                    tempURL = "http://" + tempURL
                }
                var city = $SUL("#citydropdown :selected").text();
                try {
                    _gaq.push(["_trackEvent", "NHP-SEARCH", "Search_Selected_Title", oldsearchval + "^" + tempURL + "^" + city]);
                    _gaq.push(["_trackEvent", "NHP-SEARCH", "Search_Returns", Userid + "^" + oldsearchval + "^" + tempURL + "^" + city])
                } catch (e) { }
                $SUL(location).attr("href", tempURL + "?utm_source=" + hos + "&utm_medium=Search_suggest&utm_term=" + oldsearchval + "&utm_campaign=Search");
                return false
            },
            close: function () {
                $SUL(this).show();
                return false
            }
        }).data("ui-autocomplete")._renderItem = function (ul, item) {
ul.addClass("ch-search");
            $SUL("#ui-id-1").addClass("hp-autosuggestion");
            var titleTemp = 0;
            var bit = new Array();
            var text = 0;
            var maxlength = -1;
            var matcher = "";
            var textnew = "";
            var newtitle = "";
            var mytitlevalue = "";
            var stringnew = "";
            var matchingindex = 0;
            var prevmaxlength = 0;
            var query = $SUL("#sul_gblsearchiv1").val().toLowerCase() + " ";
            var queryList = query.split(" ");
            var count = queryList.length;
            oldsearchval = $SUL("#sul_gblsearchiv1").val();
            for (var i = 0; i < item.title.length; i++) {
                var test = item.title[i].toLowerCase();
                var datalist = test.split(" ");
                maxlength = 0;
                var templenght = 0;
                for (var kk = 0; kk < queryList.length; kk++) {
                    var pattern = new RegExp("(" + queryList[kk] + ")".toLowerCase(), "gi");
                    if (test.match(pattern)) {
                        maxlength++
                    }
                }
                if (maxlength > prevmaxlength) {
                    matchingindex = i
                }
                prevmaxlength = maxlength;
                if (count == maxlength) {
                    break
                }
            }
            var temptextval = item.title[matchingindex];
            var id = item.id;
            for (var kk = 0; kk < queryList.length; kk++) {
                var filter = queryList[kk];
                var regExPattern = "i";
                var regEx = new RegExp(filter, regExPattern);
                var matcher = new RegExp("(" + filter + ")".toLowerCase(), "gi");
                if ($SUL.trim(filter).length > 0) {
                    temptextval = temptextval.replace(matcher, "<<>>$1<</>>")
                }
            }
            var matcher1 = new RegExp("(<<>>)".toLowerCase(), "gi");
            var matcher2 = new RegExp("(<</>>)".toLowerCase(), "gi");
            temptextval = temptextval.replace(matcher1, "<strong>").replace(matcher2, "</strong>");
            if (id.indexOf("CARLAST-") >= 0) {
                mytitlevalue = item.title[0];
                var spec = "(<<>>)" + item.title[0] + "(<<>>)";
                temptextval = spec.replace("(<<>>)", "<strong>").replace("(<<>>)", "</strong>")
            }
            mytitlevalue = temptextval;
            if (mytitlevalue.length > 0) {
                return $SUL("<li>").append($SUL("<a>" + ((mytitlevalue.length > 0) ? mytitlevalue : item.v) + "</a>").attr("style", "color:black")).appendTo(ul)
            }
        };
        $SUL("#sul_gblsearchb").bind("click", function (e) {
            SearchRedirect()
        })
    }
};

function SearchRedirect() {
    var city = $SUL(".dropdownSearch-value").val();
    var host = "www.Sulekha.com";
    var hos = window.location.host;
    if (!SulHeader.Common.isEmptyParam(window.location.host)) {
        host = window.location.host
    }
    if ($SUL("#sul_gblsearchiv1").val() === "Enter Keyword") {
        alert("Enter keywords to search.")
    } else {
        if ($SUL("#sul_gblsearchiv1").val().length > 0 && mytempurl == "") {
            try {
                _gaq.push(["_trackEvent", "NHP-SEARCH", "Search_SearchButtonClick", oldsearchval + "^http://search.Sulekha.com/Sulekhasearch.aspx^" + city]);
                _gaq.push(["_trackEvent", "NHP-SEARCH", "Search_Returns", Userid + "^" + oldsearchval + "^http://search.Sulekha.com/Sulekhasearch.aspx^" + city])
            } catch (e) { }
            window.location.href = "http://search.Sulekha.com/Sulekhasearch.aspx?loc=" + city + "&ref=" + hos + "&txtsearch=" + $SUL("#sul_gblsearchiv1").val()
        } else {
            alert("Enter keywords to search.")
        }
    }
}
$SUL(document).ready(function () {
    Sulekha.Auth.CallBack_Success = "fnPageReload"
});

function fnPageReload() {
    window.location.reload()
} !function (h) {
    var f = "[data-toggle=dropdown]",
        g = function (a) {
            var b = h(a).on("click.dropdown.data-api", this.toggle);
            h("html").on("click.dropdown.data-api", function () {
                b.parent().removeClass("open")
            })
        };
    g.prototype = {
        constructor: g,
        toggle: function (a) {
            var b = h(this),
                c, d;
            if (b.is(".disabled, :disabled")) {
                return
            }
            c = k(b);
            d = c.hasClass("open");
            l();
            if (!d) {
                c.toggleClass("open");
                b.focus()
            }
            return false
        },
        keydown: function (b) {
            var c, a, n, d, e, m;
            if (!/(38|40|27)/.test(b.keyCode)) {
                return
            }
            c = h(this);
            b.preventDefault();
            b.stopPropagation();
            if (c.is(".disabled, :disabled")) {
                return
            }
            d = k(c);
            e = d.hasClass("open");
            if (!e || (e && b.keyCode == 27)) {
                return c.click()
            }
            a = h("[role=menu] li:not(.divider) a", d);
            if (!a.length) {
                return
            }
            m = a.index(a.filter(":focus"));
            if (b.keyCode == 38 && m > 0) {
                m--
            }
            if (b.keyCode == 40 && m < a.length - 1) {
                m++
            }
            if (! ~m) {
                m = 0
            }
            a.eq(m).focus()
        }
    };

    function l() {
        k(h(f)).removeClass("open")
    }

    function k(a) {
        var c = a.attr("data-target"),
            b;
        if (!c) {
            c = a.attr("href");
            c = c && /#/.test(c) && c.replace(/.*(?=#[^\s]*$)/, "")
        }
        b = h(c);
        b.length || (b = a.parent());
        return b
    }
    h.fn.dropdown = function (a) {
        return this.each(function () {
            var b = h(this),
                c = b.data("dropdown");
            if (!c) {
                b.data("dropdown", (c = new g(this)))
            }
            if (typeof a == "string") {
                c[a].call(b)
            }
        })
    };
    h.fn.dropdown.Constructor = g;
    h(function () {
        h("html").on("click.dropdown.data-api touchstart.dropdown.data-api", l);
        h("body").on("click.dropdown touchstart.dropdown.data-api", ".dropdown form", function (a) {
            a.stopPropagation()
        }).on("click.dropdown.data-api touchstart.dropdown.data-api", f, g.prototype.toggle).on("keydown.dropdown.data-api touchstart.dropdown.data-api", f + ", [role=menu]", g.prototype.keydown)
    })
} (window.jQuery);
!function (c) {
    var d = function (a, b) {
        this.$element = c(a);
        this.options = c.extend({}, c.fn.button.defaults, b)
    };
    d.prototype.setState = function (k) {
        var a = "disabled",
            m = this.$element,
            l = m.data(),
            b = m.is("input") ? "val" : "html";
        k = k + "Text";
        l.resetText || m.data("resetText", m[b]());
        m[b](l[k] || this.options[k]);
        setTimeout(function () {
            k == "loadingText" ? m.addClass(a).attr(a, a) : m.removeClass(a).removeAttr(a)
        }, 0)
    };
    d.prototype.toggle = function () {
        var a = this.$element.closest('[data-toggle="buttons-radio"]');
        a && a.find(".active").removeClass("active");
        this.$element.toggleClass("active")
    };
    c.fn.button = function (a) {
        return this.each(function () {
            var b = c(this),
                g = b.data("button"),
                h = typeof a == "object" && a;
            if (!g) {
                b.data("button", (g = new d(this, h)))
            }
            if (a == "toggle") {
                g.toggle()
            } else {
                if (a) {
                    g.setState(a)
                }
            }
        })
    };
    c.fn.button.defaults = {
        loadingText: "loading..."
    };
    c.fn.button.Constructor = d;
    c(function () {
        c("body").on("click.button.data-api", "[data-toggle^=button]", function (a) {
            var b = c(a.target);
            if (!b.hasClass("btn")) {
                b = b.closest(".btn")
            }
            b.button("toggle")
        })
    })
} (window.jQuery);
$SUL(document).ready(function () {
    $SUL(".navbar-inverse .dropdown-toggle").hover(function () {
        $SUL(this).parent().addClass("open")
    }, function () {
        $SUL(this).next().hover(function () {
            $SUL(this).parent().addClass("open")
        }, function () {
            $SUL(this).parent().removeClass("open")
        });
        $SUL(this).parent().removeClass("open")
    })
	
	if($SUL('.secondary-nav-container').size()==0){
                                                $SUL('body').addClass('no-secondary-nav');
                                }
                                if(navigator.userAgent.match(/msie|trident/i)){
                                                $SUL('#divheader').mouseover(function(){
                                                                $SUL('.header-search input').blur();
                                                })
                                }

}); 