<?php include("header-top.php"); ?>
 <meta name="robots" content="index,follow">
 <?php include("header.php"); ?>
 <style>
    /* Portfolio Specific Styles */
.site {
  min-height: 100vh;
  background: #f7f7f7;
  color: hsl(20, 14.3%, 4.1%);
}

/* Portfolio Section Layout */
.portfolio-section {
  position: relative;
  padding: 80px 0;
  background: #f7f7f7;
}

.portfolio-main {
  position: relative;
  background: #f7f7f7;
  padding: 0 150px;
}

.portfolio-spacing {
  height: 80px;
}
.portfolio-sorting li:first-child:after {
    display: none;
}
a.active span.name {
    border-bottom: 1px solid;
}
.portfolio-sorting li a:hover{
    transition-duration: .1s
}

.portfolio-sorting li:after {
   content: '/';
    color: #000;
    opacity: 0.8;
    display: inline-block;
    font-size: 16.4px;
    position: relative;
    top: -25px;
    left: -13px;
}

/* Background Lines Effect */
.vc-bg-lines {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  pointer-events: none;
  z-index: 1;
}

.vc-bg-lines div {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 1px;
  background: hsl(20, 5.9%, 90%);
  opacity: 0.5;
}

.vc-bg-lines div:nth-child(1) { left: 14.28%; }
.vc-bg-lines div:nth-child(2) { left: 28.56%; }
.vc-bg-lines div:nth-child(3) { left: 42.84%; }
.vc-bg-lines div:nth-child(4) { left: 57.12%; }
.vc-bg-lines div:nth-child(5) { left: 71.40%; }
.vc-bg-lines div:nth-child(6) { left: 85.68%; }
.vc-bg-lines div:nth-child(7) { right: 0; }

/* Section Label */
.portfolio-label {
  position: absolute;
  left: -40px;
  top: 50%;
  transform: translateY(-50%) rotate(-90deg);
  font-size: 14px;
  font-weight: 500;
  color: hsl(25, 5.3%, 44.7%);
  letter-spacing: 2px;
  text-transform: uppercase;
  z-index: 10;
}

/* Portfolio Heading */
.portfolio-heading {
  margin-bottom: 60px;
  position: relative;
  z-index: 10;
}

.portfolio-heading .subtitle {
  font-size: 14px;
  color: hsl(25, 5.3%, 44.7%);
  margin-bottom: 8px;
  font-weight: 400;
  letter-spacing: 1px;
}

.portfolio-heading .title {
  font-size: 48px;
  font-weight: 300;
  color: hsl(20, 14.3%, 4.1%);
  margin: 0;
  line-height: 1.1;
}

.portfolio-heading .title b {
  font-weight: 700;
  color: #ff4612;
}

/* Portfolio Container */
.portfolio-container {
  position: relative;
  z-index: 10;
}

/* Filter List */
.filter-list {
  display: flex;
  flex-wrap: wrap;
  gap: 25px;
  margin-bottom: 60px;
  list-style: none;
  padding: 0;
}

.filter-list li a {
  display: flex;
  align-items: center;
  gap: 0px;
  color: #000;
  text-decoration: none;
  font-size: 16px;
  font-weight: 400;
  transition: color 0.3s ease;
  cursor: pointer;
}
.filter-list .name {
    font-size: 18px;
    border-bottom: 1px solid #f7f7f7;
}
.filter-list li a:hover,
.filter-list li a.active {
  color: #ff4612;
}
.filter-list li:hover .num {
    color: #ff4612;
}
.filter-list li:hover .name{
    border-bottom: 1px solid #ff4612;
}
.filter-list li:hover .name{
    color: #ff4612;
}
.filter-list .name {
  font-size: 18px;
}

.filter-list .num {
  font-size: 12px;
  padding: 2px 8px;
  border-radius: 4px;
  min-width: 24px;
  text-align: center;
  margin-top: -5px;
  color: #000;
}

