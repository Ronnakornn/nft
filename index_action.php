<?php 
require_once("libs/session.php");
require_once("libs/connect.php");
?>

<?php if($_POST["myaction"]=="datalist"){?>
  <form action="" method="post" name="myForm" id="myForm">
    <input name="myaction" type="hidden" id="myaction" value="" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST["module_pageshow"]?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST["module_pagesize"]?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST["module_orderby"]?>" />
    <input name="module_adesc" type="hidden" id="module_adesc" value="<?php echo $_REQUEST["module_adesc"]?>" /> 
      
    <br><br><br>
    <ul class="cards">
      <li>
        <a  class="card" style="background-color: coral;">
          <!-- <img src="https://i.imgur.com/oYiTqum.jpg" class="card__image" alt="" /> -->
          <div class="card__overlay">
            <div class="card__header"> 
              <center><h6 class="title text-primary">Air Force 1</h6></center>
              <div class="card__header-text"> 
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Usename</h3></div>
                  <div class="col-6  text-primary" style="text-align: right;">0811892429</div>
                </div>  
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Name</h3></div>
                  <div class="col-6  text-primary" style="text-align: right;">Thammanoon Kaewlomwan</div>
                </div>  
                <div class="row">
                  <div class="col-6"><h3 class="card__title">ราคา Cpan ปัจจุบัน</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">201.45</div>
                </div>
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Cpan ที่ได้รับ</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">500</div>
                </div>
                <div class="row">
                  <div class="col-6"><h3 class="card__title">รายได้ปัจบัน</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">15,000</div>
                </div>
              </div>
            </div>
            <div class="card__description">
              <div class="row">
                <div class="col-12"><h3 class="card__title">metamask wallet: </h3></div><br>
                <div class="col-12 text-primary">0xd10401ebb310C204132781B30AF6e92c948692a9</div>
              </div>
              <div class="row">
                <div class="col-12"><h3 class="card__title">binance wallet: </h3></div>
                <div class="col-12 text-primary">0xd10401ebb310C204132781B30AF6e92c948692a9</div>
              </div> 
              </div>
          </div>
        </a>      
      </li>
      <li>
        <a  class="card" style="background-color: coral;">
          <!-- <img src="https://i.imgur.com/oYiTqum.jpg" class="card__image" alt="" /> -->
          <div class="card__overlay">
            <div class="card__header"> 
              <center><h6 class="title text-primary">Air Force 2</h6></center>
              <div class="card__header-text"> 
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Usename</h3></div>
                  <div class="col-6  text-primary" style="text-align: right;">0811892429</div>
                </div>  
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Name</h3></div>
                  <div class="col-6  text-primary" style="text-align: right;">Thammanoon Kaewlomwan</div>
                </div>  
                <div class="row">
                  <div class="col-6"><h3 class="card__title">ราคา Cpan ปัจจุบัน</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">201.45</div>
                </div>
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Cpan ที่ได้รับ</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">500</div>
                </div>
                <div class="row">
                  <div class="col-6"><h3 class="card__title">รายได้ปัจบัน</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">15,000</div>
                </div>
              </div>
            </div>
            <div class="card__description">
              <div class="row">
                <div class="col-12"><h3 class="card__title">metamask wallet: </h3></div><br>
                <div class="col-12 text-primary">0xd10401ebb310C204132781B30AF6e92c948692a9</div>
              </div>
              <div class="row">
                <div class="col-12"><h3 class="card__title">binance wallet: </h3></div>
                <div class="col-12 text-primary">0xd10401ebb310C204132781B30AF6e92c948692a9</div>
              </div> 
              </div>
          </div>
        </a>      
      </li>
      <li>
        <a  class="card" style="background-color: coral;">
          <!-- <img src="https://i.imgur.com/oYiTqum.jpg" class="card__image" alt="" /> -->
          <div class="card__overlay">
            <div class="card__header"> 
              <center><h6 class="title text-primary">Air Force 3</h6></center>
              <div class="card__header-text"> 
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Usename</h3></div>
                  <div class="col-6  text-primary" style="text-align: right;">0811892429</div>
                </div>  
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Name</h3></div>
                  <div class="col-6  text-primary" style="text-align: right;">Thammanoon Kaewlomwan</div>
                </div>  
                <div class="row">
                  <div class="col-6"><h3 class="card__title">ราคา Cpan ปัจจุบัน</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">201.45</div>
                </div>
                <div class="row">
                  <div class="col-6"><h3 class="card__title">Cpan ที่ได้รับ</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">500</div>
                </div>
                <div class="row">
                  <div class="col-6"><h3 class="card__title">รายได้ปัจบัน</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">15,000</div>
                </div>
              </div>
            </div>
            <div class="card__description">
              <div class="row">
                <div class="col-12"><h3 class="card__title">metamask wallet: </h3></div><br>
                <div class="col-12 text-primary">0xd10401ebb310C204132781B30AF6e92c948692a9</div>
              </div>
              <div class="row">
                <div class="col-12"><h3 class="card__title">binance wallet: </h3></div>
                <div class="col-12 text-primary">0xd10401ebb310C204132781B30AF6e92c948692a9</div>
              </div> 
              </div>
          </div>
        </a>      
      </li>   
    </ul>
  </form>



<?php }else if($_POST["myaction"]=="insert"){?>
    <?php
       
    ?>

<?php }else if($_POST["myaction"]=="update"){?>
    <?php
      
    ?>


<?php }else if($_POST["myaction"]=="delete"){?>
    <?php
     
    ?>

 
<?php } ?>


<style>

:root {
  --surface-color: #fff;
  --curve: 40;
}

* {
  box-sizing: border-box;
}

body {
  font-family: 'Noto Sans JP', sans-serif;
  background-color: #000;
}

.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin: 2rem 3vw;
  padding: 0;
  list-style-type: none;
}

.card {
  position: relative;
  display: block;
  height: 500px;  
  border-radius: calc(var(--curve) * 1px);
  overflow: hidden;
  text-decoration: none;
}

.card__image {      
  width: 100%;
  height: auto;
}

.card__overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;      
  border-radius: calc(var(--curve) * 1px);    
  background-color: var(--surface-color);      
  transform: translateY(100%);
  transition: .2s ease-in-out;
}

.card:hover .card__overlay {
  transform: translateY(0);
}

.card__header {
  position: relative;
  /* display: flex; */
  align-items: center;
  gap: 2em;
  padding: 2em;
  border-radius: calc(var(--curve) * 1px) 0 0 0;    
  background-color: var(--surface-color);
  transform: translateY(-100%);
  transition: .2s ease-in-out;
}

.card__arc {
  width: 80px;
  height: 80px;
  position: absolute;
  bottom: 100%;
  right: 0;      
  z-index: 1;
}

.card__arc path {
  fill: var(--surface-color);
  d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
}       

.card:hover .card__header {
  transform: translateY(0);
}

.card__thumb {
  flex-shrink: 0;
  width: 50px;
  height: 50px;      
  border-radius: 50%;      
}

.card__title {
  font-size: 1em;
  margin: 0 0 .3em;
  color: #000;
}

.card__tagline {
  display: block;
  margin: 1em 0;
  font-family: "MockFlowFont";  
  font-size: .8em; 
  color: #000;  
}

.card__status {
  font-size: .8em;
  color: #000;
}

.card__description {
  padding: 0 2em 2em;
  margin: 0;
  color: #000;
  font-family: "MockFlowFont";   
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 3;
  overflow: hidden;
}    
</style>