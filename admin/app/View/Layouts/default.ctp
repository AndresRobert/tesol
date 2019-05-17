<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'TESOL Chile');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
$nav_active = $this->fetch('title');
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
 <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php //echo $this->Html->meta('icon'); ?>
    <?php echo $this->Html->meta('icon', 'img/favicon.png', ['type' => 'image/png']) ?>
    <?php //echo $this->Html->css('cake.generic'); ?>
    <?php echo $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons'); ?>
    <?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); ?>
    <?php echo $this->Html->css('https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css'); ?>
    <?php echo $this->Html->css('materialize'); ?>
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->script('jquery-3.3.1.min'); ?>
    <?php echo $this->Html->script('https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js'); ?>
    <?php echo $this->Html->script('chart.min'); ?>
    <script>
        $(function(){
            $('table').DataTable({
                "lengthChange": false,
                "order": [[ 1, "asc" ]]
            });
            $('.autoCountry').autocomplete({
            limit: 5,
            minLength: 1,
            data: {
                "Afghanistan": null,
                "Albania": null,
                "Algeria": null,
                "Andorra": null,
                "Angola": null,
                "Antigua and Barbuda": null,
                "Argentina": null,
                "Armenia": null,
                "Australia": null,
                "Austria": null,
                "Azerbaijan": null,
                "The Bahamas": null,
                "Bahrain": null,
                "Bangladesh": null,
                "Barbados": null,
                "Belarus": null,
                "Belgium": null,
                "Belize": null,
                "Benin": null,
                "Bhutan": null,
                "Bolivia": null,
                "Bosnia and Herzegovina": null,
                "Botswana": null,
                "Brazil": null,
                "Brunei": null,
                "Bulgaria": null,
                "Burkina Faso": null,
                "Burundi": null,
                "Cabo Verde": null,
                "Cambodia": null,
                "Cameroon": null,
                "Canada": null,
                "Central African Republic": null,
                "Chad": null,
                "Chile": null,
                "China": null,
                "Colombia": null,
                "Comoros": null,
                "Congo, Democratic Republic of the": null,
                "Congo, Republic of the": null,
                "Costa Rica": null,
                "Cote d´voire": null,
                "Croatia": null,
                "Cuba": null,
                "Cyprus": null,
                "Czech": null,
                "Republic": null,
                "Denmark": null,
                "Djibouti": null,
                "Dominica": null,
                "Dominican Republic": null,
                "East Timor(Timor - Leste)": null,
                "Ecuador": null,
                "Egypt": null,
                "El Salvador": null,
                "Equatorial Guinea": null,
                "Eritrea": null,
                "Estonia": null,
                "Ethiopia": null,
                "Fiji": null,
                "Finland": null,
                "France": null,
                "Gabon": null,
                "The Gambia": null,
                "Georgia": null,
                "Germany": null,
                "Ghana": null,
                "Greece": null,
                "Grenada": null,
                "Guatemala": null,
                "Guinea": null,
                "Guinea - Bissau": null,
                "Guyana": null,
                "Haiti": null,
                "Honduras": null,
                "Hungary": null,
                "Iceland": null,
                "India": null,
                "Indonesia": null,
                "Iran": null,
                "Iraq": null,
                "Ireland": null,
                "Israel": null,
                "Italy": null,
                "Jamaica": null,
                "Japan": null,
                "Jordan": null,
                "Kazakhstan": null,
                "Kenya": null,
                "Kiribati": null,
                "Korea, North": null,
                "Korea, South": null,
                "Kosovo": null,
                "Kuwait": null,
                "Kyrgyzstan": null,
                "Laos": null,
                "Latvia": null,
                "Lebanon": null,
                "Lesotho": null,
                "Liberia": null,
                "Libya": null,
                "Liechtenstein": null,
                "Lithuania": null,
                "Luxembourg": null,
                "Macedonia": null,
                "Madagascar": null,
                "Malawi": null,
                "Malaysia": null,
                "Maldives": null,
                "Mali": null,
                "Malta": null,
                "Marshall Islands": null,
                "Mauritania": null,
                "Mauritius": null,
                "Mexico": null,
                "Micronesia, Federated States of": null,
                "Moldova": null,
                "Monaco": null,
                "Mongolia": null,
                "Montenegro": null,
                "Morocco": null,
                "Mozambique": null,
                "Myanmar(Burma)": null,
                "Namibia": null,
                "Nauru": null,
                "Nepal": null,
                "Netherlands": null,
                "New Zealand": null,
                "Nicaragua": null,
                "Niger": null,
                "Nigeria": null,
                "Norway": null,
                "Oman": null,
                "Pakistan": null,
                "Palau": null,
                "Panama": null,
                "Papua New Guinea": null,
                "Paraguay": null,
                "Peru": null,
                "Philippines": null,
                "Poland": null,
                "Portugal": null,
                "Qatar": null,
                "Romania": null,
                "Russia": null,
                "Rwanda": null,
                "Saint Kitts and Nevis": null,
                "Saint Lucia": null,
                "Saint Vincent and the Grenadines": null,
                "Samoa": null,
                "San Marino": null,
                "Sao Tome and Principe": null,
                "Saudi Arabia": null,
                "Senegal": null,
                "Serbia": null,
                "Seychelles": null,
                "Sierra Leone": null,
                "Singapore": null,
                "Slovakia": null,
                "Slovenia": null,
                "Solomon Islands": null,
                "Somalia": null,
                "South Africa": null,
                "Spain": null,
                "Sri Lanka": null,
                "Sudan": null,
                "Sudan, South": null,
                "Suriname": null,
                "Swaziland": null,
                "Sweden": null,
                "Switzerland": null,
                "Syria": null,
                "Taiwan": null,
                "Tajikistan": null,
                "Tanzania": null,
                "Thailand": null,
                "Togo": null,
                "Tonga": null,
                "Trinidad and Tobago": null,
                "Tunisia": null,
                "Turkey": null,
                "Turkmenistan": null,
                "Tuvalu": null,
                "Uganda": null,
                "Ukraine": null,
                "United Arab Emirates": null,
                "United Kingdom": null,
                "United States": null,
                "Uruguay": null,
                "Uzbekistan": null,
                "Vanuatu": null,
                "Vatican City": null,
                "Venezuela": null,
                "Vietnam": null,
                "Yemen": null,
                "Zambia": null,
                "Zimbabwe": null
            },
        });
        $('.autoOccupation').autocomplete({
            limit: 5,
            minLength: 1,
            data: {
                "Teacher": null,
                "Student": null,
                "Administrative": null,
                "Researcher": null,
                "Presenter": null
            },
        });
        });
    </script>
