<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="admin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logo.png" type="image/icon type">
    <title>DragonStone</title>
</head>
<body>
    <nav>
        <div>

          <img src="../assets/images/logo.png" class="logo"></img>
        </div>
        <div style="flex-basis: auto;">
          <form class="search-form">
            
            <input  type="text" class="search-input" placeholder="Search...">
            <button type="submit" class="submit-btn">Submit</button>
          </form>
        </div>
      </nav>
      
      <div class="mpage">
        <div class="lfttable" >
            <div class="tablrow">
                <div class="tablecol"> <img src="../assets/images/dashboard.png" >      </div>
                <div class="tablecol"> <a href="./adminDashboard.php"> Dashboard </a>   </div>
            </div>
          <div class="tablrow">
            <div class="tablecol"> <img src="../assets/images/costumers.png" >      </div>
            <div class="tablecol"> <a href="admindashbord.html">Costumers   </a>   </div>
          </div>
          <div class="tablrow">
            <div class="tablecol"> <img src="../assets/images/orders.png" >      </div>
            <div class="tablecol"><a href="./adminOrders.php"> Orders  </a>    </div>
          </div>
          <div class="tablrow">
            <div class="tablecol"> <img src="../assets/images/products.png" >      </div>
            <div class="tablecol"> <a href="productDetailPage.php">Products   </a>   </div>
          </div>
        </div>

        <div class="rgtcontent2">
            <div class ="ttbl4">

                <h3>Latest Orders</h3>
                <table class="tbl4">
                    <tr>
                        <th>Order </th>
                        <th>Order ID</th>
                        <th>Date&Time</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>STATUS</th>
                    </tr>
                    <tr>
                        <td>Payment from Tariro Sango</td>
                        <td>1005</td>
                        <td>Aug 16,2025</td>
                        <td>R18 950</td>
                        <td>1</td>
                        <td >
                          <div class="stat">
                            delivered
                          </div>
                        </td>
                    </tr>
                    
                    
                    
                </table>
            </div>
                
        </div>
    </div>
</body>
</html>
