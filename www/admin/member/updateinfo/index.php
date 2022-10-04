<?php  
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/head.php";
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
?>

<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>회원정보변경</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name" align="center">비밀번호를 입력해주세요</div>
        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <form class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" class="form-control" id="password" placeholder="password">
                    <div class="input-group-append">
                        <button type="button" class="btn" id="enterbtn">
                        <!-- "location.replace('/admin/member/updateinfo.php')" -->
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/tail.php";
?>

<script>
   $(document).ready(function(){
        $("#enterbtn").click(function(){
            $.ajax({
                url:"/admin/member/updateinfo/checkpw.php",
                type :"post",
                data:{pw:$("#password").val()},
                dataType :'text',
                success: function(data){
                    if($("#password").val()==data)
                    {
                        location.replace('/admin/member/updateinfo/updateinfo.php');
                    }
                    else
                    {
                        alert("비밀번호를 입력해주세요");
                        console.log(data);
                    }
                },
            }); 
        });
    });
</script>