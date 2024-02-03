function addToCart(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            document.getElementById("cartCount").innerText = response;
        }
    };
    xhr.send("id" + id);
}


/*
$(document).ready(function(){
    $('#addtocart').submit(function(e){
      e.preventDefault();
      
      $.ajax({
        type: 'POST',
        url: 'index.php',
        data: $('#addtocart').serialize(),
        success: function(response){
          console.log(response);
        }
      });
    });
  });




function toggleAffichageFormulaire() {
    var formulaire = document.getElementById("popUpForm");
    if (formulaire.style.display === "block") {
        
    } else {
        formulaire.style.display === "none";
    }
}

// Ajout d'un écouteur d'événements au bouton pour appeler la fonction toggleAffichageFormulaire() lorsqu'il est cliqué
var button = document.getElementById("addBook"); // Assurez-vous de remplacer "votreBouton" par l'ID réel de votre bouton
button.addEventListener("click", toggleAffichageFormulaire);

let addBook = document.getElementById("addBook");
let popUpForm = document.getElementById("popUpForm")

addBook.addEventListener("click", () => {
    if(getComputedStyle(popUpForm).display != "none"){
        popUpForm.style.display = "none";
    } else {
        popUpForm.style.display = "block";
    }
  })*/
