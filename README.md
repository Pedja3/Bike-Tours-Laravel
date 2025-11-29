<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="70" alt="Laravel Logo">
</p>


# Bike Tours — Laravel Project  
**Status:** Work in Progress

Jednostavna i moderna Laravel aplikacija za upravljanje biciklističkim turama.

---

## Funkcionalnosti
- CRUD za ture koristeći Eloquent ORM i migrations
- Filtriranje tura po težini (easy, medium, hard)
- Kontakt forma sa čuvanjem poruka u bazi
- Pregled svih tura
- Pretraga tura
- Autentikacija korisnika (registracija, login/logout)

---

## Plan za nastavak projekta
- Admin panel  
- Komentarisanje i ocenivanje tura  
- Podrška za audio/video sadržaj  
- Dalje proširenje funkcionalnosti  

---

## Tehnologije
**Laravel · PHP · MySQL · Blade**

## Autor: Predrag Jovanović

---

## Instalacija
```bash
git clone git@github.com:Pedja3/Bike-Tours-Laravel.git
cd Bike-Tours-Laravel
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve





