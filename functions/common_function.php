<?php
// include connect file from DB
// include('./includes/connect.php');
// getting products
function getProduct($numToDisplay = '')
{
    global $con;

    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $limitQuery = empty($numToDisplay)
            ? "SELECT * FROM `products` ORDER BY RAND()"
            : "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,$numToDisplay";

        $select_product_result = mysqli_query($con, $limitQuery);

        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image_one = $row['product_image_one'];
            $product_price = $row['product_price'];

            echo "
            <div class='col-md-4 mb-2'>
            <div class='one-card' style='
                background: linear-gradient(135deg, #f9f4ff, #fcefee);
                border-radius: 20px;
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
                padding: 20px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                animation: fadeInUp 0.7s ease-in-out;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                align-items: center;
            '
            onmouseover='this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 45px rgba(0,0,0,0.2)''
            onmouseout='this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.1)''
            >
                <a href='product_details.php?product_id=$product_id' style='width: 200px; display: flex; align-items: center; justify-content: center; height: 200px;'>
                    <div class='photo'>
                        <img src='./admin/product_images/$product_image_one' alt='$product_title' style='width: 150px; border-radius: 15px; object-fit: cover;'>
                    </div>
                </a>

                <div class='content' style='justify-content: center; text-align: center; margin-top: 15px;'>
                    <span class='title fw-bold' style='font-size: 18px; color: #4B4453;'>$product_title</span>
                    <div class='desc' style='margin-top: 10px; color: #6C5B7B; font-size: 14px; display: flex; flex-direction: column; gap: 5px; align-items: center;'>
                        <span>\$$product_price</span>
                        <span>
                            " . str_repeat("
                                <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                </svg>", 3) . "
                            <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                <path opacity='0.25' d='M14.673 7.17173...' fill='#FFAD33' />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>

            ";
        }
    }
}

// display unique product with category
function filterCategoryProduct()
{
    global $con;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_product_query = "SELECT * FROM `products` WHERE category_id = $category_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        $num_of_rows = mysqli_num_rows($select_product_result);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center'>No Stock for this category</h2>";
        }
        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image_one = $row['product_image_one'];
            $product_price = $row['product_price'];
            echo "
            <div class='col-md-4 mb-2'>
                <div class='one-card' style='
                    background: linear-gradient(135deg, #f9f4ff, #fcefee);
                    border-radius: 20px;
                    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    animation: fadeInUp 0.7s ease-in-out;
                    overflow: hidden;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                '>
                    <a href='product_details.php?product_id=$product_id' style='width: 200px; display: flex; align-items: center; justify-content: center; height: 200px;'>
                        <div class='photo'>
                            <img src='./admin/product_images/$product_image_one' alt='$product_title' style='width: 150px; border-radius: 15px; object-fit: cover;'>
                        </div>
                    </a>
                    <div class='content' style='justify-content: center; text-align: center; margin-top: 15px;'>
                        <span class='title fw-bold' style='font-size: 18px; color: #4B4453;'>$product_title</span>
                        <div class='desc' style='margin-top: 10px; color: #6C5B7B; font-size: 14px; display: flex; flex-direction: column; gap: 5px; align-items: center;'>
                            <span>\$$product_price</span>
                            <span>
                                <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                </svg>
                                <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                </svg>
                                <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                </svg>
                                <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path opacity='0.25' d='M14.673 7.17173...' fill='#FFAD33' />
                                </svg>
                            </span>
                        </div>
                        
                    </div>
                </div>
            </div>
            ";
        }
    }
}

// display unique product with brand 
function filterBrandProduct()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_product_query = "SELECT * FROM `products` WHERE brand_id = $brand_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        $num_of_rows = mysqli_num_rows($select_product_result);
        if ($num_of_rows == 0) {
            echo "
                <h2 class='text-center'>No Stock for this brand</h2>
                ";
        }
        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image_one = $row['product_image_one'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
        <div class='col-md-4 mb-2'>
        <div class='one-card'>
            <div class='photo'>
                <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                
            </div>
            <div class='content'>
                <span class='title fw-bold'>$product_title</span>
                <div class='desc'>
                    <span>\$$product_price</span>
                    <span>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path opacity='0.25' d='M14.673 7.17173...' fill='#FFAD33' />
                        </svg>
                    </span>
                    <span>(35)</span>
                </div>
            </div>
        </div>
    </div>
        ";
        }
    }
}


// display brands in sidenav 
function getBrands()
{
    global $con;
    $select_brands_query = "SELECT * FROM `brands`";
    $select_brands_result = mysqli_query($con, $select_brands_query);
    while ($brands_row_data = mysqli_fetch_assoc($select_brands_result)) {
        $brand_title = $brands_row_data['brand_title'];
        $brand_id = $brands_row_data['brand_id'];
        echo "
        <li class='nav-item'>
            <a href='products.php?brand=$brand_id' class='nav-link'>
                $brand_title
            </a>
        </li>
    ";
    }
}

