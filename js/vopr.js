'use strict';
const btnQuest = document.querySelector('.btn-q');
const modalQuest = document.querySelector('.modal_quest');
const Close = document.querySelector('#close-btn');
console.log(Close);
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activee");

    var panel = this.nextElementSibling;

    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

btnQuest.addEventListener('click' , function() {
	modalQuest.classList.remove('hide');
});
modalQuest.addEventListener('click' , function(e){
     const target = e.target;
     if(target == modalQuest || target == Close){
     	modalQuest.classList.add('hide');
     }  
});
document.addEventListener('keydown' ,  function(event) {
	const key = event.key;
	if(key == 'Escape'){
		modalQuest.classList.add('hide');
	}
});