<?php


class Login extends Conectar
{


    public function login()
    {
        //parent llama las funciones 
        $Conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $nombre_usuario = $_POST["nombre_usuario"];
            $clave = $_POST["clave"];
            if (empty($nombre_usuario) and empty($clave)) {
                /*TODO: En caso esten vacios correo y contraseña, devolver al index con mensaje = 2 */
                header("Location:" . Conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM usuarios WHERE nombre_usuario=? and clave=? and estado=1";
                $stmt = $Conectar->prepare($sql);
                $stmt->bindValue(1, $nombre_usuario);
                $stmt->bindValue(2, $clave);
                $stmt->execute();
                $resultado = $stmt->fetch();
                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["nombre_usuario"] = $resultado["nombre_usuario"];
                    $_SESSION["clave"] = $resultado["clave"];
                    $_SESSION["imagen"] = $resultado["imagen"];
                    $_SESSION["rol_id"] = $resultado["rol_id"];
                    $_SESSION["estado"] = $resultado["estado"];


                    if ($_SESSION["rol_id"] == 1) {
                        header("Location: ../index.php");

                    } else {
                        header("Location: /tiendajuegos/administrador/index.php");
                    }
                    exit();
                } else {
                    /*TODO: En caso no coincidan el usuario o la contraseña */
                    header("Location: login.php");
                    exit();
                }
            }
        }
    }

}


?>