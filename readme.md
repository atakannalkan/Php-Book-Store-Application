# PHP ile Kitap Satışı Uygulaması

## Uygulamaya Genel Bakış

Uygulama Php programlama dili kullanılarak geliştirilmiş orta düzey bir kitap satış uygulamasıdır. Kullanıcılar siteye girerek Anasayfadaki ürünlerin listesini görebilir, ürünün detaylarını görüntüleyebilir veya kategori menüsünden ürünleri filtreleyebilir. Bunun dışında siteye kayıt olabilir, kayıt bilgileriyle de siteye giriş yapabilir.

Projenin Front-End ve Back-End kısımları dahil olmak üzere tamamı 1 ay içerisinde geliştirilmiştir. **Admin Paneli** kısmında ise, **Admin** rolüne sahip kullanıcı; Ürün, Kategori, Kullanıcı ve Rol kısımlarına kolay bir şekilde veri okuma, ekleme, silme ve güncelleme gibi işlemleri kolaylıkla yapabilir. Uygulamanın geliştirildiği yazılım mimarisi ve altyapısı aşağıda verilmiştir.

## Uygulama Konu Başlıkları

* Html
* Css
* JavaScript
* Bootstrap 5
* Php
* Sql
* MySQL

---

## Back-End ve Veritabanı

Uygulamanın Back-End kısmında tüm VTYS (Veri Tabanı Yönetim Sistemi) de standart haline gelmiş **SQL** sorgulama dili kullanılmıştır. Veri tabanı olarak da **Php** ile daha uyumlu olan **MySQL** Veri tabanı kullanılmıştır.

Veri tabanı Relationships(İlişkiler) konusunda ise, Book(kitap) ve Category(kategori) tabloları arasında **Çoka-çok(Many-To-Many)** ilişki yapılmıştır. Bunun için de araya bir kaynaştırma tablosu eklenerek tablonun ismine **BookCategory** verilmiştir.

## Uygulamanın Kullanımı

Uygulamayı çalıştırmak için öncelikle uygulama ile MySQL veritabanı arasındaki bağlantının kurulması gereklidir. Bağlantı gerçekleştikten sonra ise admin paneline erişmek ve siteyi yönetmek için varsayılan kullanıcı bilgileri; **Kullanıcı Adı: "admin" - Şifre: "atakan1"** bilgileri ile admin olarak giriş yapabilirsiniz. Sonrasında ise bu bilgileri admin paneli kısmından ya da veritabanının kendisinden güncelleyebilirsiniz.