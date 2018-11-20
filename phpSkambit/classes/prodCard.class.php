<?php
class CardProd{
  private $prod_id;
  private $user_id;
  private $prod_name;
  private $prod_price;
  private $prod_info;
  private $prod_img;
  private $prod_page = "produto.php";

  public function setCard($name,$price,$img,$info){
    $this->prod_name = $name;
    $this->prod_price = $price;
    $this->prod_img = $img;
    $this->prod_info = $info;
  }

  public function getLike(){
    // ...
  }

  public function drawCard(){
    echo '<div class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(' . $this->prod_img . ');"><div class="main_card_info"><p>' . $this->prod_name . '</p><p>R$ ' . '</p></div><a class="like_btn" href=" #"><i class="like_btn_icon material-icons">thumb_up</i></a><a class="main_card_link" href="' . $this->prod_page . '"></a></div>';
  }

}
?>
