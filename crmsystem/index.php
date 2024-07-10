<?php
include('Mobile_Detect.php');
include('BrowserDetection.php');
include('db.php');

$browser=new Wolfcast\BrowserDetection;

$browser_name=$browser->getName();
$browser_version=$browser->getVersion();

$detect=new Mobile_Detect();

if($detect->isMobile()){
	$type='Mobile';
}elseif($detect->isTablet()){
	$type='Tablet';
}else{
	$type='PC';
}

if($detect->isiOS()){
	$os='IOS';
}elseif($detect->isAndroidOS()){
	$os='Android';
}else{
	$os='Window';
}

$url=(isset($_SERVER['HTTPS'])) ? "https":"http";
$url.="//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ref='';
if(isset($_SERVER['HTTP_REFERER'])){
	$ref=$_SERVER['HTTP_REFERER'];
}
$sql="insert into visitor(browser_name,browser_version,type,os,url,ref) values('$browser_name','$browser_version','$type','$os','$url','$ref')";
mysqli_query($con,$sql);
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$result=curl_exec($ch);
$result=json_decode($result);

if($result->status=='success'){
	echo "Country:".$result->country.'<br/>';
	echo "Region:".$result->regionName.'<br/>';
	echo "City:".$result->city.'<br/>';
	if(isset($result->lat) && isset($result->lon)){
		echo "Lat:".$result->lat.'<br/>';
		echo "Lon:".$result->lon.'<br/>';
	}
	
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <header class="p-3 mb-3 mt-2">
      <div class="container">
        <div
          class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
        >
          <a
            href="/"
            class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none"
          >
            <img
              src="./images/IKWORX LOGO.png"
              alt=""
              width="100"
              height="100"
              style="margin-top: 30px"
            />
          </a>

          <ul
            class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
          >
            <li class="dropdown">
              <a
                class="nav-link px-2 link-body-emphasis dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Documents and Policies
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Minutes </a></li>
                <li><a class="dropdown-item" href="#">Reports </a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Policies and Constitions</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="portfolios.html" class="nav-link px-2 link-body-emphasis"
                >Portofolio</a
              >
            </li>
            <li>
              <a href="contact-us.html" class="nav-link px-2 link-body-emphasis"
                >Contact-us</a
              >
            </li>
          </ul>

          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input
              type="search"
              class="form-control"
              placeholder="Search..."
              aria-label="Search"
            />
          </form>

          <div class="text-end">
            <a
            href="registration.html"
            type="button"
            class="btn btn-success me-2 text-dark">
            <a
              href="login.html"
              type="button"
              class="btn btn-success me-2 text-dark"
            >
              Login
            </a>
          </div>
        </div>
      </div>
    </header>
    <section class="showcase">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>Lorem ipsum dolor sit amet consectetur.</h1>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis
              accusamus sed numquam veniam? Est earum ipsa maiores qui eligendi
              dolor consequatur doloremque dolorum blanditiis impedit?
            </p>
            <button class="btn btn-md btn-success">Get Started</button>
            <button class="btn btn-md btn-light">know more</button>
          </div>
          <div class="col-md-6">
            <img src="./img/undraw_Community_re_cyrm.png" alt="" />
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <section class="customer-logos slider">
        <div class="slide">
          <img
            src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"
          />
        </div>
        <div class="slide">
          <img
            src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"
          />
        </div>
        <div class="slide">
          <img
            src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"
          />
        </div>
        <div class="slide">
          <img
            src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"
          />
        </div>
        <div class="slide">
          <img
            src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"
          />
        </div>
        <div class="slide">
          <img
            src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"
          />
        </div>
        <div class="slide">
          <img
            src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"
          />
        </div>
      </section>
    </div>
    <script
      src="https://code.jquery.com/jquery-2.2.0.min.js"
      type="text/javascript"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js"></script>
  </body>
</html>
