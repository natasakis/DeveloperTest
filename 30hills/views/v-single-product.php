<main class="mt-5">
    <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-dark">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="./all-products-page.php">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product->name)?></li>
            </ol>
            </nav>
        <h1 class="card-title mb-4 text-center text-dark"><?php echo htmlspecialchars($product->name); ?></h1>
        <div class="row w-75" >
            <div class="col-3 w-50" >
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true"  >
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <div class="d-flex justify-content-center">
                        <img src="<?php $pos=strpos($product->img,','); $img1= substr(($product->img),1,$pos-2); echo $img1; ?>" class="d-block w-75" alt="WALL">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <img src="<?php $img2=substr($product->img,$pos+3); $pos2=strpos($img2,','); $img2b=substr($img2, 0 ,$pos2-1); echo $img2b; ?>" class="d-block w-75" alt="<?php echo $img2b;?>">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <?php $img=htmlspecialchars($product->img); ?>
                        <img src="<?php $img3=substr($img2,$pos2+3); $img3b=substr($img3, 0, -1);echo $img3b; ?>" class="d-block w-75" alt="<?php echo $img3b; ?>">
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            </div>
            <div class="col-6" >
                <p><?php echo htmlspecialchars($product->description); ?></p>
                <div>
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CATEGORY:</span>
                        </div>
                        <input name="categor" disabled type="text" class="form-control" value="<?php echo htmlspecialchars($product->category); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">PRICE:</span>
                        </div>
                        <input name="price" disabled type="text" class="form-control" value="<?php echo htmlspecialchars($product->price); ?>" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">$</span>
                        </div>
                    </div>
                </div>
                <form method="post">

                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">QUANTITY:</span>
                        </div>
                        <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="quantity" value="1">
                        <div class="input-group-append">
                            <span class="input-group-text">QTY</span>
                        </div>
                    </div>

                    <?php if(!empty($systemErrors['quantity'])) { ?>
                    <div class="error-msg text-danger">
                        <?php echo htmlspecialchars($systemErrors['quantity']) ?>
                    </div>
                    <?php } ?>
                    <input hidden name="product_id" value="<?php echo htmlspecialchars($product->id); ?>">
                    <div class="float-end">
                    <button type="submit" class="btn btn-dark">Add to Cart</button>
                    </div>
                </form>
                <br><br><br>
                <div class="d-flex justify-content-around mt-5">
                    <a class="btn btn-outline-dark" href="./single-product-page.php?product=<?php echo htmlspecialchars($product->getPrevProductId()); ?>"><<</a>
                    <a class="btn btn-outline-dark" href="./single-product-page.php?product=<?php echo htmlspecialchars($product->getNextProductId()); ?>">>></a>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <?php
            foreach ($relatedProducts as $singleRelated) { ?>
                <article class="single-product col-4 row mb-5 text-center">
                    <div class='col-4'>
                        <img src="<?php $pos=strpos($product->img,','); echo substr(($product->img),1,$pos-2); ?>" alt="" width="100" height="100">
                    </div>
                    <div class='col-8'>
                        <h5><?php echo htmlspecialchars($singleRelated->title); ?></h5>
                        <p>PRICE: <?php echo htmlspecialchars($singleRelated->price); ?> $</p>
                        <a class="btn btn-dark" href="./single-product-page.php?product=<?php echo htmlspecialchars($singleRelated->id); ?>">Show Product</a>
                    </div>
                </article>
            <?php } ?>
        </div>
    </div>
</main>