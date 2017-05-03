<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name=description content="Hello, This is a simsimi api test." />
  <meta name=author content="Roldhan Dasalla(iNew Works)" />
  <meta property=og:url content=http://project.roldhandasalla.com/simsimi/ />
  <meta property=og:type content=website />
  <meta property=og:title content="Simsimi Api test" />
  <meta property=og:image content="http://i.imgur.com/hzVrYrf.jpg" />
  <meta property=og:description content="Hello, This is a simsimi api test." />
  <meta property=profile:first_name content="Roldhan Dasalla(iNew Works)" />
  <title>Simsimi Api Test</title>
  <link href="http://checkthisfucking.cc/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link href="http://checkthisfucking.cc/bower_components/AdminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="http://checkthisfucking.cc/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="skin-blue" style="background:#eee">
  <div class="login-box">
    <div class="login-logo">
      <a href="/">
        <b>Simsimi</b> API Test
        <div style="font-size:11px;margin:-5px 0px 0px 0px;">SHARING IS CARING</div>
      </a>
    </div>
    <div class="login-box-body" style="padding:0px">
      <div class="box box-danger direct-chat direct-chat-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Start Talking</h3>
        </div>
        <div class="box-body">
          <div class="direct-chat-messages" id="myBox"></div>
        </div>
        <div class="box-footer">
          <form method="post" class="simsim">
            <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." autocomplete="off" disabled value="Loading...." class="form-control">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-danger btn-flat">Send</button>
                </span>
            </div>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
    </div>
  </div>
  <script src="http://checkthisfucking.cc/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="http://checkthisfucking.cc/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="http://checkthisfucking.cc/bower_components/AdminLTE/dist/js/app.min.js" type="text/javascript"></script>
  <script src="http://checkthisfucking.cc/bower_components/AdminLTE/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(window).load(function(){
      Dhan.init();
      $('form.simsim').submit(function(){
        $('input[name="message"]').prop('disabled',true);
        $.ajax({
          url : 'request.php',
          type : 'POST',
          dataType : 'JSON',
          data : { msg : $('input[name="message"]').val() },
          success : function(res){
            Dhan.myBox($('input[name="message"]').val());
            Dhan.simBox(res.msg,res.time);
            $('input[name="message"]').prop('disabled',false).val('').focus();
            var objDiv = document.getElementById("myBox");
            objDiv.scrollTop = objDiv.scrollHeight;
          }
        });
        return false;
      });
    });
    var Dhan = {
      init : function(){
        $.ajax({
          url : 'request.php',
          type : 'POST',
          dataType : 'JSON',
          data : { msg : 'hello' },
          success : function(res){
            Dhan.simBox(res.msg,res.time);
            $('input[name="message"]').prop('disabled',false).val('').focus();
          }
        });
      },
      simBox : function(msg,time){
        x = '';
        x = x + '<div class="direct-chat-msg">';
        x = x + '<div class="direct-chat-info clearfix">';
        x = x + '<span class="direct-chat-name pull-left">Simsimi</span>';
        x = x + '<span class="direct-chat-timestamp pull-right">'+time+'</span>';
        x = x + '</div>';
        x = x + '<img class="direct-chat-img" src="http://www.simsimi.com/image/simsimi_logo_1.4k.png" alt="Message User Image">';
        x = x + '<div class="direct-chat-text">';
        x = x + Dhan.stripper(msg);
        x = x + '</div>';
        x = x + '</div>';
        $('div.direct-chat-messages').append(x);
      },
      myBox : function(msg,time){
        x = '';
        x = x + '<div class="direct-chat-msg right">';
        x = x + '<div class="direct-chat-info clearfix">';
        x = x + '<span class="direct-chat-name pull-right">You</span>';
        x = x + '<span class="direct-chat-timestamp pull-left">'+time+'</span>';
        x = x + '</div>';
        x = x + '<img class="direct-chat-img" src="http://i718.photobucket.com/albums/ww186/itaktakmo_2009/supergoyo0oy.jpg" alt="Message User Image">';
        x = x + '<div class="direct-chat-text">';
        x = x + Dhan.stripper(msg);
        x = x + '</div>';
        x = x + '</div>';
        $('div.direct-chat-messages').append(x);
      },
      stripper : function(text,allowed){
        allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
        var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
            commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
        return text.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
            return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
        });
      }
    }
  </script>
</body>

</html>
