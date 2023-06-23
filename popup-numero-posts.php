<?php
/**
 * Plugin Name: Popup Número de Posts
 * Description: Muestra una ventana emergente con el número de posts publicados.
 * Version: 1.0
 * Author: Tu Nombre
 */

// Agrega el código del plugin aquí

?>
<style type="text/css">
            .popup-numero-posts{
                display: block;
        z-index: 9999;
        background: black;
        color: white;
        position: fixed;
        bottom: 0;
        left: 0;
        padding: 10px;
        border-top-right-radius: 25px;
            }
    </style>
<?php
add_action('wp_footer', 'popup_numero_posts');

function popup_numero_posts() {
    $numero_posts = wp_count_posts()->publish;
    $popup_content = '<div id="popup-numero-posts" class="popup-numero-posts" style="display:none;">';
    $popup_content .= '<p>Posts Publicados: ' . $numero_posts . '</p>';
    $popup_content .= '</div>';
    
    $popup_script = '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var popup = document.getElementById("popup-numero-posts");
            if (popup) {
                popup.style.display = "block";
            }
        });
    </script>';
    
    echo $popup_content;
    echo $popup_script;
}
?>
