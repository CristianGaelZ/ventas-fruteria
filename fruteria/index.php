<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frutería</title>
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    <style>
        /* Estilos Generales */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4ff;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column; /* Apilar elementos */
            align-items: center; /* Centrar horizontalmente */
            min-height: 100vh;
        }

        .container {
            max-width: 650px; /* Ancho máximo de la caja */
            width: 100%;
            text-align: center;
            margin-top: 20px; /* Espacio desde el menú */
        }

        .header {
            background-color: #4A90E2;
            color: white;
            width: 95%;
            padding: 20px; /* Espacio alrededor del contenido */
            text-align: center;
            box-shadow: 0 2px 7px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 14px; /* Espacio entre la cabecera y el contenido */
        }

        .header h1 {
            font-size: 2em; /* Tamaño de fuente */
            margin: 0;
        }

        .header p {
            font-size: 1em; /* Tamaño de fuente */
            margin-top: 5px;
        }

        .info-box {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 7px rgba(0, 0, 0, 0.1);
            padding: 20px; /* Espacio alrededor del contenido */
            margin: 14px 0; /* Espacio entre las cajas */
            text-align: left;
            max-width: 560px; /* Ancho máximo de las cajas de información */
            width: 100%;
            display: inline-block; /* Para permitir centrar */
        }

        .info-box h2 {
            font-size: 1.2em; /* Tamaño de fuente */
            margin-bottom: 10px;
            color: #4A90E2;
        }

        .info-box p {
            line-height: 1.5; /* Espaciado entre líneas */
            text-align: justify;
            font-size: 0.9em; /* Tamaño de fuente */
            color: #666;
        }

        nav {
            margin: 0 auto;
            display: block;
            padding: 12px 0;  
            text-align: center;
            font-size: 16px;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin: 0 20px;
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: black;
        }

        nav ul li a:hover {
            color: #3ca0e7;
        }
    </style>
</head>
<body>

<nav role="navigation" class="primary-navigation">
  <ul>
    <li><a href="#">Productos &dtrif;</a>
      <ul class="dropdown">
        <li><a href="php/agregar_productos.php">Nuevo Producto</a></li>
        <li><a href="php/listar_productos.php">Listar Productos</a></li>
      </ul>
    </li>
    <li><a href="#">Usuarios &dtrif;</a>
      <ul class="dropdown">
        <li><a href="php/crear_usuario.php">Nuevo Usuario</a></li>
        <li><a href="php/listar_usuarios.php">Listar Usuarios</a></li>
      </ul>
    </li>
    <li><a href="#">Ventas &dtrif;</a>
        <ul class="dropdown">
            <li><a href="php/registrar_ventas.php">Nueva Venta</a></li>
            <li><a href="php/listar_ventas.php">Listar Ventas</a></li>
        </ul>
    </li>
    <li><a href="#">Compras &dtrif;</a>
        <ul class="dropdown">
            <li><a href="php/registrar_compras.php">Registrar Compra</a></li>
            <li><a href="php/listar_compras.php">Listar Compras </a></li>
        </ul>
    </li>
  </ul>
</nav>

<div class="container">
    <div class="header">
        <h1>Bienvenido a la Frutería</h1>
        <p>"Nutrición y sabor en cada entrega."</p>
    </div>

    <div class="info-box">
        <h2>Descripción del Proyecto</h2>
        <p>
            Este proyecto tiene como objetivo gestionar la venta de frutas y ofrecer un sistema 
            eficiente para el control de inventario.
        </p>
    </div>

    <div class="info-box">
        <h2>¿Por qué elegirnos?</h2>
        <p>
            Garantizamos la mejor calidad de frutas frescas, seleccionadas cuidadosamente para ti.
        </p>
    </div>

    <div class="info-box">
        <h2>Nuestra Misión</h2>
        <p>
            Proporcionar frutas de la mejor calidad y un servicio inigualable, fomentando hábitos saludables.
        </p>
    </div>
</div>

</body>
</html>


<style>
    
    nav {
    &.primary-navigation {
      margin: 0 auto;
      display: block;
    
      padding: 12px 0 0 0;  
      text-align: center;
      font-size: 16px;
  
      ul li {
        list-style: none;
        margin: 0 auto;
        border-left: 2px solid #3ca0e7;
        display: inline-block;
        padding: 0 30px;
        position: relative;
        text-decoration: none;
        text-align: center;
        font-family: arvo;
      }
  
      li a {
        color: black;
      }
  
      li a:hover {
        color: #3ca0e7;
      }
  
      li:hover {
        cursor: pointer;
      }
  
      ul li ul {
        visibility: hidden;
        opacity: 0;
        position: absolute;
  padding-left: 0;
        left: 0;
        display: none;
        background: white;
      }
  
      ul li:hover > ul,
      ul li ul:hover {
        visibility: visible;
        opacity: 1;
        display: block;
        min-width: 250px;
        text-align: left;
        padding-top: 20px;
        box-shadow: 0px 3px 5px -1px #ccc;
      }
  
      ul li ul li {
        clear: both;
        width: 100%;
        text-align: left;
        margin-bottom: 20px;
        border-style: none;
      }
  
      ul li ul li a:hover {
        padding-left: 10px;
        border-left: 2px solid #3ca0e7;
        transition: all 0.3s ease;
      }
    }
  }
  
  a {
  
      text-decoration: none;
  
      &:hover {
          color: #3CA0E7;
      }
   
  }
  
   ul li ul li a { transition: all 0.5s ease; }
  
  