.filter-list li a.active .num {
  /*background: #ff4612;*/
  color: #ff4612;
    font-weight: 500;
}

/* Portfolio Grid - Masonry Layout */
.masonry-container {
  position: relative;
  width: 100%;
  min-height: 650px;
  overflow: hidden;
}

.portfolio-item-wrap {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.6s cubic-bezier(0.25, 0.1, 0.25, 1);
}

.portfolio-item-wrap.aos-animate {
  opacity: 1;
  transform: translateY(0);
}

.portfolio-item-wrap.portfolio-item-0 { transition-delay: 0ms; }
.portfolio-item-wrap.portfolio-item-1 { transition-delay: 100ms; }
.portfolio-item-wrap.portfolio-item-2 { transition-delay: 200ms; }

/* Portfolio Item */
.portfolio-item {
  position: relative;
  overflow: hidden;
  background: hsl(60, 4.8%, 95.9%);
  height: 260px;
}

.portfolio-item.grid-tall {
  height: 400px;
}

.masonry-block {
  position: absolute;
  transition: all 0.6s cubic-bezier(0.25, 0.1, 0.25, 1);
}

.portfolio-link {
  display: block;
  width: 100%;
  height: 100%;
  position: relative;
  border: none;
  background: none;
  padding: 0;
  cursor: pointer;
}

.image-wrap {
  position: relative;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.image-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

/* Hover Overlay */
.description.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgb(217 212 212 / 69%);
  opacity: 0;
  margin:30px;
  transition: opacity 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 5;
}

.portfolio-item:hover .description.overlay {
  opacity: 1;
}

.portfolio-item:hover .image-wrap img {
  transform: scale(1.05);
}

.content-center {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
}

.wrap {
  text-align: center;
  max-width: 80%;
}

.category.tag {
  display: inline-block;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: hsl(207, 90%, 54%);
  margin-bottom: 12px;
  font-weight: 500;
}

/* .wrap .title {
  font-size: 20px;
  font-weight: 600;
  color: hsl(0, 0%, 98%);
  margin: 0 0 16px 0;
  line-height: 1.3;
} */

.more.brand-color {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border: 2px solid #ff4612;
  border-radius: 50%;
  margin: 0 auto;
  transition: all 0.3s ease;
}

.more.brand-color:hover {
  /* background: hsl(207, 90%, 54%); */
}

.plus-icon {
  color: #ff4612;
  font-size: 24px;
  transition: color 0.3s ease;
}

.more.brand-color:hover .plus-icon {
  /* color: hsl(211, 100%, 99%); */
}

/* Animation effects like original Norebro theme */
.aos-init.aos-animate {
  opacity: 1;
  transform: translateY(0);
}

.norebro-project-item {
  transition: all 0.6s cubic-bezier(0.25, 0.1, 0.25, 1);
}

.norebro-project-item:hover {
  transform: translateY(-5px);
}

/* Grid column classes matching original theme */
.vc_col-lg-4 {
  width: 32%;
}

.vc_col-lg-8 {
  width: 66%;
}

