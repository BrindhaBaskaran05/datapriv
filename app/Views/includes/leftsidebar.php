<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical">

<style>
/* ===== SIDEBAR BASE ===== */
#layout-menu {
    background-color: #0A2540;
    width: 250px;
    border-right: 1px solid rgba(255,255,255,0.06);
}

/* Logo */
.app-brand {
    padding: 20px 0;
    text-align: center;
}

.app-brand img {
    width: 130px;
    border-radius: 8px;
}

/* Menu List */
.menu-inner {
    padding-top: 10px;
}

/* Menu Item */
.menu-item {
    margin: 4px 12px;
}






/* Divider */
.menu-divider {
    height: 1px;
    background: rgba(255,255,255,0.08);
    margin: 12px 16px;
}

/* Menu Link */
.menu-link {
    padding: 10px 14px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    color: rgba(255,255,255,0.75) !important;
    font-size: 14px;
    font-weight: 500;

    /* Smooth Slow Transition */
    transition: 
        background-color 0.4s ease,
        color 0.4s ease,
        transform 0.4s ease;
}

/* Icons */
.menu-link i {
    font-size: 18px;
    margin-right: 10px;
    transition: transform 0.4s ease;
}

/* Subtle Hover */
.menu-item:hover .menu-link {
    background-color: rgba(59,110,165,0.15);
    color: #ffffff !important;
    transform: translateX(3px); /* very subtle move */
}

/* Active */
.menu-item.active .menu-link {
    background-color: #3B6EA5;
    color: #ffffff !important;
}

</style>

<div class="app-brand">
    <a href="<?= base_url() ?>/dashboard">
        <img src="<?= base_url(); ?>web_assets/img/logo.jpg">
    </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-2">

<?php
$Url = $_SERVER['REQUEST_URI'];
$Expurl = explode("public/", $Url);
$check = $Expurl[1] ?? '';
?>

<li class="menu-item <?= ($check == "dashboard" || $check =="index.php/dashboard") ? "active" : "" ?>">
    <a href="<?= base_url() ?>dashboard" class="menu-link">
        <i class="bx bx-home-circle"></i>
        <div>Home</div>
    </a>
</li>

<li class="menu-item <?= ($check == "scan") ? "active" : "" ?>">
    <a href="<?= base_url() ?>scan" class="menu-link">
        <i class="bx bx-cube-alt"></i>
        <div>Start Scan</div>
    </a>
</li>



<li class="menu-item <?= ($check == "profile") ? "active" : "" ?>">
    <a href="<?= base_url() ?>profile" class="menu-link">
        <i class="bx bx-user"></i>
        <div>Profile</div>
    </a>
</li>

<li class="menu-item <?= ($check == "risk_exposure") ? "active" : "" ?>">
    <a href="<?= base_url() ?>risk_exposure" class="menu-link">
        <i class="bx bx-copy"></i>
        <div>My Risk Exposure</div>
    </a>
</li>

<li class="menu-item <?= ($check == "users/upgrade_plans") ? "active" : "" ?>">
    <a href="<?= base_url() ?>users/upgrade_plans" class="menu-link">
        <i class="bx bx-crown"></i>
        <div>Upgrade Plans</div>
    </a>
</li>

<li class="menu-item <?= ($check == "privacy") ? "active" : "" ?>">
    <a href="#" class="menu-link">
        <i class="bx bx-shield-quarter"></i>
        <div>Take Care of Your Privacy</div>
    </a>
</li>

<li class="menu-item <?= ($check == "scan/scan_schedule") ? "active" : "" ?>">
    <a href="<?= base_url() ?>scan/scan_schedule" class="menu-link">
        <i class="bx bx-time"></i>
        <div>Scan Schedule</div>
    </a>
</li>

</ul>
</aside>
<!-- / Menu -->
