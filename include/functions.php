<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/constants.php';

function displayMenu(array $items): void
{
    $activeTitle = 'Примерка эскиза';
    foreach ($items as $item) {
        require $_SERVER['DOCUMENT_ROOT'] . '/include/templates/header_menu.php';
    }
}

function isFileExist(string $name, string $size) : bool
{
    return isset($name) && $size > 0;
}

function isFileTypeCorrect(string $tmpName, array $types) : bool
{
    $detectedType = exif_imagetype($tmpName);
    return in_array($detectedType, $types);
}

function uploadFile(string $fileName, string $fileTmpName, string $fileSize, string $fileError) : string
{
    if (!empty($fileError)) {
        return "Ошибка при загрузке файла";
    };
    if (!isFileExist($fileName, $fileSize)) {
        return "Файл не выбран";
    }
    if (!isFileTypeCorrect($fileTmpName, [IMAGETYPE_PNG, IMAGETYPE_JPEG])) {
        return "Неподходящий тип файла";
    }
    if ($fileSize > 5242880) {
        return "Неподходящий размер файла";
    }
    move_uploaded_file($fileTmpName, UPLOAD_DIR . $fileName);
    return "Файл загружен успешно";
}
