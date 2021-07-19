var form = document.forms["form-register"];
var buttonTop = document.querySelector("#btn-back");
var errorUser = document.querySelector("#error-user");
var errorName = document.querySelector("#error-name");
var errorEmail = document.querySelector("#error-email");
var errorPassword = document.querySelector("#error-password");
var menuMobile = document.querySelector("#menu-mobile");
var formSearch = document.querySelector("#form-search");
var checkbox = document.querySelector("#checkbox");

window.onscroll = function(){
    scrollFunction();
}
function scrollFunction(){
    if(document.body.scrollTop > 568 || document.documentElement.scrollTop > 568){
        buttonTop.style.display = "block";
    }else{
        buttonTop.style.display = "none";
    }
}
buttonTop.addEventListener("click",function(event){
    event.preventDefault();
    var top = header.offsetTop;
    smoothScrollTo(0,top,700);
});

document.querySelector("#open-menu").addEventListener("click",function(){
    menuMobile.style.left = 0;
    try{
        checkbox.style.display = "none";
    }catch(e){}
});
document.querySelector("#close-menu").addEventListener("click",function(){
    menuMobile.style.left = "-100%";
    try{
        checkbox.style.display = "inline-block";
    }catch(e){}
});
document.querySelector("#link3").addEventListener("click",function(){
    formSearch.style.left = 0;
});
document.querySelector("#close-search").addEventListener("click",function(){
    formSearch.style.left = "-100%";
});
document.querySelector("#search-academy").addEventListener("click",function(){
    document.querySelector("#search").focus();
});
function closeAlert(){
    var alert = document.querySelector("#alert");
    alert.style.display = "none";
}
function registerVal(){
    var titleForm = document.querySelector("#title-profile");
    var username = form.username.value;
    var email = form.email.value;
    var password = form.password.value;
    var error = false;

    if(username.length < 5 || username.length > 25){
        error = true;
        errorUser.innerHTML = "";
        errorUser.innerHTML = "Digite seu nome de usuário";
        window.scroll(0,username.offsetTop - 15);
    }else if(username.indexOf(" ") !== -1){
        error = true;
        errorUser.innerHTML = "";
        errorUser.innerHTML = "O nome de usuário não pode conter espaços, utilize <strong>_</strong> (underline)";
        window.scroll(0,username.offsetTop - 15);
    }else{
        errorUser.innerHTML = "";
    }

    if(email.length < 8 || email.length > 200 || email.indexOf(".com") === -1){
        error = true;
        errorEmail.innerHTML = "";
        errorEmail.innerHTML = "Digite seu email";
        window.scroll(0,titleForm.offsetTop - 15);
    }else{
        errorEmail.innerHTML = "";
    }

    if(password.length >= 1 && password.length < 6 || password.length > 200){
        error = true;
        errorPassword.innerHTML = "";
        errorPassword.innerHTML = "Digite sua senha com no mínimo 6 caracteres";
        window.scroll(0,titleForm.offsetTop - 15);
    }else{
        errorPassword.innerHTML = "";
    }

    if(error){
        return false;
    }else{
        return true;
    }
}
function pressUsername(){
    var username = form.username.value;
    if(username.length < 5 || username.length > 25){
        errorUser.innerHTML = "";
        errorUser.innerHTML = "Digite seu nome de usuário corretamente";
    }else if(username.indexOf(" ") !== -1){
        error = true;
        errorUser.innerHTML = "";
        errorUser.innerHTML = "O nome de usuário não pode conter espaços, utilize <strong>_</strong> (underline)";
    }else{
        errorUser.innerHTML = "";
    }
}
try{
    document.querySelector("#username").addEventListener("keypress", function(event){
        if(!verifyCharUsername(event)){
            event.preventDefault();
        }
    });
}catch(e){}
function verifyCharUsername(event){
    var char = String.fromCharCode(event.keyCode);
    var pattern = "[A-Z,a-z,0-9,_]";
    if(char.match(pattern)){
        return true;
    }
}
function pressName(){
    var name = form.user.value;
    if(name.length < 5 || name.length > 100 || name.indexOf(" ") == -1){
        errorName.innerHTML = "";
        errorName.innerHTML = "Digite seu nome e sobrenome";        
    }else if(name.indexOf("0") !== -1 || name.indexOf("1") !== -1 || name.indexOf("2") !== -1 || name.indexOf("3") !== -1 || name.indexOf("4") !== -1 || name.indexOf("5") !== -1 || name.indexOf("6") !== -1 || name.indexOf("7") !== -1 || name.indexOf("8") !== -1 || name.indexOf("9") !== -1){
        errorName.innerHTML = "";
        errorName.innerHTML = "Digite seu nome e sobrenome corretamente";       
    }else{
        errorName.innerHTML = "";
    }
}
function pressEmail(){
    var email = form.email.value;
    if(email.length < 8 || email.length > 200 || email.indexOf(".com") === -1){
        errorEmail.innerHTML = "";
        errorEmail.innerHTML = "Digite seu email";
    }else{
        errorEmail.innerHTML = "";
    }
}
function pressPassword(){
    var password = form.password.value;
    if(password.length >= 1 && password.length < 6 || password.length > 200){
        error = true;
        errorPassword.innerHTML = "";
        errorPassword.innerHTML = "Digite sua senha com no mínimo 6 caracteres";
        window.scroll(0,titleForm.offsetTop - 15);
    }else{
        errorPassword.innerHTML = "";
    }
}

