<?php

class Flasher
{

    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            $pesan = addslashes($_SESSION['flash']['pesan']);
            $aksi  = addslashes($_SESSION['flash']['aksi']);
            $tipe  = $_SESSION['flash']['tipe'];

            echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '{$pesan}',
                text: '{$aksi}',
                icon: '{$tipe}',
                showConfirmButton: false,
                timer: 1500
            });
        });
        </script>
        ";

            unset($_SESSION['flash']);
        }
    }




    public static function setLoginFlash($pesan, $tipe)
    {
        $_SESSION['flash_bootstrap'] = [
            'pesan' => $pesan,
            'tipe' => $tipe // success, danger, warning, info
        ];
    }

    public static function loginFlash()
    {
        if (isset($_SESSION['flash_bootstrap'])) {
            $pesan = $_SESSION['flash_bootstrap']['pesan'];
            $tipe = $_SESSION['flash_bootstrap']['tipe']; // success, error, warning, info

            // Ubah "danger" menjadi "error" agar cocok dengan icon SweetAlert
            $icon = ($tipe === 'danger') ? 'error' : $tipe;

            echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: '$icon',
                    title: '$pesan',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true
                });
            });
        </script>
        ";
            unset($_SESSION['flash_bootstrap']);
        }
    }
}
