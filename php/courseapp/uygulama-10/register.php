/**
* Bu dosya uygulamanın kayıt (register) işlemlerini yönetir.
*
* Bağımlılıklar:
* - libs/variables.php: Uygulama genelinde kullanılan değişkenler.
* - libs/functions.php: Kayıt işlemlerinde gerekli yardımcı fonksiyonlar.
*
* Kullanım:
* Kullanıcı kayıt işlemlerini etkinleştirmek için bu dosyayı dahil edin.
*/
<?php
require "libs/variables.php";
require "libs/functions.php";
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<?php
$usernameErr = $emailErr = $passwordErr = $repasswordErr = $cityErr = $hobbiesErr = "";
$username = $email = $password = $repassword = $city = "";
$hobbies = [];

/**
 * Handles the registration form submission.
 *
 * - Validates required fields: username, email, password, repassword, city, and hobbies.
 * - Sanitizes user input using the safe_html() function for username, email, password, and repassword.
 * - Checks if the password and repassword fields match.
 * - Ensures a city is selected (not -1).
 * - Ensures at least one hobby is selected.
 * - On successful validation, prints the hobbies array and the username.
 *
 * Error variables ($usernameErr, $emailErr, $passwordErr, $repasswordErr, $cityErr, $hobbiesErr)
 * are set with appropriate error messages if validation fails.
 *
 * Expected POST parameters:
 * - username: string
 * - email: string
 * - password: string
 * - repassword: string
 * - city: integer (should not be -1)
 * - hobbies: array
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $usernameErr = "username gerekli alan.";
    } else {
        $username = safe_html($_POST["username"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "email gerekli alan.";
    } else {
        $email = safe_html($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "password gerekli alan.";
    } else {
        $password = safe_html($_POST["password"]);
    }

    if ($_POST["password"] != $_POST["repassword"]) {
        $repasswordErr = "parola tekrar alanı eşleşmiyor.";
    } else {
        $repassword = safe_html($_POST["repassword"]);
    }

    if ($_POST["city"] == -1) {
        $cityErr = "sehir seçmelisiniz.";
    } else {
        $city = $_POST["city"];
    }

    if (!isset($_POST["hobbies"])) {
        $hobbiesErr = "hobi seçmelisiniz.";
    } else {
        $hobbies = $_POST["hobbies"];
    }

    print_r($hobbies);

    echo $username;
}

?>

/**
* Kullanıcı Kayıt Formu
*
* Bu form, kullanıcıların sisteme kayıt olmasını sağlar. Formda aşağıdaki alanlar bulunmaktadır:
*
* - Kullanıcı Adı (username): Kullanıcının benzersiz adı.
* - Eposta (email): Kullanıcının eposta adresi.
* - Parola (password): Kullanıcının şifresi.
* - Parola Tekrar (repassword): Şifre doğrulama alanı.
* - Şehir (city): Kullanıcının yaşadığı şehir, şehirler $sehirler dizisinden alınır.
* - Hobiler (hobbies): Kullanıcının hobileri, $hobiler dizisinden alınır ve çoklu seçim yapılabilir.
*
* Her alan için hata mesajları ($usernameErr, $emailErr, $passwordErr, $repasswordErr, $cityErr, $hobbiesErr) ilgili input altında gösterilir.
* Form gönderildiğinde POST yöntemiyle aynı sayfaya (register.php) veri gönderilir.
* Seçili değerler ve girilen bilgiler, form tekrar yüklendiğinde kaybolmaması için ilgili değişkenlerle doldurulur.
*/
<div class="container my-3">

    <div class="row">
        <div class="col-12">
            <form action="register.php" method="post">
                <div class="mb-3">
                    <label for="username">Kullanıcı Adı</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <div class="text-danger"><?php echo $usernameErr; ?></div>
                </div>
                <div class="mb-3">
                    <label for="email">Eposta</label>
                    /**
                    * Email input field for the registration form.
                    *
                    * - Type: email
                    * - Name attribute: "email"
                    * - CSS class: "form-control"
                    * - Value: Pre-fills the input with the value of the PHP variable $email.
                    *
                    * This field is used to collect the user's email address during registration.
                    */
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                    <div class="text-danger"><?php echo $emailErr; ?></div>
                </div>
                <div class="mb-3">
                    <label for="password">Parola</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <div class="text-danger"><?php echo $passwordErr; ?></div>
                </div>
                <div class="mb-3">
                    <label for="repassword">Parola Tekrar</label>
                    <input type="password" name="repassword" class="form-control">
                    <div class="text-danger"><?php echo $repasswordErr; ?></div>
                </div>
                <div class="mb-3">
                    <label for="city">Şehir</label>
                    <select name="city" class="form-select">
                        <option value="-1" selected>Şehir Seçiniz</option>

                        <?php foreach ($sehirler as $plaka => $sehir): ?>
                            <option
                                value="<?php echo $plaka; ?>" <?php echo $city == $plaka ? ' selected' : '' ?>> <?php echo $sehir; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="text-danger"><?php echo $cityErr; ?></div>
                </div>
                <div class="mb-3">
                    <label for="hobiler">Hobiler</label>

                    <?php foreach ($hobiler as $id => $hobi): ?>

                        <div class="form-check">
                            <input type="checkbox" name="hobbies[]"
                                value="<?php echo $id; ?>"
                                id="hobbies_<?php echo $id; ?>"
                                <?php if (in_array($id, $hobbies)) echo 'checked' ?>>
                            <label for="hobbies_<?php echo $id; ?>" class="form-check-label"><?php echo $hobi; ?></label>
                        </div>

                    <?php endforeach; ?>


                    <div class="text-danger"><?php echo $hobbiesErr; ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Kayıt Ol</button>
            </form>
        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>