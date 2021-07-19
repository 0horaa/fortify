var form = document.forms["form-academy"];
var errorNameCompany = document.getElementById("error-name-company");
var errorEmailCompany = document.getElementById("error-email-company");
var errorUserName = document.getElementById("error-user-name");
var errorUserEmail = document.getElementById("error-user-email");
var errorPassword = document.getElementById("error-password");
var errorCep = document.getElementById("error-cep");
var errorCity = document.getElementById("error-city");
var errorAddress = document.getElementById("error-address");
var errorNumber = document.getElementById("error-number");
var errorDistrict = document.getElementById("error-district");

var errorNameAcademy = document.getElementById("error-name-academy");
var errorDescription = document.getElementById("error-description");
var errorCityAcademy = document.getElementById("error-city-academy");
var errorAddressAcademy = document.getElementById("error-address-academy");
var errorDay = document.getElementById("error-day-academy");
var errorHour = document.getElementById("error-hour-academy");
var errorPayment = document.getElementById("error-payment-academy");
var errorLogo = document.getElementById("error-logo");
var errorPrice = document.getElementById("error-price");

function closeAlert(){
    var alert = document.querySelector("#alert");
    alert.style.display = "none";
}

function validateRegister(){
    var nameCompany = form.nameCompany.value;
    var emailCompany = form.emailCompany.value;
    var userName = form.userName.value;
    var userEmail = form.userEmail.value;
    var password = form.userPassword.value;
    var cep = form.cep.value;
    var city = form.city.value;
    var address = form.address.value;
    var number = form.number.value;
    var district = form.district.value;
    var nameAcademy = form.nameAcademy.value;
    var description = form.description.value;
    var cityAcademy = form.cityAcademy.value;
    var addressAcademy = form.addressAcademy.value;
    var day = form.dayAcademy.value;
    var hour = form.hourAcademy.value;
    var payment = form.paymentAcademy.value;
    var price = form.price.value;
    var error = false;
    
    if(nameCompany.length <= 0 || nameCompany.length > 100){
        error = true;
        errorNameCompany.innerHTML = "";
        errorNameCompany.innerHTML = "Digite o nome da sua empresa";
        window.scroll(0,nameCompany.offsetTop - 15);
    }else{
        errorNameCompany.innerHTML = "";
    }

    if(userName.length < 5 || userName.length > 100){
        error = true;
        errorUserName.innerHTML = "";
        errorUserName.innerHTML = "Digite seu nome e sobrenome";
        window.scroll(0,userName.offsetTop);
    }else if(userName.indexOf("0") !== -1 || userName.indexOf("1") !== -1 || userName.indexOf("2") !== -1 || userName.indexOf("3") !== -1 || userName.indexOf("4") !== -1 || userName.indexOf("5") !== -1 || userName.indexOf("6") !== -1 || userName.indexOf("7") !== -1 || userName.indexOf("8") !== -1 || userName.indexOf("9") !== -1){
        error = true;
        errorUserName.innerHTML = "";
        errorUserName.innerHTML = "Digite seu nome e sobrenome corretamente";
        window.scroll(0,userName.offsetTop);
    }else{
        errorUserName.innerHTML = "";
    }

    if(userEmail.length < 8 || userEmail.length > 200 || userEmail.indexOf(".com") === -1){
        error = true;
        errorUserEmail.innerHTML = "";
        errorUserEmail.innerHTML = "Digite o email do responsável";
        window.scroll(0,userEmail.offsetTop);
    }else{
        errorUserEmail.innerHTML = "";
    }

    if(emailCompany.length < 8 || emailCompany.length > 200 || emailCompany.indexOf(".com") === -1){
        error = true;
        errorEmailCompany.innerHTML = "";
        errorEmailCompany.innerHTML = "Digite o email da sua empresa";
        window.scroll(0,emailCompany.offsetTop);
    }else{
        errorEmailCompany.innerHTML = "";
    }

    if(password.length >= 1 && password.length < 6 || password.length > 200 || password.indexOf(" ") != -1){
        error = true;
        errorPassword.innerHTML = "";
        errorPassword.innerHTML = "Digite sua senha com no mínimo 6 caracteres";
        window.scroll(0,password.offsetTop);
    }else{
        errorPassword.innerHTML = "";
    }

    if(cep.length !== 9){
        error = true;
        errorCep.innerHTML = "";
        errorCep.innerHTML = "Digite seu CEP corretamente";
        window.scroll(0,cep.offsetTop);
    }else{
        errorCep.innerHTML = "";
    }

    if(city.length <= 0 || city.length > 45){
        error = true;
        errorCity.innerHTML = "";
        errorCity.innerHTML = "Digite a cidade de atuação da sua empresa";
        window.scroll(0,city.offsetTop + 15);
    }else{
        errorCity.innerHTML = "";
    }

    if(address.length <= 0 || address.length > 100){
        error = true;
        errorAddress.innerHTML = "";
        errorAddress.innerHTML = "Digite o endereço da sua empresa";
        window.scroll(0,address.offsetTop + 15);
    }else{
        errorAddress.innerHTML = "";
    }

    if(day.length <= 4 || day.length > 100){
        error = true;
        errorDay.innerHTML = "";
        errorDay.innerHTML = "Digite os dias de funcionamento da academia corretamente";
        window.scroll(0,day.offsetTop + 15);
    }else{
        errorDay.innerHTML = "";
    }

    if(hour.length <= 4 || hour.length > 100){
        error = true;
        errorHour.innerHTML = "";
        errorHour.innerHTML = "Digite o horário de funcionamento da academia corretamente";
        window.scroll(0,day.offsetTop + 15);
    }else{
        errorHour.innerHTML = "";
    }

    if(payment.length <= 1 || payment.length > 45){
        error = true;
        errorPayment.innerHTML = "";
        errorPayment.innerHTML = "Digite os métodos de pagamento da academia";
        window.scroll(0,day.offsetTop + 15);
    }else{
        errorPayment.innerHTML = "";
    }

    if(number.length <= 0 || number.length > 100){
        error = true;
        errorNumber.innerHTML = "";
        errorNumber.innerHTML = "Digite o número do endereço da sua empresa";
        window.scroll(0,number.offsetTop + 15);
    }else{
        errorNumber.innerHTML = "";
    }

    if(district.length <= 0 || district.length > 100){
        error = true;
        errorDistrict.innerHTML = "";
        errorDistrict.innerHTML = "Digite o bairro onde se encontra sua empresa";
    }else{
        errorDistrict.innerHTML = "";
    }
    
    if(nameAcademy.length <= 0 || nameAcademy.length > 100){
        error = true;
        errorNameAcademy.innerHTML = "";
        errorNameAcademy.innerHTML = "Digite o nome da sua academia";
    }else{
        errorNameAcademy.innerHTML = "";
    }

    if(description.length <= 0 || description.length > 300){
        error = true;
        errorDescription.innerHTML = "";
        errorDescription.innerHTML = "Digite a descrição da sua academia com no máximo 300 caracteres";
    }else{
        errorDescription.innerHTML = "";
    }

    if(cityAcademy.length <= 0 || cityAcademy.length > 45){
        error = true;
        errorCityAcademy.innerHTML = "";
        errorCityAcademy.innerHTML = "Digite a cidade de atuação da sua empresa";
    }else{
        errorCityAcademy.innerHTML = "";
    }

    if(addressAcademy.length <= 0 || addressAcademy.length > 100){
        error = true;
        errorAddressAcademy.innerHTML = "";
        errorAddressAcademy.innerHTML = "Digite o endereço e número da sua academia";
    }else{
        errorAddressAcademy.innerHTML = "";
    }

    if(price.length <= 0){
        error = true;
        errorPrice.innerHTML = "";
        errorPrice.innerHTML = "Digite o preço mensal da sua academia";
    }else{
        errorPrice.innerHTML = "";
    }

    if(error){
        return false;
    }else{
        return true;
    }
}