// display categories in sidenav 
function getCategories()
{
    global $con;
    $select_category_query = "SELECT * FROM `categories`";
    $select_category_result = mysqli_query($con, $select_category_query);
    while ($categories_row_data = mysqli_fetch_assoc($select_category_result)) {
        $category_title = $categories_row_data['category_title'];
        $category_id = $categories_row_data['category_id'];
        echo "
        <li class='nav-item'>
        <a href='products.php?category=$category_id' class='nav-link'>
            $category_title
        </a>
    </li>
        ";
    }
}

// search product function 
function search_product()
{
    global $con;

    if (isset($_GET['search_data_btn'])) {
        $search_data_value = mysqli_real_escape_string($con, $_GET['search_data']);

        $query = "SELECT * FROM `products` WHERE product_title LIKE '%$search_data_value%' OR product_keywords LIKE '%$search_data_value%'";
        $result = mysqli_query($con, $query);
        $num_of_rows = mysqli_num_rows($result);

        echo "<h2 class='text-center'>$num_of_rows result(s) found for '<i>$search_data_value</i>'</h2>";

        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No results match. No product found!</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image_one = $row['product_image_one'];
                $product_price = $row['product_price'];

                echo "
                <div class='col-md-4 mb-2'>
                    <div class='one-card' style='
                        background: linear-gradient(135deg, #f9f4ff, #fcefee);
                        border-radius: 20px;
                        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
                        padding: 20px;
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                        animation: fadeInUp 0.7s ease-in-out;
                        overflow: hidden;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                    '>
                        <a href='product_details.php?product_id=$product_id' style='width: 200px; display: flex; align-items: center; justify-content: center; height: 200px;'>
                            <div class='photo'>
                                <img src='./admin/product_images/$product_image_one' alt='$product_title' style='width: 150px; border-radius: 15px; object-fit: cover;'>
                            </div>
                        </a>
                        <div class='content' style='justify-content: center; text-align: center; margin-top: 15px;'>
                            <span class='title fw-bold' style='font-size: 18px; color: #4B4453;'>$product_title</span>
                            <div class='desc' style='margin-top: 10px; color: #6C5B7B; font-size: 14px; display: flex; flex-direction: column; gap: 5px; align-items: center;'>
                                <span>\$$product_price</span>
                                <span>" . str_repeat("
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                    </svg>", 3) . "
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path opacity='0.25' d='M14.673 7.17173...' fill='#FFAD33' />
                                    </svg>
                                </span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }
}


// view details function 
function viewDetails()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
                $select_product_result = mysqli_query($con, $select_product_query);
                while ($row = mysqli_fetch_assoc($select_product_result)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_desc = $row['product_description'];
                    $product_image_one = $row['product_image_one'];
                    $product_image_two = $row['product_image_two'];
                    $product_image_three = $row['product_image_three'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    //$brand_id = $row['brand_id'];
                    echo "
                    <div class='row mx-0 justify-content-md-center gap-3 gap-md-0'>
                    <div class='col-md-2'>
                        <div class='prod-imgs'>
                            <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                            <img src='./admin/product_images/$product_image_two' alt='$product_title'>
                            <img src='./admin/product_images/$product_image_three' alt='$product_title'>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='main-img'>
                            <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='info d-flex flex-column gap-2'>
                            <h4 class='fw-bold'>$product_title</h4>
                            <div class='rates d-flex gap-2 flex-wrap'>
                                <span>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                    </svg>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                                    </svg>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                                    </svg>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path opacity='0.25' d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                                    </svg>
                                </span>
                                <span>
                                    (150 Reviews)
                                </span>
                                <span>|</span>
                                <span class='in-stack fw-bold'>
                                    In Stock
                                </span>
                            </div>
                            <h4>
                                \$$product_price
                            </h4>
                            <p>
                                $product_desc
                            </p>
                            <div class='divider'>
                            </div>
                            <form action='products.php?add_to_cart=$product_id'>
                                <div class='buy-item d-flex gap-3 justify-content-center align-items-center'>
                                    <div class='num-btns d-flex gap-1'>
                                        <button type='button' class='btn btn-decrease' onclick='decreaseValueBtn()'>-</button>
                                        <input type='number' class='form-control' name='num_of_items' id='num_of_items' value='1'>
                                        <input type='hidden' class='form-control' name='add_to_cart' id='add_to_cart' value='$product_id'/>
                                        <!-- <span class='num-of-items'>3</span> -->
                                        <button type='button' class='btn btn-increase' onclick='increaseValueBtn()'>+</button>
                                    </div>
                                    <div>
                                        <input type='submit' class='btn btn-primary' value='Buy Now'>
                                    </div>
                                </div>
                            </form>
                            <div class='delivery d-flex flex-column my-4 gap-3'>
                                <div class='d-flex gap-2 align-items-center'>
                                    <span>
                                        <svg width='40' height='40' viewBox='0 0 40 40' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <g clip-path='url(#clip0_261_4843)'>
                                                <path d='M11.6673 31.6667C13.5083 31.6667 15.0007 30.1743 15.0007 28.3333C15.0007 26.4924 13.5083 25 11.6673 25C9.82637 25 8.33398 26.4924 8.33398 28.3333C8.33398 30.1743 9.82637 31.6667 11.6673 31.6667Z' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M28.3333 31.6667C30.1743 31.6667 31.6667 30.1743 31.6667 28.3333C31.6667 26.4924 30.1743 25 28.3333 25C26.4924 25 25 26.4924 25 28.3333C25 30.1743 26.4924 31.6667 28.3333 31.6667Z' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M8.33398 28.3335H7.00065C5.89608 28.3335 5.00065 27.4381 5.00065 26.3335V21.6668M3.33398 8.3335H19.6673C20.7719 8.3335 21.6673 9.22893 21.6673 10.3335V28.3335M15.0007 28.3335H25.0007M31.6673 28.3335H33.0007C34.1052 28.3335 35.0007 27.4381 35.0007 26.3335V18.3335M35.0007 18.3335H21.6673M35.0007 18.3335L30.5833 10.9712C30.2218 10.3688 29.5708 10.0002 28.8683 10.0002H21.6673' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M8 28H6.66667C5.5621 28 4.66667 27.1046 4.66667 26V21.3333M3 8H19.3333C20.4379 8 21.3333 8.89543 21.3333 10V28M15 28H24.6667M32 28H32.6667C33.7712 28 34.6667 27.1046 34.6667 26V18M34.6667 18H21.3333M34.6667 18L30.2493 10.6377C29.8878 10.0353 29.2368 9.66667 28.5343 9.66667H21.3333' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M5 11.8182H11.6667' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M1.81836 15.4545H8.48503' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M5 19.0909H11.6667' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                            </g>
                                            <defs>
                                                <clipPath id='clip0_261_4843'>
                                                    <rect width='40' height='40' fill='white' />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <div class='d-flex flex-column gap-2'>
                                        <h6>Free Delivery</h6>
                                        <span>Enter your postal code for Delivery Availability</span>
                                    </div>
                                </div>
                                <div class='d-flex gap-2 align-items-center'>
                                    <span>
                                        <svg width='40' height='40' viewBox='0 0 40 40' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <g clip-path='url(#clip0_261_4865)'>
                                                <path d='M33.3327 18.3334C32.9251 15.4004 31.5645 12.6828 29.4604 10.5992C27.3564 8.51557 24.6256 7.18155 21.6888 6.80261C18.752 6.42366 15.7721 7.02082 13.208 8.5021C10.644 9.98337 8.6381 12.2666 7.49935 15M6.66602 8.33335V15H13.3327' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M6.66602 21.6667C7.07361 24.5997 8.43423 27.3173 10.5383 29.4009C12.6423 31.4845 15.3731 32.8185 18.3099 33.1974C21.2467 33.5764 24.2266 32.9792 26.7907 31.4979C29.3547 30.0167 31.3606 27.7335 32.4994 25M33.3327 31.6667V25H26.666' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                            </g>
                                            <defs>
                                                <clipPath id='clip0_261_4865'>
                                                    <rect width='40' height='40' fill='white' />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <div class='d-flex flex-column gap-2'>
                                        <h6>Return Delivery</h6>
                                        <span>Free 30 Days Delivery Returns. Details</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    ";
                }
            }
        }
    }
}

