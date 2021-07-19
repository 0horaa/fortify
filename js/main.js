var menuMobile = document.querySelector("#menu-mobile");
var slideButtons = document.querySelector("#slide-buttons");
var slide = document.querySelector("#s1");
var slideTitle1 = document.querySelector("#slide-title1");
var slideTitle2 = document.querySelector("#slide-title2");
var slideTitle3 = document.querySelector("#slide-title3");
var section1 = document.querySelector("#service1");
var section2 = document.querySelector("#service2");
var header = document.querySelector("#header");
var buttonTop = document.querySelector("#btn-back");

//BOTÃO DE VOLTAR AO TOPO SÓ APARECERÁ QUANDO O USUÁRIO ROLAR A PÁGINA
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

//MENU - ABRIR E FECHAR
document.querySelector("#open-menu").addEventListener("click",function(){
    menuMobile.style.left = 0;
    slideButtons.style.right = "-100%";
    slideTitle1.style.right = "-1000%";
    slideTitle2.style.right = "-1000%";
    slideTitle3.style.right = "-1000%";
    slideTitle1.style.transition = "none";
    slideTitle2.style.transition = "none";
    slideTitle3.style.transition = "none";
});
document.querySelector("#close-menu").addEventListener("click",function(){
    menuMobile.style.left = "-100%";
    slideButtons.style.right = 0;
    slideTitle1.style.right = 0;
    slideTitle2.style.right = 0;
    slideTitle3.style.right = 0;
    slideTitle1.style.transition = "right 0.8s ease-in-out";
    slideTitle2.style.transition = "right 0.8s ease-in-out";
    slideTitle3.style.transition = "right 0.8s ease-in-out";
});

//SCROLL SUAVE - BOTÕES DE ACIONAMENTO
document.querySelector("#link1").addEventListener("click",function(event){
    menuMobile.style.left = "-100%";
    slideButtons.style.right = 0;
    slideTitle1.style.right = 0;
    slideTitle2.style.right = 0;
    slideTitle3.style.right = 0;
    slideTitle1.style.transition = "right 0.8s ease-in-out";
    slideTitle2.style.transition = "right 0.8s ease-in-out";
    slideTitle3.style.transition = "right 0.8s ease-in-out";
    event.preventDefault(); //remove o evento padrão que mostra o # na URL
    var top = section1.offsetTop; //função que pega a posição do topo do elemento
    //window.scroll(0,top); //função que dá o scroll para o elemento
    smoothScrollTo(0,top,700);
});
document.querySelector("#link2").addEventListener("click",function(event){
    menuMobile.style.left = "-100%";
    slideButtons.style.right = 0;
    slideTitle1.style.right = 0;
    slideTitle2.style.right = 0;
    slideTitle3.style.right = 0;
    slideTitle1.style.transition = "right 0.8s ease-in-out";
    slideTitle2.style.transition = "right 0.8s ease-in-out";
    slideTitle3.style.transition = "right 0.8s ease-in-out";
    event.preventDefault();
    var top = section2.offsetTop;
    smoothScrollTo(0,top,700);
});
buttonTop.addEventListener("click",function(event){
    event.preventDefault();
    var top = header.offsetTop;
    smoothScrollTo(0,top,700);
});

//SLIDESHOW - MUDANÇAS AO ACIONAR O BOTÃO
document.querySelector("#btn1").addEventListener("click",function(){
    slide.style.marginLeft = 0;
});
document.querySelector("#btn2").addEventListener("click",function(){
    slide.style.marginLeft = "-20%";
});
document.querySelector("#btn3").addEventListener("click",function(){
    slide.style.marginLeft = "-40%";
});

//FUNÇÃO - SCROLL SUAVE
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