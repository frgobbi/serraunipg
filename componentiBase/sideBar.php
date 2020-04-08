<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 05/03/2019
 * Time: 09:26
 */
function sideBar()
{
    echo "<!-- Sidebar -->"
        . "<ul class=\"navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled\" id=\"accordionSidebar\">"

        . "<!-- Sidebar - Brand -->"
        . "<a class=\"sidebar-brand d-flex align-items-center justify-content-center\" href=\"../index.php\">"
        . "<div class=\"sidebar-brand-icon rotate-n-15\">"
        . "<i class=\"fas fa-seedling\"></i>"
        . "</div>"
        . "</a>"

        . "<!-- Divider -->"
        . "<hr class=\"sidebar-divider my-0\">"

        . "<!-- Nav Item - Dashboard -->"
        . "<li class=\"nav-item active\">"
        . "<a class=\"nav-link\" href=\"../Dashboard/dashboard.php#\">"
        . "<i class=\"fas fa-fw fa-tachometer-alt\"></i>"
        . "<span>Dashboard</span></a>"
        . "</li>"

        . "<!-- Divider -->"
        . "<hr class=\"sidebar-divider\">"

        /*. "<!-- Heading -->"
        . "<div class=\"sidebar-heading\">"
        . "Interface"
        . "</div>"*/

        /*. "<!-- Nav Item - Pages Collapse Menu -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseTwo\" aria-expanded=\"true\" aria-controls=\"collapseTwo\">"
        . "<i class=\"fas fa-fw fa-cog\"></i>"
        . "<span>Components</span>"
        . "</a>"
        . "<div id=\"collapseTwo\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#accordionSidebar\">"
        . "<div class=\"bg-white py-2 collapse-inner rounded\">"
        . "<h6 class=\"collapse-header\">Custom Components:</h6>"
        . "<a class=\"collapse-item\" href=\"buttons.html\">Buttons</a>"
        . "<a class=\"collapse-item\" href=\"cards.html\">Cards</a>"
        . "</div>"
        . "</div>"
        . "</li>"*/

        /*. "<!-- Nav Item - Utilities Collapse Menu -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseUtilities\" aria-expanded=\"true\" aria-controls=\"collapseUtilities\">"
        . "<i class=\"fas fa-fw fa-wrench\"></i>"
        . "<span>Utilities</span>"
        . "</a>"
        . "<div id=\"collapseUtilities\" class=\"collapse\" aria-labelledby=\"headingUtilities\" data-parent=\"#accordionSidebar\">"
        . "<div class=\"bg-white py-2 collapse-inner rounded\">"
        . "<h6 class=\"collapse-header\">Custom Utilities:</h6>"
        . "<a class=\"collapse-item\" href=\"utilities-color.html\">Colors</a>"
        . "<a class=\"collapse-item\" href=\"utilities-border.html\">Borders</a>"
        . "<a class=\"collapse-item\" href=\"utilities-animation.html\">Animations</a>"
        . "<a class=\"collapse-item\" href=\"utilities-other.html\">Other</a>"
        . "</div>"
        . "</div>"
        . "</li>"*/

        /*. "<!-- Divider -->"
        . "<hr class=\"sidebar-divider\">"

        . "<!-- Heading -->"
        . "<div class=\"sidebar-heading\">"
        . "Addons"
        . "</div>"
        */

        ."<!-- Nav Item - Tables -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link\" href=\"../Piante/piante.php\">"
        . "<i class=\"fas fa-fw fa-seedling\"></i>"
        . "<span>Piante</span></a>"
        . "</li>"

        . "<!-- Nav Item - Tables -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link\" href=\"#\">"
        . "<i class=\"fas fa-fw fa-home\"></i>"
        . "<span>Serra</span></a>"
        . "</li>";
    if ($_SESSION['flag_admin'] == 1) {
        echo "<!-- Nav Item - User -->"
            . "<li class=\"nav-item\">"
            . "<a class=\"nav-link\" onclick=\"$('#modalAdd').modal('show');\">"
            . "<i class=\"fas fa-fw fa-user-plus\"></i>"
            . "<span>New user</span></a>"
            . "</li>";

        echo "<!-- Nav Item - User -->"
            . "<li class=\"nav-item\">"
            . "<a class=\"nav-link\" onclick=\"$('#modalAddP').modal('show');\">"
            . "<i class=\"fas fa-fw fa-plus\"></i>"
            . "<span>New pianta</span></a>"
            . "</li>";
    }

    echo "<!-- Nav Item - User -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link\" href=\"../Grafici/grafici.php\">"
        . "<i class=\"fas fa-fw fa-chart-line\"></i>"
        . "<span>Grafici</span></a>"
        . "</li>";


    echo "<!-- Nav Item - User -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link\" href=\"../User/profile.php\">"
        . "<i class=\"fas fa-fw fa-user\"></i>"
        . "<span>Profilo</span></a>"
        . "</li>"

        . "<!-- Divider -->"
        . "<hr class=\"sidebar-divider d-none d-md-block\">"

        . "<!-- Sidebar Toggler (Sidebar) -->"
        . "</ul>"
        . "<!-- End of Sidebar -->";
}

