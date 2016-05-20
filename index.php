<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>bulletinBoard</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>        
		<script type = "text/javascript" src = "jqueryEffects.js"></script>
		<script type="text/javascript">
            var request;
			
            if (window.XMLHttpRequest){
                request=new XMLHttpRequest();
            } else{
                request=new ActiveXObject("Microsoft.XMLHTTP");
            }
			function checkLogin() {
				request.onreadystatechange = function() {
					if (request.readyState == 4 && request.status == 200) {
						document.getElementById("banner").innerHTML=request.responseText;
					}
				}
				request.open("GET", "checkLogin.php", false);
				request.send();
			}
			function send(where) {
				if (where == null) {
					window.location = "index.php?page=home";
				} else {
					window.location = "index.php?page="+where;
				}
			}
			function loadContent() {
				var page = location.search.split('page=')[1];
				if (page == null) {
					page = "home";
				}
				request.onreadystatechange = function() {
					if (request.readyState == 4 && request.status == 200) {
						document.getElementById("content").innerHTML=request.responseText;
					}
				}
				request.open("GET", page+".php", false);
				request.send();
			}
			
			function register() {
				request.onreadystatechange = function() {
						if (request.readyState == 4) {
								document.getElementById("midBox").innerHTML=request.responseText;						
						}
				}
				var user = document.getElementById("user").value;
				var pass = document.getElementById("fpass").value;
				var cpass = document.getElementById("cpass").value;
				var email = document.getElementById("email").value;
				var cemail = document.getElementById("cemail").value;


				var parameters = "user=" + user + "&pass=" + pass + "&cpass=" + cpass + "&email=" + email + "&cemail=" + cemail;
				request.open("POST","registerCheck.php",false);
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				request.send(parameters);
				return false;
            }
			function login() {
                    request.onreadystatechange = function() {
                            if (request.readyState == 4) {
                                    document.getElementById("banner").innerHTML=request.responseText;						
                            }
                    }
                    var user = document.getElementById("luser").value;
                    var pass = document.getElementById("lpass").value;

                    var parameters = "user=" + user + "&pass=" + pass;

                    request.open("POST","login.php",false);
                    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    request.send(parameters);
					checkLogin();
					close_box1();
                    return false;
            }
			
			function logoff() {
				request.open("GET", "logoff.php", false);
				request.send();
				checkLogin();
				loadContent();
			}
			
			function mail() {
				request.onreadystatechange = function() {
						if (request.readyState == 4) {
								document.getElementById("content").innerHTML=request.responseText;						
						}
				}
				var receiver = document.getElementById("receiver").value;
				var subject = document.getElementById("subject").value;
				var body = document.getElementById("body").value;

				var parameters = "receiver=" + receiver + "&subject=" + subject + "&body=" + body;

				request.open("POST","sendMail.php",false);
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				request.send(parameters);
				return false;
			}
			
			function displayMail() {
				request.onreadystatechange = function() {
					if (request.readyState == 4 && request.status == 200) {
						document.getElementById("content").innerHTML=request.responseText;
					}
				}
				request.open("GET", "mail.php", false);
				request.send();
			}
			
			function loadLeftLite(lite) {
				request.onreadystatechange = function() {
					if (request.readyState == 4 && request.status == 200) {
						document.getElementById("box").innerHTML=request.responseText;
					}
				}
				request.open("GET", lite+".php", false);
				request.send();
			}
			
			function loadMidLite(lite) {
				request.onreadystatechange = function() {
					if (request.readyState == 4 && request.status == 200) {
						document.getElementById("midBox").innerHTML=request.responseText;
					}
				}
				request.open("GET", lite+".php", false);
				request.send();
			}
			
			function setLocation(value) {
				document.getElementById("loc").value = value;
			}
			
			function setCategory(value) {
				document.getElementById("cat").value = value;
				loadSubCat(value);
			}
			function loadSubCat(cat) {
				request.onreadystatechange = function() {
					if (request.readyState == 4 && request.status == 200) {
						document.getElementById("subcat").innerHTML=request.responseText;
					}
				}
				var parameters = "cat="+cat;
				request.open("POST", "loadSubCat.php", false);
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				request.send(parameters);
				
			}
			
			function setSubCat(value) {
				document.getElementById("scat").value = value;
			}			

		</script>
	</head>
	<body>
			
		<div id="banner"></div>

		<div id = "content"></div>
		<div class = "backdrop"></div>
		<div id = "box"></div>
		<div id ="midBox"></div>

	<script>
		checkLogin();
		loadContent();
	</script>
	</body>
</html>