console.log("dfgdfg");
 var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }

// /------------------------------------------/ 

  var profileButton = document.getElementById('profileButton');
  var profilePopup = document.querySelector('.profile-popup');

  profilePopup.style.display = 'none';

  profileButton.addEventListener('click', function (event) {
    event.stopPropagation(); 
    profilePopup.style.display = profilePopup.style.display === 'block' ? 'none' : 'block';
  });

  document.addEventListener('click', function (event) {
    if (!event.target.matches('.profile-popup') && !event.target.matches('#profileButton')) {
      profilePopup.style.display = 'none';
    }
  });

  profilePopup.addEventListener('click', function (event) {
    event.stopPropagation();
  });
;