</head>
<body>
<div id="header">
    <div class="navbar-fixed">
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo white-text"><img src="/img/logo.png" style="height: 1.5em;
        margin-top: 4px;"></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/users/logout" class="blue-text text-darken-4">Logout</a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/setups" class="blue-text text-darken-4">Setup</a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/landings" class="blue-text text-darken-4">Landings</a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/registrations" class="blue-text text-darken-4">Registrations</a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/users" class="blue-text text-darken-4">Users</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons blue-text text-darken-4">menu</i></a>
            </div>
        </nav>
    </div>
    <ul id="nav-mobile" class="sidenav white">
        <li><a href="/users" class="blue-text text-darken-4">Users</a></li>
        <li><a href="/registrations" class="blue-text text-darken-4">Registrations</a></li>
        <li><a href="/landings" class="blue-text text-darken-4">Landings</a></li>
        <li><a href="/setups" class="blue-text text-darken-4">Setup</a></li>
        <li><a href="/users/logout" class="blue-text text-darken-4">Logout</a></li>
    </ul>
</div>
<?php echo $this->Flash->render(); ?>
<?php echo $this->fetch('content'); ?>
<footer class="page-footer blue darken-4">
    <div id="bottom" class="footer-copyright white">
        <div class="container">
            <a class="left" href="#!" onclick="$(this).next().fadeToggle('300');" style="margin-right: 6px;"><img src="/img/acode_min_black.png" style="height: 1.2em; margin-bottom: -3px;"></a>
            <div class="ease-toggle black-text" style="display: none;">Developed by
                <a href="http://acode.cl" target="_blank"><img src="/img/acode_full_black.png" style="height: 1.2em; margin-bottom: -3px;"></a></div>
        </div>
    </div>
</footer>
<?php echo $this->element('sql_dump'); ?>
<?php echo $this->Html->script('materialize'); ?>
<?php echo $this->Html->script('init'); ?>
</body>
</html>
