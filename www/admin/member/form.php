<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/head.sub.php";
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/session.php";
?>
<body class="hold-transition register-page">
<div class="register-box m-auto">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>회원등록</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">회원등록을 진행합니다.</p>

      <form id="member_form" name = "member_form" action="/admin/member/insert.php" method="post">
      <div class="input-group mb-3 d-flex">
          <input type="text" class="form-control" placeholder="ID" id="id" name="id" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-id-badge"></span>
            </div>
            <span style="color:#ff0000">*</span>
          </div>
          <input type="button" class="btn btn-sm btn-primary btn-block" id="chkbtn" value = "중복여부" onclick="checkUserId_tmp(member_form.id.value)">
          
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="pwd" name="pwd" onblur="checkPassword()" disabled required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            <span style="color:#ff0000">*</span>
          </div>
        </div>
        <p id="p_pwd" style="color:#ff0000"></p>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" id="chkpwd" name="chkPwd" onblur="checkPassword()" disabled required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            <span style="color:#ff0000">*</span>
          </div>
        </div>
        <p id="p_chkpwd" style="color:#ff0000"></p>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NAME" id="name" name="name" onblur="checkName(this.value)" disabled required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            <span style="color:#ff0000">*</span>
          </div>
        </div>
        <p id="p_name" style="color:#ff0000"></p>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NICKNAME" id="nickName" name="nickName"  onblur="checkNick(this.value)"disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <p id="p_nick" style="color:#ff0000"></p>

        <div class="input-group mb-3">
          <input type="tel" class="form-control" placeholder="PhoneNumber" id="phoneNum" name="phoneNum" oninput="autoHyphen2(this)" maxlength="13"  onblur="checkPhone(this.value)" disabled required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-mobile"></span>
            </div>
            <span style="color:#ff0000">*</span>
          </div>
        </div>
        <p id="p_phone" style="color:#ff0000"></p>

        <div class="input-group mb-3">
          <input type="tel" class="form-control" placeholder="기타연락처" id="etcNum" name="etcNum" oninput="autoHyphen2(this)" maxlength="13" onblur="checkEtc(this.value)" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-phone"></span>
            </div>
          </div>
        </div>
        <p id="p_etc" style="color:#ff0000"></p>

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" onblur="checkemail(this.value)" disabled required>
          <input type="hidden" class="level" value="100">
          <input type="hidden" class="approve" value="N">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
            <span style="color:#ff0000">*</span>
          </div>
        </div>
        <p id="p_email" style="color:#ff0000"></p>

        <div class="input-group mb-3">
          <label><input type="checkbox" id="level" name="level" onclick="doOpenCheck(this)" value="100">&nbsp일반고객&nbsp</label>
          <label><input type="checkbox" id="level" name="level" onclick="doOpenCheck(this)" value="200">&nbsp관리고객</label>
        </div>

        <div class="input-group mb-3">
          <label>승인여부 &nbsp&nbsp</label>
          <select id="apprve" name="apprve" size="1">
            <option value="Y">승인</option>
            <option value="N">비승인</option>
          </select>
        </div>

          <div class="col-4">
            <input type="button" class="btn btn-primary btn-block" onclick="checkAll()" id="btn1" value="회원등록">
          </div>
        </div>

      </form>
      </div>
    </div>
  </div>
</div>
</body>


