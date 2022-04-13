// API 
const threshold = .1
const options = {
	root:null,
	rootMargin:'0px',//a partir de combien de marges faut il depasser pour etre visible
	threshold//a partir de 10% d'element on commence a faire apparaitre lelement
}

const handleIntersect = function (entries, observer) {
	entries.forEach(function (entry) {
	  if (entry.intersectionRatio > threshold) {
			entry.target.classList.add('reveal-visible');
			observer.unobserve(entry.target);
		} 
	});
}
const observer = new IntersectionObserver(handleIntersect ,options)
document.querySelectorAll('.reveal').forEach(function(r){

	observer.observe(r)

})


// SHOW PASSWORD 
function showPass() {
  var x = document.querySelector(".hide-pass");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
}

// SHOW PASSWORD COFIRMATION
function showPassConfirmation() {
  var x = document.querySelector(".hide-pass-confirmation");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
}

// BURGER MENU 
document.getElementById('hamburger').addEventListener('click', checkNav);
window.addEventListener("keyup", function(e) {
  if (e.keyCode == 27) closeNav();
}, false);

function checkNav() {
  if (document.body.classList.contains('hamburger-active')) {
    closeNav();
  } else {
    openNav();
  }
}

function closeNav() {
  document.body.classList.remove('hamburger-active');
}

function openNav() {
  document.body.classList.add('hamburger-active');
}

// LOTS ACCORDION 
let accordions = document.querySelectorAll(".accordion");
accordions.forEach((acc) =>
  acc.addEventListener("click", () => {
    acc.classList.toggle("active");
    let panel = acc.nextElementSibling;
    panel.classList.toggle("activeP");
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  })
);

// ENLEVER LE PLACEHOLDER ON CLICK 
let input = document.querySelectorAll('.inputs');

if (input) {
  for (let i = 0; i < input.length; i++) {
  input[i].addEventListener('click', function () {
        let thisElement = this;

        let savePlaceholder = this.getAttribute('placeholder');

        this.setAttribute('placeholder', ' ');
        document.addEventListener('mouseup', function () {
          thisElement.setAttribute('placeholder', savePlaceholder);
        });
    });
  }
}


// BUDGET FUNCTION 
// function getVals(){
//   // Get slider values
//   var parent = this.parentNode;
//   var slides = parent.getElementsByTagName("input");
//       var slide1 = parseFloat( slides[0].value );
//       var slide2 = parseFloat( slides[1].value );
//   // Neither slider will clip the other, so make sure we determine which is larger
//   if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
//   var displayElement = parent.getElementsByClassName("rangeValues")[0];
//       displayElement.innerHTML =  slide1 +"€ " + " - " + slide2 + "€" ;
//   }

//   window.onload = function(){
//   // Initialize Sliders
//   var sliderSections = document.getElementsByClassName("range-slider");
//       for( var x = 0; x < sliderSections.length; x++ ){
//           var sliders = sliderSections[x].getElementsByTagName("input");
//           for( var y = 0; y < sliders.length; y++ ){
//           if( sliders[y].type ==="range" ){
//               sliders[y].oninput = getVals;
//               // Manually trigger event first time to display values
//               sliders[y].oninput();
//           }
//           }
//       }
//   }


 // INPUTS 
//  let new_input = document.getElementById('a');
//  let heart_input = document.getElementById("b");
//  let crown_input = document.getElementById("c");

//  // ICONS
//  let new_icon = document.getElementById("new");
//  let heart_icon = document.getElementById("heart");
//  let crown_icon = document.getElementById("crown");


//  NEW 
//  new_input.addEventListener("click", () => {

//   if (new_icon.style.display === "flex")
//   {
//     new_icon.style.display = "none";
//   }
//   else
//   {
//     new_icon.style.display = "flex";
//   }
// });

// CROWN 
// crown_input.addEventListener("click", () => {

//   if (crown_icon.style.display === "flex")
//   {
//     crown_icon.style.display = "none";
//   }
//   else
//   {
//     crown_icon.style.display = "flex";
//   }
// });

// HEART 
// heart_input.addEventListener("click", () => {

//   if (heart_icon.style.display === "flex")
//   {
//     heart_icon.style.display = "none";
//   }
//   else
//   {
//     heart_icon.style.display = "flex";
//   }
// });


