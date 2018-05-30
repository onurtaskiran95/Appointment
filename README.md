# Appointment
PHP Module for KOUOSL

Randevu modülünü eklemek için öncelikle,

Komut satırında modülümüzü ekleyeceğimiz yere (@vendor/kouosl/) altına geliyoruz.
Ardından "git clone https://github.com/onurtaskiran95/Appointment.git" komutunu çalıştırarak modülümüzü projemize indiriyoruz.

------------------------------------------  

Portal dizinindeki "\frontend\config\main.php" ve "\backend\config\main.php" dosyasına girerek şu satırları ekliyoruz;

```
            'Appointment' => [
                        'class' => 'kouosl\Appointment\Module'  
                    ]
```  
------------------------------------------

Portal klasörünün içerisindeki composer.json dosyasında gerekli yerlere şu satırları ekliyoruz;

```
            "repositories": [
                        {
                              "type": "vcs",
                              "url": "https://github.com/onurtaskiran95/Appointment.git"
                        }
            ],



            "require": {
                        ...
                        "kouosl/Appointment": "dev-master"
            },
```


------------------------------------------

Ekledikten sonra sanal makinaya bağlanarak şu komutları çalıştırıyoruz;

```
            cd /var/www/portal
            sudo chmod -R 777 vendor/kouosl/Randevu
            composer require 2amigos/yii2-date-picker-widget:~1.0
            composer update
```

------------------------------------------

Son adım olarakda modülümüzde "migrations" klasöründeki .php uzantılı dosyayı kopyalayıyoruz ve portal dizininde "console/migrations/" altına yapıştırıyoruz(klasör yok ise kendimiz oluşturuyoruz).
Ardından sanal makinamızda,

```
            php yii migrate
```

Komutunu çalıştırıyoruz böylelikle veritabanımızı oluşturup örnek bir kayıt ekliyoruz. 



**Modül kurulumu tamamlanmıştır.**

------------------------------------------

http://portal.kouosl/Appointment buradan kullanıcı arayüzüne ulaşabilirsiniz. Randevular buradan alıcanacak.

http://portal.kouosl/admin/Appointment buradan ise admin paneline ulaşabilirsiniz. Gelen randevular buradan kontrol edilecek eğer uygunsa onaylanacak.Yeni randevular buradan eklenebilecek.

Onaylanan randevular kullanıcılara mail olarak gidecek. Eğer daha önceden onaylanmış bir randevunun onayı kaldırılırsa kullanıcıya randevusunun iptal olduğu mail olarak gidecektir.

------------------------------------------

                                                                                    Onur Taşkıran - 141307031

