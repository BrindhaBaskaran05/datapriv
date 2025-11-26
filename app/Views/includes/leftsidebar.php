        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="
    background-color: #0a2540 !important;
">
          <div class="app-brand demo">
            <a href="<?php echo base_url() . "/dashboard"; ?>" class="app-brand-link">
              <img
                src="<?php echo base_url(); ?>web_assets/img/logo.jpg"
                style="
                        width: 131px;
                        height: auto;
                        margin-left: 15%;
                        border-radius: 10px;
                        " />
            </a>


            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <?php
            $Url = $_SERVER['REQUEST_URI'];
            $Expurl = explode("public/", $Url);
            $check = $Expurl[1];
            //echo $check;
            ?>
            <li class="menu-item <?php if ($check == "dashboard") {
                                    echo "active";
                                  } ?>">

              <a href="<?php echo base_url() . "dashboard"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>
            <li class="menu-item <?php if ($check == "scan") {
                                    echo "active";
                                  } ?>">
              <a href="<?php echo base_url() . "scan"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Analytics">Start Scan</div>
              </a>
            </li>

            <!-- Layouts -->

            <!-- User interface -->
            <li class="menu-item <?php if ($check == "profile") {
                                    echo "active";
                                  } ?>">
              <a href="<?php echo base_url() . "profile"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user me-2"></i>
                <div data-i18n="User interface">Profile</div>
              </a>

            </li>
            <li class="menu-item <?php if ($check == "risk_exposure") {
                                    echo "active";
                                  } ?>">
              <a href="<?php echo base_url() . "risk_exposure"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="User interface">My Risk Exposure</div>
              </a>
            </li>
            <li class="menu-item <?php if ($check == "users/upgrade_plans") {
                                    echo "active";
                                  } ?>">
              <a href="<?php echo base_url() . "users/upgrade_plans"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="User interface">Upgrade Plans</div>
              </a>
            </li>
            <li class="menu-item <?php if ($check == "privacy") {
                                    echo "active";
                                  } ?>">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Take Care of your privacy</div>
              </a>
            </li>
            <li class="menu-item <?php if ($check == "scan/scan_schedule") {
                                    echo "active";
                                  } ?>">
              <a href="<?php echo base_url() . "scan/scan_schedule"; ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-time"></i>
                <div data-i18n="User interface">Scan Schedule</div>
              </a>
            </li>






          </ul>
        </aside>
        <!-- / Menu -->