// get Ip Address Function
function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// cart function
function cart($num_of_items = 1)
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $getIpAddress = getIPAddress();
        $getProductId = $_GET['add_to_cart'];

        // 👇 Get quantity from URL if it exists, else use the default
        $quantity = isset($_GET['num_of_items']) ? intval($_GET['num_of_items']) : $num_of_items;

        $select_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress' AND product_id=$getProductId";
        $select_result = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($select_result);

        if ($num_of_rows > 0) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
                title: 'Oops!',
                text: 'This item is already in your cart 🛒',
                icon: 'warning',
                confirmButtonText: 'Back to Shopping',
                background: '#f3e8ff',
                color: '#4b0082',
                confirmButtonColor: '#a78bfa',
                customClass: {
                  popup: 'rounded-xl shadow-md'
                }
            }).then(() => {
                window.location.href = 'products.php';
            });
            </script>";
        } else {
            $insert_query = "INSERT INTO `card_details` (product_id, ip_address, quantity) VALUES ($getProductId, '$getIpAddress', $quantity)";
            $insert_result = mysqli_query($con, $insert_query);

            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
                title: 'Yay!',
                text: '$quantity item(s) added to your cart 💜',
                icon: 'success',
                confirmButtonText: 'Shop More',
                background: '#f3e8ff',
                color: '#4b0082',
                confirmButtonColor: '#a78bfa',
                customClass: {
                  popup: 'rounded-xl shadow-md'
                }
            }).then(() => {
                window.location.href = 'products.php';
            });
            </script>";
        }
    }
}


