





<?php include ("header.php") ?>

<?php include("islemler.php"); ?>

 <!-- Main Content -->
    <div class="container-fluid">

        <div class="side-body">
           <h1> Kayıtlı Stajerler </h1>
           <pre> Soldaki menüden işlemler yapabilirsiniz. </pre>
           
          <div id="butonlar"></div>
           <div id="yukle">
             
           </div>
          

               
           
        </div>
 

</div>


       

</body>
</html>

<script type="text/javascript" >
  $(document).ready(function() {
 

$("#yukle").load("stajerlistele-vt.php");

 
  
  $("#yukle").on( "click", ".pagination a", function (e){
    e.preventDefault();
 
    var sayfa = $(this).attr("data-page");
    $("#yukle").load("stajerlistele-vt.php",{"sayfa":sayfa});
    
  });


 
  $(document).on( "click", "#secim", function (e){
    e.preventDefault();
 
    if ($("#yukle input" ).prop( "checked"))
      $("#yukle input" ).prop( "checked",false);
    else
      $("#yukle input" ).prop( "checked",true);
    
  });

  $(document).on( "click", "#secimSil", function (e){
      e.preventDefault();
      var id = $('#yukle input:checkbox:checked').map(function() {
          return this.value;
      }).get();
          
      var gonder="id="+id;
      
      $.ajax({
          type: "POST",
          url: "stajersil-vt.php",
          data:gonder,
           beforeSend:function() {
               $("#yukle input:checkbox:checked").parent().parent().fadeOut(3000);},
          success:function(msg){
                       
          }
      });


    
              
    
  });

  
});



</script>



<?php $baglan->close() ?>;