<script>
    const autoHyphen2 = (target) => {
        target.value = target.value
        .replace(/[^0-9]/g, '')
        .replace(/^(\d{0,3})(\d{0,4})(\d{0,4})$/g, "$1-$2-$3").replace(/(\-{1,2})$/g, "");
        }
    function checkAll(){
        if(!checkUserId(member_form.id.value))
        {
            return false;
        }
        if(!checkPassword())
        {
            return false;
        }
        if(!checkName(member_form.name.value))
        {
            return false;
        }
        if(!checkNick(member_form.nickName.value))
        {
            return false;
        }
        if(!checkPhone(member_form.phoneNum.value))
        {
            return false;
        }
        if(!checkEtc(member_form.etcNum.value))
        {
            return false;
        }
        if(!checkemail(member_form.email.value))
        {
            return false;
        }
        if(!checklevel(member_form.level.value))
        {
          return false;
        }
        var myform = document.getElementById("member_form");
        document.getElementById("btn1").addEventListener("click",function(){
            myform.submit();
        });

        return true;
    }

    function checkExist(value,data){
        if(value == "")
        {
            alert(data +" 입력하시오");
            return false;
        }
        return true;
    }

    var num = /[0-9]/;
    var eng = /[a-zA-Z]/;
    var special = /[~!@#$%^&*()_+|<>?:{}]/;
    var kor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;


    function checkUserId(id){
        if(!checkExist(id,"아이디"))
            return false;

        var id_c = /^[A-Za-z]{1}[a-z0-9]{3,12}$/;
        if(!id_c.test(id))
        {
            alert("영문 소문자, 숫자 4~12로 입력하세요");
            member_form.id.value="";
            member_form.id.focus();
            return false;
        }
        return true;
    }

    function checkPassword(id, pw1, pw2){
      var pw = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,20}$/;
        var pw1 = member_form.pwd.value;
        var pw2 = member_form.chkPwd.value;
        if(pw1.length==0)
        {
          checkText="비밀번호를 입력해주세요";
          $("#p_pwd").html(checkText);
          $("#p_pwd").addClass("vali");
          return false;
        }
        $("#p_pwd").html("");
        if(!pw.test(pw1))
        {
          checkText="비밀번호를 영문 대소문자, 숫자 8~20자리 입력하세요";
          $("#p_pwd").html(checkText);
          setTimeout(function(){
            member_form.pwd.value.value="";
            member_form.pwd.focus();
          },10);
          return false;
        }
        $("#p_pwd").html("");

        if(pw2.length==0)
        {
          checkText="비밀번호를 입력해주세요";
          $("#p_chkpwd").html(checkText);
          return false;          
        }
        $("#p_chkpwd").html("");

        if(pw1!=pw2)
        {
          checkText="입력한 비밀번호가 옳지 않습니다.";
          $("#p_chkpwd").html(checkText);
          setTimeout(function(){
            member_form.chkPwd.value.value="";
            member_form.chkPwd.focus();
          },10);
          return false;
        }
        // if(id==pw1)
        // {
        //     alert("아이디 비번은 달라야합니다.");
        //     member_form.pwd.value.value =  "";
        //     member_form.chkPwd.value="";
        //     member_form.chkPwd.focus();
        //     return false;
        // }
        $("#p_chkpwd").html("");
        return true;
    }

    function checkName(name)
    {
        if(name.length==0)
        {
          checkText="이름을 입력해주세요";
          $("#p_name").html(checkText);
          return false;
        }
        $("#p_name").html("");
        var kor = /^[가-힣]{2,}$/;
        if(!kor.test(name))
        {
          checkText="이름을 다시 입력해주세요";
          $("#p_name").html(checkText);
          // alert("이름을 다시 입력해주세요");
          setTimeout(function(){
            member_form.name.value=  "";
            member_form.name.focus();
          },10);
          return false;
        }
        $("#p_name").html("");
        return true;
    }

    function checkNick(nick)
    {
        if(!nick)
        {
            return true;
        }
        else
        {
            if(!checkExist(nick,"별명"))
                return false;
            var kor = /^[가-힣a-zA-Z0-9]{3,}$/;
            if(!kor.test(nick))
            {
                checkText="닉네임을 다시 입력해주세요";
                $("#p_nick").html(checkText);
                member_form.nickName.value=  "";
                member_form.nickName.focus();
                return false;
            }
            $("#p_nick").html("");
            return true;
        }
    }

    function checkPhone(phone)
    {   
        if(phone.length==0)
        {
            checkText="전화번호를 입력해주세요";
            $("#p_phone").html(checkText);
            return false;
        }
        $("#p_phone").html("");

        if(!num.test(phone))
        {
          checkText="전화번호를 다시 입력해주세요";
          $("#p_phone").html(checkText);
          setTimeout(function(){
            member_form.phoneNum.value="";
            member_form.phoneNum.focus();
          },10);
          return false;
        }
        $("#p_phone").html("");
        return true;
    }

    function checkEtc(etc)
    {   
        if(!etc)
        {
            return true;
        }
        else
        {
            if(etc.length==0)
            {
              checkText="기타 연락처를 입력해주세요"
              $("#p_etc").html(checkText);
              return false;
            }
            $("#p_etc").html("");
            if(!num.test(etc))
            {
                checkText="기타연락처를 다시 입력해주세요";
                $("#p_etc").html(checkText);
                member_form.etcNum.value="";
                member_form.etcNum.focus();
                return false
            }
            $("#p_etc").html("");
            return true
        }
    }

    function checkemail(mail)
    {   
        var email = /^[A-Za-z0-9_]+[A-Za-z0-9]*[@]{1}[A-Za-z0-9]+[A-Za-z0-9]*[.]{1}[A-Za-z]{1,3}$/;
        if(mail.length==0)
        {
          checkText="이메일을 입력해주세요";
          $("#p_email").html(checkText);
          return false;
        }
        $("#p_email").html("");
        if(!email.test(mail))
        {
          checkText="옳바른 이메일 형식이 아닙니다.";
          $("#p_email").html(checkText);
          setTimeout(function(){
            member_form.email.value="";
            member_form.email.focus();
          },10);
          return false;
        }
        $("#p_email").html("");
        return true;
    }

    function checklevel(level)
    {
      var cnt = $("input:checkbox[name='level']:checked").length;
      if(cnt<1)
      {
        alert("고객 유형을 선택해주세요");
        return false;
      }
      return true;
    }
    function doOpenCheck(chk){
        var obj = document.getElementsByName("level");
        for(var i=0; i<obj.length; i++){
            if(obj[i] != chk){
                obj[i].checked = false;
            }
        }
    }
   function checkUserId_tmp(id){
        if(!checkExist(id,"아이디"))
            return false;

        var id_c = /^[A-Za-z]{1}[a-z0-9]{3,12}$/;
        if(!id_c.test(id))
        {
            alert("아이디를 영문 소문자, 숫자 4~12로 입력하세요");
            member_form.id.value="";
            member_form.id.focus();
            return false;
        }
        $.ajax({
                url:"/admin/login/register/check.php",
                type :"post",
                data:{id:$("#id").val()},
                dataType :'text',
                success: function(data){
                    if(data==0)
                    {
                      alert("사용가능한 아이디입니다.")
                      $('input').prop('disabled',false);
                    }
                    else
                    {
                      alert("아이디가 중복되었습니다.");
                    }
                },
            }); 
        return true;
    }
</script>

<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/tail.php";
?>