/* Lightbox Styles */
.lightbox-overlay {
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgb(0 0 0 / 95%);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.lightbox-container {
  position: relative;
  max-width: 90vw;
  max-height: 90vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.lightbox-close {
  position: absolute;
  top: -60px;
  right: 0;
  background: #fff;
  border: none;
  border-radius: 50%;
  width: 44px;
  height: 44px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: hsl(20, 14.3%, 4.1%);
  cursor: pointer;
  transition: background 0.3s ease;
  z-index: 10001;
  font-size: 20px;
}

.lightbox-close:hover {
  background: #fff;
}

.lightbox-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: #fff;
  border: none;
  border-radius: 50%;
  width: 52px;
  height: 52px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: hsl(20, 14.3%, 4.1%);
  cursor: pointer;
  transition: all 0.3s ease;
  z-index: 10001;
  font-size: 24px;
}

.lightbox-nav:hover {
  background: rgba(0, 0, 0, 0.2);
  transform: translateY(-50%) scale(1.1);
}

.lightbox-prev {
  left: -80px;
}

.lightbox-next {
  right: -80px;
}

.lightbox-image-container {
  position: relative;
  max-width: 100%;
  max-height: calc(90vh - 120px);
  display: flex;
  align-items: center;
  justify-content: center;
}

.lightbox-image {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  border-radius: 8px;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
  animation: lightboxFadeIn 0.5s ease-in-out;
}

.lightbox-caption {
  margin-top: 20px;
  text-align: center;
  color: hsl(20, 14.3%, 4.1%);
  max-width: 600px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.lightbox-details {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.lightbox-category {
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: hsl(207, 90%, 54%);
  font-weight: 500;
}

.lightbox-title {
  font-size: 24px;
  font-weight: 600;
  margin: 0;
  color: hsl(20, 14.3%, 4.1%);
}

.lightbox-description {
  font-size: 14px;
  color: hsl(25, 5.3%, 44.7%);
  margin: 0;
  line-height: 1.5;
}

.lightbox-counter {
  font-size: 12px;
  color: hsl(25, 5.3%, 44.7%);
  font-weight: 500;
}

@keyframes lightboxFadeIn {
  from { 
    opacity: 0; 
    transform: scale(0.95); 
  }
  to { 
    opacity: 1; 
    transform: scale(1); 
  }
}

/* Responsive Design */
@media (max-width: 1024px) {
  .portfolio-main {
    padding: 0 40px;
  }
  
  .masonry-container {
    min-height: 600px;
  }
  
  .portfolio-item-wrap {
    width: 48% !important;
  }
  
  .portfolio-heading .title {
    font-size: 40px;
  }
  
  .lightbox-nav {
    display: none;
  }
}

@media (max-width: 768px) {
  .portfolio-main {
    padding: 0 20px;
  }
  
  .masonry-container {
    min-height: 400px;
  }
  
  .portfolio-item-wrap {
    width: 100% !important;
    position: relative !important;
    left: 0 !important;
    top: auto !important;
    margin-bottom: 20px;
  }
  
  .filter-list {
    gap: 20px;
    flex-direction: column;
    align-items: flex-start;
  }
  
  .portfolio-heading .title {
    font-size: 32px;
  }
  
  .portfolio-label {
    display: none;
  }
  
  .lightbox-container {
    max-width: 95vw;
    max-height: 95vh;
  }
  
  .lightbox-close {
    top: -50px;
    right: -10px;
  }
}

/* Skip Link */
.skip-link {
  position: absolute;
  left: -9999px;
}

.skip-link:focus {
  left: 0;
  top: 0;
  background: hsl(0, 0%, 98%);
  color: hsl(20, 14.3%, 4.1%);
  padding: 8px 16px;
  text-decoration: none;
  z-index: 100000;
}

/* Clear fix */
.vc_row-full-width {
  clear: both;
}

.clear {
  clear: both;
}

/* Hidden by default */
.portfolio-item-wrap.hidden {
  opacity: 0 !important;
  pointer-events: none;
}

@media(min-width:1100px) and (max-width:1440px){
.portfolio-main {
    position: relative;
    background: #f7f7f7;
    padding: 0 45px;
}
}
</style>
<!-- Hero Section -->
        <section class="hero">
            <div class="container" bis_skin_checked="1">
                <p class="hero-label">Portfolio</p>
                <h1 class="hero-title">Our Latest Work</h1>
            </div>
        </section>
 <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
        
        <!-- Empty Full Width Row -->
        <div class="vc_row-full-width vc_clearfix"></div>

        <!-- Recent Projects Section -->
        <div class="vc_row wpb_row vc_row-fluid vc_custom_1507633330521 vc_row-has-fill ">
            
            <!-- Background Lines -->
            <!--<div class="vc-bg-lines dark">-->
            <!--    <div></div><div></div><div></div><div></div><div></div><div></div><div></div>-->
            <!--</div>-->

            <!-- Column Content -->
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="vc_empty_space norebro-phone-space portfolio-spacing">
                            <span class="vc_empty_space_inner"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Grid Section -->
        <div class="vc_row wpb_row vc_row-fluid nor-top-layer vc_custom_1507633778983 vc_row-has-fill portfolio-main">
            
            <!-- Background Lines -->
            <!--<div class="vc-bg-lines dark">-->
            <!--    <div></div><div></div><div></div><div></div><div></div><div></div><div></div>-->
            <!--</div>-->


            <!-- Projects Column -->
            <div class="nrb-recent-projects wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">

                        <!-- Section Heading -->
                        <div class="norebro-heading-sc heading text-left portfolio-heading">
                            <span class="portfolio-subtitle" style="left:-175px;">/Portfolio</span>
                            <!-- <p class="subtitle">Noseblunt severin impossible</p>
                            <h3 class="title subtitle-top"><b>01.</b> Recent Projects</h3> -->
                        </div>

                        <!-- Portfolio Grid -->
                        <div class="norebro-recent-projects-sc portfolio-container">

                            <!-- Filter Buttons -->
                            <div class="portfolio-sorting text-left" data-filter="portfolio">
                                <ul class="unstyled filter-list">
                                    <li><a class="active" href="#all" data-filter="*"><span class="name">All</span><span class="num">05</span></a></li>
                                    <li><a href="#Design Service" data-filter="Design Service"><span class="name">Design Service</span><span class="num">13</span></a></li>
                                    <li><a href="#NPD Services" data-filter="NPD Services"><span class="name">NPD Services </span><span class="num">16</span></a></li>
                                    <li><a href="#Rapid Prototype" data-filter="Rapid Prototype"><span class="name">Rapid Prototype</span><span class="num">05</span></a></li>
                                    <li><a href="#Manufacturing" data-filter="Manufacturing"><span class="name">Manufacturing</span><span class="num">07</span></a></li>
                                    <!--<li><a href="#package" data-filter="package"><span class="name">Package</span><span class="num">01</span></a></li>-->
                                </ul>
                            </div>

                            <!-- Portfolio Items Grid -->
                            <div class="vc_row with-sorting masonry-container" data-isotope-grid="true" data-lazy-container="projects" id="portfolio-grid">
                                
                                <!-- Portfolio Item 1 -->
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design Service" data-id="1">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Assem1.webp" alt="Stylish Løft Kitchen">
                                                </div>                                     
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">Branding</span>
                                                            <h4 class="title">Stylish Løft Kitchen</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <!-- Portfolio Item 2 -->
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design Servive" data-id="2">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/ASSEMBLY VIEW 2 Z ARM.webp" alt="assembly">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">Package</span>
                                                            <h4 class="title">Scandic Möbler</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <!-- Portfolio Item 3 (Tall) -->
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="3">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Trocar.webp" alt="Trocar">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="4">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Assembly View 3.webp" alt="Trocar">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="5">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Chocolate Nozzle.webp" alt="Chocolate Nozzle">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="6">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Chocolate Nozzle.webp" alt="Chocolate Nozzle">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="6">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Fabricated Zulla for Civil Work.webp" alt="Fabricated Zulla for Civil Work">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                              
                              <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="7">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Knee implant.webp" alt="Knee implant">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="8">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Knee implant2.webp" alt="Knee implant">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="9">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Single Gearbox2.webp" alt="Single Gearbox2">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="10">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Spine Screw.webp" alt="Single Gearbox2">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="11">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Trestle-stand.webp" alt="Trestle-stand">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="12">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Trippling.webp" alt="Trippling">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Design service" data-id="13">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/design-service-home/Truck Boom.webp" alt="Truck Boom">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="14">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/AFDS PRODUCT.webp" alt="AFDS PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="15">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/CARAVAN FAN.webp" alt="CARAVAN FAN">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="16">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/CENTRIFUGAL MACHINE_MEDICAL LAB EQUIPMENT.webp" alt="CENTRIFUGAL MACHINE_MEDICAL LAB EQUIPMENT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="17">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/CORRUGATED-MACHINE_MACHINE-DEVELOPMENT.webp" alt="CORRUGATED-MACHINE_MACHINE-DEVELOPMENT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="18">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/ELECTRO STATIC GUN_CONSUMER ELE PRODUCT.webp" alt="ELECTRO STATIC GUN_CONSUMER ELE PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="19">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/EV-VEHICLE_AUTOMOBILE.webp" alt="EV-VEHICLE_AUTOMOBILE">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="20">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/GAMING-HEADPHONE_CONSUMER-ELECTRONICS-PRODUCT.webp" alt="GAMING-HEADPHONE_CONSUMER-ELECTRONICS-PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="21">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/HOSPITAL-BED_HOSPITAL-EQUIPMENT-PRODUCT.webp" alt="HOSPITAL-BED_HOSPITAL-EQUIPMENT-PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="22">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-1">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/MAGNICLIPPER_CONSUMER PRODUCT.webp" alt="MAGNICLIPPER_CONSUMER PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="23">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/MECHA COMET_CONSUMER ELECTRONIC PRODUCT.webp" alt="MECHA COMET_CONSUMER ELECTRONIC PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="24">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/PATIENT WARMER_MEDICAL DEVICE.webp" alt="PATIENT WARMER_MEDICAL DEVICE">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="25">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/PHACO MACHINE FOOTPADEL_MEDICAL PRODUCT.webp" alt="PHACO MACHINE FOOTPADEL_MEDICAL PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="26">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/PILLBOX_MEDICAL EQUIPMENT.webp" alt="PILLBOX_MEDICAL EQUIPMENT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="27">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/PORTABLE VACCUM CLEANER ENCLOSURE_CONSUMER PRODUCT.webp" alt="PORTABLE VACCUM CLEANER ENCLOSURE_CONSUMER PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="28">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/SETUP BOX (2).webp" alt="SETUP BOX (2)">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="29">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/SHEETMETAL ENCLOSURE_AGRITECH PRODUCT.webp" alt="SHEETMETAL ENCLOSURE_AGRITECH PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="30">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/SOLAR CLEANING DEVICE.webp" alt="SOLAR CLEANING DEVICE">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="31">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/SPOON WITH CLIP_CONSUMER PRODUCT.webp" alt="SPOON WITH CLIP_CONSUMER PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="32">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/STRATCHER_HOSPITAL EQUIPMENT.webp" alt="STRATCHER_HOSPITAL EQUIPMENT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="33">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/TRIFOLD SPOON_CONSUMER PRODUCT.webp" alt="TRIFOLD SPOON_CONSUMER PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="NPD Services" data-id="34">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/npd-service-home/TRP METER.webp" alt="TTRP METER">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="35">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/AFDS MVP PROTO.webp" alt="AFDS MVP PROTO">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="36">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/AFDS MVP.webp" alt="AFDS MVP">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="37">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/AIRBUS A320 MINIATURE MODEL (2).webp" alt="AIRBUS A320 MINIATURE MODEL (2)">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="38">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/AIRBUS A320 MINIATURE MODEL (3).webp" alt="AIRBUS A320 MINIATURE MODEL (3)">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="39">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/AIRBUS A320 MINIATURE MODEL.webp" alt="AIRBUS A320 MINIATURE MODEL (3)">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="40">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/ASUN SOLAR TRACKER MINIATURE MODEL (2).webp" alt="ASUN SOLAR TRACKER MINIATURE MODEL">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="41">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/ASUN SOLAR TRACKER MINIATURE MODEL.webp" alt="ASUN SOLAR TRACKER MINIATURE MODEL">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="42">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/CAR STAND.webp" alt="CAR STAND">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Rapid Prototype" data-id="43">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/rapid-home/CARANVAN FAN PROTO 1.webp" alt="CARANVAN FAN PROTO 1">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                 <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Manufacturing" data-id="44">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/manufacturing-home/CASTING PATTERN BODY.webp" alt="CARANVAN FAN PROTO 1">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Manufacturing" data-id="45">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/manufacturing-home/CSC BATCH PRODUCTION.webp" alt="CARANVAN FAN PROTO 1">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Manufacturing" data-id="46">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/manufacturing-home/CSC PARTS MOLDED.webp" alt="CSC PARTS MOLDED">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Manufacturing" data-id="47">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/manufacturing-home/CSC WHITE PRODUCTION PRODUCT.webp" alt="CSC WHITE PRODUCTION PRODUCT">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Manufacturing" data-id="48">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/manufacturing-home/DICE AL ENCLOSURE.webp" alt="DICE AL ENCLOSURE">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Manufacturing" data-id="49">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/manufacturing-home/DICE METAL ENCLOSURE AL.webp" alt="DICE METAL ENCLOSURE AL">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Manufacturing" data-id="50">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/manufacturing-home/DICE METAL ENCLOSURE.webp" alt="DICE METAL ENCLOSURE">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="portfolio-item-wrap masonry-block grid-item vc_col-lg-4 norebro-project-item" data-category="Manufacturing" data-id="51">
                                    <div class="aos-init aos-animate">
                                        <div class="portfolio-item grid-tall">
                                            <button class="lightbox-trigger portfolio-link" type="button">
                                                <div class="image-wrap">
                                                    <img src="./assets/portfolio/manufacturing-home/ESIN SHEETMETAL ENCLOSURE (2).webp" alt="ESIN SHEETMETAL ENCLOSURE (2)">
                                                </div>
                                                <div class="description overlay">
                                                    <div class="content-center">
                                                        <div class="wrap text-center">
                                                            <!-- <span class="category tag -brand">3D Rendering</span>
                                                            <h4 class="title">Cozy Jamy Grünerløka</h4> -->
                                                            <div class="more brand-color">
                                                                <span class="plus-icon">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                
                            </div><!-- .masonry-container -->

                        </div><!-- .norebro-recent-projects-sc -->

                    </div>
                </div>
            </div>
        </div>

        <div class="vc_row-full-width vc_clearfix"></div>
    </div><!-- #page -->

    

    <!-- Lightbox Modal -->
    <div id="lightbox-overlay" class="lightbox-overlay" style="display: none;">
        <div class="lightbox-container">
            
            <!-- Close Button -->
            <button class="lightbox-close" aria-label="Close lightbox">
                <span>×</span>
            </button>

            <!-- Navigation Buttons -->
            <button class="lightbox-nav lightbox-prev" aria-label="Previous image">
                <span>‹</span>
            </button>
            <button class="lightbox-nav lightbox-next" aria-label="Next image">
                <span>›</span>
            </button>

            <!-- Image -->
            <div class="lightbox-image-container">
                <img id="lightbox-image" src="" alt="" class="lightbox-image">
            </div>

            <!-- Caption -->
            <div class="lightbox-caption">
                <div class="lightbox-details">
                    <span id="lightbox-category" class="lightbox-category"></span>
                    <h3 id="lightbox-title" class="lightbox-title"></h3>
                    <p id="lightbox-description" class="lightbox-description"></p>
                </div>
                <div id="lightbox-counter" class="lightbox-counter"></div>
            </div>
        </div>
    </div>
<script src="js/blog-script.js"></script>
<script src="js/slider.js"></script>
<script src="js/slider-testimonial.js"></script>
<script src="js/logo-slider.js"></script>
<!--<script src="js/portfolio.js"></script>-->
<script src="js/portfolio-n.js"></script>
<!-- portfolio js -->



<?php include("footer.php"); ?>