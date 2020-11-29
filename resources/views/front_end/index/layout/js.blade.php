<footer>
  <div class="footer-page">
      <div>
        <div class="footer-title">
          LIÊN HỆ
      </div>
        <div class="footer-name">
          HOA BAN LMHT™
        </div>
        <div class="footer-description">
          <i class='fas fa-feather'></i> Nhà số 7, Khu liền kề Minori, 67A Trương Định,<br> Quận Hai Bà Trưng, Hà Nội
        </div>
        <div class="footer-admin">
          <i class='fas fa-feather'></i> Giờ làm việc: Thứ 2 -> thứ 7 từ 8:00 đến 21:00  |  <br>Chủ Nhật từ 8:30 đến 17:30
        </div>
      </div>
      <div>
          <div class="footer-title">
              Facebook
          </div>
          <div>
            <div class="fb-page" data-href="https://www.facebook.com/LienMinhHuyenThoai" data-tabs="timeline" data-width="" data-height="70px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/LienMinhHuyenThoai" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/LienMinhHuyenThoai">Liên Minh Huyền Thoại</a></blockquote></div>          </div>
      </div>
      <div>
        <div class="footer-title">
          Chi tiết
        </div>
        <div class="footer-enier">
            Người chịu trách nhiệm :
        </div>
        <div class="footer-enier">
            Antonyms Joy
        </div>
        <div class="footer-enier">
            Tel : (84-4) 7 300 2828 - Fax : (84-4) 7 300 2828.
        </div>
        <div class="footer-enier">
             237/GP-BTTTT ngày cấp 12/06/2015 B
        </div>
      </div>
  </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

@if(session()->has('success'))
<script >
$.toast({
  heading: 'Success',
  text:  'Bạn đã gửi mail tới gô hoàng',
  bgColor: '#FF1356',
  position: 'mid-center',
  stack: false
})
</script>
@endif

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=656859155250511&autoLogAppEvents=1" nonce="MVhQZKSV"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
  var typed = new Typed(".living",{
      strings: ["Write yourself  down  own life! ",],
      typeSpeed: 100,
      backSpeed: 70,
      loop: true
  })
</script>



<script>
  $(document).ready(function() {
  $('.open').click(function () {
          $(this).next('.sub-menu').toggle();
    });
  });

  $(".on").click(function(){
      $(".menu-reponse").toggleClass('active-menu');
      $(".on i").toggleClass('active-menu');
  })
</script>

<script>
    $(".logo").click(function(){
          $(".header-search-top").toggleClass('header-search-top-active');
          $(".all-search-top").toggleClass('all-search-top-active');
          $(".button-search-top").toggleClass('button-search-top-active');
      })

      $(".button-search-top").click(function(){
          $(".header-search-top").toggleClass('header-search-top-active');
          $(".all-search-top").toggleClass('all-search-top-active');
          $(".button-search-top").toggleClass('button-search-top-active');
      })
</script>



<script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 5,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      loop:true,
      pagination: {
        el: '.swiper-pagination',
      },
    });
</script>


<script>
    $(document).ready(function(){
        $('.banner-one:first').show()
        $('.button-new:first').addClass('active')
    })
    $('.button-new').click(function(event){
        index = $(this).index();
        $('.button-new').removeClass('active')
        $(this).addClass('active')
        $('.banner-one').hide();
        $('.banner-one').eq(index).show();
    })
</script>


<script>
      window.addEventListener("scroll", function(){
            let header = document.querySelector('header');
            header.classList.toggle("sticky",window.scrollY > 0)
        })

        $(document).ready(function(){
            $(window).scroll(function(){
                if(this.scrollY > 500){
                    $('.scroll-up-btn').addClass('show')
                }else{
                    $('.scroll-up-btn').removeClass('show')
                }
            })
        })

        $(".scroll-up-btn").click(function(){
            $("html").animate({scrollTop: 0});
        })

</script>
