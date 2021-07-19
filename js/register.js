var form = document.forms["form-register"];
var errorUser = document.querySelector("#error-user");
var errorName = document.querySelector("#error-name");
var errorEmail = document.querySelector("#error-email");
var errorPassword = document.querySelector("#error-password");
var errorCPF = document.querySelector("#error-cpf");
var errorDate = document.querySelector("#error-date");
var errorPhoto = document.querySelector("#error-photo");


//FUNÇÃO PARA FECHAR OS ALERTAS
function closeAlert(){
    var alert = document.querySelector("#alert");
    alert.style.display = "none";
}

//FUNÇÃO DE VALIDAÇÃO
function registerVal(){
    var username = form.username.value;
    var name = form.user.value;
    var email = form.email.value;
    var password = form.password.value;
    var cpf = form.cpf.value;
    var datenasc = form.date.value;
    var photo = form.photo.value;
    var error = false;

    if(username.length < 4 || username.length > 25){
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

    if(name.length < 5 || name.length > 100 || name.indexOf(" ") == -1){
        error = true;
        errorName.innerHTML = "";
        errorName.innerHTML = "Digite seu nome e sobrenome";
        window.scroll(0,name.offsetTop);
    }else if(name.indexOf("0") !== -1 || name.indexOf("1") !== -1 || name.indexOf("2") !== -1 || name.indexOf("3") !== -1 || name.indexOf("4") !== -1 || name.indexOf("5") !== -1 || name.indexOf("6") !== -1 || name.indexOf("7") !== -1 || name.indexOf("8") !== -1 || name.indexOf("9") !== -1){
        error = true;
        errorName.innerHTML = "";
        errorName.innerHTML = "Digite seu nome e sobrenome corretamente";
        window.scroll(0,name.offsetTop);
    }else{
        errorName.innerHTML = "";
    }

    if(email.length < 8 || email.length > 200 || email.indexOf(".com") === -1){
        error = true;
        errorEmail.innerHTML = "";
        errorEmail.innerHTML = "Digite seu email";
        window.scroll(0,email.offsetTop);
    }else{
        errorEmail.innerHTML = "";
    }

    if(password.length < 6 || password.length > 200 || password.indexOf(" ") != -1){
        error = true;
        errorPassword.innerHTML = "";
        errorPassword.innerHTML = "Digite sua senha com no mínimo 6 caracteres";
    }else{
        errorPassword.innerHTML = "";
    }

    if(cpf.length !== 14){
        error = true;
        errorCPF.innerHTML = "";
        errorCPF.innerHTML = "Digite seu CPF corretamente";
        window.scroll(0,cpf.offsetTop);
    }else if((cpf.indexOf(".") !== 3 && cpf.indexOf(".") !== 7) || cpf.indexOf("-") !== 11){
        error = true;
        errorCPF.innerHTML = "";
        errorCPF.innerHTML = "Digite seu CPF com ponto(.) e traço(-)";
        window.scroll(0,cpf.offsetTop);
    }else{
        errorCPF.innerHTML = "";
    }

    if(datenasc.length !== 10){
        error = true;
        errorDate.innerHTML = "";
        errorDate.innerHTML = "Digite sua data de nascimento";
    }else{
        errorDate.innerHTML = "";
    }

    if(photo.length <= 0){
        error = true;
        errorPhoto.innerHTML = "";
        errorPhoto.innerHTML = "Faça upload de uma foto";
    }else{
        errorPhoto.innerHTML = "";
    }

    if(error){
        return false;
    }else{
        document.getElementById("loading").style.display = "flex";
        return true;
    }
}

function pressUsername(){
    var username = form.username.value;
    if(username.length < 4 || username.length > 25){
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
    function verifyCharUsername(event){
        var char = String.fromCharCode(event.keyCode);
        var pattern = "[A-Z,a-z,0-9,_]";
        if(char.match(pattern)){
            return true;
        }
    }
}catch(e){}
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
function pressCPF(){
    var cpf = form.cpf.value;
    if(cpf.length !== 14){
        errorCPF.innerHTML = "";
        errorCPF.innerHTML = "Digite seu CPF corretamente";
    }else if((cpf.indexOf(".") !== 3 && cpf.indexOf(".") !== 7) || cpf.indexOf("-") !== 11){
        errorCPF.innerHTML = "";
        errorCPF.innerHTML = "Digite seu CPF com ponto(.) e traço(-)";
    }else{
        errorCPF.innerHTML = "";
    }
}
function pressPassword(){
    var password = form.password.value;
    if(password.length < 6 || password.length > 200){
        errorPassword.innerHTML = "";
        errorPassword.innerHTML = "Digite sua senha com no mínimo 6 caracteres";
    }else{
        errorPassword.innerHTML = "";
    }
}
function pressDate(){
    var datenasc = form.date.value;
    if(datenasc.length !== 10){
        errorDate.innerHTML = "";
        errorDate.innerHTML = "Digite sua data de nascimento";
    }else{
        errorDate.innerHTML = "";
    }
}
function changePhoto(){
    var photo = form.photo.value;
    if(photo.length <= 0){
        errorPhoto.innerHTML = "";
        errorPhoto.innerHTML = "Faça upload de uma foto";
    }else{
        errorPhoto.innerHTML = "";
    }
}
//FUNÇÃO PARA IMPEDIR O USUÁRIO DE DIGITAR CARACTERES ESPECIAIS
try{
    document.querySelector("#cpf").addEventListener("keypress",function(event){ //função ativada pressionando as teclas
        if(!verifyChar(event)){ //se o verifyChar retornar falso, significa que o usuario não digitou números
            event.preventDefault(); //logo, ele é impedido e prevenido de digitar
        }
    });
    function verifyChar(event){
        var char = String.fromCharCode(event.keyCode); //pega o que o usuário digitou
        var pattern = '[0-9]'; //define o pattern como caracteres números de 0 a 9
        if(char.match(pattern)){ //se o caractere digitado existir no pattern
            return true; //então retorna true
        }
    }
}catch(e){}
//FUNÇÃO DE MÁSCARA PARA O CPF
function maskCPF(){ //keyup é um evento chamado quando uma tecla é soltada e keypress quando é apertada
    var cpf = document.querySelector("#cpf");
    if(cpf.value.length === 3 || cpf.value.length === 7){
        cpf.value += ".";
    }else if(cpf.value.length === 11){
        cpf.value += "-";
    }
}

//FUNÇÃO PARA MOSTRAR A SENHA DO INPUT
function showPass(){
    let input = document.querySelector("#password");
    if(input.type === "password"){
        input.type = "text";
    }else{
        input.type = "password";
    }
}

//FUNÇÃO PARA MOSTRAR O NOME DO ARQUIVO NO LABEL PLACEHOLDER
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