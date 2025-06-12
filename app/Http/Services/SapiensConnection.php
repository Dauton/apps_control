<?php

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use PDO;

class SapiensConnection extends Controller
{

    // CONEXÃO SAPIENS
    private static function sapiensConn()
    {
        $host = "10.60.253.20";
        $database = "sapiens";
        $Uid = "consulta";
        $PWD = "@dM1324";

        return new PDO("odbc:DRIVER={SQL Server}; SERVER=$host; UID=$Uid; PWD=$PWD; DATABASE=$database");
    }

    // LISTAGEM DE COLABORADORES VIA SAPIENS
    public static function listCollaborator()
    {
        // usu_nomfun = nome
        // usu_tcadfun = tabela

        $sql = "SELECT DISTINCT usu_nomfun FROM usu_tcadfun WHERE usu_nomfun != ? AND usu_dessit = ? ORDER BY usu_nomfun";

        $stmt = self::sapiensConn()->prepare($sql);
        $stmt->bindValue(1, '');
        $stmt->bindValue(2, 'ATIVO');
        $stmt->execute();
        return mb_convert_encoding($stmt->fetchAll(PDO::FETCH_ASSOC), 'UTF-8', 'ISO-8859-1');
    }

    // LISTAGEM DE SITES VIA SAPIENS
    public static function listSites()
    {
        // usu_nomfil = filial ex: CDARCEX
        // usu_tcadfun = tabela
        $stmt = self::sapiensConn()->prepare("SELECT DISTINCT usu_nomfil FROM usu_tcadfun WHERE usu_nomfil != '' ORDER BY usu_nomfil");
        $stmt->execute();
        return mb_convert_encoding($stmt->fetchAll(PDO::FETCH_ASSOC), 'UTF-8', 'ISO-8859-1');
    }
}
