# WordPress základné súbory a štruktúra súborov
Repozitár obsahuje základné súbory a prehľad štruktúry pre bežné, prezentačné WordPress web stránky:
- jQuery je už definované v functions.php, z HTML šablón môže ísť preč
- ostatné JS súbory patria do footer.php
- v /js je súbor excerptFirst.js, ktorý sa používa v administrácii, netreba s ním nič robiť, hlavne nemazať
- functions.php stojí za pozretie :-)

## Pluginy, ktoré inštalujeme vždy
1. TinyMCE Advanced (do nastavení vložíme obsah súboru tinyMCEconfing.txt)
2. Advanced Custom Fields
3. Velvet Blue Update URLs
4. Better Admin Bar (len pre pohodlnejšiu správu)
5. Adminimize

## Pluginy, ktoré používame veľmi často
1. Contact Form 7
2. Flamingo

### Bezpečnosť
- tabuľkám zmeníme prefix wp_ na niečo iné
- nevytvárame používateľa "admin"

### Ostatné
Keď je stránka hotová, okrem administrátora vytvoríme klientský prístup: rola - "Editor", login - "editor". Pomocou pluginu Adminimize skryjeme časti, do ktorých klient nemá mať prístup.

Vo functions.php nastavujeme logo aj pre stránku na prihlásenie do administrácie (okolo riadku 110).

Vo functions.php pridávame základnú nápovedu pre klienta, aby sa vedel v administrácii rýchlo  zorientovať (custom_dashboard_widget okolo riadku 90).

