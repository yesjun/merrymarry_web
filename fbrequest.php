<?php
// PATH TO THE FB-PHP-SDK
require_once 'application/libraries/facebook.php';
$facebook = new Facebook(array(
  'appId'  => '264356413666395',
  'secret' => '5fe392a31a81deefb86c10755fb0fb51'
));
 
$user = $facebook->getUser();
$loginUrl = $facebook->getLoginUrl();
 
if ( empty($user) ) {
    echo("<script> top.location.href='" . $loginUrl . "'</script>");
    exit();
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>How To: Send An Application Request Using The Facebook Graph API - MasteringAPI.com</title>
</head>
<body>
<div id="fb-root"></div>
<pre>
FB.UI 자바스크립트를 사용해 dialog를 이용하는 경우에는 리퀘스트를 가져올 수 있었습니다.
페북 문서에서는 form 항목이 없는 요청을 app to user 리퀘스트로 판단하는 것 같습니다.
http://developers.facebook.com/docs/requests/#app_to_user

그리고 Graph API를 사용하면 무조건 app to user 리퀘스트로 요청한다고 합니다.
http://developers.facebook.com/docs/reference/api/user/#apprequests
Create

You can post a apprequest for a user by issuing an HTTP POST request to /USER_ID/apprequests with the app access_token.

Note: POSTing to the Graph API endpoint of /USER_ID/apprequests is considered an App to User Request. App-Generated Requests do not receive notifications and get limited distribution in comparison to User to User Requests sent with the Request Dialog

Name	Description	Type	Required
message	A UTF-8 string which describes the request.	string	yes
data	Additional data a developer may pass for tracking. This will be stored as part of the request objects created. The maximum length is 255 characters.	string	no
If the create is successful, you get the following response

Description	Type
request	
The Request Object ID. To get the full request ID, concatenate this with a User ID from the to field: ‘&lt;request_object_id&gt;_&lt;user_id&gt;’
to	
An array of the recipient user IDs for the request that was created.

현 페이지에서는 dialog를 사용하여 테스트해 볼 수 있는데.
해당 항목을 넣고 'send'를 누르면 2번째 alert창에 
user:&lt;유저아이디&gt;,&lt;리퀘스트아이디&gt;
형식으로 표시되면 &lt;리퀘스트아이디&gt;를 복사하여
http://web.merrymarry.me/?fb_source=notificationa&amp;request_ids=&lt;리퀘스트아이디&gt;&amp;ref=notif&amp;app_request_type=user_to_user&amp;notif_t=app_request
해당 URL에 넣으면 테스트 해볼 수 있습니다.
</pre>
eventid:<input id="eventid" type="text" value="100001374129716&100002993798580" />
regdate:<input id="regdate" type="text" value="2012-06-18T10:10:36.389Z" />
<br/>("eventid":"100001374129716&amp;100002993798580","regdate":"2012-06-18T10:10:36.389Z")<br/>
<a href="#">Send your friends a request!</a>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '264356413666395',
            status: true,
            cookie: true,
            oauth: true
        });
    };
  
    $('a').click(sendRequest);
    function sendRequest() {
    	alert('sendRequest');
        FB.ui({
            method: 'apprequests',
            message: 'I want to give you this flower!',
            title: 'Give a flower to some of your friends',	
            data: '{"eventid":"'+$('#eventid').val()+'","regdate":"'+$('#regdate').val()+'"}'
        },
        function (response) {
            alert(response);
            if (response.request && response.to) {
                var request_ids = [];
                for(var i=0; i<response.to.length; i++) {
                    var temp = response.request + '_' + response.to[i];
                    request_ids.push(temp);
                }
                var requests = request_ids.join(',');
                alert('user:'+'<?php echo $user; ?>,'+'response:'+requests);
                $.post('index.php',{uid: <?php echo $user; ?>, request_ids: requests},function(resp) {
                    // callback after storing the requests
                });
            } else {
                alert('canceled');
            }
        });
        return false;
    }
  
      // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
</script>
  
</body>
</html>