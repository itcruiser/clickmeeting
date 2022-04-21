# Uwagi
* Nie konfigurowałem wysyłki do chmury ponieważ jest to tylko kwestia konfiguracji https://github.com/1up-lab/OneupFlysystemBundle/blob/main/doc/adapter_awss3.md
* Dodatkowe filtry można dodawać zgodnie z dokumentacją https://symfony.com/bundles/LiipImagineBundle/current/filters/sizing.html#thumbnails
* Nie konfigurowałem dokerów ponieważ można uruchomić z poziomu cli o ile mamy zainstalowane php
* W celu przeniesieia funkcjonalności do kontrolera wystarczy użyć serwisu App\Service\ThumbnailGenerator