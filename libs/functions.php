<?php
    // ** ACCOUNT CODES !
    function userLogin($username, $password)
    {
        include "database.php";
        mysqli_real_escape_string($connection, $username);
        mysqli_real_escape_string($connection, $password);

        $result = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username' && password = '$password' ");

        if (mysqli_num_rows($result) > 0) {
            $_SESSION["username"] = $username;

            header("Location: index.php");
            
        } else {
            pageAlertMessage("Kullanıcı Adı veya Parola Hatalı !", "danger");
        }
    }
    function userRegister($name, $surname, $username, $email, $password, $role)
    {
        include "database.php";
        mysqli_real_escape_string($connection, $name);
        mysqli_real_escape_string($connection, $surname);
        mysqli_real_escape_string($connection, $username);
        mysqli_real_escape_string($connection, $email);
        mysqli_real_escape_string($connection, $password);

        $user = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

        if (mysqli_num_rows($user) > 0) {
            // ** Hata !
            pageAlertMessage("Hata! Bu kullanıcı adı daha önce alınmış !", "danger");
        } else {
            $result = mysqli_query($connection, "INSERT INTO user(name, surname, username, email, password, role) VALUES('$name', '$surname', '$username', '$email', '$password', '$role')");

            if ($result) {
                pageAlertMessage("Kayıt Başarıyla Eklendi !, Giriş Yapabilirsiniz", "success");
            } else {
                pageAlertMessage("HATA ! Kayıt Eklenemedi !!!", "danger");
            }
        }
    }


    // **  ADMIN CODES
    // Book Codes !
    function adminBookCreate($title, $authorName, $pageCount, $language, $price, $barcode, $imageUrl, $isApproved)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "INSERT INTO book(title, authorName, pageCount, language, price, barcode, imageUrl, isApproved) VALUES('$title', '$authorName', $pageCount, '$language', $price, '$barcode', '$imageUrl', $isApproved)");

        if ($result) {
            alertMessage("'$title' Başlıklı Kitap Başarıyla Güncellendi !","success");
            header("Location: admin-books.php");
        } else {
            alertMessage("HATA ! Kayıt Eklenemedi !!!", "danger");
        }
    }
    function adminBookEdit($id, $title, $authorName, $pageCount, $language, $price, $barcode, $imageUrl, $isApproved)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "UPDATE book SET title='$title', authorName='$authorName', pageCount=$pageCount, language='$language', price=$price, barcode='$barcode', imageUrl='$imageUrl', isApproved=$isApproved WHERE id = $id");

        if ($result) {
            alertMessage("'$title' Başlıklı Kitap Başarıyla Güncellendi !","success");
            header("Location: admin-books.php");
        } else {
            alertMessage("HATA ! Kayıt Eklenemedi !!!", "danger");
            header("Location: admin-books.php");
        }
    }
    
    function hardDeleteBook($id)
    {
        include "libs/database.php";
        $deleteFromCategory = mysqli_query($connection, "DELETE FROM bookcategory WHERE bookId = $id");
        $result = mysqli_query($connection, "DELETE FROM book WHERE id = $id");

        if ($result) {
            alertMessage("'$id' Id'li Kitap Başarıyla Silindi !","warning");
            header("Location: admin-books.php");
        } else {
            alertMessage("HATA! Kitap Silinemedi","danger");
            header("Location: index.php");
        }
    }

    // Category Codes !
    function adminCategoryCreate($name, $description)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "INSERT INTO category(name, description) VALUES('$name', '$description')");

        if ($result) {
            alertMessage("'$name' İsimli Kategori Başarıyla Eklendi !","success");
            header("Location: admin-categories.php");
        } else {
            header("Location: admin-categories.php");
            alertMessage("HATA ! Kayıt Eklenemedi !!!", "danger");
        }
    }    
    function adminCategoryEdit($id, $name, $description)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "UPDATE category SET name='$name', description='$description' WHERE id = $id");

        if ($result) {
            alertMessage("'$name' İsimli Kategori Başarıyla Güncellendi !","success");
            header("Location: admin-categories.php");
        } else {
            header("Location: admin-categories.php");
            alertMessage("HATA ! Kayıt Güncellenemedi !!!", "danger");
        }
    }
    function hardDeleteCategory($id)
    {
        include "libs/database.php";
        $deleteFromBook = mysqli_query($connection, "DELETE FROM bookcategory WHERE categoryId = $id");
        $result = mysqli_query($connection, "DELETE FROM category WHERE id = $id");

        if ($result) {
            alertMessage("'$id' Id'li Kategori Başarıyla Silindi !","warning");
            header("Location: admin-categories.php");
        } else {
            alertMessage("HATA ! Kayıt Silinemedi !!!", "danger");
            header("Location: admin-categories.php");
        }
    }
    function addBookToCategories($bookId, $addCategoryIds)
    {
        include "libs/database.php";
        $query = "";

        foreach ($addCategoryIds as $categoryId) {
            $query .= "INSERT INTO bookcategory(bookId, categoryId) VALUES($bookId, $categoryId);";
        }

        $result = mysqli_multi_query($connection, $query);
        return $result;
    }

    function isAdmin()
    {
        include "libs/database.php";
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];

            $result = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username' AND role = 'admin' ");

            if (mysqli_num_rows($result) > 0) {
                return true;
            }
        }

        return false;
    }

    // User Codes !
    function getUserById($id)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM user WHERE id = $id");

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            header("Location: admin-users.php");
        }
    }
    function getUserByUsername($username)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            header("Location: admin-users.php");
        }
    }
    function adminUserEdit($userId, $name, $surname, $username, $email, $password, $role)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "UPDATE user SET name='$name', surname='$surname', username='$username', email='$email', password='$password', role='$role' WHERE id=$userId");

        if ($result) {
            alertMessage("'$surname' Kullanıcı Adlı Kayıt Başarıyla Güncellendi !", "success");
            header("Location: admin-users.php");
        } else {
            alertMessage("HATA ! Kayıt Eklenemedi !!!", "danger");
        }

    }
    function hardDeleteUser($userId)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "DELETE FROM user WHERE id=$userId");

        if($result) {
            alertMessage("Kullanıcı Başarıyla Silindi !", "warning");
            header("Location: admin-users.php");
        } else {
            alertMessage("HATA ! Kayıt Silinemedi !!!", "danger");
        }
    }


    //** PUBLIC CODES !
    function getBookById($id)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM book WHERE id = $id");

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            // ** Burada Mesaj Verilecek !
            header("Location: admin-books.php");
        }
    }
    function getCategoryById($id)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM category WHERE id = $id");

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            // ** Burada Mesaj Verilecek !
            header("Location: admin-categories.php");
        }
    }  


    function getAllBooks()
    {
        include "libs/database.php";
        return mysqli_query($connection, "SELECT * FROM book");        
    }
    function getAllCategories()
    {
        include "libs/database.php";
        return mysqli_query($connection, "SELECT * FROM category");
    }
    function getAllUsers()
    {
        include "libs/database.php";
        return mysqli_query($connection, "SELECT * FROM user");
    }
    function getAllBooksByCategory($categoryId)
    {
        include "libs/database.php";

        if ($categoryId != null) {
            // return mysqli_query($connection, "SELECT *, book.id FROM book, category, bookcategory WHERE bookcategory.bookId = book.id AND bookcategory.categoryId = category.id AND bookcategory.categoryId = $categoryId AND book.isApproved = true");
            return mysqli_query($connection, "SELECT * FROM bookcategory bc INNER JOIN book b ON bc.bookId = b.id WHERE bc.categoryId = $categoryId AND b.isApproved = true");
        } else {
            return mysqli_query($connection, "SELECT * FROM book WHERE isApproved = true");
        }

    }
    function getAllLastBooks()
    {
        include "libs/database.php";
        return mysqli_query($connection, "SELECT * FROM book WHERE isApproved = true ORDER BY createdDate DESC LIMIT 10 ");        
    }

    function clearBookCategories($id)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "DELETE FROM bookcategory WHERE bookId = $id");

        return $result;
    }


    function getBooksCount()
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM book");

        return mysqli_num_rows($result);
    }
    function getCategoriesCount()
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM category");

        return mysqli_num_rows($result);
    }
    function getUsersCount()
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM user");

        return mysqli_num_rows($result);
    }

    function imageUpload($fileTmpPath, $fileName, $fileSize, $uploadLocation, $dest_path)
    {
        // Resim ismi kontrolü !
        $folders = scandir("wwwroot/img/book/.");

        foreach ($folders as $file) {
            if ($file == $fileName) {
                pageAlertMessage("Bu isme sahip bir resim sunucuda bulunmaktadır ! ", "danger");
                return false;
            }
        }

        // Resim boyutu Kontrolü !
        if ($fileSize < 500000) {
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                return true;
            } else {
                pageAlertMessage("Hata, Dosya Yüklenemedi !","danger");
                return false;
            }

        } else {
            pageAlertMessage("Resim Boyutu 500 KB'yi geçemez !","danger");
            return false;
        }
    }
    function getCategoryByBook($bookId, $categoryId)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM bookcategory WHERE bookId = $bookId AND categoryId = $categoryId");

        return mysqli_num_rows($result) > 0 ? true : false;

    }    
    function getAllBooksBySearch($url)
    {
        include "libs/database.php";
        $result = mysqli_query($connection, "SELECT * FROM book WHERE title LIKE'%$url%' OR authorName LIKE'%$url%'");

        if (mysqli_num_rows($result) <= 0) {
            alertMessage("İçinde '$url' kelimesi geçen bir kitap bulunamadı !", "danger");
        }

        return $result;
    }

    function sortByBook($operation, $ascOrDesc)
    {
        include "libs/database.php";
        if ($ascOrDesc) {
            $result = mysqli_query($connection, "SELECT * FROM book ORDER BY $operation DESC");
        } else {
            $result = mysqli_query($connection, "SELECT * FROM book ORDER BY $operation ASC");
        }
        
        return $result;
    }


    // ** SEND MESSAGE
    function alertMessage($message, $type)
    {
        $_SESSION["message"] = $message;
        $_SESSION["type"] = $type;
    }

    function pageAlertMessage($message, $type)
    {
        echo "
            <div class='alert alert-$type rounded-0 m-0 text-center'>
                <h5>$message</h5>
            </div>
        ";
    }
?>