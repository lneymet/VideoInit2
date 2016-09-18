<?php
/**
 * Created by PhpStorm.
 * User: Spiritus
 * Date: 16/09/17
 * Time: 01:13
 */

function menuDropdown($listItems, $divClass = 'mobileCatMenu', $iClass = 'mobileMenuIcon fa fa-bars', $innerDivClass = 'listMenuItems', $textClass = 'dropdownTextSpan'){
    $list = '
        <div class="'.$divClass.' dropdown">
            <i class="'.$iClass.'" aria-hidden="true" style="float: left">
                <div class="dropdown-content '.$innerDivClass.'">
                    <ul id="dropdownUL">';

    foreach ($listItems as $text => $link) {
//        var_dump($params);
       $list .= '<li id="dropdownLi"><a href="'.$link.'" ><span class="'.$textClass.'">'.$text.'</span></a></li>';
        }
    $list .=        '</ul>
                </div>
            </i>
        </div>';

    return $list;
}