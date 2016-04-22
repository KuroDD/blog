<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
	<script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
</head>
<body>
	<header class="">
		<div class="left" >
			<ul class="list-group">
				<li><a href="/blog">Home page</a></li>
				<li><a href="/blog/create">Create Post</a></li>
				<li></li>
			</ul>
		</div>
		<div class="right">
			<form action="/blog/search" method="get" class="form-inline">
				<input class="form-control" type="text" name="search" placeholder="type somthing">
				<input type="submit" value="search" class="btn btn-success">
			</form>
		</div>
	</header>
	<div class="side-bar">
		<div class="page-header" align="center">
	    	<h1>Web Chat</h1>      
	  	</div>
	  	<div id='messagesDiv'></div>
	    <div align="center">
		    <form role="form" id="form_1">
			    <div align="center">
			      <label for="nameInput">Your name:</label>
			      <input type="name" id='nameInput' placeholder="Your name">
			    </div>
			    <div class="form-group" align="center">
			      <label for="messageInput">Message:</label>
			      <input type="message" id="messageInput" placeholder="Enter message">
			    </div>
			    <button button type="button" class="btn btn-success" id="input">Enter</button>
			    <button button type="button" class="btn btn-warning" id="clear">Clear</button>
			    </div>
		    </form>
	    <hr>
	    <div align="center" id="footer">
	    	Made by Duongdt
	    	<a href="" id="delete">@</a>
	    </div>
	</div>

	@yield('content')

	<footer class="footer">
		<p>blog page make by duong dt</p>
	</footer>
	<script>
      var myDataRef = new Firebase('https://blistering-inferno-1760.firebaseio.com/');
      $('#input').click(function () {
      	var name = $('#nameInput').val();
        var text = $('#messageInput').val();
        checkinfo(name, text);      	    	    
      });
      $('#clear').click(function(){
          $('#messagesDiv').empty();
      });
      $('#messageInput').keypress(function (e) {
        if (e.keyCode == 13) {
          var name = $('#nameInput').val();
          var text = $('#messageInput').val();
          checkinfo(name, text)
        }
      });
      $('#delete').click(function(){
      	myDataRef.remove();
      })
      myDataRef.on('child_added', function(snapshot) {
        var message = snapshot.val();
        displayChatMessage(message.name, message.text);
      });
      function checkinfo(name, text){
      	if (name == "" || name == null) { 
      		alert("Must enter your name");
      	}else if (text == "" || text == null) {
      		alert("Must enter some message");
      	}else{
      		myDataRef.push({name: name, text: text});
      		$('#messageInput').val('');
      	};
      };
      function displayChatMessage(name, text) {
      	var dt = new Date();
      	if (dt.getMinutes() < 10) {
      		var time = dt.getHours() + ":0" + dt.getMinutes();
      	}else if (dt.getHours() < 10) {
			var time = "0" + dt.getHours() + ":" + dt.getMinutes();
      	}else{
      		var time = dt.getHours() + ":" + dt.getMinutes();
      	};
		  var time = dt.getHours() + ":" + dt.getMinutes();
        $('<div/>').text(text).prepend($('<strong/>').text(name+': ')).appendTo($('#messagesDiv')).prepend(time + ' - ');
        // $('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
      };
    </script>
</body>
</html>