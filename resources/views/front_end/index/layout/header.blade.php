<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<style>
.swiper-container {
      width: 50%;
      padding-top: 50px;
      padding-bottom: 50px;
  }
  
.swiper-slide {
    background-position: center;
    background-size: cover;
    width: 300px;
    height: 300px;
    -webkit-box-reflect: below 1px linear-gradient(transparent,#0006) ;
} 

.swiper-slide >.swiper-slide-image {
    width: 100% !important;
    height: 80% !important;
    transition: 0.5s
} 

.swiper-slide img:hover {
    transform: scale(1.06);
}

</style>


<style>
    .menu-reponse {
      position: fixed;
      height: 100%;
      width: 60%;
      top: 0;
      background-color: #131314;
      z-index: 1000;
      -webkit-transition: all 0.6s ease;
      transition: all 0.6s ease;
      left: -100%;
      padding: 7% 0 0;
    }
    
    .menu-reponse li {
      list-style: none;
    }
    
    .menu-reponse li a {
      display: block;
      padding: 10% 0 0;
      text-decoration: none;
      color: #fff;
    }
    
    .menu-reponse li a i {
      float: right;
      margin-right: 20px;
    }
    
    .menu-down {
      padding: 20px 0;
    }
    
    .active {
      left: 0;
    }
    
    .menu-center {
      text-align: center;
      color: #eb2121;
      font-size: 25px;
    }
    
    .on i.active:before {
      content: "\f00d";
      color: #fff;
      font-size: 18px;

    }
    
    .sub-menu {
      display: none;
      -webkit-transition: all 0.6s ease;
      transition: all 0.6s ease;
    }
    
    .sub-menu li a {
      margin: 0 15px;
    }
    
    .menu-border {
      padding: 15px;
      border-bottom: 1px solid #88858544;
      width: 88%;
    }


</style>


<style>
  .all {
    background-color: red;
}
</style>