// get cart item numbers function 
function cart_item() {
    global $con;
    $getIpAddress = getIPAddress();
    $select_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress'";
    $select_result = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($select_result);

    echo $count_cart_items;
}


// total price function 
function total_cart_price()
{
    global $con;
    $getIpAddress = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress'";
    $cart_result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($cart_result)) {
        $product_id = $row['product_id'];
        $select_product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        while ($row_product_price = mysqli_fetch_array($select_product_result)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

// get user order details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details_query = "SELECT * FROM `user_table` WHERE username = '$username'";
    $get_details_result = mysqli_query($con, $get_details_query);
    while ($row_query = mysqli_fetch_array($get_details_result)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders_query = "SELECT * FROM `user_orders` WHERE user_id='$user_id' AND order_status='pending'";
                    $get_orders_result = mysqli_query($con,$get_orders_query);
                    $row_orders_count = mysqli_num_rows($get_orders_result);
                    if($row_orders_count > 0){
                        echo "<h3 class='text-center mb-3'>You have <span class='text-2'>$row_orders_count</span> pending orders</h3>
                            <a href='profile.php?my_orders' class='text-center text-decoration-underline fs-5'>Order details</a>
                        ";
                    }else{
                        echo "<h3 class='text-center mb-3'>You have <span class='text-success'>0</span> pending orders</h3>
                            <a href='../index.php' class='text-center text-decoration-underline fs-5'>Explore products</a>
                        ";
                    }
                }
            }
        }
    }
}

// Create a new order from the current cart
function create_order_from_cart() {
    global $con;
    if (!isset($_SESSION['username'])) {
        return false; // User not logged in
    }
    $username = $_SESSION['username'];
    $get_user_query = "SELECT user_id FROM user_table WHERE username = '$username'";
    $user_result = mysqli_query($con, $get_user_query);
    if (!$user_result || mysqli_num_rows($user_result) == 0) {
        return false;
    }
    $user_row = mysqli_fetch_assoc($user_result);
    $user_id = $user_row['user_id'];

    $ip_address = getIPAddress();
    $cart_query = "SELECT * FROM card_details WHERE ip_address = '$ip_address'";
    $cart_result = mysqli_query($con, $cart_query);
    if (!$cart_result || mysqli_num_rows($cart_result) == 0) {
        return false; // Cart is empty
    }

    $total_price = 0;
    $products = [];
    while ($cart_row = mysqli_fetch_assoc($cart_result)) {
        $product_id = $cart_row['product_id'];
        $quantity = $cart_row['quantity'];
        $product_query = "SELECT product_price FROM products WHERE product_id = $product_id";
        $product_result = mysqli_query($con, $product_query);
        if ($product_result && $product_data = mysqli_fetch_assoc($product_result)) {
            $price = $product_data['product_price'] * $quantity;
            $total_price += $price;
            $products[] = [
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $product_data['product_price']
            ];
        }
    }
    if ($total_price == 0) {
        return false;
    }

    $invoice_number = mt_rand(100000, 999999);
    $order_date = date('Y-m-d H:i:s');
    $order_status = 'pending';
    $insert_order = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $total_price, $invoice_number, " . count($products) . ", '$order_date', '$order_status')";
    $order_result = mysqli_query($con, $insert_order);
    if (!$order_result) {
        return false;
    }
    $order_id = mysqli_insert_id($con);

    // Optionally insert into order_items table if it exists
    $check_items_table = mysqli_query($con, "SHOW TABLES LIKE 'order_items'");
    if ($check_items_table && mysqli_num_rows($check_items_table) > 0) {
        foreach ($products as $item) {
            $pid = $item['product_id'];
            $qty = $item['quantity'];
            $price = $item['price'];
            mysqli_query($con, "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id, $pid, $qty, $price)");
        }
    }

    // Clear the cart
    mysqli_query($con, "DELETE FROM card_details WHERE ip_address = '$ip_address'");

    return [
        'order_id' => $order_id,
        'amount_due' => $total_price
    ];
}
