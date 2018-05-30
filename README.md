# Appointment
PHP Module for KOUOSL

Randevu modülünü eklemek için öncelikle,

Portal klasörünün içerisindeki composer.json dosyasında gerekli yerlere şu satırları ekliyoruz;

```
            "repositories": [
                        ...
                        {
                            "type": "vcs",
                            "url": "https://github.com/onurtaskiran95/Appointment.git"
                        }
            ],



            "require": {
                        ...
                        "kouosl/Appointment": "dev-master",
                        "2amigos/yii2-date-picker-widget": "~1.0"
            },
```

------------------------------------------

Ekledikten sonra sanal makinaya bağlanarak şu komutları çalıştırıyoruz;

```
            cd /var/www/portal
            composer update
```

------------------------------------------

Ardından sanal makinamızda aşağıdaki komutu çalıştırıyoruz böylelikle veritabanımızı oluşturmuş olacağız.

```
            php yii migrate--migrationPath=@vendor/kouosl/Appointment/migrations
```

------------------------------------------

Portal dizinindeki "\frontend\config\main.php" ve "\backend\config\main.php" dosyasına girerek şu satırları ekliyoruz;

```
            'Appointment' => [
                        'class' => 'kouosl\Appointment\Module'  
                    ]
```  
------------------------------------------

Son adım olarak "common/config/main-local.php" dosyasına girerek mail gönderme ile ilgili ayarlarımızı yapıyoruz.

```
            'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'onurtaskiran.randevu@gmail.com',
                'password' => 'Onur1234',
                'port' => '587',
                'encryption' => 'tls',
            ],
            'useFileTransport' => false,
        ]
```

Kodu bu şekilde değiştirmeniz gerekiyor.

------------------------------------------


**Modül kurulumu tamamlanmıştır.**

------------------------------------------

http://portal.kouosl/Appointment buradan kullanıcı arayüzüne ulaşabilirsiniz. Randevular buradan alıcanacak.

http://portal.kouosl/admin/Appointment buradan ise admin paneline ulaşabilirsiniz. Gelen randevular buradan kontrol edilecek eğer uygunsa onaylanacak.Yeni randevular buradan eklenebilecek.

Onaylanan randevular kullanıcılara mail olarak gidecek. Eğer daha önceden onaylanmış bir randevunun onayı kaldırılırsa kullanıcıya randevusunun iptal olduğu mail olarak gidecektir.

------------------------------------------

## Onur Taşkıran - 141307031
