<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="wxw">

<title>四六级成绩查询 | csxyxzs</title>

<!-- Bootstrap core CSS -->
<link href="/csxyxzs-master/Public/Css/bootstrap.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="/csxyxzs-master/Public/Css/main.css" rel="stylesheet">

<script type="text/javascript" src="/csxyxzs-master/Public/Js/jquery-1.12.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("button").click(function(){
      var zkzh = $("#inputText1").val();
      var name = $("#inputText2").val();
      var openid = $("#inputOpenid").val();
      if(zkzh.length != 0 && zkzh != "" && name.length != 0 && name != ""){
      $.post("/csxyxzs-master/index.php/Home/Campus/queryCet",
        {
          'zkzh':zkzh,
          'name':name,
        },
        function(data,status){
        var array = data.split(",");   //按,分割存入数组
        //alert(array[0]);
            if(array[0] == '201'){
                $("#p-show").css("display", "none");
                $("#error-show").css("display", "");
                $("#al-show").css("display", "none");
                $("#school-show").css("display", "none");
            }else if(array[0] == '200'){
                $("#p-show").css("display", "none");
                $("#error-show").css("display", "none");
                $("#al-show").css("display", "");
                $("#school-show").css("display", "none");
                $("#cet_name").text(array[1]);
                $("#cet_school").text(array[2]);
                $("#cet_type").text(array[3]);
                $("#cet_num").text(array[4]);
                $("#cet_time").text(array[5]);
                $("#cet_total").text(array[6]);
                $("#cet_tl").text(array[7]);
                $("#cet_yd").text(array[8]);
                $("#cet_xzfy").text(array[9]);
            }else{
                $("#p-show").css("display", "none");
                $("#error-show").css("display", "none");
                $("#al-show").css("display", "none");
                $("#school-show").css("display", "");
            }
        });
      return false;
      }
});    
});
</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">

  <!-- <form action="/csxyxzs-master/index.php/Home/Campus/doLogin" type="post" class="form-signin" > -->
  <form class="form-signin" >
    <img src="/csxyxzs-master/Public/Image/cet.png" class="img-responsive center-block" alt="大连理工大学城市学院">
    <div class="form-waring" style="visibility:hidden;" id="p-show" >
      <p></p>
    </div>
    <div class="form-waring" style="display: none;" id="error-show" >
      <p>没有查到成绩信息，请确认姓名和准考证号！</p>
    </div>
    <div class="form-waring" style="display: none;" id="al-show" >
    <table class="table table-bordered">
       <tbody>
         <tr>
          <th>姓名</th>
          <td id="cet_name"></td>
         </tr>
         <tr>
          <th>学校</th>
          <td id="cet_school"></td>
         </tr>
         <tr>
          <th>考试类别</th>
          <td id="cet_type"></td>
         </tr>
         <tr>
          <th>准考证号</th>
          <td id="cet_num"></td>
         </tr>
         <tr>
          <th>考试时间</th>
          <td id="cet_time"></td>
         </tr>
         <tr>
          <th>总分</th>
          <td id="cet_total"></td>
         </tr>
         <tr>
          <th>听力</th>
          <td id="cet_tl"></td>
         </tr>
         <tr>
          <th>阅读</th>
          <td id="cet_yd"></td>
         </tr>
         <tr>
          <th>写作与翻译</th>
          <td id="cet_xzfy"></td>
         </tr>
       </tbody>
    </table>
    </div>
    <div class="form-waring" style="display: none;" id="school-show" >
      <p>查询接口出错，希望可以加入QQ308407868反馈群告诉给我们，我们会为大家尽快处理，谢谢支持。</p>
    </div>
    <label for="inputText" class="sr-only">准考证号</label>
    <input name="zkzh" id="inputText1" class="form-control" placeholder="准考证号" required="" autofocus="" type="text">
    <label for="inputText" class="sr-only">姓名</label>
    <input name="name" id="inputText2" class="form-control" placeholder="姓名" required="" type="text">
    <p></p>
    <button class="btn btn-lg btn-default btn-block" type="submit">查询</button>

  <div class="p-record">
    <p>城院小助手. ©Copyright 2016 csxyxzs.</p>
  </div>
  <div class="row">
      <div class="col-sm-12 text-center">
        <p>怕忘记准考证号?<a href="/csxyxzs-master/index.php/Home/Campus/saveCetView/auth/<?php echo ($auth); ?>" class="text-primary m-l-5 save" styles=""><b>点击这里保存</b></a></p>
      </div>
  </div>
    <div class="form-waring" id="al-show" >
    <table class="table table-condensed">
       <tbody>
       <?php if(is_array($zkzh)): $i = 0; $__LIST__ = $zkzh;if( count($__LIST__)==0 ) : echo "没有保存考号" ;else: foreach($__LIST__ as $key=>$zo): $mod = ($i % 2 );++$i;?><tr>
             <th class="text-center"><?php echo ($zo["name"]); ?></th>
            <td class="text-center"><?php echo ($zo["zkzh"]); ?></td>
           </tr><?php endforeach; endif; else: echo "没有保存考号" ;endif; ?>
       </tbody>
    </table>
    </div>
  </form>
</div> <!-- /container -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--<script src="ie10-viewport-bug-workaround.js"></script>-->
<script type="text/javascript">
(function () {
 'use strict';
 if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
 var msViewportStyle = document.createElement('style')
 msViewportStyle.appendChild(
   document.createTextNode(
     '@-ms-viewport{width:auto!important}'
     )
   )
 document.querySelector('head').appendChild(msViewportStyle)
 }
 })();
</script>

</body>
</html>