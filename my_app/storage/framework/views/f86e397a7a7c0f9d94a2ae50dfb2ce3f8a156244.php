<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //for-mobile-apps -->
    <link href="<?php echo e(asset('store/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('store/css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="<?php echo e(asset('store/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('store/css/custom.css')); ?>" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="<?php echo e(asset('store/js/jquery-1.11.1.min.js')); ?>"></script>
    <!-- //js -->
    <link
        href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="<?php echo e(asset('store/js/move-top.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('store/js/easing.js')); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });

    </script>
    <!-- start-smoth-scrolling -->
</head>

<body>
    <!-- header -->
    <?php echo $__env->make('store.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //header -->

    <!-- navigation -->
    <?php echo $__env->make('store.layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- //navigation -->
    <!-- content -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- //content -->
    <!-- //footer -->
    <?php echo $__env->make('store.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Messenger Plugin chat Code -->
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "105850638379328");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v17.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Messenger Plugin chat Code -->

    <!-- //footer -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(asset('store/js/bootstrap.min.js')); ?>"></script>

    <!-- top-header and slider -->
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear'
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });

    </script>
    <!-- //here ends scrolling icon -->
    
    <!-- main slider-banner -->
    <script src="<?php echo e(asset('store/js/skdslider.min.js')); ?>"></script>
    <link href="<?php echo e(asset('store/css/skdslider.css')); ?>" rel="stylesheet">
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#demo1').skdslider({
                'delay': 5000,
                'animationSpeed': 2000,
                'showNextPrev': true,
                'showPlayButton': true,
                'autoSlide': true,
                'animationType': 'fading'
            });

            jQuery('#responsive').change(function () {
                $('#responsive_wrapper').width(jQuery(this).val());
            });

        });

    </script>
    <!-- //main slider-banner -->

    <!-- My Cart Script -->
    <script type="text/javascript">
        let myCart = document.getElementById("my-cart");

        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                myCart.style.display = "block";
            } else {
                myCart.style.display = "none";
            }
        }

        function addCart() {
            const badge = $(".badge-number");
            const number = parseInt(badge.text()) + 1;

            badge.text(number);
        }
    </script>
    <!-- //My Cart Script -->

    <?php echo $__env->make('store.scripts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /var/www/html/my_app/resources/views/store/master.blade.php ENDPATH**/ ?>