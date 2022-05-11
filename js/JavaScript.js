'use strict';
const comand = document.querySelector('.phone-link')
const modal = document.querySelector('.modal_link');
const closeModal = document.querySelector('.btn-close');

comand.addEventListener('click' , function() {
	modal.classList.remove('hide');
});

modal.addEventListener('click' , function(e){
     const target = e.target;
     if(target == modal || target == closeModal){
     	modal.classList.add('hide');
     }  
});
document.addEventListener('keydown' ,  function(event) {
	const key = event.key;
	if(key == 'Escape'){
		modal.classList.add('hide');
	}
});

//features btn conect

var elem = new Object();
var elem = {
    modall: document.querySelector('.modall_add'), 
	close: document.querySelector('.btn_close1'), 
	title: document.querySelector('.modall_header'), 
	price: document.querySelector('.price'),
	btn1:  document.querySelector('.btn_1'),
	btn2:  document.querySelector('.btn_2'),
	btn3:  document.querySelector('.btn_3'),
	btn4:  document.querySelector('.btn_4'),
	btn5:  document.querySelector('.btn_5'),
	btn6:  document.querySelector('.btn_6'),
	btn7:  document.querySelector('.btn_7'),
	btn8:  document.querySelector('.btn_8')
};
const image = document.querySelector('.modall_img');

function event(elem){
	elem.modall.classList.remove('hide');
}
function changeElem (title , price) {
	elem.title.textContent = title;
	elem.price.textContent = price;
};

elem.btn1.addEventListener('click' , () =>{
	changeElem('Навес для авто' , '6 999');
	image.src = './img/photo1.jpg';
	elem.modall.classList.remove('hide'); 
});

elem.btn2.addEventListener('click' , () =>{
	changeElem('Навес к дому' , '80 000');
	image.src = './img/photo2.png';
	elem.modall.classList.remove('hide'); 
});
elem.btn3.addEventListener('click' , () =>{
	changeElem('Навес над бассейном','15 000');
	image.src = './img/photo3.png';
	elem.modall.classList.remove('hide'); 
});
elem.btn4.addEventListener('click' , () =>{
	changeElem('Козырьки','33 333');
	image.src = './img/photo4.png';
	elem.modall.classList.remove('hide'); 
});
elem.btn5.addEventListener('click' , () =>{
	changeElem('Навес над мангальной зоной','6 666');
	image.src = './img/photo5.png';
	elem.modall.classList.remove('hide'); 
});
elem.btn6.addEventListener('click' , () =>{
	changeElem('Беседки','6 969');
	image.src = './img/photo6.png';
	elem.modall.classList.remove('hide'); 
});
elem.btn7.addEventListener('click' , () =>{
	changeElem('Террасы','696 969');
	image.src = './img/photo7.png';
	elem.modall.classList.remove('hide'); 
});
elem.btn8.addEventListener('click' , () =>{
	changeElem('Навес над зоной парковки','89 000');
	image.src = './img/photo8.png';
	elem.modall.classList.remove('hide'); 
});

elem.modall.addEventListener('click' , function(e){
     const target = e.target;
     if(target == elem.modall || target == elem.close){
     	elem.modall.classList.add('hide');
     };
     
});
document.addEventListener('keydown' ,  function(event) {
	const key = event.key;
	if(key == 'Escape'){
		elem.modall.classList.add('hide');
	}
});