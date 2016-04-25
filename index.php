<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
  
    <title>Facebook Connect</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<script src="jquery-1.11.2.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
		// initialize and setup facebook js sdk
			window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '1707162649537669',
		      cookie     : true,  // enable cookies to allow the server to access 
              xfbml      : true,//Extended facebook markup language ,It is for social plugin provided by facebook.
		      version    : 'v2.5'
		    });
		    FB.getLoginStatus(function(response) {
		    	
		    	
		    	if (response.status === 'connected') {
		    		
		    	document.getElementById('login').style.visibility = 'hidden';
		    	FB.api('/me?fields=first_name,last_name,name,id,email,birthday,gender,likes,picture.width(200).height(200)', function(response) {
				alert(response.name);
				alert(response.birthday);
				alert(response.email);
				alert(response.gender);
				document.getElementById('image').innerHTML = "<img src='" + response.picture.data.url + "'>";
				document.getElementById('username').innerHTML=response.name;
				//document.getElementById('bday').innerHTML=response.age_range;
				document.getElementById('email').innerHTML=response.email;
				document.getElementById('gender').innerHTML=response.gender;
			
			

			});
		    	} else if (response.status === 'not_authorized') {
		    	//	document.getElementById('status').innerHTML = 'We are not logged in.'
		 
		    		document.getElementById('usernamed').style.visibility = 'hidden';
					document.getElementById('image').style.visibility = 'hidden';
		    		
		    		
		    	} else {
		    	//	document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	
		    		document.getElementById('usernamed').style.visibility = 'hidden';
					document.getElementById('image').style.visibility = 'hidden';
		    
		    	}
		    });
		
			
		
		
		};
		(function(d, s, id){
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		// login with facebook with extra permissions
		function login() {
			FB.login(function(response) {
				if (response.status === 'connected') {
		    		//document.getElementById('status').innerHTML = 'We are connected.';
		    		document.getElementById('login').style.visibility = 'hidden';
		    		document.getElementById('usernamed').style.visibility = 'visible';
				document.getElementById('image').style.visibility = 'visible';
		    		
		    		FB.api('/me?fields=first_name,last_name,name,id,likes,email,birthday,gender,picture.width(200).height(200)', function(response) {
				document.getElementById('username').innerHTML=response.name;
				document.getElementById('image').innerHTML = "<img src='" + response.picture.data.url + "'>";
				document.getElementById('email').innerHTML=response.email;
			//	document.getElementById('bday').innerHTML=response.age_range;
				document.getElementById('gender').innerHTML=response.gender;
				
				
			
			});
		    	} else if (response.status === 'not_authorized') {
		    		//document.getElementById('status').innerHTML = 'We are not logged in.';
		    		
		    		document.getElementById('usernamed').style.visibility = 'hidden';
					document.getElementById('image').style.visibility = 'hidden';
	
		    		
		    	} else {
		    		//document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	
		    		document.getElementById('usernamed').style.visibility = 'hidden';
					document.getElementById('image').style.visibility = 'hidden';
		    		
		    	}
			}, {scope:  'publish_actions,public_profile,user_birthday'});
		}
		
		// getting basic user info
		function getInfo() {
			
		}
		function submit(){
			
			var message_str= document.getElementById('post').value;
FB.api('/me/feed', 'post', { message: message_str}, function(response) {
  if (!response || response.error) {
    alert('Couldnt Publish Data');
    
  } else {
    alert("Message successfully posted to your wall");
  }
});
			
}
	</script>

    
</head>
<body>

   
   <div class="container " id="emailwa">
        <div class="row text-center" style="padding-top:30px;">
            <div class="col-md-12">
             <h1>  USER PROFILE</h1> 
                <br />
           </div>
        </div>
       <div class="row " style="padding-bottom:50px; ">
           <div class="col-md-3" id="image">
               <div class="img-responsive img-thumbnail" id="image" /></div>
              
           </div>
           <div class="col-md-9">
   

</div>
               <br /><br />
               <hr style="max-width:700px;margin-left:0px;margin-right:0px;">
               <div id="usernamed">
                <h3 ><strong> Name:</strong> <span id="username"></span></h3>  
                  <h3 > <strong id-"genderd"> Gender:</strong><span id="gender"></span> </h3> 
              
                 <h3 >  <strong>  Email: </strong><span id="email"></span></h3>  

              
                
                   <br />
				      <div class="well" style="width:500px;margin-left:295px;"> 
                                  
                                    <h4>What's New</h4>
                                     <div class="form-group" style="padding:14px;">
                                      <textarea class="form-control" placeholder="Update your status" id="post"></textarea>
                                    </div>
                                    <button class="btn btn-primary pull-right"  onclick="submit()">Post</button><ul class="list-inline"><li></li></ul>
                                 
                              </div>
				   </div>
               
                  <button class="btn btn-primary" id="login" onclick="login()" style="position:relative;bottom:400px;left:500px;">Login With Facebook </button>
      
                    
	
	
	
               
           </div>
     
    
       
   
  
</body>
</html>
