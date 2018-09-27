<footer class="efx_drop_shadow efx_border_radius--top">
  <div class="footer_logo">
    <p>Skambit</p>
  </div>
  <div class="footer_msg">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>

</footer>
<div class="footer_nav">
  <a class="footer_nav--logo" href="index.php">Skambit</a>
  <a class="footer_nav--item" href="faq.php">faqs</a>
  <div class="footer_nav--item">
    <input type="checkbox" id="login_window__mobile" style="display:none;" />
    <label for="login_window__mobile"> <?php echo (isset($_SESSION["login"])?$_SESSION["login"]:"login") ?></label>
    <?php include("login_window.php") ?>
  </div>
</div>
