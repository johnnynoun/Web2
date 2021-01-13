

  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }


  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  function getitems(){
    $.ajax({
  url: "search.php",
  method :"POST",
  data:{"itemSearched":$("#searchinput").val()}
}).done(function( data )  {
  $("#searchwrp").show();
  $("#homewrp").hide();

  $("#searchwrp").html(data);
});
  }
