<?php

/**
 * Plugin Name:         czar-kolor
 * Plugin URI:          http://localhost/wordpress
 * Description:         Zmiana koloru czcionki co minutę
 * Version:             0.1.0
 * Requires at least:   5.0
 * Requires PHP:        7.0
 * Author:              Czarny
 * License:             GPL v2 or later
 * 
 */

function wpczar_activation()
{
    add_option('wpczar_last_color_id', null);
}

function wpczar_deactivation()
{
    update_option('wpczar_last_color_id', null);
}

register_activation_hook(__FILE__, 'wpczar_activation');
register_deactivation_hook(__FILE__, 'wpczar_deactivation');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// function wpczar_get_color()
// {

//     var_dump(date('i'));
//     $colors = ['red', 'green', 'blue', 'yellow'];

//     $lastColor = get_option('wpczar_last_color');

//     while (true) {
//         $id = rand(0, count($colors) - 1);
//         if ($id != $lastColor) {
//             break;
//         }
//     }

//     $color =  $colors[$id];

//     update_option('wpczar_last_color', $id);


//     return $color;
// }



function wpczar_wp_css()
{


    $color = dechex(rand(0x000000, 0xFFFFFF));
    echo "
        <style>
            div {
                color: #{$color};
            }

            a {
                color: #{$color};
            }

            button {
                color: #{$color};
            }

            p {
                color: #{$color};
            }
        </style>
    ";
}

add_action('wp_head', 'wpczar_wp_css');
