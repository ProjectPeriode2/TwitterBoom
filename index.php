<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
        $(document).ready(function() {
        	function getFeed(username){
        		//$('#leftcontainer #feed').empty();
        		$('#overlay').fadeIn(700);
                
                $.ajax({
                    url: 'api.php',
                    type: 'POST',
                    data: { 
                    	username : username
                    },
                    dataType: 'json'
                })
                .done(function(data) {

        			$('#overlay').fadeOut(700, function() {

                        $('#leftcontainer #feed').empty();
	                	console.log(data);
	                    $('#username').text(data.name);
	                    $('#mention').text('@' + data.username);
	                    $('#mainimage').attr("src",data.profilePicture);
	                    $('#mainfollowers').text(data.followersCount);
	                    
	                    var friendsDiv = $('#leftcontainer #feed'); //friends or //leftcontainer
	                    
	                    for(var i = 0, j = data.friends.length; i < j; ++i) {
	                        //friendsDiv.append('<div class="profile">' + data.friends[i].username + ' <img src="' + data.friends[i].profilePicture + '" />- ' + data.friends[i].followersCount + '</div>');
	                        friendsDiv.append('<div class="profile" data-username="' + data.friends[i].username + '"><img src="' + data.friends[i].profilePicture + '"/><p class="bolder">' + data.friends[i].name + '</p><p>@' + data.friends[i].username + '</p><p>' + data.friends[i].followersCount + '</p></div>');
	                	}

                	});
                });
        	}

        	$('#feed').on('click', '.profile', function(){
        		getFeed($(this).attr('data-username'));
        	});

            $('#searchForm').on('submit', function(event) {
                event.preventDefault();
                getFeed($('#usernameSearch').val());
            });
        });
    </script>
</head>
<body>
	
<header>

    <div id="searchcontainer">       
        <form id="searchForm">
        	<input type="text" id="usernameSearch" placeholder="username" />
        	<input type="submit" value="search" />
    	</form>
    </div>

	<img src="images/logo.png">
</header>

<div id="container">
	<!--
	Follower Images
	-Functie om profielfotos op te halen en te weergeven dmv een loop.
	-->
	<div id="leftcontainer">
	<div id="feed">
	</div>
	<div id="overlay">
		<img src="images/loading.gif" />
	</div>
	</div>
	<!--
	User info
	-Functie om profiel foto en informatie op te halen, evenals tweets.
	-->
	<div id="rightcontainer">
		<div id="user">
			<img id="mainimage" src="images/2.jpg"/>
			
			<p class="bolder" id="username" class="name">...</p>
			<p id="mention" class="twitter_name">...</p>
			<p id="mainfollowers" class="followers">followers: 350</p>

		</div>

		<div id="tweets">
			<h2>Tweets</h2>
			<section>
				<img src="https://pbs.twimg.com/profile_images/1711576991/ja_uhmm_ik_normal.jpg">
				<p>‏
				<span>@dhrsantan</span> <br/>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non sapien commodo, sodales urna ut, bibendum mi. In faucibus congue lacus nec
				</p>
			</section>
		</div>
	</div>

</div>

<footer>
		<section>
			<p>Gemaakt door:<br/>
				Andy Born<br/>
				Jules Tackács<br/>
				koen hoeijmakers<br/>
				Ruben Hamers<br/>
			</p>
		</section>
</footer>

</body>
</html>