function showPass(){
    let input = document.querySelector("#password");
    if(input.type === "password"){
        input.type = "text";
    }else{
        input.type = "password";
    }
}
try{
    document.querySelector("#photo").addEventListener("change",function(){
        var lbl = document.querySelector("#file-placeholder");
        var photoInput = document.querySelector("#photo").value; //pega o valor do input
        try{ //usa o try para evitar erros quando o usuário não colocar uma foto
            var photoName = document.querySelector("#photo").files[0].name; //pega o nome da imagem
        }catch(e){
            photoName = "Insira uma imagem";
        }
        lbl.innerHTML = photoName;
        lbl.style.border = "1px solid #F50057";
        if(photoInput.length <= 0){
            lbl.innerHTML = "Insira uma imagem";
            lbl.style.border = "1px solid #232227";
        }
    });
}catch(e){}
 //MODAL
 const openModal = () => {
    let overlay = document.getElementById("modal-delete");
    let modal = document.getElementById("modal-container");
    overlay.style.display = "flex"
    modal.style.display = "flex"
    setTimeout(() => { document.addEventListener('click', handleClickOutside, false) }, 200);
}
const closeModal = () => {
    let overlay = document.getElementById("modal-delete");
    let modal = document.getElementById("modal-container");
    modal.style.display = "none";
    overlay.style.display = "none";
    document.removeEventListener("click", handleClickOutside, false);
}
const handleClickOutside = (event) => {
    let overlay = document.getElementById("modal-delete");
    let modal = document.getElementById("modal-container");
    if (!modal.contains(event.target)) {
        modal.style.display = "none";
        overlay.style.display = "none";
        document.removeEventListener("click", handleClickOutside, false);
    }
}
function smoothScrollTo(endX, endY, duration) {
    const startX = window.scrollX || window.pageXOffset;
    const startY = window.scrollY || window.pageYOffset;
    const distanceX = endX - startX;
    const distanceY = endY - startY;
    const startTime = new Date().getTime();
  
    duration = typeof duration !== 'undefined' ? duration : 400;
  
    const easeInOutQuart = (time, from, distance, duration) => {
      if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
      return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
    };
  
    const timer = setInterval(() => {
      const time = new Date().getTime() - startTime;
      const newX = easeInOutQuart(time, startX, distanceX, duration);
      const newY = easeInOutQuart(time, startY, distanceY, duration);
      if (time >= duration) {
        clearInterval(timer);
      }
      window.scroll(newX, newY - 10); //-20 para não ficar tão colado na seção específica
    }, 1000 / 60); // 60 fps
};