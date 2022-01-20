<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page </title>
    <!-- linking the navbar to page -->
    <?php include ("PHP/common.php");
    navbar();
    ?>
    <link rel="stylesheet"type="text/css" href="./CSS/index.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <!-- creating a side menu bar -->
     <div class="sidemenu">
        <div class="logo-detailing">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">Side Menu</span>
        </div>
          <ul class="nav-linking">
            <li>
              <!-- adding elements to the side menu bar -->
              <a href="#" class="active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-box' ></i>
                <span class="links_name">Products</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Orders</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Inventory</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Analytics</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-book-alt' ></i>
                <span class="links_name">Staff List</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-user' ></i>
                <span class="links_name">Settings</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-message' ></i>
                <span class="links_name">Messages</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-heart' ></i>
                <span class="links_name">Favourites</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Settings</span>
              </a>
            </li>
            <li class="log_out">
              <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
              </a>
            </li>
          </ul>
      </div>
      <section class="home-section">
        <nav>
          <!-- creating a dashboard -->
          <div class="sidemenu-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
          </div>
        <!-- adding a search bar to the dashboard -->
          <div class="search-box">
            <input type="text" placeholder="Search...">
            <i class='bx bx-search' ></i>
          </div>
          <!--adding a bar to show the name of logged-in user -->
          <div class="profile-details">
            <span class="admin_name">Smreeti</span>
            <i class='bx bx-chevron-down' ></i>
          </div>
        </nav>
        <!-- adding the analytics of the total number of orders received recently -->
        <div class="content_home">
          <div class="overview-boxes">
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Number of Orders</div>
                <div class="number">  400</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
              <i class='bx bx-cart-alt cart'></i>
            </div>
             <!-- adding the analytics of the total sales -->
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Sales</div>
                <div class="number">550</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
              <i class='bx bxs-cart-add cart two' ></i>
            </div>
             <!-- adding the analytics from the recent sales -->
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Profit</div>
                <div class="number">Rs 5000</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
              <i class='bx bx-cart cart three' ></i>
            </div>
             <!-- adding the analytics of the total return obtained from recent sales -->
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Return</div>
                <div class="number">890</div>
                <div class="indicator">
                  <i class='bx bx-down-arrow-alt down'></i>
                  <span class="text">Down From Today</span>
                </div>
              </div>
              <i class='bx bxs-cart-download cart four' ></i>
            </div>
          </div>
     <!-- adding the analytics from the recent sales -->
          <div class="salestabs">
            <div class="recent-sales box">
              <div class="title">Recent Sales</div>
              <div class="sales-details">
                <ul class="details">
                  <!-- table displaying the recent purchases of customers -->
                  <li class="topic">Date</li>
                  <li><a href="#">19 Jan 2022</a></li>
                  <li><a href="#">19 Jan 2022</a></li>
                  <li><a href="#">19 Jan 2022</a></li>
                  <li><a href="#">19 Jan 2022</a></li>
                  <li><a href="#">19 Jan 2022</a></li>
                  <li><a href="#">19 Jan 2022</a></li>
                  <li><a href="#">19 Jan 2022</a></li>
                  <li><a href="#">19 Jan 2022</a></li>
                  <li><a href="#">19 Jan 2022</a></li>
                </ul>
                <ul class="details">
                <li class="topic">Customer</li>
                <li><a href="#">Anna Seerungun</a></li>
                <li><a href="#">Alex Martin</a></li>
                <li><a href="#">Mishna Raj</a></li>
                <li><a href="#">Hannah Lexa</a></li>
                <li><a href="#">Martin Din</a></li>
                <li><a href="#">Andy Pandy</a></li>
                <li><a href="#">Adrina Lima</a></li>
                <li><a href="#">Rheea Ram</a></li>
                 <li><a href="#">Hans Pandoo</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Sales</li>
                <li><a href="#">Delivered</a></li>
                <li><a href="#">Delivered</a></li>
                <li><a href="#">Returned</a></li>
                <li><a href="#">Pending</a></li>
                <li><a href="#">Delivered</a></li>
                <li><a href="#">Delivered</a></li>
                <li><a href="#">Returned</a></li>
                 <li><a href="#">Pending</a></li>
                <li><a href="#">Pending</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Total</li>
                <li><a href="#">Rs 750</a></li>
                <li><a href="#">Rs 1500</a></li>
                <li><a href="#">Rs 3500</a></li>
                <li><a href="#">Rs 475</a></li>
                <li><a href="#">Rs 670</a></li>
                <li><a href="#">Rs 2590</a></li>
                <li><a href="#">Rs 475</a></li>
                 <li><a href="#">Rs 3700</a></li>
                 <li><a href="#">Rs 1500</a></li>
              </ul>
              </div>
                 <!-- button to see all recent sales since the previous day -->
              <div class="button">
                <a href="#">See All</a>
              </div>
            </div>
            <div class="top-sales box">
              <div class="title">Best Selling Products</div>
              <ul class="top-sales-details">
                <li>
                <a href="#">
                   <!-- adding  the best selling products to a table -->
                  <span class="product">Landscape of Mahebourg</span>
                </a>
                <span class="price">Rs 1500</span>
              </li>
              <li>
                <a href="#">
                  <span class="product">Port Louis the port </span>
                </a>
                <span class="price">Rs 475</span>
              </li>
              <li>
                <a href="#">
                  <span class="product">Le Morne Brabant Landscape</span>
                </a>
                <span class="price">Rs 3500</span>
              </li>
              <li>
                <a href="#">
                  <span class="product">Portrait of Joy</span>
                </a>
                <span class="price">Rs 670</span>
              </li>
              <li>
                <a href="#">
                  <span class="product">House of the people</span>
                </a>
                <span class="price">Rs 2500</span>
              </li>
              <li>
                <a href="#">
                  <span class="product">Animal Life</span>
                </a>
                <span class="price">Rs 1500</span>
              <li>
              </ul>
            </div>
          </div>
        </div>
      </section>
     <!-- to make the sidemenu bar active -->
      <script>
       let sidebar = document.querySelector(".sidemenu");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
     </script>

      <footer class="footer1">
        <!-- linking footer to the other pages -->
      <div class="footer-left">
      <h3>Ti<span>Moris</span></h3>
      <p class="footer-links">
      <a href="index.php">Home</a>
      .
      <a href="login.php">Login</a>
      ·
      <a href="#">About</a>
      ·
      <a href="#">Privacy Policy</a>
      ·
      <a href="#">Faq</a>
      ·
      <a href="#">Contact</a>
      </p>
      
      <p class="footer-company-name">Ti Moris &copy; 2022</p>
      </div>
         <!-- adding details to footer -->
      <div class="footer-center">
      <div>
      <i class="fa fa-map-marker"></i>
      <p><span>Avenue des Palmiers </span> Curepipe,Mauritius</p>
      </div>
      
      <div>
      <i class="fa fa-phone"></i>
      <p>+230 59484598</p>
      </div>
      
      <div>
      <i class="fa fa-envelope"></i>
      <p><a href="SJ983@live.mdx.ac.uk">SJ983@live.mdx.ac.uk</a></p>
      </div>
      
      </div>
      
      <div class="footer-right">
      
      <p class="footer-company-about">
      <span>About the company</span>
      Ecommerce website selling local paintings; 
      </p>
      <div class="footer-icons">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-github"></i></a>
      
      </div>  
      </footer>
  </body>
</html>
  