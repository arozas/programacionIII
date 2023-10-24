<?php

namespace Helpers;


class Validador
{
    private static $instance = null;
    public function __construct()
    {

    }
    private static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    public static function FieldEmptyValidation($field, $statusCode, $message)
    {
        $rtn = true;
        if (empty($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }
    public static function FieldDocumentValidation($field,  $statusCode, $message)
    {
        $validator = self::getInstance();
        $rtn = true;
        if (!$validator->DocumentTypesValidation($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }

    public static function FieldDNIValidation($field,  $statusCode, $message)
    {
        $validator = self::getInstance();
        $rtn = true;
        if (!$validator->DNIValidation($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }
    public static function FieldEmailValidation($field,  $statusCode, $message)
    {
        $validator = self::getInstance();
        $rtn = true;
        if (!$validator->EmailValidation($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }

    public static function FieldCUITValidation($field,  $statusCode, $message)
    {
        $validator = self::getInstance();
        $rtn = true;
        if (!$validator->CUITValidation($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }

    public static function FieldClientTypeValidation($field,  $statusCode, $message)
    {
        $validator = self::getInstance();
        $rtn = true;
        if (!$validator->ClientValidation($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }

    public static function FieldPhoneValidation($field,  $statusCode, $message)
    {
        $validator = self::getInstance();
        $rtn = true;
        if (!$validator->PhoneValidation($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }

    public static function FieldFilesValidation($field)
    {
        $errors = [];
        $maxsize = 2097152;
        $acceptable = [
            'image/jpeg',
            'image/jpg',
            'image/gif',
            'image/png'
        ];

        if ($field['size'] >= $maxsize || $field["size"] == 0) {
            $errors[] = 'El archivo es demasiado grande. Debe ser menor de 2 megabytes.';
        }

        if (!in_array($field['type'], $acceptable) && !empty($field["type"])) {
            $errors[] = 'Tipo de archivo no válido. Solo se aceptan archivos JPEG, JPG, GIF y PNG.';
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                Mensaje::ServerResponse(415, $error);
            }
            return false;
        }
        return true;
    }

    public static function FieldDateValidation($field,  $statusCode, $message)
    {
        $validator = self::getInstance();
        $rtn = true;
        if (!$validator->DateValidation($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }

    public static function FieldRoomValidation($field,  $statusCode, $message)
    {
        $validator = self::getInstance();
        $rtn = true;
        if (!$validator->RoomValidation($field)) {
            Mensaje::ServerResponse($statusCode, $message);
            $rtn = false;
        }
        return $rtn;
    }

    private function EmailValidation($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    private function DNIValidation($dni)
    {
        $pattern = '/^\d{7,8}$/';
        return preg_match($pattern, $dni);
    }
    private function CUITValidation($cuit) {
        $cuit = preg_replace('/[^\d]/', '', $cuit);

        if (strlen($cuit) !== 11) {
            return false;
        }

        $digitoVerificador = (int)$cuit[10];

        $acumulado = 0;
        $coeficientes = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];

        for ($i = 0; $i < 10; $i++) {
            $acumulado += (int)$cuit[$i] * $coeficientes[$i];
        }

        $resto = $acumulado % 11;
        $verif = $resto === 0 ? 0 : (11 - $resto);

        return $verif === $digitoVerificador;
    }

    private function PhoneValidation($phone)
    {
        return preg_match('/^[0-9]{10}+$/', $phone);
    }

    private function DateValidation($fecha) {
        $patron = "/^\d{2}\/\d{2}\/\d{4}$/";
        return preg_match($patron, $fecha);
    }

    private function RoomValidation($room)
    {
        $roomTypes = array("Simple", "Doble", "Suite");
        return in_array($room, $roomTypes);
    }
    private function ClientValidation($client)
    {
        $clientTypes = array("Corporativo", "Individual");
        return in_array($client, $clientTypes);
    }

    private function DocumentTypesValidation($documentType)
    {
        $documentTypes = array("DNI", "CUIT", "CUIL");
        return in_array($documentType, $documentTypes);
    }


}