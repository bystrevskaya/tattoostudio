<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
if (isset($_POST['upload'])) {
    for($key = 0; $key < count($_FILES['userFile']['name']); $key++) {
        $uploadResult = uploadFile(
            $_FILES['userFile']['name'][$key],
            $_FILES['userFile']['tmp_name'][$key],
            $_FILES['userFile']['size'][$key],
            $_FILES['userFile']['error'][$key]
        );
        if ($uploadResult != "Файл загружен успешно") {
            echo $uploadResult;
        }
    }
}

?>
<dialog id="gallery">
    <h1 class="gallery_h">Галерея эскизов</h1>
    <button id="hide_gallery">X</button>
    <div class="gallery_sketches">
        <?php
        $images = array_diff(scandir(GALLERY_DIR), ['.', '..']);
        foreach ($images as $image) {
            if (isFileTypeCorrect(GALLERY_DIR . $image, [IMAGETYPE_PNG, IMAGETYPE_JPEG])) {
                require $_SERVER['DOCUMENT_ROOT'] . '/include/templates/gallery_image.php';
            }
        }
        ?>
    </div>
    <button id="chose_sketch">Выбрать</button>
</dialog>

<div class="page_body">
    <h1>Примерка эскиза на 3D модели</h1>
    <p class="description">В данном разделе сайта вы можете воспользоваться функцией
        примерки эскиза на 3D модели, чтобы увидеть, как татуировка будет
        смотреться на той или иной части тела</p>

    <div class="model">
        <div class="model_fitting">
            <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>

            <script type="importmap">
              {
                "imports": {
                  "three": "https://unpkg.com/three@0.141.0/build/three.module.js"
                }
              }
            </script>


            <script type="module" src="/sketches_repr/3d_repr.js"></script>
        </div>
        <div class="model_images">
            <button class="model_button" id="show_gallery">Выбрать эскиз из галереи</button>
            <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                Загрузить эскиз: <input name="userFile[]" type="file" multiple/>
                <input type="submit" name="upload" value="Отправить" />
            </form>
            <div id="uploaded_sketches">
                <?php
                $images = array_diff(scandir(UPLOAD_DIR), ['.', '..']);
                foreach ($images as $image) {
                    if (isFileTypeCorrect(UPLOAD_DIR . $image, [IMAGETYPE_PNG, IMAGETYPE_JPEG])) {
                        require $_SERVER['DOCUMENT_ROOT'] . '/include/templates/chosen_image.php';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="/sketches_repr/sketches_gallery.js"></script>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';
?>