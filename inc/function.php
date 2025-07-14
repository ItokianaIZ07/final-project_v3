<?php


require("connection.php");

function login($email,$mdp)
{
    $sql = "SELECT * FROM emprunt_membre WHERE email = '%s' AND mdp = '%s'";
    $sql = sprintf($sql, $email, $mdp);
    $request = mysqli_query(dbconnect(), $sql);
    while($response = mysqli_fetch_assoc($request))
    {
        $result = $response;
    }
    return $result;
}

function sign($nom,$date,$genre,$mail,$ville,$mdp,$file)
{
    // $date = date('Y-m-d H:i:s');
    $uploadDir = '../assets/image/';
    $maxSize = 5 * 1024 * 1024; // 5 Mo
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!empty($file)) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
        }
        if ($file['size'] > $maxSize) {
            die('Le fichier est trop volumineux.');
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de fichier non autorisé : ' . $mime);
        }
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = $originalName . '_' . uniqid() . '.' . $extension;
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
            echo "Fichier uploadé avec succès : " . $newName;
            $sql = "INSERT INTO emprunt_membre(nom, date_de_naissance, genre, mail, ville,mdp,image_profil) VALUES ('%s','%s', '%s', '%s', '%s','%s','%s')";
            $sql = sprintf($sql, $nom, $date, $genre, $mail,$ville, $mdp, $newName);
            $request = mysqli_query(dbconnect(), $sql);
        } else {
            echo "Échec du déplacement du fichier.";
        }
    } else {
        echo "Aucun fichier reçu.";
    }
}

function getListObject()
{
    $sql = "SELECT * FROM emprunt_objet ORDER BY id_objet DESC";
    $request = mysqli_query(dbconnect(), $sql);
    while($response = mysqli_fetch_assoc($request))
    {
        $result[] = $response;
    }
    if(!empty($result))
    {
        return $result;
    }
    return null;
}

function verifieSiEmprunte($id)
{
    $sql = "SELECT date_retour FROM emprunt_v_emprunt_objet WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id);
    $request = mysqli_query(dbconnect(), $sql);
    if(mysqli_num_rows($request) > 0)
    {
        $response = mysqli_fetch_assoc($request);
        return $response['date_retour'];
    }
    return false;
}

function getListCategorie()
{
    $sql = "SELECT * FROM emprunt_categorie_objet";
    $request = mysqli_query(dbconnect(), $sql);
    while($response = mysqli_fetch_assoc($request))
    {
        $result[] = $response;
    }
    if(!empty($result))
    {
        return $result;
    }
    return null;
}

function getObjetFiltre($categorie)
{
    $sql = "SELECT * FROM emprunt_v_categorie_objet WHERE nom_categorie = '%s'";
    $sql = sprintf($sql, $categorie);
    $request = mysqli_query(dbconnect(), $sql);
    while($response = mysqli_fetch_assoc($request))
    {
        $result[] = $response;
    }
    if(!empty($result))
    {
        return $result;
    }
    return null;
}

function getImageObjet($id)
{
    $sql = "SELECT * FROM emprunt_v_images_objet WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id);
    $request = mysqli_query(dbconnect(), $sql);
    if(mysqli_num_rows($request) > 0)
    {
        $response = mysqli_fetch_assoc($request);
        return $response['nom_image'];
    }
    return null;
}

function getAllImageOf($id)
{
    $sql = "SELECT * FROM emprunt_v_images_objet WHERE id_objet = '%s' ORDER BY id_image ASC";
    $sql = sprintf($sql, $id);
    $request = mysqli_query(dbconnect(), $sql);
    while($response = mysqli_fetch_assoc($request))
    {
        $result[] = $response;
    }
    if(!empty($result))
    {
        return $result;
    }
    return null;
}

function getObjectId($nom)
{
    $sql = "SELECT id_objet FROM emprunt_objet WHERE nom_objet = '%s'";
    $sql = sprintf($sql, $nom);
    $request = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($request);
    return $result['id_objet'];
}

function addObject($nom, $categorie, $id)
{
    $sql = "INSERT INTO emprunt_objet(nom_objet, id_categorie, id_membre) VALUES ('%s', '%s', '%s')";
    $sql = sprintf($sql, $nom, $categorie, $id);
    $request = mysqli_query(dbconnect(), $sql);
}

function uploadImg($id_mbr,$file, $name, $idCategorie)
{
    addObject($name, $idCategorie, $id_mbr);
    $idObject = getObjectId($name);
    $uploadDir = '../assets/image/';
    $maxSize = 5 * 1024 * 1024; // 5 Mo
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!empty($file)) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
        }
        if ($file['size'] > $maxSize) {
            die('Le fichier est trop volumineux.');
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de fichier non autorisé : ' . $mime);
        }
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = $originalName . '_' . uniqid() . '.' . $extension;
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
            echo "Fichier uploadé avec succès : " . $newName;
            $sql = "INSERT INTO emprunt_images_objet(id_objet, nom_image) VALUES ('%s', '%s')";
            $sql = sprintf($sql, $idObject, $newName);
            $request = mysqli_query(dbconnect(), $sql);
        } else {
            echo "Échec du déplacement du fichier.";
        }
    } else {
        echo "Aucun fichier reçu.";
    }
}