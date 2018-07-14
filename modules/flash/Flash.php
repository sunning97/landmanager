<?php

class Flash
{
    public function show()
    {
        if (isset($_SESSION['flash']) && $_SESSION['flash']['type'] == 'success') {
            echo "<script>
                showSuccessToast = function(){
                    'use strict';
                    resetToastPosition();
                    $.toast({
                        heading: '".$_SESSION['flash']['title']."',
                        text: '".$_SESSION['flash']['mess']."',
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-right'
                    })
                };
                showSuccessToast();
                </script>";
            unset($_SESSION['flash']);

        } else if (isset($_SESSION['flash']) && $_SESSION['flash']['type'] == 'failure') {
            echo "<script>
                showDangerToast = function(){
                    'use strict';
                    resetToastPosition();
                    $.toast({
                        heading: '".$_SESSION['flash']['title']."',
                        text: '".$_SESSION['flash']['mess']."',
                        showHideTransition: 'slide',
                        icon: 'error',
                        loaderBg: '#f96868',
                        position: 'top-right'
                    })
                };
                showDangerToast();
                </script>";
            unset($_SESSION['flash']);
        }
    }
}

?>