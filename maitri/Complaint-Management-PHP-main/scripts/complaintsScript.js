const statusButton = (x) => {
  console.log("Button has been clicked !" + x);
  var heading = document.getElementById("solveStatus" + x);
  heading.textContent = "Solved";
  heading.style.color = "green";
}

function abc(btn) {
  console.log(btn.id);
  document.getElementById(btn.id).parentElement.children[1].style.display = "block";

}

function close1(btn) {
  document.getElementById(btn.id).parentElement.children[1].style.display = "none";
}
modal = document.getElementsByClassName("modal");


// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }


  function toggleDropdown() {
    var dropdownOptions = document.getElementById("dropdownOptions");
    if (dropdownOptions.style.display === "block") {
      dropdownOptions.style.display = "none";
    } else {
      dropdownOptions.style.display = "block";
    }
  }

  function selectRemark(remark) {
    var adminRemarkInput = document.getElementById("adminRemark");
    adminRemarkInput.value = remark;
    toggleDropdown(); // Hide the dropdown after selection
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdownOptions = document.getElementById("dropdownOptions");
      if (dropdownOptions.style.display === "block") {
        dropdownOptions.style.display = "none";
      }
    }
  }

}