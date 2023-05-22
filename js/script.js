  //For animation about
  // function scrollAppear() {
  //   var introText = document.querySelector('.side-text');
  //   var sideImage = document.querySelector('.sideImage');
  //   var introPosition = introText.getBoundingClientRect().top;
  //   var imagePosition = sideImage.getBoundingClientRect().top;
    
  //   var screenPosition = window.innerHeight / 1.2;
  
  //   if(introPosition < screenPosition) {
  //     introText.classList.add('side-text-appear');
  //   }
  //   if(imagePosition < screenPosition) {
  //     sideImage.classList.add('sideImage-appear');
  //   }
  // }
  // window.addEventListener('scroll', scrollAppear);
  //for refonsive home 
  var i = 2;
  function switchTAB() {
      var x = document.getElementById("list-switch");
      if(i%2 == 0) {
          document.getElementById("list-switch").style= "display: grid; height: 50vh; margin-left: 5%;";
          document.getElementById("search-switch").style= "display: block; margin-left: 5%;";
      }else {
          document.getElementById("list-switch").style= "display: none;";
          document.getElementById("search-switch").style= "display: none;";
      }
      i++;
  }
  
  // For LOGIN
  var x = document.getElementById("login");
  var y = document.getElementById("register");
  var z = document.getElementById("btn");
  var a = document.getElementById("log");
  var b = document.getElementById("reg");
  var w = document.getElementById("other");
  
  function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
    w.style.visibility = "hidden";
    b.style.color = "#fff";
    a.style.color = "#000";
  }
  
  function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
    w.style.visibility = "visible";
    a.style.color = "#fff";
    b.style.color = "#000";
  }
    
  // CheckBox Function
  function goFurther(){
    if (document.getElementById("chkAgree").checked == true) {
      document.getElementById('btnSubmit').style = 'background: linear-gradient(to right, #0E8388,  #3C486B);';
    }
    else{
      document.getElementById('btnSubmit').style = 'background: lightgray;';
    }
  }
  
  function google() {
        window.location.assign("https://accounts.google.com/signin/v2/identifier?service=accountsettings&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Futm_source%3Dsign_in_no_continue&csig=AF-SEnbZHbi77CbAiuHE%3A1585466693&flowName=GlifWebSignIn&flowEntry=AddSession", "_blank");
  }
  
  function sideMenu(side) {
    var menu = document.getElementById('side-menu');
    if(side==0) {
      menu.style = 'transform: translateX(0vh); position:fixed;';
    }
    else {
      menu.style = 'transform: translateX(-100%);';
    }
    side++;
  }

  //login on
var isLoggedIn = false;
function masuk() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  if (username === 'ronyy' && password === 'as123') {
    isLoggedIn = true;
    redirectToHome();
  } 
  if (username === 'admin' && password === '12345') {
    isLoggedIn = true;
    directToadmin();
  } else {
    alert('Username atau password salah!');
  }
}
function redirectToHome() {
  alert('Apakah anda yakin untuk melanjutkannya ?')
  window.open('../subPelajar/home.html','_blank');
}

function directToadmin() {
  alert('Apakah anda yakin untuk melanjutkannya ?')
  window.open('../subPengajar/home_teacher.html','_blank');
}

function logout() {
  isLoggedIn = false;
  redirectToLogin();
}

function redirectToLogin() {
  window.location.href = '../login.html';
}
