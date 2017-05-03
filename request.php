<?php
date_default_timezone_set('Asia/Manila');
function req($msg){
  $msgs = file_get_contents('http://www.simsimi.com/getRealtimeReq?uuid=vwCqh2UmzoXCx3N9XG7g9NnlzFbbCXci0ZVhxvHiaQV&lc=en&ft=1&reqText='.urlencode($msg).'&status=W');
  $msgs = str_replace('"', '', $msgs);
  $msgs = explode(',',$msgs);
  $msgg = str_replace(array('respSentence:','}','\n'),array('','',''),$msgs[1]);
  return json_encode(array(
    'msg' => $msgg,
    'time' => date('d M h:i A',time())
  ));
}
echo req(strip_tags($_POST['msg']));
?>
