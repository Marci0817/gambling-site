# Gambling site _( Web tervezés gyakorlat )_

## Projekt telepítése

Követelmények:
-XAMPP

Telepítési lehetőségek:

-- 1. lehetőség --

1. Közvetlenül a `C:\XAMPP\htdocs\` mappába kerül a projekt.

2. Apache elindítása

3. SQL file betöltése ( /sql/init.sql)

-- 2. lehetőség --

1. `D:\XAMPP\apache\conf\extra\httpd-vhosts.conf` fájl módosítása

2. `<elérési utvonal>` felülírása ( pl: C:\Users\User\Desktop\Websites\gambling-site )

`<VirtualHost *:80>
    DocumentRoot "<elérési utvonal>" 
    ServerName localhost
    <Directory />
        Require all granted
    </Directory>
  </VirtualHost>`

3. Apache elindítása

4. SQL file betöltése ( /sql/init.sql)

## Projekt felépítése

#### Lehetséges útvonalak - excel táblázatban írt címe

-   /index.php - Bemutató oldal
-   /auth.php - Bejelentkezés/regisztráció
-   /blackjack.php - Blackjack /coinflip.php - Coinflip
-   /profile.php - Profil oldal
-   /deposit.php - Befizetős minigame

**Jelenlegi állapot**
https://trello.com/b/XbhGhbGz

## Fejlesztői környezet

**Hot reload**

1.  `pnpm install`
2.  `pnpm run dev`

## Munkanapló készítése

`git log --no-merges --pretty=format:"%ad;%an;%s" --date=iso > text.txt`
