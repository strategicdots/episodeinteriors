<?php include_once("initialize.php");

function redirect_to( $location = NULL ) {
    if($location != NULL) {
        header("location: {$location}");
        exit;
    }
}
function inline_message() {
    global $session;
    if($session->message == true) {
        return "<div style=\"color:red\"><p>{$session->message}</p></div>";
    } else {
        return false;
    }
}
function formatNumber($number) {
    return number_format($number);
}
function mailTimeFormat($time) {
    $unixtime = strtotime($time);
    $date = date("d/M/Y", $unixtime);
    return $date;
}
function mySQLDateTime($unixtime) {
    $mysqltime = date("Y-m-d H:i:s", $unixtime);
    return $mysqltime;
}
function messageDisplay($key=NULL, $value) {
    $output  = "<div class=\"row m-vlight-bottom-breather\">";
    $output .= "<div class=\"col-sm-3 col-xs-5 capitalize txt-bold\">";
    $output .= $key;
    $output .= "</div><div class=\"col-sm-9 col-xs-7\">";
    $output .= $value; 
    $output .= "</div></div>";

    return $output;
}
function adminImagePath($dir=NULL, $filename) {
    $new_dir = str_replace(" ", "-",$dir);
    $path = "../img/" . $new_dir;
    if(!file_exists($path)) {        
        mkdir($path, 0777, true);
    } 
    return $path.DS.$filename;
}
function maxFileSize() {
    // IMB = 1048576
    $max_file_size = 1048576 * 1.5;
    return $max_file_size;
}
function confirmDelete($itemName) {
    return "onclick=\"return confirm('Are you sure you want to delete {$itemName}?');\"";
}