function sideBarProfile()
{
    /*
     * QUI dobbiamo usare i link alla dashboard#ancora nel tag <a> ====> per tornare alla pagina principale nella posizione dell'ancora
     */
    echo "<!-- Sidebar -->"
        . "<ul class=\"navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled\" id=\"accordionSidebar\">"

        . "<!-- Sidebar - Brand -->"
        . "<a class=\"sidebar-brand d-flex align-items-center justify-content-center\" href=\"../index.php\">"
        . "<div class=\"sidebar-brand-icon rotate-n-15\">"
        . "<i class=\"fas fa-seedling\"></i>"
        . "</div>"
        . "</a>"

        . "<!-- Divider -->"
        . "<hr class=\"sidebar-divider my-0\">"

        . "<!-- Nav Item - Dashboard -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link\" href=\"../Dashboard/dashboard.php#\">"
        . "<i class=\"fas fa-fw fa-tachometer-alt\"></i>"
        . "<span>Dashboard</span></a>"
        . "</li>"

        . "<!-- Divider -->"
        . "<hr class=\"sidebar-divider\">"

        . "<!-- Heading -->"
        . "<div class=\"sidebar-heading\">"
        . "Interface"
        . "</div>"

        . "<!-- Nav Item - Pages Collapse Menu -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseTwo\" aria-expanded=\"true\" aria-controls=\"collapseTwo\">"
        . "<i class=\"fas fa-fw fa-cog\"></i>"
        . "<span>Components</span>"
        . "</a>"
        . "<div id=\"collapseTwo\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#accordionSidebar\">"
        . "<div class=\"bg-white py-2 collapse-inner rounded\">"
        . "<h6 class=\"collapse-header\">Custom Components:</h6>"
        . "<a class=\"collapse-item\" href=\"buttons.html\">Buttons</a>"
        . "<a class=\"collapse-item\" href=\"cards.html\">Cards</a>"
        . "</div>"
        . "</div>"
        . "</li>"

        . "<!-- Nav Item - Utilities Collapse Menu -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseUtilities\" aria-expanded=\"true\" aria-controls=\"collapseUtilities\">"
        . "<i class=\"fas fa-fw fa-wrench\"></i>"
        . "<span>Utilities</span>"
        . "</a>"
        . "<div id=\"collapseUtilities\" class=\"collapse\" aria-labelledby=\"headingUtilities\" data-parent=\"#accordionSidebar\">"
        . "<div class=\"bg-white py-2 collapse-inner rounded\">"
        . "<h6 class=\"collapse-header\">Custom Utilities:</h6>"
        . "<a class=\"collapse-item\" href=\"utilities-color.html\">Colors</a>"
        . "<a class=\"collapse-item\" href=\"utilities-border.html\">Borders</a>"
        . "<a class=\"collapse-item\" href=\"utilities-animation.html\">Animations</a>"
        . "<a class=\"collapse-item\" href=\"utilities-other.html\">Other</a>"
        . "</div>"
        . "</div>"
        . "</li>"

        . "<!-- Divider -->"
        . "<hr class=\"sidebar-divider\">"

        . "<!-- Heading -->"
        . "<div class=\"sidebar-heading\">"
        . "Addons"
        . "</div>"

        . "<!-- Nav Item - Pages Collapse Menu -->"
        . "<li class=\"nav-item active\">"
        . "<a class=\"nav-link\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapsePages\" aria-expanded=\"true\" aria-controls=\"collapsePages\">"
        . "<i class=\"fas fa-fw fa-folder\"></i>"
        . "<span>Pages</span>"
        . "</a>"
        . "<!--<div id=\"collapsePages\" class=\"collapse show\" aria-labelledby=\"headingPages\" data-parent=\"#accordionSidebar\">"
        . "<div class=\"bg-white py-2 collapse-inner rounded\">"
        . "<h6 class=\"collapse-header\">Login Screens:</h6>"
        . "<a class=\"collapse-item\" href=\"login.html\">Login</a>"
        . "<a class=\"collapse-item\" href=\"register.html\">Register</a>"
        . "<a class=\"collapse-item\" href=\"forgot-password.html\">Forgot Password</a>"
        . "<div class=\"collapse-divider\"></div>"
        . "<h6 class=\"collapse-header\">Other Pages:</h6>"
        . "<a class=\"collapse-item\" href=\"404.html\">404 Page</a>"
        . "<a class=\"collapse-item active\" href=\"blank.html\">Blank Page</a>"
        . "</div>"
        . "</div>-->"
        . "</li>"

        . "<!-- Nav Item - Charts -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link\" href=\"charts.html\">"
        . "<i class=\"fas fa-fw fa-chart-area\"></i>"
        . "<span>Charts</span></a>"
        . "</li>"

        . "<!-- Nav Item - Tables -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link\" href=\"tables.html\">"
        . "<i class=\"fas fa-fw fa-table\"></i>"
        . "<span>Tables</span></a>"
        . "</li>"

        . "<!-- Nav Item - User -->"
        . "<li class=\"nav-item\">"
        . "<a class=\"nav-link\" href=\"../User/profile.php\">"
        . "<i class=\"fas fa-fw fa-user\"></i>"
        . "<span>Profile</span></a>"
        . "</li>"

        . "<!-- Divider -->"
        . "<hr class=\"sidebar-divider d-none d-md-block\">"

        . "<!-- Sidebar Toggler (Sidebar) -->"
        . "</ul>"
        . "<!-- End of Sidebar -->";
}