<?php 
    include 'includes/header.php';
    include 'functions/myfunctions.php';
    // session_start();
    if (!isset($_SESSION['auth'])) {
        // $_SESSION['message_error']= 'Login To Countinue';
        // header('Location: ../signin.php');
        redirect('../signin.php',"message_error", "Login To Countinue");
    }
    
    if (isset($_SESSION['role_as'])) {
        if ($_SESSION['role_as'] != 1) {
            // $_SESSION['message_error']= 'Not Authorized';
            // header('Location: ../index.php');
            redirect('../index.php',"message_error", "Not Authorized");
        }
    }

?>
    <?php include 'includes/side.php'?>        
        <div class="page-content flex-1 overflow">
            <?php include 'includes/navbar.php' ?>
            <h1 class="m-20 relative fit-content">Dashboard</h1>
            <div class="wrapper grid-col-3 p-10">
                <div class="Statistics bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Statistics</h2>
                        <!-- <span class="block mt-10 c-grey">Everything About Support Tickets</span> -->
                    </div>
                    <div class="stats grid-col-2 mt-20">
                        <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <?php
                            $members = totalMembers();
                            if (mysqli_num_rows($members)>0) {
                                $members_no = mysqli_fetch_array($members);
                                // print_r($members_no);
                            ?>
                            <i class="fas fa-user c-orange fa-2x"></i>
                            <span class="number bold c-orange"><?=$members_no[0]?></span>
                            <span class="stat c-grey">Members</span>
                            <?php
                            }else{
                            ?>
                            <!-- <i class="fa-solid fa-circle-xmark"></i> -->
                            <i class="fa-solid fa-circle-xmark c-orange fa-2x"></i>
                            <span class="stat c-grey">No members</span>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <?php
                            $designs = totalDesigns();
                            if (mysqli_num_rows($designs)>0) {
                                $designs_no = mysqli_fetch_array($designs);
                                // print_r($members_no);
                            ?>
                            <!-- <i class="fa-solid fa-compass-drafting"></i> -->
                            <i class="fas fa-compass-drafting c-green fa-2x"></i>
                            <span class="number bold c-green"><?=$designs_no[0]?></span>
                            <span class="stat c-grey">Designs</span>
                            <?php
                            }else{
                            ?>
                            <!-- <i class="fa-solid fa-circle-xmark"></i> -->
                            <i class="fa-solid fa-circle-xmark c-orange fa-2x"></i>
                            <span class="stat c-grey">No Designs</span>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <?php
                            $sales = totalSales();
                            if (mysqli_num_rows($sales)>0) {
                                $sales_count = mysqli_fetch_array($sales);
                                // print_r($sales_count);
                            ?>
                            <!-- <i class="fa-solid fa-compass-drafting"></i> -->
                            <!-- <i class="fa-solid fa-dollar-sign"></i> -->
                            <!-- <i class="fa-solid fa-sack-dollar"></i> -->
                            <i class="fas fa-sack-dollar c-main fa-2x"></i>
                            <span class="number bold c-main"><?=$sales_count['sales_count']?></span>
                            <span class="stat c-grey">Total Sales</span>
                            <i class="fas fa-sack-dollar c-main fa-2x"></i>
                            <span class="number bold c-main">$ <?=$sales_count['sales_amount']?></span>
                            <span class="stat c-grey">Total Income</span>
                            <?php
                            }else{
                            ?>
                            <!-- <i class="fa-solid fa-circle-xmark"></i> -->
                            <i class="fa-solid fa-circle-xmark c-orange fa-2x"></i>
                            <span class="stat c-grey">No Income</span>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <i class="fas fa-expand c-green fa-2x"></i>
                            <span class="number bold">1900</span>
                            <span class="stat c-grey">Total Sales</span>
                        </div> -->
                        <!-- <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <i class="fas fa-not-equal c-red fa-2x"></i>
                            <span class="number bold">100</span>
                            <span class="stat c-grey">Deleted</span>
                        </div> -->
                    </div>
                </div>
                <div class="Statistics bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Sales Statistics</h2>
                        <!-- <span class="block mt-10 c-grey">Everything About Support Tickets</span> -->
                    </div>
                    <div class="stats grid-col-2 mt-20">
                        <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <?php
                            $last_week = lastWeekSales();
                            if (mysqli_num_rows($last_week)>0) {
                                $last_week_data = mysqli_fetch_array($last_week);
                                if ($last_week_data['week_count']>0) {
                                    # code...
                                    // print_r($members_no);
                                    ?>
                            <i class="fa-solid fa-signal c-orange fa-2x"></i>
                            <span class="number bold c-orange"><?=$last_week_data['week_count']?></span>
                            <span class="stat c-grey">Last Week Sales Count</span>
                            <i class="fa-solid fa-sack-dollar c-orange fa-2x"></i>
                            <span class="number bold c-orange">$ <?=$last_week_data['week_amount']?></span>
                            <span class="stat c-grey">Last Week Sales Amount</span>
                            <?php
                            }else{
                                ?>
                            <!-- <i class="fa-solid fa-circle-xmark"></i> -->
                            <i class="fa-solid fa-circle-xmark c-red fa-2x"></i>
                            <span class="stat c-grey">No Sales Last Week</span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <?php
                            $last_month = lastMonthSales();
                            if (mysqli_num_rows($last_month)>0) {
                                $last_month_data = mysqli_fetch_array($last_month);
                                if ($last_month_data['month_count']>0) {
                                    # code...
                                    // print_r($members_no);
                                    ?>
                            <i class="fa-solid fa-signal c-main fa-2x"></i>
                            <span class="number bold c-main"><?=$last_month_data['month_count']?></span>
                            <span class="stat c-grey">Last Month Sales Count</span>
                            <i class="fa-solid fa-sack-dollar c-main fa-2x"></i>
                            <span class="number bold c-main">$ <?=$last_month_data['month_amount']?></span>
                            <span class="stat c-grey">Last Month Sales Amount</span>
                            <?php
                            }else{
                                ?>
                            <!-- <i class="fa-solid fa-circle-xmark"></i> -->
                            <i class="fa-solid fa-circle-xmark c-red fa-2x"></i>
                            <span class="stat c-grey">No Sales Last Month</span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        
                        <!-- <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <i class="fas fa-expand c-green fa-2x"></i>
                            <span class="number bold">1900</span>
                            <span class="stat c-grey">Total Sales</span>
                        </div> -->
                        <!-- <div class="box flex-center flex-col border-grey p-20 rad-10 ">
                            <i class="fas fa-not-equal c-red fa-2x"></i>
                            <span class="number bold">100</span>
                            <span class="stat c-grey">Deleted</span>
                        </div> -->
                    </div>
                </div>
                <div class="top-buyers bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Top Buyers</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="c-grey" >Member Name</h4>
                            <span class="c-grey" >Amount</span>
                        </div>
                        <?php
                        $top_members = topBuyers();
                        if (mysqli_num_rows($top_members)>0) {
                            // $members_names = mysqli_fetch_array($top_members);
                            // print_r($top_members);
                            foreach ($top_members as $member_data) {
                                // print_r($member_data);
                                $name = selectById('users',$member_data['user_id']);
                                ?>
                        
                        <div class="row flex-center-between pt-10 pb-10">
                            <?php
                            $m_name = mysqli_fetch_array($name);
                            // print_r($m_name);
                            ?>
                            <h4 class="" ><?=$m_name['first_name']." <span class='disc'>(".$member_data['COUNT(user_id)'].") orders</span>" ?></h4>
                            <span class="bg-grey rad-10 p-10" >$ <?=$member_data['SUM(total_price)']?></span>
                        </div>
                        <?php
                            }
                        }
                        ?>
                        
                    </div>
                </div>
                <div class="best-selling-designs bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Best Selling Designs</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="c-grey" >Design Name</h4>
                            <span class="c-grey" >Amount</span>
                        </div>
                        <?php
                        $best_selling = bestSelling();
                        if (mysqli_num_rows($best_selling)>0) {
                            // $members_names = mysqli_fetch_array($top_members);
                            // print_r($top_members);
                            foreach ($best_selling as $best_selling_data) {
                                // print_r($member_name);
                                $products = selectById('products',$best_selling_data['prod_id']);
                                ?>
                        
                        <div class="row flex-center-between pt-10 pb-10">
                            <?php
                            $product_data = mysqli_fetch_array($products);
                            // print_r($m_name);
                            ?>
                            <h4 class="" ><?=$product_data['prod_name'] ?> (<?=$best_selling_data['COUNT(prod_id)']?>)</h4>
                            <span class="bg-grey rad-10 p-10" >$ <?=$best_selling_data['SUM(price)']?></span>
                        </div>
                        <?php
                            }
                        }
                        ?>
                        
                    </div>
                </div>
                <div class="best-selling-designs bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Best</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="c-grey" >Keyword</h4>
                            <span class="c-grey" >Search Count</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >Programming</h4>
                            <span class="bg-grey rad-10 p-10" >220</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >JavaScript</h4>
                            <span class="bg-grey rad-10 p-10" >180</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >PHP</h4>
                            <span class="bg-grey rad-10 p-10" >160</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >Code</h4>
                            <span class="bg-grey rad-10 p-10" >145</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >Design</h4>
                            <span class="bg-grey rad-10 p-10" >110</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >Logic</h4>
                            <span class="bg-grey rad-10 p-10" >95</span>
                        </div>
                    </div>
                </div>
                
                <div class="welcome bg-white txt-c-mobile rad-10 overflow">
                    <div class="top flex-center-between p-20 bg-main-transparent">
                        <div class="left">
                            <h2>welcome</h2>
                            <span class="c-grey block mt-10">Ayman</span>
                        </div>
                        <img class="hide-mobile" src="assets/images/welcome.png" alt="">
                    </div>
                    <img class="avatar rad-50 shadow" src="assets/images/avatar.png" alt="">
                    <div class="body flex-center-between relative mt-20 p-20 block-mobile txt-c border-grey">
                        <div class="job p-10">
                            <h3>Ayman Soliman</h3>
                            <span class="c-grey">Web Developer</span>
                        </div>
                        <div class="projects p-10">
                            <h3>80</h3>
                            <span class="c-grey">projects</span>
                        </div>
                        <div class="earned p-10">
                            <h3>$8500</h3>
                            <span class="c-grey">Earned</span>
                        </div>
                    </div>
                    <div class="btn bg-main c-white rad-6 p-10 fit-content m-10 left-auto" >button</div>
                </div>
                <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
                    <div class="left">
                        <h2>Quick Draft</h2>
                        <span class="c-grey block mt-10">Write A Draft for your ideas</span>
                    </div>
                    <form class="mt-20" action="">
                        <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" placeholder="Title">
                        <textarea class="bg-grey w-full border-grey rad-6 p-10" name="" placeholder="Your Thoughts"></textarea>
                    </form>
                    <div class="btn bg-main c-white rad-6 p-10 fit-content m-10 left-auto" >button</div>
                </div>
                <div class="targets bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Yearly Targets</h2>
                        <span class="block mt-10">Targets of the Year</span>
                    </div>
                    <div class="contain mt-20">
                        <div class="money flex-center">
                            <i class="fas fa-dollar-sign p-20 flex-center mr-20 c-main"></i>
                            <div class="target  flex-1 p-10">
                                <h4 class="c-grey mb-10">Money</h4>
                                <span class="count">$20.000</span>
                                <span class="progress-back w-full block mt-10"><span class="progress-bar bg-main block relative" style="width: 80%;" data-target="80%"></span></span>
                            </div>
                        </div>
                        <div class="project flex-center">
                            <i class="fas fa-code p-20 flex-center mr-20 c-orange"></i>
                            <div class="target  flex-1 p-10">
                                <h4 class="c-grey mb-10">Projects</h4>
                                <span class="count">24</span>
                                <span class="progress-back w-full block mt-10"><span class="progress-bar bg-orange block relative" style="width: 55%;" data-target="55%"></span></span>
                            </div>
                        </div>
                        <div class="team flex-center">
                            <i class="fas fa-user p-20 flex-center mr-20 c-green"></i>
                            <div class="target  flex-1 p-10">
                                <h4 class="c-grey mb-10">Team</h4>
                                <span class="count">12</span>
                                <span class="progress-back w-full block mt-10"><span class="progress-bar bg-green block relative" style="width: 75%;" data-target="75%"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="news bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Latest News</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="box flex-center-between pt-10 pb-10 border-bottom">
                            <img src="assets/images/news-01.png" alt="" class="news-pic rad-10">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10 border-bottom">
                            <img src="assets/images/news-02.png" alt="" class="news-pic rad-10">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10 border-bottom">
                            <img src="assets/images/news-03.png" alt="" class="news-pic rad-10">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10">
                            <img src="assets/images/news-04.png" alt="" class="news-pic rad-10">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="tasks bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Latest Tasks</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="box flex-center-between pt-10 pb-10">
                            <div class="info ">
                                <h4>Created SASS Section</h4>
                                <span class="c-grey" >New SASS Examples & Tutorials</span>
                            </div>
                            <i class="fas fa-trash"></i>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10">
                            <div class="info ">
                                <h4>Created SASS Section</h4>
                                <span class="c-grey" >New SASS Examples & Tutorials</span>
                            </div>
                            <i class="fas fa-trash"></i>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10">
                            <div class="info ">
                                <h4>Created SASS Section</h4>
                                <span class="c-grey" >New SASS Examples & Tutorials</span>
                            </div>
                            <i class="fas fa-trash"></i>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10">
                            <div class="info deleted">
                                <h4>Created SASS Section</h4>
                                <span class="c-grey" >New SASS Examples & Tutorials</span>
                            </div>
                            <i class="fas fa-trash c-grey"></i>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10">
                            <div class="info ">
                                <h4>Created SASS Section</h4>
                                <span class="c-grey" >New SASS Examples & Tutorials</span>
                            </div>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>
                <div class="top-search bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Top Search Items</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="c-grey" >Keyword</h4>
                            <span class="c-grey" >Search Count</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >Programming</h4>
                            <span class="bg-grey rad-10 p-10" >220</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >JavaScript</h4>
                            <span class="bg-grey rad-10 p-10" >180</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >PHP</h4>
                            <span class="bg-grey rad-10 p-10" >160</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >Code</h4>
                            <span class="bg-grey rad-10 p-10" >145</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >Design</h4>
                            <span class="bg-grey rad-10 p-10" >110</span>
                        </div>
                        <div class="row flex-center-between pt-10 pb-10">
                            <h4 class="" >Logic</h4>
                            <span class="bg-grey rad-10 p-10" >95</span>
                        </div>
                    </div>
                </div>
                <div class="top-uploads bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Latest Uploads</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="box flex-center-between pt-10 pb-10 border-bottom">
                            <img src="assets/images/pdf.svg" alt="" class="news-pic">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10 border-bottom">
                            <img src="assets/images/avi.svg" alt="" class="news-pic">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10 border-bottom">
                            <img src="assets/images/psd.svg" alt="" class="news-pic">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10 border-bottom">
                            <img src="assets/images/zip.svg" alt="" class="news-pic">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10 border-bottom">
                            <img src="assets/images/dll.svg" alt="" class="news-pic">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                        <div class="box flex-center-between pt-10 pb-10">
                            <img src="assets/images/eps.svg" alt="" class="news-pic">
                            <div class="content flex-center-between flex-1 pl-10">
                                <div class="info flex-1">
                                    <h4>Created SASS Section</h4>
                                    <span class="c-grey block pt-10" >New SASS Examples & Tutorials</span>
                                </div>
                                <span class="period bg-grey p-10 rad-6" >3 Days Ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="last-project bg-white p-20 txt-c-mobile rad-10 relative">
                    <div class="top">
                        <h2>Last Project Progress</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <ul class="project-progress pl-20 mt-10 mb-10 relative">
                            <li class="mb-20 relative finished" >Got The Project</li>
                            <li class="mb-20 relative finished" >Started The Project</li>
                            <li class="mb-20 relative finished" >The Project About To Finish</li>
                            <li class="mb-20 relative process" >Test The Project</li>
                            <li class="mb-20 relative remain" >Finish The Project & Got The Money</li>
                        </ul>
                    </div>
                    <img src="assets/images/project.png" alt="" class="absolute">
                </div>
                <div class="reminder bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Reminder</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <ul class="dates pl-20 mt-10 mb-10 relative">
                            <li class="mb-20 relative blue" ><h4>Check My Tasks List</h4><span class="c-grey block pt-10" >05/11/2023 - 12:00am</span></li>
                            <li class="mb-20 relative green" ><h4>Check My Projects</h4><span class="c-grey block pt-10" >05/11/2023 - 12:00am</span></li>
                            <li class="mb-20 relative orange" ><h4>Call All My Clients</h4><span class="c-grey block pt-10" >05/11/2023 - 12:00am</span></li>
                            <li class="mb-20 relative red" ><h4>Finish The Development Workshop</h4><span class="c-grey block pt-10" >05/11/2023 - 12:00am</span></li>
                        </ul>
                    </div>
                </div>
                <div class="post bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Latest Post</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="head flex-center pb-10 pt-10 border-bottom">
                            <img src="assets/images/avatar.png" alt="" class="pr-10">
                            <span class="bold flex-1" >Lefty Mummy <span class="c-grey block time mt-10" >About 3 Hours Ago</span></span>
                        </div>
                        <div class="body pb-10 pt-10 border-bottom">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente adipisci vel Lorem ipsum dolor sit amet  
                        </div>
                        <div class="foot flex-center-between pt-10 pb-10">
                            <div class="right c-grey">
                                <i class="far fa-heart"></i>
                                1.8K
                            </div>
                            <div class="left c-grey">
                                <i class="far fa-comment"></i>
                                500
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social bg-white p-20 txt-c-mobile rad-10 ">
                    <div class="top">
                        <h2>Social Media Stats</h2>
                    </div>
                    <div class="wrapper mt-20">
                        <div class="box flex-center bg-main-transparent mb-10">
                            <i class="fab fa-x-twitter p-20 mr-10 bg-main c-white  block flex-center"></i>
                            <div class="info flex-1 flex-center-between">
                                <span class="bold c-main" >90K Followers</span>
                                <span class="bg-main c-white rad-6 p-10 mr-10">Follow</span>
                            </div>
                        </div>
                        <div class="box flex-center bg-green-transparent mb-10">
                            <i class="fab fa-facebook-f p-20 mr-10 bg-green c-white block flex-center"></i>
                            <div class="info flex-1 flex-center-between">
                                <span class="bold c-green">90K Followers</span>
                                <span class="bg-green c-white rad-6 p-10 mr-10">Follow</span>
                            </div>
                        </div>
                        <div class="box flex-center bg-orange-transparent mb-10">
                            <i class="fab fa-youtube p-20 mr-10 bg-orange c-white block flex-center"></i>
                            <div class="info flex-1 flex-center-between">
                                <span class="bold c-orange">90K Followers</span>
                                <span class="bg-orange c-white rad-6 p-10 mr-10">Follow</span>
                            </div>
                        </div>
                        <div class="box flex-center bg-red-transparent mb-10">
                            <i class="fab fa-facebook-f p-20 mr-10 bg-red c-white block flex-center"></i>
                            <div class="info flex-1 flex-center-between">
                                <span class="bold c-red">90K Followers</span>
                                <span class="bg-red c-white rad-6 p-10 mr-10">Follow</span>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="projects-table bg-white p-10 m-20 rad-10">
                <div class="top">
                    <h2>Social Media Stats</h2>
                </div>
                <div class="table-container">
                    <table class="auto mt-20">
                        <thead class="bold">
                            <tr>
                                <td class="p-20 bg-grey" >Name</td>
                                <td class="p-20 bg-grey" >Finished Date</td>
                                <td class="p-20 bg-grey" >Client</td>
                                <td class="p-20 bg-grey" >Price</td>
                                <td class="p-20 bg-grey" >Team</td>
                                <td class="p-20 bg-grey" >Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-20 border-bottom" >Lefty Mummy</td>
                                <td class="p-20 border-bottom" >10 May 2022</td>
                                <td class="p-20 border-bottom" >Ayman</td>
                                <td class="p-20 border-bottom" >$5000</td>
                                <td class="p-20 border-bottom" >
                                    <img src="assets/images/team-02.png" alt="">
                                    <img src="assets/images/team-04.png" alt="">
                                    <img src="assets/images/team-05.png" alt="">
                                    <img src="assets/images/team-03.png" alt="">
                                </td>
                                <td class="p-20 border-bottom" >
                                    <span class="bg-orange c-white btn" >Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-20 border-bottom" >Lefty Mummy</td>
                                <td class="p-20 border-bottom" >10 May 2022</td>
                                <td class="p-20 border-bottom" >Ayman</td>
                                <td class="p-20 border-bottom" >$5000</td>
                                <td class="p-20 border-bottom" >
                                    <img src="assets/images/team-03.png" alt="">
                                    <img src="assets/images/team-01.png" alt="">
                                    <img src="assets/images/team-04.png" alt="">
                                    <img src="assets/images/team-05.png" alt="">
                                </td>
                                <td class="p-20 border-bottom" >
                                    <span class="bg-green c-white btn" >Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-20 border-bottom" >Lefty Mummy</td>
                                <td class="p-20 border-bottom" >10 May 2022</td>
                                <td class="p-20 border-bottom" >Ayman</td>
                                <td class="p-20 border-bottom" >$5000</td>
                                <td class="p-20 border-bottom" >
                                    <img src="assets/images/team-01.png" alt="">
                                    <img src="assets/images/team-02.png" alt="">
                                    <img src="assets/images/team-03.png" alt="">
                                    <img src="assets/images/team-04.png" alt="">
                                    <img src="assets/images/team-05.png" alt="">
                                </td>
                                <td class="p-20 border-bottom" >
                                    <span class="bg-red c-white btn" >Rejected</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-20 border-bottom" >Lefty Mummy</td>
                                <td class="p-20 border-bottom" >10 May 2022</td>
                                <td class="p-20 border-bottom" >Ayman</td>
                                <td class="p-20 border-bottom" >$5000</td>
                                <td class="p-20 border-bottom" >
                                    <img src="assets/images/team-05.png" alt="">
                                    <img src="assets/images/team-02.png" alt="">
                                    <img src="assets/images/team-03.png" alt="">
                                    <img src="assets/images/team-01.png" alt="">
                                </td>
                                <td class="p-20 border-bottom" >
                                    <span class="bg-orange c-white btn" >pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-20 border-bottom" >Lefty Mummy</td>
                                <td class="p-20 border-bottom" >10 May 2022</td>
                                <td class="p-20 border-bottom" >Ayman</td>
                                <td class="p-20 border-bottom" >$5000</td>
                                <td class="p-20 border-bottom" >
                                    <img src="assets/images/team-01.png" alt="">
                                    <img src="assets/images/team-03.png" alt="">
                                    <img src="assets/images/team-04.png" alt="">
                                </td>
                                <td class="p-20 border-bottom" >
                                    <span class="bg-green c-white btn" >Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-20 border-bottom" >Lefty Mummy</td>
                                <td class="p-20 border-bottom" >10 May 2022</td>
                                <td class="p-20 border-bottom" >Ayman</td>
                                <td class="p-20 border-bottom" >$5000</td>
                                <td class="p-20 border-bottom" >
                                    <img src="assets/images/team-01.png" alt="">
                                    <img src="assets/images/team-02.png" alt="">
                                    <img src="assets/images/team-05.png" alt="">
                                    <img src="assets/images/team-03.png" alt="">
                                </td>
                                <td class="p-20 border-bottom" >
                                    <span class="bg-main c-white btn" >In Progress</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'includes/footer.php';
?>

