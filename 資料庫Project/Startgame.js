function initial() {
    document.getElementById("explainshow1").style.display = "none";
    document.getElementById("explainshow2").style.display = "none";
    document.getElementById("explainshow3").style.display = "none";
    document.getElementById("signin_account").style.display = "none";
    document.getElementById("create").style.display = "none";
    document.getElementById("morning").style.display = "none";
    document.getElementById("intro").style.display="none";
    document.getElementById("night").style.display = "none";
    document.getElementById("question").style.display="none";
    document.getElementById("success").style.display="none";
    document.getElementById("fail").style.display="none";
    document.getElementById("notebook").style.display="none";
    document.getElementById("heart").style.display="none";
}

/*開啟遊戲說明1*/
function open_explain() {
    document.getElementById("explainshow2").style.display = "none";
    document.getElementById("explainshow1").style.display = "";
    document.getElementById("startpage").style.display = "none"
}

/*關閉遊戲說明*/
function close_explain() {
    document.getElementById("explainshow1").style.display = "none";
    document.getElementById("explainshow2").style.display = "none";
    document.getElementById("explainshow3").style.display = "none";
    document.getElementById("startpage").style.display = "";
}

/*開啟遊戲說明2*/
function nextpage2() {
    document.getElementById("explainshow3").style.display = "none";
    document.getElementById("explainshow2").style.display = "";
}

/*開啟遊戲說明3*/
function nextpage3() {
    document.getElementById("explainshow2").style.display = "none";
    document.getElementById("explainshow3").style.display = "";
}

/*顯示 登入的介面*/
function signin() {
    document.getElementById("signin_account").style.display = "";
    document.getElementById("startpage").style.display = "none";
    document.getElementById("create").style.display = "none";
}

/*顯示 註冊介面*/
function create() {
    document.getElementById("create").style.display = "";
    document.getElementById("signin_account").style.display = "none";
}

/*判斷註冊帳號的條件都有符合*/
function check_create(){
    /*
    var account = document.getElementById("account1");
    var password = document.getElementById("password2");
    var check_password = document.getElementById("password3");

    if(password.lenght<6 || account == [資料庫裡面已有的account] || password.value != check_password.value){
        alert("輸入錯誤!");
    }
    
    else{
        signin();
        [把註冊的帳號和密碼丟到資料庫裡]
    }
    */
   signin();/*目前沒連起來先這樣*/
}

/*判斷帳號是否存在*/
function check_account() {
    /*
        var account = document.getElementById("account");
        var sign_password = document.getElementById("password1");
        
        if(account == [資料庫裡有的account])
        {
            if(sign_password == [資料庫有的account對應的密碼])
            {
                document.getElementById("morning").style.display="";
            }
            else 
            {
                alert("帳號密碼錯誤!");
            }   
        }
        else 
        {
            alert("帳號密碼錯誤!");
        }
        */
    
    /*目前沒有連結就先這樣*/
    document.getElementById("signin_account").style.display = "none";
    document.getElementById("success").style.display="none";
    document.getElementById("morning").style.display = "";
    document.getElementById("notebook").style.display="";
}


function night()
{
    document.getElementById("first_morning").style.display = "none";
    document.getElementById("morning").style.display = "none";
    document.getElementById("fail").style.display="none";
    document.getElementById("night").style.display="";
    document.getElementById("heart").style.display="";
}

function intro(){
    document.getElementById("night").style.display="none";
    document.getElementById("intro").style.display="";
}

function Question(){
    document.getElementById("question").style.display="";
    document.getElementById("intro").style.display="none";
}

/*確認答案是否正確*/
function check_(e,answer){
    if(e == answer)
    {
        success();
    }
    else
    {
        fail();
    }
}


function success(){
    document.getElementById("success").style.display="";
    document.getElementById("question").style.display="none";
}

function fail(){
    document.getElementById("question").style.display="none";
    document.getElementById("fail").style.display="";
}
window.addEventListener("load", initial, false);