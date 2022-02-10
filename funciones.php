<?php session_start();

function conexion($bd_config) {
    $conn = new mysqli($bd_config['host'], $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
    if($conn->connect_errno) {
        return false;
    } else {
        return $conn;
    }
}

function close_conexion($conexion) {
    $thread = $conexion->thread_id;
    $conexion->kill($thread);
    $conexion->close();
}

function limpiarDatos($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    
    return $datos;
}

function limpiarId($id) {
    return (int)limpiarDatos($id);
}

function limpiarCorreo($correo) {
    return filter_var($correo, FILTER_SANITIZE_EMAIL);
}

function encriptarPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT, [20]);
}

function verificarPassword($password, $passEncriptado) {
    return password_verify($password, $passEncriptado);
}

function parse_results($stmt)
{
    $params = array();
    $data = array();
    $results = array();
    $meta = $stmt->result_metadata();
    
    while($field = $meta->fetch_field())
        $params[] = &$data[$field->name]; // pass by reference
    
    call_user_func_array(array($stmt, 'bind_result'), $params);
    
    while($stmt->fetch())
    {
        foreach($data as $key => $val) 
        {
            $c[$key] = $val;
        }
        $results[] = $c;
    }
    return $results;
}

function obtener_peliculas($conexion) {
    $query = $conexion->query("
        SELECT * FROM peliculas 
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_peliculas_id($conexion, $id) {
    $statement = $conexion->prepare("
        SELECT * FROM peliculas 
        WHERE id = ?
        LIMIT 1
    ");
    $statement->bind_param('i', $id);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_peliculas_nombre($conexion, $nombre) {
    $query = $conexion->query("
        SELECT * FROM peliculas 
        WHERE nombre LIKE '%$nombre%'
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_pelicula_por_nombre($conexion, $nombre) {
    $statement = $conexion->prepare("
        SELECT * FROM peliculas 
        WHERE nombre = ?
        LIMIT 1
    ");
    $statement->bind_param('s', $nombre);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_cines($conexion) {
    $query = $conexion->query("
        SELECT * FROM cines
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_cines_ordenados_alfabeticamente($conexion) {
    $query = $conexion->query("
        SELECT * FROM cines
        ORDER BY nombre
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_cine_por_id($conexion, $id) {
    $statement = $conexion->prepare("
        SELECT * FROM cines 
        WHERE id = ?
        LIMIT 1
    ");
    $statement->bind_param('i', $id);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_cines_nombre($conexion, $nombre) {
    $query = $conexion->query("
        SELECT * FROM cines 
        WHERE nombre LIKE '%$nombre%'
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_franquicias($conexion) {
    $query = $conexion->query("
        SELECT * FROM franquicias
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_franquicia_por_id($conexion, $id) {
    $statement = $conexion->prepare("
        SELECT * FROM franquicias WHERE id=? LIMIT 1
    ");
    $statement->bind_param('i', $id);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_franquicia_por_nombre($conexion, $nombre) {
    $statement = $conexion->prepare("
        SELECT * FROM franquicias WHERE nombre=? LIMIT 1
    ");
    $statement->bind_param('s', $nombre);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_franquicias_nombre($conexion, $nombre) {
    $query = $conexion->query("
        SELECT * FROM franquicias 
        WHERE nombre LIKE '%$nombre%'
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_datos_slideshow($conexion) {
    $query = $conexion->query("
        SELECT * FROM peliculas WHERE slideshow != '' 
        ORDER BY RAND()
        LIMIT 10
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_trailers($conexion) {
    $query = $conexion->query("
        SELECT * FROM peliculas WHERE iframe != '' 
        ORDER BY fecha DESC
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_trailers_index($conexion, $limit) {
    $query = $conexion->query("
        SELECT * FROM peliculas WHERE iframe != '' 
        ORDER BY fecha DESC 
        LIMIT $limit
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_lugares($conexion) {
    $query = $conexion->query("
        SELECT * FROM lugares
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_lugar_por_id($conexion, $lugarID) {
    $statement = $conexion->prepare("
        SELECT * FROM lugares 
        WHERE id=? LIMIT 1
    ");
    $statement->bind_param('i', $lugarID);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_lugares_nombre($conexion, $nombre) {
    $query = $conexion->query("
        SELECT * FROM lugares 
        WHERE nombre LIKE '%$nombre%'
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_lugar_por_nombre($conexion, $nombre) {
    $statement = $conexion->prepare("
        SELECT * FROM lugares WHERE nombre=? LIMIT 1
    ");
    $statement->bind_param('s', $nombre);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_cines_por_lugar($conexion, $lugarID) {
    $statement = $conexion->prepare("
        SELECT * FROM cines 
        WHERE lugarID=?
    ");
    $statement->bind_param('i', $lugarID);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_cines_por_franquicia($conexion, $franquiciaID) {
    $statement = $conexion->prepare("
        SELECT * FROM cines 
        WHERE franquiciaID=?
    ");
    $statement->bind_param('i', $franquiciaID);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_lugares_id_cine_por_franquicia($conexion, $franquiciaID) {
    $statement = $conexion->prepare("
        SELECT distinct lugarID FROM cines 
        WHERE franquiciaID=?
    ");
    $statement->bind_param('i', $franquiciaID);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_cines_por_lugar_franquicia($conexion, $lugarID, $franquiciaID) {
    $statement = $conexion->prepare("
        SELECT * FROM cines 
        WHERE lugarID=? and franquiciaID=?
    ");
    $statement->bind_param('ii', $lugarID, $franquiciaID);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_cine_por_nombre($conexion, $nombre) {
    $statement = $conexion->prepare("
        SELECT * FROM cines 
        WHERE nombre=?
        LIMIT 1
    ");
    $statement->bind_param('s', $nombre);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_cine_carteleras($conexion, $cine) {
    $statement = $conexion->prepare("
        SELECT p.id, p.nombre, p.cartelera, c.nombre, c.thumb, cp.horarios FROM peliculas p
        INNER JOIN cine_peliculas cp ON p.id = cp.peliculaID
        INNER JOIN cines c ON c.id = cp.cineID
        WHERE c.nombre = ?
    ");
    $statement->bind_param('s', $cine);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_cines_franquicias_lugares($conexion) {
    $query = $conexion->query("
        SELECT c.id, c.descripcion, c.precio, c.telefono, c.nombre 'cine', 
            f.nombre 'franquicia', l.nombre 'lugar' 
        FROM cines c
        INNER JOIN franquicias f ON f.id=c.franquiciaID
        INNER JOIN lugares l ON l.id=c.lugarID
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_cines_franquicias_lugares_por_id($conexion, $cineId) {    
    $statement = $conexion->prepare("
        SELECT c.id, c.nombre, c.descripcion, c.precio, c.telefono, c.mapa, c.thumb,
            f.nombre 'franquicia', l.nombre 'lugar' 
        FROM cines c
        INNER JOIN franquicias f ON f.id=c.franquiciaID
        INNER JOIN lugares l ON l.id=c.lugarID
        WHERE c.id=?
        LIMIT 1
    ");
    $statement->bind_param('i', $cineId);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_franquicia_lugar_id_por_cineid($conexion, $cineId) {
    $statement = $conexion->prepare("
        SELECT franquiciaID, lugarID FROM cines
        WHERE id=?
        LIMIT 1
    ");
    $statement->bind_param('i', $cineId);
    $statement->execute();

    $resultado = parse_results($statement);

    return ($resultado) ? $resultado : false;
}

function obtener_peliculas_estreno($conexion) {
    $query = $conexion->query("
        SELECT DISTINCT * FROM peliculas p
        INNER JOIN peliculas_estreno pe ON p.id=pe.peliculaID
        ORDER BY pe.fecha DESC
        LIMIT 21
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_peliculas_proximamente($conexion) {
    $query = $conexion->query("
        SELECT DISTINCT * FROM peliculas p
        INNER JOIN peliculas_proximamente pp ON p.id=pp.peliculaID
        ORDER BY pp.fecha DESC
        LIMIT 21
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function obtener_estadisticas($conexion) {
    $query = $conexion->query("
        SELECT * FROM estadisticas LIMIT 1
    ");

    $resultado = array();

    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function pagina_actual() {
    if(isset($_GET['p']) && !empty($_GET['p'])) {
        return (int)$_GET['p'];
    } else {
        return 1;
    }
}

function numero_paginas($conexion, $trailers_por_categoria) {
    $total_trailers = $conexion->query("SELECT COUNT(*) total FROM peliculas WHERE iframe != ''");
    $total_trailers = $total_trailers->fetch_array(MYSQLI_ASSOC)['total'];

    $numero_paginas = ceil($total_trailers / $trailers_por_categoria);

    return $numero_paginas;
}

function obtener_trailers_por_pagina($conexion, $trailers_por_pagina) {
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $trailers_por_pagina - $trailers_por_pagina : 0;

    $query = $conexion->query("
        SELECT SQL_CALC_FOUND_ROWS * FROM peliculas WHERE iframe != '' 
        ORDER BY fecha DESC
        LIMIT $inicio, $trailers_por_pagina
    ");

    $resultado = array();
    
    while($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $resultado[] = $row;
    }

    return ($resultado) ? $resultado : false;
}

function comprobar_session() {
    return isset($_SESSION['usuario']) ? true : false;
}

function cerrar_session() {
    session_destroy();
    $_SESSION = null;
}