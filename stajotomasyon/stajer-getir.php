<?php
	if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	include ("islemler.php");

	$stajer=new Stajer();
	$id=$_POST["id"];
	$stajerDizi=$stajer->stajerGetir($id,$baglan);

if ($stajerDizi[0]["bolum_id"]!="0") {


                 echo '<div class="col-lg-12">
                         <div class="card hovercard">
                                <div class="card-background">
                                     <img class="card-bkimg" alt="'.$stajerDizi[0]["stj_ad"].' '.$stajerDizi[0]["stj_soyad"].'" src="img/bg.jpg">
                                                   
                                </div>
                                <div class="useravatar">
                                     <img alt="'.$stajerDizi[0]["stj_ad"].' '.$stajerDizi[0]["stj_soyad"].'" src="'.$stajerDizi[0]["stj_foto"].'">
                                </div>
                                <div class="card-info"> <span class="card-title">'.$stajerDizi[0]["stj_ad"].' '.$stajerDizi[0]["stj_soyad"].'</span>

                                </div>
                        </div>
                        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                                <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                 <div class="hidden-xs">Kişisel Bilgiler</div>
                                 </button>
                       </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                            <div class="hidden-xs">Şirket Bilgileri</div>
                            </button>
                       </div>
                        <div class="btn-group" role="group">
                                    <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        <div class="hidden-xs">Tüm Bilgileri Düzenle</div>
                                    </button>
                        </div>
                         </div>

                  

                      <div class="well">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" style="height:200px;" id="tab1">
                                    <h3>Kişisel Bilgiler</h3>
                                  <div class="col-md-3" style="height:1px; background-color:blue;"></div><div class="col-md-9" style="height:1px; background-color:black;"></div>
                                    <div class="col-md-12" style="margin-top:10px;"><label>T.C. Kimlik Numarası:</label> '.$stajerDizi[0]["stj_tc"].'</div>
                                    <div class="col-md-12"><label>Doğum Tarihi:</label>'.$stajerDizi[0]["stj_dogum"].'</div>
                                    <div class="col-md-12"><label>Yaşadığı Şehir:</label> '.$stajerDizi[0]["stj_sehir"].'</div>
                                    <div class="col-md-12"><label>Üniversite:</label> '.$stajerDizi[0]["universite_ad"].'</div>
                                    <div class="col-md-12"><label>Bölümü:</label> '.$stajerDizi[0]["bolum_ad"].'</div>

                                </div>
                            <div class="tab-pane fade in"  style="height:300px;	overflow: scroll;" id="tab2">
                                <h3>Şirket Bilgileri</h3>
                                    <div class="col-md-3" style="height:1px; background-color:blue;"></div><div class="col-md-9" style="height:1px; background-color:black;"></div>
                                    <div class="col-md-12" style="margin-top:10px;"><label>Çalıştığı Departman:</label> '.$stajerDizi[0]["departman_ad"].'</div>
                                    <div class="col-md-12"><label>Proje Konusu:</label> '.$stajerDizi[0]["stj_proje_konu"].'</div>
                                    <div class="col-md-12"><label>Proje Açıklama:</label></div>
                                    <div class="col-md-12" style="margin-top:-5px;">'.$stajerDizi[0]["stj_proje_icerik"].'</div>
                                                         
                            </div>
                            <div class="tab-pane fade in" style="height:500px; overflow: scroll;" id="tab3">
                                 <h3>Tümünü Düzenle</h3>
                                      <form>
                                    <div class="form-group">
                                      <label class="control-label col-sm-12">Adı:</label>
                                      <div class="col-sm-12">
                                        <input type="hidden" class="form-control" name="ID" value="'.$stajerDizi[0]["ID"].'">
                                        <input type="text" class="form-control" name="stj_ad" value="'.$stajerDizi[0]["stj_ad"].'">
                                      </div>
                                    </div>

                                     <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Soyadı:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_soyad" value="'.$stajerDizi[0]["stj_soyad"].'">
                                      </div>
                                    </div>

                                     <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">TC Kimlik No:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_tc" value="'.$stajerDizi[0]["stj_tc"].'">
                                      </div>
                                    </div>

                                        <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Doğum Tarihi:</label>
                                      <div class="col-sm-12">
                                        <input type="date" class="form-control" name="stj_dogum" value="'.$stajerDizi[0]["stj_dogum"].'">
                                      </div>
                                    </div>

                                        <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Yaşadığı Şehir:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_sehir" value="'.$stajerDizi[0]["stj_sehir"].'">
                                      </div>
                                    </div>


                                        <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Cep Tel No:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_cep" value="'.$stajerDizi[0]["stj_cep"].'">
                                      </div>
                                    </div>


                                       <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Email:</label>
                                      <div class="col-sm-12">
                                        <input type="email" class="form-control" name="stj_email" value="'.$stajerDizi[0]["stj_email"].'">
                                      </div>
                                    </div>

                                       <div class="form-group">
                                      <label style="margin-top:15px;" class="control-label col-sm-12 ust-bosluk">Üniversite:</label>
                                      <div class="col-sm-12">
                                      	<input type="hidden" value="'.$stajerDizi[0]["universite_id"].'" id="aktif_un_id">
                                        <select class="form-control" id="universite_ID" name="universite_id" >

                                      	</select>
                                      </div>
                                    </div>

                                     <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Bölüm:</label>
                                      <div class="col-sm-12">
                                      	<input type="hidden" value="'.$stajerDizi[0]["bolum_id"].'" id="aktif_bolum_id">
                                        <select class="form-control" id="bolum_ID" name="bolum_id">
                                       
                                        </select>
                                      </div>
                                    </div>

                                        <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Departman:</label>
                                      <div class="col-sm-12">
                                      	<input type="hidden" value="'.$stajerDizi[0]["departman_id"].'" id="aktif_dep_id">
                                        <select class="form-control" id="departman_ID" name="departman_id">
                                          
                                        </select>
                                      </div>
                                    </div>

                                       <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Staj Başlama Tarihi:</label>
                                      <div class="col-sm-12">
                                        <input type="date" class="form-control" name="stj_baslama" value="'.$stajerDizi[0]["stj_baslama"].'">
                                      </div>
                                    </div>


                                       <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Staj Bitiş Tarihi:</label>
                                      <div class="col-sm-12">
                                        <input type="date" class="form-control" name="stj_bitis" value="'.$stajerDizi[0]["stj_bitis"].'">
                                      </div>
                                    </div>





                                             <div class="form-group">
                                      <label class="control-label col-sm-12 ust-bosluk">Proje Konusu:</label>
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="stj_proje_konu" value="'.$stajerDizi[0]["stj_proje_konu"].'">
                                      </div>
                                    </div>

                                

                                    <div class="form-group">
                                      <label style="margin-top:10px;" class="control-label col-sm-12">Proje Açıklama:</label>
                                      <div class="col-sm-12">
                                          <textarea name="stj_proje_icerik" class="form-control" rows="5">'.$stajerDizi[0]["stj_proje_icerik"].'</textarea>
                                      </div>
                                    </div>



                                    <div class="form-group">
                                     
                                      <div class="col-sm-12">
                                          <input class="col-md-12 btn btn-primary" style="margin-top:10px;" type="button" name="gonder" id="bilgiGuncelle" value="Kaydet" />
                                      </div>
                                    </div>
                                   
                                  </form>
                             </div>
                            </div>
                        </div>

                      
                    
                    </div>';

}

else 
echo "hata";



	  

	$baglan->close();
	unset($stajerDizi);

}

?>