function pressNameCompany(){
    var nameCompany = form.nameCompany.value;
    if(nameCompany.length <= 0 || nameCompany.length > 100){
        error = true;
        errorNameCompany.innerHTML = "";
        errorNameCompany.innerHTML = "Digite o nome da sua empresa";
    }else{
        errorNameCompany.innerHTML = "";
    }
}
function pressEmailCompany(){
    var emailCompany = form.emailCompany.value;
    if(emailCompany.length < 8 || emailCompany.length > 200 || emailCompany.indexOf(".com") === -1){
        error = true;
        errorEmailCompany.innerHTML = "";
        errorEmailCompany.innerHTML = "Digite o email da sua empresa";
    }else{
        errorEmailCompany.innerHTML = "";
    }
}
function pressUserName(){
    var userName = form.userName.value;
    if(userName.length < 5 || userName.length > 100){
        error = true;
        errorUserName.innerHTML = "";
        errorUserName.innerHTML = "Digite seu nome e sobrenome";
    }else if(userName.indexOf("0") !== -1 || userName.indexOf("1") !== -1 || userName.indexOf("2") !== -1 || userName.indexOf("3") !== -1 || userName.indexOf("4") !== -1 || userName.indexOf("5") !== -1 || userName.indexOf("6") !== -1 || userName.indexOf("7") !== -1 || userName.indexOf("8") !== -1 || userName.indexOf("9") !== -1){
        error = true;
        errorUserName.innerHTML = "";
        errorUserName.innerHTML = "Digite seu nome e sobrenome corretamente";
    }else{
        errorUserName.innerHTML = "";
    }
}
function pressUserEmail(){
    var userEmail = form.userEmail.value;
    if(userEmail.length < 8 || userEmail.length > 200 || userEmail.indexOf(".com") === -1){
        error = true;
        errorUserEmail.innerHTML = "";
        errorUserEmail.innerHTML = "Digite o email do responsável";
    }else{
        errorUserEmail.innerHTML = "";
    }
}
function pressPassword(){
    var password = form.userPassword.value;
    if(password.length < 6 || password.length > 200 || password.indexOf(" ") != -1){
        error = true;
        errorPassword.innerHTML = "";
        errorPassword.innerHTML = "Digite sua senha com no mínimo 6 caracteres";
    }else{
        errorPassword.innerHTML = "";
    }
}
function pressCep(){
    var cep = form.cep.value;
    if(cep.length !== 9){
        error = true;
        errorCep.innerHTML = "";
        errorCep.innerHTML = "Digite seu CEP corretamente";
    }else{
        errorCep.innerHTML = "";
    }
}
function pressCity(){
    var city = form.city.value;
    if(city.length <= 0 || city.length > 45){
        error = true;
        errorCity.innerHTML = "";
        errorCity.innerHTML = "Digite a cidade de atuação da sua empresa";
    }else{
        errorCity.innerHTML = "";
    }
}
function pressAddress(){
    var address = form.address.value;
    if(address.length <= 0 || address.length > 100){
        error = true;
        errorAddress.innerHTML = "";
        errorAddress.innerHTML = "Digite o endereço da sua empresa";
    }else{
        errorAddress.innerHTML = "";
    }
}
function pressNumber(){
    var number = form.number.value;
    if(number.length <= 0 || number.length > 100){
        error = true;
        errorNumber.innerHTML = "";
        errorNumber.innerHTML = "Digite o número do endereço da sua empresa";
    }else{
        errorNumber.innerHTML = "";
    }
}
function pressDistrict(){
    var district = form.district.value;
    if(district.length <= 0 || district.length > 100){
        error = true;
        errorDistrict.innerHTML = "";
        errorDistrict.innerHTML = "Digite o bairro onde se encontra sua empresa";
    }else{
        errorDistrict.innerHTML = "";
    }
}
function pressNameAcademy(){
    var nameAcademy = form.nameAcademy.value;
    if(nameAcademy.length <= 0 || nameAcademy.length > 100){
        error = true;
        errorNameAcademy.innerHTML = "";
        errorNameAcademy.innerHTML = "Digite o nome da sua academia";
    }else{
        errorNameAcademy.innerHTML = "";
    }
}
function pressDescription(){
    var description = form.description.value;
    if(description.length <= 0 || description.length > 300){
        error = true;
        errorDescription.innerHTML = "";
        errorDescription.innerHTML = "Digite a descrição da sua academia com no máximo 300 caracteres";
    }else{
        errorDescription.innerHTML = "";
    }
}
function pressCityAcademy(){
    var cityAcademy = form.cityAcademy.value;
    if(cityAcademy.length <= 0 || cityAcademy.length > 45){
        error = true;
        errorCityAcademy.innerHTML = "";
        errorCityAcademy.innerHTML = "Digite a cidade de atuação da sua empresa";
    }else{
        errorCityAcademy.innerHTML = "";
    }
}
function pressAddressAcademy(){
    var addressAcademy = form.addressAcademy.value;
    if(addressAcademy.length <= 0 || addressAcademy.length > 100){
        error = true;
        errorAddressAcademy.innerHTML = "";
        errorAddressAcademy.innerHTML = "Digite o endereço e número da sua academia";
    }else{
        errorAddressAcademy.innerHTML = "";
    }
}
function pressDay(){
    var day = form.dayAcademy.value;
    if(day.length <= 4 || day.length > 100){
        error = true;
        errorDay.innerHTML = "";
        errorDay.innerHTML = "Digite os dias de funcionamento da academia corretamente";
    }else{
        errorDay.innerHTML = "";
    }
}
function pressHour(){
    var hour = form.hourAcademy.value;
    if(hour.length <= 4 || hour.length > 100){
        error = true;
        errorHour.innerHTML = "";
        errorHour.innerHTML = "Digite o horário de funcionamento da academia corretamente";
    }else{
        errorHour.innerHTML = "";
    }
}
function pressPayment(){
    var payment = form.paymentAcademy.value;
    if(payment.length <= 1 || payment.length > 45){
        error = true;
        errorPayment.innerHTML = "";
        errorPayment.innerHTML = "Digite os métodos de pagamento da academia";
    }else{
        errorPayment.innerHTML = "";
    }
}
function pressPrice(){
    var price = form.price.value;
    if(price.length <= 0){
        error = true;
        errorPrice.innerHTML = "";
        errorPrice.innerHTML = "Digite o preço mensal da sua academia";
    }else{
        errorPrice.innerHTML = "";
    }
}
function maskCep(){
    var cepInput = form.cep;
    if(cepInput.value.length === 5){
        cepInput.value += "-";
    }
}
function showPass(){
    var input = document.querySelector("#user-password");
    if(input.type === "password"){
        input.type = "text";
    }else{
        input.type = "password";
    }
}
try{
    document.querySelector("#logo").addEventListener("change",function(){
        var lbl = document.querySelector("#file-placeholder");
        var photoInput = document.querySelector("#logo").value; //pega o valor do input
        try{ //usa o try para evitar erros quando o usuário não colocar uma foto
            var photoName = document.querySelector("#logo").files[0].name; //pega o nome da imagem
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