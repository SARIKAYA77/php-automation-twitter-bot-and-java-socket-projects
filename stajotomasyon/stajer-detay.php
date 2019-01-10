

<?php if (!isset($_GET["id"]) && !is_numeric($_GET["id"])) header ("Location:stajer.php"); ?>
<?php if (isset($_GET["id"]) && !is_numeric($_GET["id"])) header ("Location:stajer.php"); ?>	


<?php include ("header.php") ?>


<div class="container-fluid">

        <div class="side-body">
           <h1> Stajer Detay </h1>
            <div class="row">

                <div class="col-md-12">

                 
            	<div id="stajerDetay">

            	</div>
    

                </div>
                
            </div>
           
        </div>


  
 

</div>
       

 <script type="text/javascript">
$(document).ready(function() {
var staj_id=<?php echo $_GET["id"];?>;

function stajerBilgiGetir () {

	$("#stajerDetay").load("stajer-getir.php",{id:staj_id}, function() {

    var aktifUniversiteID=$("#aktif_un_id").val();
    var aktifBolumID=$("#aktif_bolum_id").val();
    var aktifDepartmanID=$("#aktif_dep_id").val();
	$("#departman_ID").load("departman-getir.php");
	$("#universite_ID").load("universite-getir.php", function(){
		
		
    $("#departman_ID").val(aktifDepartmanID).change();
		$("#universite_ID").val(aktifUniversiteID).change();

		var universite_id=$("#universite_ID option:selected").val();
    	$("#bolum_ID").load("bolum-getir.php",{"id":universite_id});
      $("#bolum_ID").val(aktifBolumID).change();
    	
	});

	  $('#universite_ID').on('change', function() {
          var id=$(this).val();
              $("#bolum_ID").load("bolum-getir.php",{"id":id});     
        });

	$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    $(this).removeClass("btn-default").addClass("btn-primary");  

        $("#bilgiGuncelle").click(function() {

			

		}); 

}); 

	$("#bilgiGuncelle").click(function() {

	 var str = $( "form" ).serialize();


	 	  $.ajax({
          type: "POST",
          url: "stajer-duzenle.php",
          data:str,
          success:function(msg){
                  
                 stajerBilgiGetir ();

          }
      });



	});



});

}

stajerBilgiGetir ();



});
</script>


</body>
</html>


