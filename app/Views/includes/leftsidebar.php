        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="<?php echo base_url()."/dashboard"; ?>" class="app-brand-link">
               <img
                            src="<?php echo base_url(); ?>web_assets/img/logo.jpg"
                           style="
    width: 126px;
    height: auto;
    margin-left: 35%;
"
                          />
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
               <?php
              $Url=$_SERVER['REQUEST_URI'];
              $Expurl=explode("public/",$Url);
              $check=$Expurl[1];
              //echo $check;
              ?>
            <li class="menu-item <?php if($check=="dashboard") { echo "active"; } ?>">
            
              <a href="<?php echo base_url()."dashboard"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>
               <li class="menu-item <?php if($check=="scan") { echo "active"; } ?>">
              <a href="<?php echo base_url()."scan"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Start Scan</div>
              </a>
            </li>

            <!-- Layouts -->

            <!-- User interface -->
            <li class="menu-item <?php if($check=="profile") { echo "active"; } ?>">
              <a href="<?php echo base_url()."profile"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user me-2"></i>
                <div data-i18n="User interface">Profile</div>
              </a>
             
            </li>

          

         
          
          
          </ul>
        </aside>
        <!-- / Menu -->