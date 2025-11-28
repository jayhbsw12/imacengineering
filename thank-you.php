<?php include("header-top.php"); ?>
<meta name="robots" content="noindex,nofollow">
<?php include("header.php"); ?>
<style>
    .error-container {
  /*max-width: 600px;*/
  text-align: center;
  padding: 100px;
}

.error-container h1 {
  font-size: 120px;
  font-weight: bold;
  color: #f15a24;
}
.error-container img {
    width: 320px;
}

.subheading {
  font-size: 40px;
  margin: 15px 0 10px;
}

.description {
  font-size: 20px;
  margin-bottom: 30px;
}

.home-btn {
  display: inline-block;
 background: #f15a24;
  color: #fff;
  padding: 12px 24px;
  text-decoration: none;
  font-size: 16px;
  box-shadow: 0 5px 15px rgba(249, 110, 49, 0.3);
  transition: background 0.3s ease;
}

.home-btn:hover {
  background: #f15a24;
}

@media(max-width:810px){
    
}

@media screen and (max-width: 480px) {
  .error-container h1 {
    font-size: 80px;
  }
  .subheading {
    font-size: 20px;
  }
  .description {
    font-size: 16px;
  }
}
</style>

<div class="error-container">
    <a href="https://imacengineering.com/thank-you"><img src="assets/image/logo.svg" alt="IMAC Logo"></a>
    <p class="subheading">Thank You for Contacting Us <br> We will Get Back to You Soon!</p>
  </div>
<?php include("footer.php"); ?>