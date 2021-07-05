    <div id="blog" data-scroll-index="6" class="section lb">
        <div class="container">
                        
            <div class="row">
                <?php
                    echo '
                    <div class="col-md-12 col-sm-6 col-lg-12">
                        <div class="post-box">
                            <div class="">
                                <center>
                                <img src="'.base_url("assets/banner/$prodi->banner").'" class="img-responsive" alt="post-img" width="50%"/>  
                                </center>                               
                            </div>
                            <div class="post-info">
                                <h4>'.$prodi->nama_prodi.'</h4>
                                
                            </div>
                            <div class="post-box col-md-12">
                            '.$prodi->profil.'
                            </div>
                        </div>
                        <br>
                    </div>
                    ';
                ?>
            </div>            
        </div>
    </div>