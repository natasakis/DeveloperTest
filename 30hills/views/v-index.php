<main>
          <div style="letter-spacing:2px" class="text-center">
            <br><br><br><br>
            <p class="h1"><strong>WELCOME TO OUR SHOP!</strong></p>
            <br><br><br>
          </div>

          <section>
            <div>
                <h2 class="text-center">Some of our products</h2><br>
            </div>

            <div class="row mx-auto">
                <?php foreach ($mostProducts as $product) { ?>
                    <div class="col-md">
                        <a class="text-dark text-decoration-none text-center" href="./single-product-page.php?product=<?php echo htmlspecialchars($product->id); ?>">
                            <div>
                                <img src="<?php $po=strpos($product->img,','); echo substr(($product->img),1,$po-2); ?>" class="col-10" alt="<?php echo htmlspecialchars($product->name); ?>">
                                <div><br>
                                    <h5><?php echo htmlspecialchars($product->name); ?></h5>
                                    
                                    <p><?php echo htmlspecialchars($product->price)."$"; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            </section> 

</main>