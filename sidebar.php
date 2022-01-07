<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
else if (!($_SESSION['usertype']=='admin')) {
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
            
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <title>Welcome</title>

        <style>
            /*li a:hover{
                color:blue;
                background-color:#5b9aa0;
                border:2px solid white;
                border-radius: 10px;
            }*/

            ul li a{
                color:white;
                font-size:16px;
            }

             ul li a:hover {
    color: #ffa4a2;
    background: #fff;
}


            
        </style>
    </head>

    <body>

<div class="col-auto col-md-3 col-xl-2 text-light" style="background: rgb(3, 24, 39); opacity: 0.8; color:white; position: fixed;">
            <div class="d-flex flex-column  px-3 pt-2 text-white min-vh-100" >
                <a href="#" class="d-flex align-items-center pb-4 mb-md-0 me-md-auto text-white text-decoration-none" >
                    <span class="fs-4 d-none d-sm-inline"  style="margin-top:20px; margin-left:60px;">Menu</span>
                </a>
                
                <ul class="sidebar-menu nav nav-pills flex-column mb-sm-auto mb-0 text-white " id="menu">
                    
                    <li class="nav-item">
                        <a href="admin.php" class="nav-link align-middle px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Home">
                        <i class="fas fa-home"></i> <span class="ms-1 d-none d-sm-inline" >Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="admin.php?pg=a_dashboard.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip"  data-bs-placement="right" title="Dashboard">
                        <i class="fas fa-tachometer-alt"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                    </li>

                    <li class="dropend">
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle" data-bs-toggle="tooltip"  data-bs-placement="right" title="Manage Employee">
                        <i class="fas fa-users-cog"></i><span class="ms-1 d-none d-sm-inline"> Manage Employee </span> </a>
                        <ul class="collapse nav flex-column ms-1 text-white" id="submenu1" data-bs-parent="#menu" style="padding-left:20px;">
                            <li class="w-100">
                                <a href="admin.php?pg=a_addemp.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Add Employee"> <i class="fas fa-user-plus"></i><span class="d-none d-sm-inline"> Add Employee</span></a>
                            </li>
                            <li>
                                <a href="admin.php?pg=a_viewemp.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="View Employee"> <i class="fas fa-eye"></i><span class="d-none d-sm-inline"> View Employee</span> </a>
                            </li>
                            <div class="dropdown-divider" style="background-color:blue;"></div>
                        </ul>
                    </li>


                    <li class="dropend">
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle" data-bs-toggle="tooltip"  data-bs-placement="right" title="Loan Services">
                        <i class="fas fa-hand-holding-usd"></i> <span class="ms-1 d-none d-sm-inline">Loan Services</span> </a>
                          <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu" style="padding-left:20px;">
                            <li class="w-100">
                                <a href="admin.php?pg=a_addloan.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Loan Add"> <i class="fas fa-percentage"></i><span class="d-none d-sm-inline"> Loan Add</span></a>
                            </li>
                            <li class="w-100">
                                <a href="admin.php?pg=viewloan.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="View Loan"> <i class="fas fa-eye"></i><span class="d-none d-sm-inline"> View Loan </span></a>
                            </li>
                            <li>
                                <a href="admin.php?pg=a_view_all_loan_applicants.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Loan Applicants"><i class="fas fa-file-invoice"></i><span class="d-none d-sm-inline">  loan Applicants</span></a>
                            </li>
                            <li>
                                <a href="admin.php?pg=a_view_loan_borrowers.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Loan Borrowers"><i class="fas fa-file-invoice-dollar"></i><span class="d-none d-sm-inline">  loan Borrowers</span></a>
                            </li>
                            <div class="dropdown-divider" style="background-color:blue;"></div>
                        </ul>
                      </li>


                    <li class="dropend">
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle" data-bs-toggle="tooltip"  data-bs-placement="right" title="Manage Salary">
                        <i class="fas fa-rupee-sign"></i> <span class="ms-1 d-none d-sm-inline">Manage Salary</span> </a>
                          <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu" style="padding-left:20px;">
                            <li class="w-100">
                                <a href="admin.php?pg=hr_salary_month.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Salary Report"> <i class="fas fa-file-invoice-dollar"></i><span class="d-none d-sm-inline"> Salary Report</span></a>
                            </li>
                            <li>
                                <a href="admin.php?pg=leaves_2.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Leave Applicants"> <i class="fas fa-eye"></i><span class="d-none d-sm-inline"> Leave Applicants</span> </a>
                            </li>
                            <li>
                                <a href="admin.php?pg=paymentadd.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Payment Registration"> <i class="fas fa-cash-register"></i><span class="d-none d-sm-inline"> Payment Registration</span></a>
                            </li>
                            <li>
                                <a href="admin.php?pg=pay.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="View Payment Details"> <i class="fas fa-cash-register"></i><span class="d-none d-sm-inline"> View Payment Details</span></a>
                            </li>
                             
                            <div class="dropdown-divider" style="background-color:blue;"></div>
                        </ul>
                    </li>

                    <li class="dropend"> 
                        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle" data-bs-toggle="tooltip"  data-bs-placement="right" title="Manage Project">
                        <i class="fas fa-tasks"></i> <span class="ms-1 d-none d-sm-inline"> Manage Project </span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu" style="padding-left:20px;">
                            <li class="w-100">
                                <a href="admin.php?pg=a_addproject.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Assign Project"> <i class="fas fa-file-medical"></i><span class="d-none d-sm-inline">  Assign Project</span></a>
                            </li>
                            <li>
                                <a href="admin.php?pg=viewproject.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="View Project"><i class="fas fa-eye"></i> <span class="d-none d-sm-inline"> View Project</span></a>
                            </li>
                            <li>
                                <a href="admin.php?pg=view_project_submission.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Project Report"><i class="fas fa-project-diagram"></i> <span class="d-none d-sm-inline"> Project Report</span></a>
                            </li>
                            <div class="dropdown-divider" style="background-color:blue;"></div>
                        </ul>
                    </li>

                     <li class="dropend"> 
                        <a href="#submenu5" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle" data-bs-toggle="tooltip"  data-bs-placement="right" title="Feedback & Rewards">
                        <i class="fas fa-tasks"></i> <span class="ms-1 d-none d-sm-inline"> Feedback & Rewards </span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu5" data-bs-parent="#menu" style="padding-left:20px;">
                          <li>
                                <a href="admin.php?pg=feedbackshow.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="View Feedback"> <i class="fas fa-comments"></i><span class="d-none d-sm-inline"> View Feedback</span> </a>
                            </li>
                            <li>
                                <a href="admin.php?pg=a_addreward.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Add Reward"> <i class="fas fa-award"></i> <span class="d-none d-sm-inline">  Add Reward</span> </a>
                            </li>
                            <li>
                                <a href="admin.php?pg=viewreward.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="View Reward"> <i class="fas fa-eye"></i><span class="d-none d-sm-inline"> View Reward</span> </a>
                            </li>
                            <div class="dropdown-divider" style="background-color:blue;"></div>
                        </ul>
                    </li>


                    <li class="dropend">
                        <a href="#submenu6" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle" data-bs-toggle="tooltip"  data-bs-placement="right" title="Account">
                        <i class="fas fa-bullhorn"></i> <span class="ms-1 d-none d-sm-inline">Recruitment</span> </a>
                          <ul class="collapse nav flex-column ms-1" id="submenu6" data-bs-parent="#menu" style="padding-left:20px;">
                            <li>
                                <a href="admin.php?pg=a_add_vacancyhtml.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Change Password"><i class="fas fa-briefcase"></i> <span class="d-none d-sm-inline"> Add vacancy</span></a>
                            </li>
                            <li>
                                <a href="admin.php?pg=a_addAdvertisementhtml.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="View Reward"> <i class="fas fa-ad"></i> <span class="d-none d-sm-inline"> Add Advertisements</span> </a>
                            </li>
                             <li>
                                <a href="admin.php?pg=a_view_openvacanicesdetails.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Change Password"><i class="fas fa-eye"></i> <span class="d-none d-sm-inline"> View Open Vacancy</span></a>
                            </li>
                            <li>
                                <a href="a_view_jobapplicantdetails" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="View Reward"> <i class="fab fa-wpforms"></i> <span class="d-none d-sm-inline"> View Job Applicants</span> </a>
                            </li>
                        </ul>
                      </li>

                      <li class="dropend">
                        <a href="#submenu7" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle" data-bs-toggle="tooltip"  data-bs-placement="right" title="Account">
                        <i class="fas fa-user-cog"></i> <span class="ms-1 d-none d-sm-inline">Account</span> </a>
                          <ul class="collapse nav flex-column ms-1" id="submenu7" data-bs-parent="#menu" style="padding-left:20px;">
                            <li>
                                <a href="admin.php?pg=new_password.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Change Password"><i class="fas fa-key"></i><span class="d-none d-sm-inline"> Change Password</span></a>
                            </li>
                            <div class="dropdown-divider" style="background-color:#555;"></div>
                            <li>
                                <a href="logout.php" class="nav-link px-0" data-bs-toggle="tooltip"  data-bs-placement="right" title="Logout"><i class="fas fa-sign-out-alt"></i><span class="d-none d-sm-inline">Logout</span></a>
                            </li>
                        </ul>
                      </li>

                </ul>
                <hr>
                <div class="dropdown pb-4">
                        <span class="d-none d-sm-inline mx-1">ADMIN</span>
                    </a>                  
                </div>
            
            </div>
        </div>

    </body>
</html>