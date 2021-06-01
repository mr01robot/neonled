<?php 
require_once "../modelos/ListaxCategoria.php";
$categorias = new ModeloxCategorias();
	switch ($_GET["op"]) {
        case 'listar':
                $rspta=$categorias->ListaCategorias();
                $data=Array();
                while ($reg=$rspta->fetch_object()){
                    $data[]=array(
                        "cat_id" 	 =>$reg->cat_id,
                        "cat_nombre" =>$reg->cat_nombre,
                    );
                }
                echo json_encode($data);
        break;

        case 'listarxCategoria':
            $rspta=$categorias->ListarxCategoria($_POST["id"]);
            $data=Array();
            while ($reg=$rspta->fetch_object()){

                $color1=Array();
                $listacolor=$categorias->ListarColor($reg->pro_id);
               while( $a=$listacolor->fetch_object()){
                $color1[]=$a;
            }
            
                $data[]=array(array(
                    "id" 	 =>$reg->pro_id,
                    "nombre" =>$reg->pro_nombre,
                    "imagen" =>$reg->pro_imagen,
                    /*"color1" =>$reg->color1,*/
                    "precio" =>$reg->pro_precio,
                   
                ), $color1);
            }
            echo json_encode($data);
        break;

        case 'ImgCategoria':
            $rspta=$categorias->ImgCategoria($_POST["id"]);
            $data=Array();
            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "categoria" =>$reg->cat_imagen,
                );
            }
            echo json_encode($data);
        break;
        
    }