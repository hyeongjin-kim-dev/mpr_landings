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
          <input type="text" class="form-control" placeholder="ID" id="id" name="id">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-id-badge"></span>
            </div>
          </div>
          <input type="button" class="btn btn-sm btn-primary btn-block" id="chkbtn" value = "중복여부">
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="pwd" name="pwd">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" id="chkpwd" name="chkPwd">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NAME" id="name" name="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NICKNAME" id="nickName" name="nickName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="tel" class="form-control" placeholder="PhoneNumber" id="phoneNum" name="phoneNum" oninput="autoHyphen2(this)" maxlength="13">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-mobile"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="tel" class="form-control" placeholder="기타연락처" id="etcNum" name="etcNum">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-phone"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

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
        if(!checkPassword(member_form.id.value, member_form.pwd.value, member_form.chkPwd.value))
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
        if(!checkExist(pw1,"비밀번호"))
            return false;
        if(!checkExist(pw2,"비밀번호 재확인을"))
            return false;

        var pw = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,20}$/;

        if(!pw.test(pw1))
        {
            alert("영문 대소문자, 숫자 8~20자리 입력하세요");
            member_form.pwd.value.value="";
            member_form.pwd.focus();
            return false;
        }

        if(pw1!=pw2)
        {
            alert("비번이 다릅니다.");
            member_form.pwd.value =  "";
            member_form.chkPwd.value="";
            member_form.chkPwd.focus();
            return false;
        }


        if(id==pw1)
        {
            alert("아이디 비번은 달라야합니다.");
            member_form.pwd.value.value =  "";
            member_form.chkPwd.value="";
            member_form.chkPwd.focus();
            return false;
        }
        return true;
    }

    function checkName(name)
    {
        if(!checkExist(name,"이름"))
            return false;
        var kor = /^[가-힣a-zA-Z]{2,}$/;
        if(!kor.test(name))
        {
            alert("이름을 다시 입력해주세요");
            member_form.name.value=  "";
            member_form.name.focus();
            return false;
        }
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
                alert("별명을 다시 입력해주세요");
                member_form.nickName.value=  "";
                member_form.nickName.focus();
                return false;
            }
            return true;
        }
    }

    function checkPhone(phone)
    {   
        if(!checkExist(phone,"전화번호"))
        {
            return false;
        }
        if(!num.test(phone))
        {
            alert("전화번호를 다시 입력해주세요");
            member_form.phoneNum.value="";
            member_form.phoneNum.focus();
            return false;
        }
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
            if(!checkExist(etc,"추가번호"))
                return false;
            if(!num.test(etc))
            {
                alert("추가 번호를 다시작성해주세요");
                member_form.etcNum.value="";
                member_form.etcNum.focus();
                return false
            }
            return true
        }
    }

    function checkemail(mail)
    {   
        var email = /^[A-Za-z0-9_]+[A-Za-z0-9]*[@]{1}[A-Za-z0-9]+[A-Za-z0-9]*[.]{1}[A-Za-z]{1,3}$/;
        if(!checkExist(mail,"이메일"))
            return false;
        
        if(!email.test(mail))
        {
            alert("옳바른 형식의 이메일이 아닙니다.");
            member_form.email.value="";
            member_form.email.focus();
            return false;
        }
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
    $(document).ready(function(){
        $("#chkbtn").click(function(){
            $.ajax({
                url:"/admin/login/register/check.php",
                type :"post",
                data:{id:$("#id").val()},
                dataType :'text',
                success: function(data){
                    alert(data);
                },
            }); 
        });
      });
</script>

<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/tail.php";
?>