// FRONTEND
function homepageProductImgPath($imgPath) {
    $prefix = "../";
    if(substr($imgPath, 0, strlen($prefix)) == $prefix) {
        $newPath = substr($imgPath, strlen($prefix));
    }

    return $newPath;
}
function shareButtons() {
    $output = "<ul class=\"share no-list-style no-left-padding\">";
    // facebook 
    $output .= "<li class=\"inline-block\">";
    $output .= "<a href=\"http://www.facebook.com/sharer/sharer.php?u=";    
    $output .= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
    $output .= "\" target=\"_blank\" class=\"block share-icons fb\">";
    $output .= "</a></li>";
    // google plus
    $output .= "<li class=\"inline-block\">";
    $output .= "<a href=\"https://plus.google.com/share?url=";
    $output .= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  
    $output .= "\" target=\"_blank\" class=\"block share-icons gplus\">";
    $output .= "</a></li>";
    // twitter
    $output .= "<li class=\"inline-block\">";
    $output .= "<a href=\"http://twitter.com/share?url=";
    $output .= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&text="; 

    $output .= "check us out at episode interiors for quality interior products"; 
    $output .= "\" target=\"_blank\" class=\"block share-icons twt\">";
    $output .= "</a></li>";
    // linkedIn
    $output .= "<li class=\"inline-block\">";
    $output .= "<a href=\"http://www.linkedin.com/shareArticle?url=";
    $output .= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  
    $output .= "\" target=\"_blank\" class=\"block share-icons lnkdin\">";
    $output .= "</a></li></ul>";

    return $output;
}
function currentPage() {
    $output = "class=\"current\""; 
    return $output;
}
function adminFooter() {
    return "</div></div></div></div>";

}
function adminTopHead() {
    $output  = "<div class=\"inner-main-section admin\">";
    $output .= "<div class=\"mid-container p-heavy-top-breather\">";
    $output .= "<div class=\"row\">";

    return $output;
}
function adminSidebar() {
    $allCategories = ProductCategories::findAll();
    $msgs          = new CustomerMessages();
    if($msgs->countAllUnread()) {
        $unreadCount  = " <span style=\"font-weight: bold;\">&#40;";
        $unreadCount .= $msgs->countAllUnread();
        $unreadCount .= "&#41;</span>";
    } else {
        $unreadCount = "";
    }

    $output  = "<div class=\"col-sm-3 sidebar p-mid-top-breather brand-bg headfont\">";
    $output .= "<ul class=\"no-list-style no-left-padding\">";
    $output .= "<li><a href=\"dashboard.php\">dashboard</a></li>";
    $output .= "<li>Product Categories";
    $output .= "<ul class=\"no-list-style small-font-size\" style=\"padding-left: 17px;padding-top: 5px; padding-bottom: 20px; \">";
    if(!empty($allCategories)) {
        foreach($allCategories as $category) {
            $output .= "<li><a href=\"category.php?id=";
            $output .= urlencode($category->id);
            $output .= "\">&raquo; ";
            $output .= $category->name . "</a></li>";
        }
    } else {
        $output .= "<li>No categories yet</li>";
    }
    $output .= "<li class=\"m-vlight-top-breather\"><a href=\"create_category.php\"> &#43; add a new category</a></li>";
    $output .= "</ul></li>";
    $output .= "<li><a href=\"messages.php\">Customer Messages";
    $output .= $unreadCount;
    $output .= "</a></li>";
    $output .= "<li class=\"m-mid-top-breather\"><a href=\"logout.php\">Logout</a></li>";
    $output .= "</ul>";
    $output .= "</div>";

    return $output;
}
function adminMainbarTop() {
    return "<div class=\"col-sm-offset-1 col-sm-8 mainbar\">";
}
function adminHeadline($headline) {
    $output  = "<h2 class=\"heavy-font-size capitalize\">";
    $output .= $headline;
    $output .= "</h2>";

    return $output; 
}
function officeAddress() {
    $output   = "<p><span>Head office:</span> 11 Ribadu Road, off Awolowo Rd, Ikoyi, Lagos. <br> \n";
    $output  .= "<span>Phone:</span> +234(0)704 622 7022, 0908 712 4035, 0802 302 0508.</p> \n";
    $output .= "<p><span>branch office:</span> Suite 10, Ebun Shopping Complex, 13 Opebi Road, opposite  GTBank, Opebi, Ikeja, Lagos. <br> \n";
    $output .= "<span>Phone:</span> +234(0)908 712 4037, 0704 622 7018, 0908 712 4034.</p>";
    $output .= "<p><span>emails:</span> customerservice@episodeInteriors.com<br>episodeinteriors@yahoo.com.</p> \n";
    $output .= "<p>&copy;";
    $output .= date("Y");
    $output .=". All rights reserved</p> \n";

    return $output;
}
function socialLinks() {
    $output  = "<ul class=\"hidden-xs\">";
    $output .= "<li><a href=\"https://web.facebook.com/Episode-Interiors-551550871560892/?_rdc=1&_rdr\" class=\"fb\">facebook</a></li>";
    $output .= "<li><a href=\"https://twitter.com/EInteriorslive\" class=\"twt\">twitter</a></li>";
    $output .= "<li><a href=\"https://www.instagram.com/episodeinteriors/\" class=\"ig\">instagram</a></li>";
    $output .= "<li><a data-toggle=\"modal\" href=\"#formModal\" class=\"nwsltr\">Newsletter</a></li>";
    $output .= "</ul>";

    return $output;

}
function socialLinksMobile() {
    $output  = "<div class=\"m-heavy-top-breather\">";
    $output .= "<ul class=\"visible-xs\">";
    $output .= "<li class=\"inline\"><a href=\"https://web.facebook.com/Episode-Interiors-551550871560892/?_rdc=1&_rdr\" class=\"fb\"></a></li>";
    $output .= "<li class=\"inline\"><a href=\"https://twitter.com/EInteriorslive\" class=\"twt\"></a></li>";
    $output .= "<li class=\"inline\"><a href=\"https://www.instagram.com/episodeinteriors/\" class=\"ig\"></a></li>";
    $output .= "<li class=\"inline\"><a data-toggle=\"modal\" href=\"#formModal\" class=\"nwsltr\"></a></li>";
    $output .= "</ul></div>";

    return $output;
}
function displayFooterCategories($seperator = null) {
    global $database;
    $categories = ProductCategories::footerCategories();
    $output  = "<div class=\"hidden-xs\">";
    $output .= "<ul>";
    foreach($categories as $category) {
        $output .= "<li>";
        $output .= "<a href=\"";
        $output .= $seperator;
        $output .= "products/category.php?id=";
        $output .= $category->id . "\">";
        $output .= $category->name . "</a></li>";
    }
    $output .=    "</ul></div>";

    return $output;

}
function footerPages($seperator = null) {
    $output  = "<ul class=\"page-links\">";
    $output .= "<li><a href=\"{$seperator}about-us/\">about us</a></li>";
    $output .= "<li><a href=\"{$seperator}products/\" >products</a></li>";
    //<li><a href="">terms of service</a></li>
    //<li><a href="">contact us</a></li>
    $output .= "<li><a href=\"{$seperator}services/\">our services</a></li>";
    $output .= "<li><a href=\"{$seperator}gallery/\"> gallery</a></li>";
    "<li><a href=\"{$seperator}\">blog</a></li>";
    $output .= "</ul>";

    return $output;
}
function pageTitle($thisPage) {
    $prefix = "Episode Interiors |";
    $titles = [
        "home"      => "{$prefix} Welcome",
        "gallery"   => "{$prefix} Our Gallery",
        "about-us"  => "{$prefix} About Us",
        "products"  => "{$prefix} Our Products",
        "services"  => "{$prefix} Our Services",
        "admin"     => "{$prefix} Admin"
    ];

    switch($thisPage) {
        case "home" :
            $output = $titles['home'];
            break;
        case "gallery" :
            $output = $titles['gallery'];
            break;
        case "about-us" :
            $output = $titles['about-us'];
            break;
        case "products" :
            $output = $titles['products'];
            break;
        case "services" :
            $output = $titles['services'];
            break;
        case "admin" :
            $output = $titles['admin'];
            break;
    }

    return $output;

}
function subscribeForm($seperator = null) {
    $output  = "<div class=\"modal fade\" id=\"formModal\">";
    $output .= "<div class=\"modal-dialog\">";
    $output .= "<div class=\"modal-content\">";
    $output .= "<div class=\"modal-header\">";
    $output .= "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>";
    $output .= "<h2 class=\"modal-title uppercase text-center\"> Subscribe to Our Newsletter</h2>";
    $output .= "</div>";
    $output .= "<div class=\"modal-body\">";
    $output .= "<img src=\"{$seperator}img/jumbo_bg.jpg\" class=\"img-responsive m-light-bottom-breather\">";
    $output .= "<div class=\"mid-container p-light-top-breather\">";
    $output .= "<p class=\"heavy-font-size headfont capitalize text-center\">signup today to receive our home furnishing picks and news</p>";
    $output .= "<form class=\"\" method=\"post\" action=\"//episodeinteriors.us16.list-manage.com/subscribe/post?u=dd43485ff2f86f3c2d5333034&amp;id=442fd1a4a1\" name=\"mc-embedded-subscribe-form\">";
    $output .= "<div class=\"form-group\">";
    $output .= "<input type=\"email\" class=\"form-control\" name=\"EMAIL\" placeholder=\"Enter your email\" required>";
    $output .= "</div>";
    $output .= "<div style=\"position: absolute; left: -5000px;\" aria-hidden=\"true\"><input type=\"text\" name=\"b_512cdde05864668bf643d9b96_ebd16c7740\" tabindex=\"-1\" value=\"\"></div>";
    $output .= "<div class=\"form-group\">";
    $output .= "<input class=\"btn main-btn-color form-control\" type=\"submit\" value=\"Submit\" name=\"subscribe\">";
    $output .= "</div>";
    $output .= "</form></div></div></div></div></div>";

    return $output;
}

