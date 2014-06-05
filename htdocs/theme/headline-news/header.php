<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
	<link rel='stylesheet' id='over'  href='/shared/css/test.css' type='text/css' media='all' />
	<script type="text/javascript" src="http://hidden-champion.net/shared/js/spectragram.min.js"></script>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
		<header id="page-header" class="clearfix">
      

      <div class="header-middle">
        <div class="container">
          <div id="logo-image" class="pull-left">
            <a href="/"><img src="/shared/images/common/logo2-2.png" alt="HIDDEN BMX"></a>
          </div>

          <div id="top-banner" class="banner-adv pull-right">
            <a target="_blank" href="">
              <img src="/shared/images/banner/Top-banner_sample.jpg" alt=""></a>
          </div>
        </div>
      </div>

      <div class="header-top">
        <div class="container">
          <?php echo g7_menu('mainmenu'); ?>

         <!--  <ul id="menu-global">
            
            <li id="menu-item-1" class="menu-item">
              <a href="">TOP</a>
            </li>
            <li id="menu-item-2" class="menu-item">
              <a href="">NEWS</a>
            </li>
            <li id="menu-item-3" class="menu-item">
              <a href="">VIDEO</a>
            </li>
            <li id="menu-item-4" class="menu-item">
              <a href="">INTERVIEW</a>
            </li>
            <li id="menu-item-5" class="menu-item">
              <a href="">TOP5</a>
            </li>
            <li id="menu-item-6" class="menu-item">
              <a href="">LOCAL CREW</a>
            </li>
            <li id="menu-item-7" class="menu-item">
              <a href="">UP COMER</a>
            </li>
            <li id="menu-item-8" class="menu-item">
              <a href="">BRAND STORY</a>
            </li>
            <li id="menu-item-9" class="menu-item">
              <a href="">MAGAZINE</a>
            </li>
          </ul> -->

          <ul id="header-social-links">
            <li>
              <a class="kopa-social-link" href="https://www.facebook.com/HIDDENBMXMAG" target="_blank" title="Facebook" rel="nofollow"> <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a class="kopa-social-link" href="https://twitter.com/HIDDEN_BMX" target="_blank" title="Twitter" rel="nofollow">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
           <!--  <li>
              <a class="kopa-social-link" href="http://youtube.com" target="_blank" title="Youtube" rel="nofollow">
                <i class="fa fa-youtube"></i>
              </a>
            </li> -->
            <li>
              <a class="kopa-social-link" href="" target="_blank" title="RSS" rel="nofollow">
                <i class="fa fa-rss"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </header>

		<?php get_template_part('featured'); ?>

		<main>